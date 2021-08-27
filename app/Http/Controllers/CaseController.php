<?php

namespace App\Http\Controllers;

use App\Http\Requests\CaseRequest;
use App\Http\Requests\ClientRequest;
use App\Http\Requests\UserRequest;
use App\Models\Client;
use App\Models\Court;
use App\Models\CourtCase;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class CaseController extends Controller
{


    public function show(CourtCase $case)
    {
        $expenses = $case->expenses;

        $commissions = $case->commissions;

        $payments = $case->payments;
        $client = $case->client;

        return view('cases.show', compact('case', 'expenses', 'commissions', 'payments','client'));
    }


    public function store(CaseRequest $request)
    {
        Log::info('Case store');

        try {
            DB::beginTransaction();
            CourtCase::create($request->all());

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

    public function update(CaseRequest $request, CourtCase $case)
    {
        Log::info('Case update');

        try {
            DB::beginTransaction();

            $data = $request->all();
            $case->update($data);

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
        Log::debug('Case destroy');

        try {
            DB::beginTransaction();
            CourtCase::destroy($id);

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
