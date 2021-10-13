<?php 

/**
 * Задания 5-7.
 * В поисках объяснения наткнулся на статью habr с этими примерами: https://habr.com/ru/post/259627/
 * Было бы не честно просто скопировать трактовки примеров. 
 * Я несовсем разобрался с темой, буду смотреть обзоры ДЗ, чтобы получше понять тему..
*/

// Задание 5
class A 
{
    public function foo(){
        static $x = 0;
        echo ++$x .'<br>';
    }
}

$a1 = new A();
$a2 = new A();

$a1->foo(); // 1
$a2->foo(); // 2
$a1->foo(); // 3
$a2->foo(); // 4

// Задание 6

class A 
{
    public function foo(){
        static $x = 0;
        echo ++$x .'<br>';
    }
}
class B extends A 
{

}

$a1 = new A();
$b1 = new B();

$a1->foo(); // 1
$b1->foo(); // 1
$a1->foo(); // 2
$b1->foo(); // 2

// Задание 7

class A 
{
    public function foo(){
        static $x = 0;
        echo ++$x . '<br>';
    }
}
class B extends A 
{

}

$a1 = new A;
$b1 = new B;

$a1->foo(); // 1
$b1->foo(); // 1
$a1->foo(); // 2
$b1->foo(); // 2