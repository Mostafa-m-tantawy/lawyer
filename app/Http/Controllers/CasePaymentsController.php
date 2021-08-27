<?php

namespace App\Http\Controllers;

use App\Http\Requests\CasePaymentRequest;
use App\Http\Requests\CaseRequest;
use App\Http\Requests\ClientRequest;
use App\Http\Requests\UserRequest;
use App\Models\CasePayment;
use App\Models\Client;
use App\Models\Court;
use App\Models\CourtCase;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class CasePaymentsController extends Controller
{




    public function store(CasePaymentRequest $request)
    {
        Log::info('Payment store');

        try {
            DB::beginTransaction();
            CasePayment::create($request->all());

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

    public function update(CasePaymentRequest $request, CasePayment $payment)
    {
        Log::info('Payment update');

        try {
            DB::beginTransaction();

            $data = $request->all();
            $payment->update($data);

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
        Log::debug('Payment destroy');

        try {
            DB::beginTransaction();
            CasePayment::destroy($id);

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
