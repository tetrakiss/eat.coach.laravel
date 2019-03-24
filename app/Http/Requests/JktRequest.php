<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JktRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    /*public function authorize()
    {
        return false;
    }*/

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
          'email'=>'required',
          'phone'=>'required',
          'zapor'=>'required',
          'diarea'=>'required',
          'konsisten'=>'required',
          'zapah'=>'required',
          'meteor'=>'required',
          'bol'=>'required',
          'rage'=>'required',
          'feel'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Вы не укзали email для связи',
            'phone.required' => 'Вы не укзали телефон для связи',
            'first_name.required' => 'Вы не  указали как Вас зовут!',
            'last_name.required' => 'Вы не  указали как Вашу фамилию!',
            'zapor.required' => 'Вы не ответили на вопрос про запор',
            'diarea.required' => 'Вы не ответили на вопрос про диарею',
            'konsisten.required' => 'Вы не ответили на вопрос про консистенцию стула',
            'zapah.required' => 'Вы не ответили на вопрос про запах стула',
            'meteor.required' => 'Вы не ответили на вопрос про Метеоризм',
            'bol.required' => 'Вы не ответили на вопрос про боли в животе',
            'rage.required' => 'Вы не ответили на вопрос про раздражительность',
            'feel.required' => 'Вы не ответили на вопрос про чувствительность живота',


        ];
    }
}
