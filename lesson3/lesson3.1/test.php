<?php

$tpl = <<<TPL
Lorem ipsum, dolor sit amet consectetur adipisicing elit.
TPL;

$line = <<<LINE
<p>Lorem ipsum, dolor</p>
LINE;


article(123);

echo PHP_EOL . PHP_EOL;

hours(20490);

echo PHP_EOL . PHP_EOL;

fio("Иванов", "Сергей", "Александрович");

echo PHP_EOL . PHP_EOL;

short_password("qwertyuio");
short_password("йцукенгшщ");
short_password("qwertyu");
short_password("йцукенг");

echo PHP_EOL . PHP_EOL;

space("qwer yu io");
space("qwerwyuio");

echo PHP_EOL . PHP_EOL;

evenly("qwertyuio", "йцукенгшщ");
evenly("йцукенгшщ", "йцукенг");

echo PHP_EOL . PHP_EOL;

details($tpl);

echo PHP_EOL . PHP_EOL;

shortly("Обороноспособность");
shortly("Слово");

echo PHP_EOL . PHP_EOL;

cows("мимимамому мимимамому");

echo PHP_EOL . PHP_EOL;

caps_lock("QWERTY123");
caps_lock("qwerty123");

echo PHP_EOL . PHP_EOL;

register_independent_cows("миМимаМому МимиМамоМу");

echo PHP_EOL . PHP_EOL;

italic("синий трактор едет к нам ТрАкТоР");
italic("синий ТрАкТоР едет к нам ТРАКТОР");
italic("синий ТРАКТОР едет к нам трактор");

echo PHP_EOL . PHP_EOL;

tag($line);

echo PHP_EOL . PHP_EOL;

no_comments("Lorem ipsum, /*dolor sit amet consectetur*/ adipisicing elit.");

echo PHP_EOL . PHP_EOL;

search("Lorem ipsum dolor sit amet. Consectetur adipisicing elit. In molestias eius unde saepe labore. Aboba hoba.");

echo PHP_EOL . PHP_EOL;

mvc("Cart");

echo PHP_EOL . PHP_EOL;