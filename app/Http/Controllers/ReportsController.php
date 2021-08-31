<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\CasePayment;
use App\Models\Client;
use App\Models\Court;
use App\Models\CourtCase;
use App\Models\Employee;
use App\Models\EmployeePayment;
use App\Models\GeneralExpense;
use App\Models\User;
use Illuminate\Http\Request;

class ReportsController extends Controller
{

    public function salaries(Request $request)
    {
        $data = EmployeePayment::with('employee');
        $employees = Employee::all();
        $professions = Employee::select('profession')->distinct('profession')->get();

        if (isset($request->employee_id))
            $data = $data->where('employee_id', $request->employee_id);

        if (isset($request->profession))
            $data = $data->whereHas('employee', function ($q) use ($request) {
                $q->where('profession', $request->profession);
            });

        if (isset($request->start_date))
            $data = $data->whereDate('payment_date', '>=', $request->start_date);

        if (isset($request->end_date))
            $data = $data->whereDate('payment_date', '<=', $request->end_date);

        $data = $data->paginate(20, ['*'], 'report');

        return view('reports.salaries', compact('data', 'employees', 'professions'));
    }

    public function generalExpenses(Request $request)
    {
        $data = GeneralExpense::query();
        $users = User::all();

        if (isset($request->type))
            $data = $data->where('type', $request->type);

        if (isset($request->user))
            $data = $data->where('type', $request->type);


        if (isset($request->start_date))
            $data = $data->whereDate('payment_date', '>=', $request->start_date);

        if (isset($request->end_date))
            $data = $data->whereDate('payment_date', '<=', $request->end_date);

        $data = $data->paginate(20, ['*'], 'report');

        return view('reports.generalExpenses', compact('data', 'users'));
    }

    public function cases(Request $request)
    {
        $data = CourtCase::query();
        $clients = Client::all();
        $courts = Court::all();

        if (isset($request->case_id))
            $data = $data->where('case_id', $request->case_id);

        if (isset($request->court_id))
            $data = $data->where('court_id', $request->court_id);


        if (isset($request->start_date))
            $data = $data->whereDate('created_at', '>=', $request->start_date);

        if (isset($request->end_date))
            $data = $data->whereDate('created_at', '<=', $request->end_date);

        $data = $data->paginate(20, ['*'], 'report');

        return view('reports.cases', compact('data', 'clients','courts'));
    }

    public function casePayments(Request $request)
    {
        $data = CasePayment::where('type','Payment');
        $clients = Client::all();

        if (isset($request->client_id))
            $data = $data->whereHas('case', function ($q) use ($request) {
                $q->where('client_id', $request->client_id);
            });

        if (isset($request->start_date))
            $data = $data->whereDate('payment_date', '>=', $request->start_date);

        if (isset($request->end_date))
            $data = $data->whereDate('payment_date', '<=', $request->end_date);

        $data = $data->paginate(20, ['*'], 'report');

        return view('reports.CasePayments', compact('data', 'clients'));
    }

}
