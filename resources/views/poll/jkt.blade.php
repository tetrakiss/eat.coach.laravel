@extends('layouts.eat_front')

@section('content')
<div  uk-grid >

    <div class="text-common uk-align-center uk-width-xlarge">
      <div class="uk-margin">
          <div class="uk-form-label"><h2>Расчет индекса тяжести симптомов ЖКТ</h2></div>
      </div>
      <form id="jkt" class="uk-form-stacked">




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
    <div class="uk-margin">
        <div class="uk-form-label"><h1>Запах стула</h1></div>
        <div class="uk-form-controls">
            <label><input class="uk-radio" type="radio" name="zapah" value="0"> Нормальный</label><br>
            <label><input class="uk-radio" type="radio" name="zapah" value="1"> Резкий 3 или более дней в неделю</label><br>
            <label><input class="uk-radio" type="radio" name="zapah" value="2"> Необычайно отвратительный 3 или более раз в неделю</label><br>
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-form-label"><h1>Метеоризм</h1></div>
        <div class="uk-form-controls">
            <label><input class="uk-radio" type="radio" name="meteor" value="0"> Не наблюдается</label><br>
            <label><input class="uk-radio" type="radio" name="meteor" value="1"> Часто, 3 или более дней в неделю</label><br>
            <label><input class="uk-radio" type="radio" name="meteor" value="2"> Ежедневно</label><br>
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-form-label"><h1>Боль в животе</h1></div>
        <div class="uk-form-controls">
            <label><input class="uk-radio" type="radio" name="bol" value="0"> Не наблюдается</label><br>
            <label><input class="uk-radio" type="radio" name="bol" value="1"> Легкий дискомфорт 3 и более раз в неделю</label><br>
            <label><input class="uk-radio" type="radio" name="bol" value="2"> От умеренного до сильного дискомфорта 3 или более дней в неделю</label><br>
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-form-label"><h1>Необъяснимая ежедневная раздражительность</h1></div>
        <div class="uk-form-controls">
            <label><input class="uk-radio" type="radio" name="rage" value="0"> Не наблюдается</label><br>
            <label><input class="uk-radio" type="radio" name="rage" value="1"> 1-2 раза в неделю</label><br>
            <label><input class="uk-radio" type="radio" name="rage" value="2"> 3 или более раз в неделю</label><br>
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-form-label"><h1>Живот чувствительный во время осмотра педиатра/специалиста</h1></div>
        <div class="uk-form-controls">
            <label><input class="uk-radio" type="radio" name="feel" value="0"> Нет</label><br>
            <label><input class="uk-radio" type="radio" name="feel" value="1"> Да</label><br>
            <label><input class="uk-radio" type="radio" name="feel" value="0"> Не обращались к педиатру с этим вопросом, а сами посмотреть не решаемся</label><br>
        </div>
    </div>



</form>

<div class="uk-margin">
    <div class="uk-form-label"><h2 class="red" id="sum">Ваш Индекс тяжести симптомов ЖКТ 0</h2></div>
    <h4 id="additionalText">Заполните опросник чтобы узнать Ваш индекс</h4>
</div>

    </div>
</div>
@endsection

@section('custom_scr')
<script>



$("input[type=radio]").click(function() {
    var total = 0;
    $("input[type=radio]:checked").each(function() {
        total += parseFloat($(this).val());
    });
    var additionalText = "";
if(total >=7) {
  additionalText = "Вам следует срочно записаться на консультацию!";
}
if(total >=4 && total < 7) {
  additionalText = "Вам рекомендуется  записаться на консультацию!";
}
if (total> 0 && total < 4) {
  additionalText = "Странно что у вас проблемы, запишемся на консультацию?";
}
$('#sum').text("Ваш Индекс тяжести симптомов ЖКТ " + total);
$('#additionalText').text(additionalText);
  //  $("input[name=sum]").val(total);
});


</script>

@endsection
