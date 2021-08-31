<?php

namespace App\Http\Controllers;

use App\Models\CourtCase;
use App\Models\GeneralExpense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class DashboardController extends Controller
{
    public  function  dashboard(){
        $total_general_expenses =GeneralExpense::sum('amount');

        $cases=CourtCase::all();
        $total_pending=$cases->sum('total_pending');
        $total_paid = $cases->sum('total_paid');
        $total_case_expenses = $cases->sum('total_expenses');
        $casesCount=$cases->count();
        $cases=CourtCase::paginate(5,['*'],'cases');
        $data=GeneralExpense::paginate(5,['*'],'general_expenses');


        return view('dashboard')->with(compact('data','cases','casesCount','total_case_expenses','total_general_expenses','total_paid','total_pending'));
    }


    public function changLang(Request $request)
    {
        $acceptLang = ['en','ar'];
        $lang = in_array($request->lang, $acceptLang) ? $request->lang : 'ar';

        if($lang=='ar'){
            session(['lang' => 'ar']);
            App::setLocale('ar');
        }
        else{
            session(['lang' => 'en']);
            App::setLocale('en');
        }
        return back();

    }
}
