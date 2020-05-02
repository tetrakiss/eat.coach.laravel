@extends('layouts.eat_front')

@section('content')
<div  uk-grid >

    <div class="text-common uk-align-center uk-width-xxlarge">


<h2>Меня зовут Тогулева Валентина.</h2>


<p>Я мама двух прекрасных детей. Моему сыну Льву сейчас <?=floor((time() - strtotime('2013-04-8')) / 31556926);?> лет, а моей дочери Варваре сейчас <?=floor((time() - strtotime('2014-10-9')) / 31556926);?> лет. Мы живем также, как и большинство семей с маленькими детьми – дети ходят в детский сад, посещают занятия и секции вне сада, а также получают развлечения и подарки в соответствие со своими текущими интересами. На сегодняшний день я считаю, что у нас очень хорошая жизнь и прекрасные дети, но когда-то даже такой уровень жизни казался нам недоступным.</p>
<p>В 2015 году моему сыну был поставлен диагноз расстройства аутистического спектра. Он не говорил, ел 4 продукта питания, был склонен к истерикам, самоагрессии. Нам было непросто. В центрах, которые мы посещали для получения помощи не могли найти к нему подход, с питанием вопрос не решался, к проблемам пищевого поведения добавились рвоты и запоры, которые усиливали проявления нежелательного поведения.</p>
<p>Прошло 6 месяцев с того момента, как мы впервые услышали диагноз нашего сына, а мы не приблизились ни на шаг к тому, чтобы организовать эффективную систему помощи для ребенка.</p>
<p>Мы приняли совместное решение с супругом, что разбираться с проблемой питания, обучения и социализации ребенка придется самим и в 2015 году я поступила в МГППУ.</p>
<p>В октябре 2015 года я начала работу над диссертацией «Коррекция пищевого поведения у детей с РАС», за что я очень признательна моему научному педагогу и моему декану, а также руководству факультета. По признанию старших и более опытных коллег эта тема в России не разрабатывалась, информации было крайне мало и был огромный риск разрешить такую тему для работы. Но риск был оправдан.  В результате этой работы мне удалось помочь своему ребенку справиться с патологическим пищевым поведением, успешно помочь родителям, которые принимали участие в научном исследовании и получили консультации по изменению пищевого поведения ребенка. Мне понадобилось 12 месяцев интенсивного вмешательства для сына, использования разработанного мною подхода, подбора добавок, витаминов, микроэлементов, которые бы действительно работали. Я прочла более 500 научных статей на английском языке и узнала, как работают с проблемами пищевого поведения в США, Европе, Канаде, Скандинавских странах, Польше, Турции, Китае, Японии, Индии, ОАЭ. Я изучала опыт российских коллег и коллег из стран ближайшего зарубежья. Я писала бесконечные письма: «Привет, у моего сына РАС, избирательное пищевое поведение, а еще я пишу диссертацию на эту тему. Можете ли Вы сказать почему Вы использовали именно такое сочетание пробиотиков? И на какой неделе был эффект?»
<p>Я писала: «Добрый день, ваш поведенческий подход и разработанные методы коррекции пищевого поведения заслуживают доверия и внимания, а как Вы мотивировали родителей продолжать работу после окончания исследования?»</p>
<p>Сейчас, имея за плечами этот колоссальный опыт личной коррекции и коррекции в качестве food therapist, консультанта, психолога, дефектолога и коуча родителей детей с РАС, ОВЗ, другими видами инвалидности и родителей нейротипичных детей, я могу отметить, что значительного изменения в состоянии ребенка мы добиваемся за 2-3 месяца. У меня появились совершенно потрясающие истории успеха, когда дети начинали есть через 2-4 недели после начала вмешательства и значительно расширяли рацион.</p>
<p>Появилось понимание того, что после решения пищевого вопроса у ребенка улучшается социальное поведение, решаются проблемы со сном, уменьшается стереотипное поведение, снижается склонность к истерикам, агрессии, раздражительности и ночным пробуждениям.</p>
<p>«Мои» родители часто отмечают, что имея поддержку изменений (система в которой я работаю с родителями по решению и коррекции пищевой избирательности и проблем с кормлениями) решать такие сложные вопросы намного легче.</p>
<p>Давайте вместе поможем вашему ребенку лучше есть. Ведь имея план, чувствуя поддержку и видя результаты, справляться с вопросами пищевого поведения ребенка можно намного эффективнее.</p>

<p>У Вас остались вопросы? Пишите мне любым удобным для Вас способом указанным ниже</p>
<div style="display: flex;align-items: center;justify-content: center;">
<a class="contact-icon" target="_blank" href="https://www.instagram.com/eat.coach/"><i class="fab fa-instagram"></i></a>
<a class="contact-icon" target="_blank" href="https://www.facebook.com/eat.coach/"><i class="fab fa-facebook"></i></a>
<a class="contact-icon" href="mailto:v.toguleva@gmail.com"><i class="far fa-envelope"></i></a>
<a class="contact-icon" href=" https://wa.me/79150097081"><i class="fab fa-whatsapp"></i></a>
<a class="contact-icon" href="tel:+79150097081"><i class="fas fa-phone"></i></a>
</div>
<p>Либо просто заполните <a href="{{ url('contacts') }}">форму обратной связи</a> и я свяжусь с Вами сама.</p>
<p>Буду рада новым знакомствам!</p>

</div>
</div>
@endsection
