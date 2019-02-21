<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsultationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
  

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'first_name' => 'required',
          'last_name' => 'required',
          'phone' => 'required',
          'email'=>'required|email',
          'agree' => 'required'
        ];
    }
    public function messages()
    {
        return [

            'last_name.required' => 'Вы не  указали Вашу фамилию!',
            'first_name.required' => 'Вы не указали как Вас зовут!',
            'email.required' => 'Вы не указали Ваш email!',
            'phone.required' => 'Вы не указали Ваш телефон!',
            'agree.required' => 'Вы не согласились с условиями оферты!',
        ];
    }
}
