<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
                    'title' => 'required|string|max:255',
                    'content' => 'required',
                    'author' => 'required|string|max:255',
                    'published_at' => 'nullable|date',
                ];
            } // end of actionName check


        } // end of method check


        if($method === 'PUT'){

            if($actionName == 'update'){
                return [
                    'title' => 'required|string|max:255',
                    'content' => 'required',
                    'author' => 'required|string|max:255',
                    'published_at' => 'nullable|date',
                ];
            } // end of actionName check


        } // end of method check
    }

}
