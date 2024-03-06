<?php

swapTwoValues(123, 321);
echo PHP_EOL;

sumOfValues(1, 2, 3, 4, 5);
echo PHP_EOL;

averageValue(1, 2, 3, 4, 5);
echo PHP_EOL;

sumOfIntegers(5, 3);
echo PHP_EOL;
sumOfIntegers(5.24, 3.352);
echo PHP_EOL;

medianOfValues(34, 53, 2, 6, 732);
echo PHP_EOL . PHP_EOL;

countOfCalls();
countOfCalls();
countOfCalls();
countOfCalls();
echo PHP_EOL;

sumOfCalls(1);
sumOfCalls(3);
sumOfCalls(5);
echo PHP_EOL;

averageOfCalls(1);
averageOfCalls(3);
averageOfCalls(5);
echo PHP_EOL;

sortValues(34, 53, 2, 1245, 6, 732, 234, 532);
echo PHP_EOL;

echo factorial(5);
echo PHP_EOL . PHP_EOL;
echo factorial(7);
echo PHP_EOL . PHP_EOL;

primeNumber(4);
echo PHP_EOL;

echo maxTwo(234, 457);
echo PHP_EOL;
echo maxTwo(568, 346);
echo PHP_EOL . PHP_EOL;

maxThree(865, 32, 555);
echo PHP_EOL . PHP_EOL;
maxThree(756, 838, 762);
echo PHP_EOL . PHP_EOL;
maxThree(234, 457, 537);
echo PHP_EOL . PHP_EOL;

arrMax([1, 35, 75, 324, 85]);
echo PHP_EOL;
arrMax([237, 2367, 2344, 23567]);
echo PHP_EOL . PHP_EOL;

afterMax([237, 2367, 2344, 23234]);
echo PHP_EOL . PHP_EOL;

$reputation = [
    "Вася" => 37,
    "Даша" => 56,
    "Гена" => 104,
    "Геша" => -25,
    "Коля" => -1,
    "Федя" => 0,
    "Леша" => 123,
    "Данила" => 60,
    "Гоша" => 0,
    "Андрей" => 99,
];
arrayFlip($reputation);