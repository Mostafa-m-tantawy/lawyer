<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ServiceController extends Controller
{

    public function index()
    {

        $data= Service::paginate('10');
        return view('services.index', ['data' =>$data]);    }

    public function store(ServiceRequest $request)
    {
        Log::info('Service store');

        try{
            DB::beginTransaction();
            Service::create($request->all());

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

    public function update(ServiceRequest $request,Service $Service)
    {
        Log::info('Service update');

        try{
            DB::beginTransaction();

            $data = $request->all();
            $Service->update($data);

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
        Log::debug('Service destroy');

        try{
            DB::beginTransaction();
            Service::destroy($id);

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
