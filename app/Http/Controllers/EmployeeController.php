<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\UserRequest;
use App\Models\Client;
use App\Models\Court;
use App\Models\CourtCase;
use App\Models\Employee;
use App\Models\EmployeePayment;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class EmployeeController extends Controller
{

    public function index()
    {
        $data= Employee::paginate('10');
        return view('employees.index', ['data' =>$data]);
    }


    public function show(Employee $employee)
    {
        $payments= EmployeePayment::where('employee_id',$employee->id)->paginate(10);
        return view('employees.show', compact('employee','payments'));
    }


    public function store(EmployeeRequest $request)
    {
        Log::info('Employee store');

        try{
            DB::beginTransaction();
            Employee::create($request->all());

            DB::commit();
            toastr()->success('record added successfully');
            return redirect()->back();
        }catch (\Exception $exception){
            DB::rollBack();
            \Log::debug($exception->getMessage());
            toastr()->error('Error!! please try again');
            return redirect()->back();
        }


    }

    public function update(EmployeeRequest $request,Employee $employee)
    {
        Log::info('Employee update');

        try{
            DB::beginTransaction();

            $data = $request->all();
            $employee->update($data);

            DB::commit();
            toastr()->success('Record Updated Successfully');
            return redirect()->back();
        }catch (\Exception $exception){
            DB::rollBack();
            \Log::debug($exception->getMessage());
            toastr()->error('Error!! please try again');
            return redirect()->back();
        }

    }

    public function destroy ($id)
    {
        Log::debug('Employee destroy');

        try{
            DB::beginTransaction();
            Employee::destroy($id);

            DB::commit();
            toastr()->warning('Record Deleted Successfully.');
            return redirect()->back();
        }catch (\Exception $exception){
            DB::rollBack();
            \Log::debug($exception->getMessage());
            toastr()->error('Error!! Please try again.');
            return redirect()->back();
        }

    }

}
