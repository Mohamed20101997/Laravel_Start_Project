<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $method = $this->getMethod();
        $actionName = $this->route()->getActionMethod();



        if($method === 'POST'){

            if($actionName == 'store'){
                return [
                    'name' => 'required',
                    'email' => 'required|email|unique:admins,email',
                    'password' => 'required|same:confirm-password',
                ];
            } // end of actionName check


        } // end of method check


        if($method === 'PUT'){

            if($actionName == 'update'){
                return [
                    'name' => "required",
                    'email' => 'required|email|unique:admins,email,'.$this->id,
                    'password' => 'sometimes|nullable|same:confirm-password',
                ];
            } // end of actionName check


        } // end of method check




    }
}
