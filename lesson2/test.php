<?php

even(152);
even(15);

echo PHP_EOL;

rooks_move("a1", "a8");
rooks_move("c3", "f3");
rooks_move("h4", "g5");
rooks_move("g3", "e1");

echo PHP_EOL;

kings_move("52", "53");
kings_move("34", "54");
kings_move("43", "64");
kings_move("11", "22");

echo PHP_EOL;

guest(true);
guest(false);

echo PHP_EOL;

module(-52);
module(322);
module(0);

echo PHP_EOL;

who_is_bigger(24, 532);
who_is_bigger(156, -25);

echo PHP_EOL;

black_and_white(2, 5);
black_and_white(6, 8);
black_and_white(4, 7);
black_and_white(3, 7);

echo PHP_EOL;

all_even(1, 2, 3);
all_even(2, 4, 6);

echo PHP_EOL;

any_even(1, 2, 3);
any_even(2, 4, 6);
any_even(3, 7, 5);

echo PHP_EOL;

weekend(4);
weekend(6);

echo PHP_EOL;

triangle(3, 6, 2);
triangle(5, 8, 4);

echo PHP_EOL;

leap_year(2005);
leap_year(2020);
leap_year(2132);
leap_year(2231);

echo PHP_EOL;

sign(52);
sign(-123);
sign(-0);

echo PHP_EOL;

long_straw(124, 467, 543);

echo PHP_EOL;

its_cold_today(-25);
its_cold_today(12);
its_cold_today(40);

echo PHP_EOL;

planner([13, 24, 14], [15, 46, 0], [14, 15, 30], [16, 20, 0]);
planner([9, 20, 0], [9, 20, 45], [9, 21, 20], [9, 22, 45]);
planner([15, 36, 0], [16, 20, 15], [16, 20, 30], [17, 30, 0]);
planner([18, 14, 5], [19, 51, 0], [15, 50, 0], [18, 14, 30]);
planner([20, 15, 20], [21, 30, 0], [20, 15, 20], [21, 30, 0]);

echo PHP_EOL;

chocolate(4, 7, 12);
chocolate(5, 10, 17);

echo PHP_EOL;

weekend_2(3, 6);
weekend_2(0, 14);

echo PHP_EOL;

what_time_is_it(1);
what_time_is_it(12);
what_time_is_it(122);
what_time_is_it(21);
what_time_is_it(40);