@extends('layouts.eat_front')

@section('content')
<div  uk-grid >

    <div class="text-common uk-align-center uk-width-xlarge">

      <form class="uk-form-stacked">



    <div class="uk-margin">
        <label class="uk-form-label" for="zapor">Запор</label>
        <div class="uk-form-controls">
            <select class="uk-select" id="zapor">
                <option value="0">5 или более раз стул в неделю</option>
                <option value="1">3-4 стула в неделю</option>
                <option value="2">0-2 стула в неделю</option>
            </select>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="diarea">Диарея</label>
        <div class="uk-form-controls">
            <select class="uk-select" id="diarea">
                <option value="0">0-1 жидкий стул в день</option>
                <option value="1">2-3 жидких стула в день</option>
                <option value="2">4 и более жидкий стула в день</option>
            </select>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="konsisten">Консистенция стула (в среднем)</label>
        <div class="uk-form-controls">
            <select class="uk-select" id="konsisten">
                <option value="0">Сформированная</option>
                <option value="1">Жидкая/несформированная 3 или более дня в неделю</option>
                <option value="2">Водянистая 3 или более дня в неделю</option>
            </select>
        </div>
    </div>

    <div class="uk-margin">
        <div class="uk-form-label"><h1>Запор</h1></div>
        <div class="uk-form-controls">
            <label><input class="uk-radio" type="radio" name="zapor" value="0"> 5 или более раз стул в неделю</label><br>
            <label><input class="uk-radio" type="radio" name="zapor" value="1"> 3-4 стула в неделю</label><br>
            <label><input class="uk-radio" type="radio" name="zapor" value="2"> 0-2 стула в неделю</label><br>
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-form-label"><h1>Диарея</h1></div>
        <div class="uk-form-controls">
            <label><input class="uk-radio" type="radio" name="diarea" value="0"> 0-1 жидкий стул в день</label><br>
            <label><input class="uk-radio" type="radio" name="diarea" value="1"> 2-3 жидких стула в день</label><br>
            <label><input class="uk-radio" type="radio" name="diarea" value="2"> 4 и более жидкий стула в день</label><br>
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-form-label"><h1>Консистенция стула (в среднем)</h1></div>
        <div class="uk-form-controls">
            <label><input class="uk-radio" type="radio" name="konsisten" value="0"> Сформированная</label><br>
            <label><input class="uk-radio" type="radio" name="konsisten" value="1"> Жидкая/несформированная 3 или более дня в неделю</label><br>
            <label><input class="uk-radio" type="radio" name="konsisten" value="2"> Водянистая 3 или более дня в неделю</label><br>
        </div>
    </div>



</form>

    </div>
</div>
@endsection
