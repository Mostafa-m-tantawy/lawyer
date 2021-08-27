<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Model\Representative;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{

    public function index()
    {
        return view('users.index', ['data' => User::paginate('10')]);
    }

    public function store(UserRequest $request)
    {
        Log::info('User store');

        try{
            DB::beginTransaction();
            User::create($request->all());

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

    public function update(UserRequest $request,User $user)
    {
        Log::info('Representative update');

        try{
            DB::beginTransaction();

            $data = $request->all();
            $user->update($data);

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
        Log::debug('Representative destroy');

        try{
            DB::beginTransaction();
            User::destroy($id);

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
