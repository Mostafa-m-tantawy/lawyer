<?php

namespace App\Http\Controllers;

use App\Http\Requests\CasePaymentRequest;
use App\Http\Requests\CaseRequest;
use App\Http\Requests\ClientRequest;
use App\Http\Requests\EmployeePaymentRequest;
use App\Http\Requests\GeneralExpensesRequest;
use App\Http\Requests\UserRequest;
use App\Models\CasePayment;
use App\Models\Client;
use App\Models\Court;
use App\Models\CourtCase;
use App\Models\EmployeePayment;
use App\Models\GeneralExpense;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class GeneralExpensesController extends Controller
{


public function show($type){

    $types= ['Expenses', 'Maintenances','Assets'];
    if (!in_array($type,$types)){
        abort(404);
    }
    $data=GeneralExpense::where('type',$type)->paginate(10);
    $options=GeneralExpense::where('type',$type)->where('name','<>',null)->pluck('name','id');
    $breadcrumb=$type;
    return view('generalExpenses.index')->with(compact('data','breadcrumb','options'));

}

    public function store(GeneralExpensesRequest $request)
    {
        Log::info('General Expense store');

        try {
            DB::beginTransaction();
            $request['user_id']=Auth::user()->id;
            GeneralExpense::create($request->all());

            DB::commit();
            toastr()->success('record added successfully');
            return redirect()->back();
        } catch (\Exception $exception) {
            DB::rollBack();
            \Log::debug($exception->getMessage());
            toastr()->error('Error!! please try again');
            return redirect()->back();
        }


    }

    public function update(GeneralExpensesRequest $request,GeneralExpense $GeneralExpense)
    {
        Log::info('General Expense update');

        try {
            DB::beginTransaction();
            $data = $request->all();
            $GeneralExpense->update($data);

            DB::commit();
            toastr()->success('Record Updated Successfully');
            return redirect()->back();
        } catch (\Exception $exception) {
            DB::rollBack();
            \Log::debug($exception->getMessage());
            toastr()->error('Error!! please try again');
            return redirect()->back();
        }

    }

    public function destroy($id)
    {
        Log::debug('General Expense destroy');

        try {
            DB::beginTransaction();
            GeneralExpense::destroy($id);

            DB::commit();
            toastr()->warning('Record Deleted Successfully.');
            return redirect()->back();
        } catch (\Exception $exception) {
            DB::rollBack();
            \Log::debug($exception->getMessage());
            toastr()->error('Error!! Please try again.');
            return redirect()->back();
        }

    }

}
