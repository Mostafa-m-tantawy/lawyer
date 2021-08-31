<?php

namespace App\Http\Controllers;

use App\Http\Requests\CasePaymentRequest;
use App\Http\Requests\CaseRequest;
use App\Http\Requests\ClientRequest;
use App\Http\Requests\EmployeePaymentRequest;
use App\Http\Requests\UserRequest;
use App\Models\CasePayment;
use App\Models\Client;
use App\Models\Court;
use App\Models\CourtCase;
use App\Models\EmployeePayment;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class EmployeePaymentsController extends Controller
{




    public function store(EmployeePaymentRequest $request)
    {
        Log::info('Employee Payment store');

        try {
            DB::beginTransaction();
            EmployeePayment::create($request->all());

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

    public function update(EmployeePaymentRequest $request, EmployeePayment $payment)
    {
        Log::info('Employee Payment update');

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
        Log::debug('Employee Payment destroy');

        try {
            DB::beginTransaction();
            EmployeePayment::destroy($id);

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
