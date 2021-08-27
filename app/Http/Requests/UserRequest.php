<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


    protected function prepareForValidation()
    {




    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = '';
        $required = 'required';
        if ($this->route('user'))
            $id = $this->route('user')->id;

        if($id)
            $required = 'nullable';

        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
            'password' => [$required, 'string', 'min:8', 'confirmed'],
        ];
    }



    public function withValidator(Validator $validator): void
    {
        if(!isset($this->password))
            $this->merge([
                'password' => Hash::make($this->password),
            ]);

    }
}


