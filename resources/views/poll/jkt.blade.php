@extends('layouts.eat_front')
@section('custom_head_scr')
<script src="https://unpkg.com/imask"></script>
@endsection
@section('seo_tags')
{!! SEOMeta::generate() !!}
{!! OpenGraph::generate() !!}
@endsection
@section('content')
<div  uk-grid >

    <div class="text-common uk-align-center uk-width-xlarge">
      @if (count($errors) > 0)

    @foreach ($errors->all() as $error)
      <div class="uk-alert-danger" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <p>{{ $error }}</p>
      </div>
    @endforeach
          @endif
      <div class="uk-margin">
          <div class="uk-form-label"><h2>Расчет индекса тяжести симптомов ЖКТ</h2></div>
      </div>

{!! Form::open(['route'=>['poll.jkt.store'], 'class' => 'uk-form-stacked', 'id' =>'jkt' ]) !!}



    <div class="uk-margin">
        <div class="uk-form-label"><h1>Запор</h1></div>
        <div class="uk-form-controls">
            <label><input class="uk-radio" type="radio" name="zapor" value="0" {{(old('zapor') == '0') ? 'checked' : ''}}> 5 или более раз стул в неделю</label><br>
            <label><input class="uk-radio" type="radio" name="zapor" value="1" {{(old('zapor') == '1') ? 'checked' : ''}}> 3-4 стула в неделю</label><br>
            <label><input class="uk-radio" type="radio" name="zapor" value="2" {{(old('zapor') == '2') ? 'checked' : ''}}> 0-2 стула в неделю</label><br>
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-form-label"><h1>Диарея</h1></div>
        <div class="uk-form-controls">
            <label><input class="uk-radio" type="radio" name="diarea" value="0" {{(old('diarea') == '0') ? 'checked' : ''}}> 0-1 жидкий стул в день</label><br>
            <label><input class="uk-radio" type="radio" name="diarea" value="1" {{(old('diarea') == '1') ? 'checked' : ''}}> 2-3 жидких стула в день</label><br>
            <label><input class="uk-radio" type="radio" name="diarea" value="2" {{(old('diarea') == '2') ? 'checked' : ''}}> 4 и более жидкий стула в день</label><br>
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-form-label"><h1>Консистенция стула (в среднем)</h1></div>
        <div class="uk-form-controls">
            <label><input class="uk-radio" type="radio" name="konsisten" value="0" {{(old('konsisten') == '0') ? 'checked' : ''}}> Сформированная</label><br>
            <label><input class="uk-radio" type="radio" name="konsisten" value="1" {{(old('konsisten') == '1') ? 'checked' : ''}}> Жидкая/несформированная 3 или более дня в неделю</label><br>
            <label><input class="uk-radio" type="radio" name="konsisten" value="2" {{(old('konsisten') == '2') ? 'checked' : ''}}> Водянистая 3 или более дня в неделю</label><br>
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-form-label"><h1>Запах стула</h1></div>
        <div class="uk-form-controls">
            <label><input class="uk-radio" type="radio" name="zapah" value="0" {{(old('zapah') == '0') ? 'checked' : ''}}> Нормальный</label><br>
            <label><input class="uk-radio" type="radio" name="zapah" value="1" {{(old('zapah') == '1') ? 'checked' : ''}}> Резкий 3 или более дней в неделю</label><br>
            <label><input class="uk-radio" type="radio" name="zapah" value="2" {{(old('zapah') == '2') ? 'checked' : ''}}> Необычайно отвратительный 3 или более раз в неделю</label><br>
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-form-label"><h1>Метеоризм</h1></div>
        <div class="uk-form-controls">
            <label><input class="uk-radio" type="radio" name="meteor" value="0" {{(old('meteor') == '0') ? 'checked' : ''}}> Не наблюдается</label><br>
            <label><input class="uk-radio" type="radio" name="meteor" value="1" {{(old('meteor') == '1') ? 'checked' : ''}}> Часто, 3 или более дней в неделю</label><br>
            <label><input class="uk-radio" type="radio" name="meteor" value="2" {{(old('meteor') == '2') ? 'checked' : ''}}> Ежедневно</label><br>
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-form-label"><h1>Боль в животе</h1></div>
        <div class="uk-form-controls">
            <label><input class="uk-radio" type="radio" name="bol" value="0" {{(old('bol') == '0') ? 'checked' : ''}}> Не наблюдается</label><br>
            <label><input class="uk-radio" type="radio" name="bol" value="1" {{(old('bol') == '1') ? 'checked' : ''}}> Легкий дискомфорт 3 и более раз в неделю</label><br>
            <label><input class="uk-radio" type="radio" name="bol" value="2" {{(old('bol') == '2') ? 'checked' : ''}}> От умеренного до сильного дискомфорта 3 или более дней в неделю</label><br>
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-form-label"><h1>Необъяснимая ежедневная раздражительность</h1></div>
        <div class="uk-form-controls">
            <label><input class="uk-radio" type="radio" name="rage" value="0" {{(old('rage') == '0') ? 'checked' : ''}}> Не наблюдается</label><br>
            <label><input class="uk-radio" type="radio" name="rage" value="1" {{(old('rage') == '1') ? 'checked' : ''}}> 1-2 раза в неделю</label><br>
            <label><input class="uk-radio" type="radio" name="rage" value="2" {{(old('rage') == '2') ? 'checked' : ''}}> 3 или более раз в неделю</label><br>
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-form-label"><h1>Живот чувствительный во время осмотра педиатра/специалиста</h1></div>
        <div class="uk-form-controls">
            <label><input class="uk-radio" type="radio" name="feel" value="0" {{(old('feel') == '0') ? 'checked' : ''}}> Нет</label><br>
            <label><input class="uk-radio" type="radio" name="feel" value="1" {{(old('feel') == '1') ? 'checked' : ''}}> Да</label><br>
            <label><input class="uk-radio" type="radio" name="feel" value="0" {{(old('feel') == '2') ? 'checked' : ''}}> Не обращались к педиатру с этим вопросом, а сами посмотреть не решаемся</label><br>
        </div>
    </div>

    <div class="uk-margin">
        <div class="uk-form-label"><h2 class="red" id="sum">Ваш Индекс тяжести симптомов ЖКТ 0</h2></div>
        <h4 id="additionalText">Заполните опросник чтобы узнать Ваш индекс</h4>
    </div>
    <input type="hidden" name="total" value="{{ old('total') }}" >
<div id="ShowButton">

    <div class="uk-margin">
        <input class="uk-input" type="text" name="first_name" value="{{ old('first_name') }}" placeholder="Как Вас зовут?">
    </div>
    <div class="uk-margin">
        <input class="uk-input" type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Ваша фамилия">
    </div>
    <div class="uk-margin">
        <input class="uk-input" type="email" name="email" value="{{ old('email') }}" placeholder="Email">
    </div>
    <div class="uk-margin">
        <input class="uk-input" id="phone-mask" type="text" name="phone" value="{{ old('phone') }}" placeholder="Телефон">
    </div>
    <div class="uk-margin">
    <button type="submit" class="uk-button uk-button-default">Записаться</button>
    </div>
</div>
</form>



    </div>
</div>
@endsection

@section('custom_scr')
<script>
$('#ShowButton').hide();
function calculate () {
  var total = 0;
  $("input[type=radio]:checked").each(function() {
      total += parseFloat($(this).val());
  });
  var additionalText = "";
  $("[name='total']").val(total);
if(total >=7) {
additionalText = "Вам следует срочно записаться на консультацию!";
$('#ShowButton').show( "slow" );
}
if(total >=4 && total < 7) {
additionalText = "Вам рекомендуется  записаться на консультацию!";
$('#ShowButton').show( "slow" );
}
if (total> 0 && total < 4) {
additionalText = "Странно что у вас проблемы, запишемся на консультацию?";

$('#ShowButton').show( "slow" );
}
$('#sum').text("Ваш Индекс тяжести симптомов ЖКТ " + total);
$('#additionalText').text(additionalText);
}
var phoneMask = new IMask(
  document.getElementById('phone-mask'), {
    mask: '+{7}(000)000-00-00'
  });


$("input[type=radio]").click(function() {
  calculate();
  //  $("input[name=sum]").val(total);
});
$(document).ready(function(){
  calculate();
  console.log('Ready');
});


</script>

@endsection
