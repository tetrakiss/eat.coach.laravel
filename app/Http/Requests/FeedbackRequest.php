<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidRecaptcha;

class FeedbackRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email'=>'required_without:phone',
            'phone'=>'required_without:email',
            'g-recaptcha-response' => ['required', new ValidRecaptcha]
        ];
    }

    public function messages()
    {
        return [

            'phone.required_without' => 'Если Вы не укзали email то укажите телефон для связи',
            'name.required' => 'Вы не  указали как Вас зовут!',
            'g-recaptcha-response.required' => 'Мы должны удостоверится что вы не робот!'
        ];
    }
}
