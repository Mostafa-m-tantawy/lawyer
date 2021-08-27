<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourtRequest;
use App\Http\Requests\UserRequest;
use App\Models\Client;
use App\Models\Court;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CourtController extends Controller
{

    public function index()
    {

        $data= Court::paginate('10');
        return view('courts.index', ['data' =>$data]);    }

    public function store(CourtRequest $request)
    {
        Log::info('Court store');

        try{
            DB::beginTransaction();
            Court::create($request->all());

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

    public function update(CourtRequest $request,Court $Court)
    {
        Log::info('Court update');

        try{
            DB::beginTransaction();

            $data = $request->all();
            $Court->update($data);

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
        Log::debug('Court destroy');

        try{
            DB::beginTransaction();
            Court::destroy($id);

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
