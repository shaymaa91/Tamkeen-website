<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $rules = [];
        if($this->isMethod('post')){

            $rules = [
                'fname' => 'required|max:50|min:3',
                'lname' => 'required|max:50|min:3',
                'email'=>'required|email|max:50',
                'phone'=>'required|max:50',
                'gender'=>'required|max:1',
                'department_id'=>'required',
                'city_id'=>'required',
                'file'=>'required|image'
            ];
        }

        if($this->isMethod('put')){

            $rules = [
                'fname' => 'required|max:50|min:3',
                'lname' => 'required|max:50|min:3',
                'email'=>'required|email|max:50',
                'phone'=>'required|max:50',
                'gender'=>'required|max:1',
                'department_id'=>'required',
                'city_id'=>'required'
                
            ];
        }
        

        return $rules;
    }

}
