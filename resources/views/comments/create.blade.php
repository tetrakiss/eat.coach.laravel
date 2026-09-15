
@extends('layouts.eat')

@section('content')

{!! Form::open(['route'=>['customers.comments.store', $customer->id]]) !!}


        <input  type="hidden" name="customer_id" value="{{$customer->id}}">

        <div class="uk-margin">
            <select name="channel_type" class="uk-select">
                <option selected value="CRM">CRM</option>
                <option value="phone">Телефон</option>
                <option value="skype">Skype</option>
                <option value="viber">Viber</option>
                <option value="whatsapp">WhatsApp</option>
                <option value="facebook">Facebook</option>
                <option value="vk">VK</option>
            </select>
        </div>
        <div class="uk-margin">
            <textarea class="uk-textarea" name="comment" rows="5" placeholder="Комментарий"></textarea>
        </div>


          <div class="uk-margin">
        <button type="submit" class="uk-button uk-button-default">Добавить</button>
        </div>
{!! Form::close() !!}
@endsection
