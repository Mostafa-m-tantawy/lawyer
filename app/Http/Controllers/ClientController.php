<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Http\Requests\UserRequest;
use App\Models\Client;
use App\Models\Court;
use App\Models\CourtCase;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ClientController extends Controller
{

    public function index()
    {
        $data= Client::paginate('10');
        return view('clients.index', ['data' =>$data]);
    }


    public function show(Client $client)
    {
        $courts=Court::all();
        $cases=CourtCase::where('client_id',$client->id)->paginate(10);
        return view('clients.show', compact('courts','client','cases'));
    }


    public function store(ClientRequest $request)
    {
        Log::info('Client store');

        try{
            DB::beginTransaction();
            Client::create($request->all());

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

    public function update(ClientRequest $request,Client $client)
    {
        Log::info('Client update');

        try{
            DB::beginTransaction();

            $data = $request->all();
            $client->update($data);

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
        Log::debug('Client destroy');

        try{
            DB::beginTransaction();
            Client::destroy($id);

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
