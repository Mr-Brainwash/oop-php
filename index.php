<?php

/**
 * Задания 1 - 4.
 * Предположим, у нас есть сайт по поиску попутчиков
 * Создадим класс User для пассажира у которого есть свойства:
 * (Имя,Номер телефона,Дата поездки,Откуда едет,Куда едет и количество мест)
 */

class User
{
    public $name;
    public $phone;
    public $date;
    public $fromWhere;
    public $toWhere;
    public $seats;

    public function __construct($name, $phone, $date, $fromWhere, $toWhere, $seats)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->date = $date;
        $this->fromWhere = $fromWhere;
        $this->toWhere = $toWhere;
        $this->seats = $seats;
    }

    public function printPost()
    {
        echo "<p> Имя:{$this->name}. Телефон:$this->phone. Маршрут:{$this->fromWhere} - {$this->toWhere}. Количество мест:{$this->seats}. Дата и время поездки:{$this->date}. </p>";
    }
}

//Создадим объект класса и выведем сообщение
$passenger = new User('Анна', '+7(000)000-00-00', '13.10.2021 10:00', 'Уфа', 'Екатеринбург', 1);
$passenger->printPost();
// Выводит: Имя:Анна. Телефон:+7(000)000-00-00. Маршрут:Уфа - Екатеринбург. Количество мест:1. Дата и время поездки:13.10.2021 10:00.

/**
 * Создадим класс Driver (унаследовав от класса User) для водителей, у которого будут дополнительные свойства:
 * (Марка машины и Водительский стаж)
 */

class Driver extends User
{
    public $carBrand;
    public $drivingExperience;

    public function __construct($name, $phone, $date, $fromWhere, $toWhere, $seats, $carBrand ,$drivingExperience)
    {
        parent::__construct($name, $phone, $date, $fromWhere, $toWhere, $seats);
        $this->carBrand = $carBrand;
        $this->drivingExperience = $drivingExperience;
    }

    public function printPost()
    {
        echo "<p> Имя:{$this->name}. Телефон:{$this->phone}. Маршрут:{$this->fromWhere} - {$this->toWhere}. Количество мест:{$this->seats}. 
                  Дата и время поездки:{$this->date}. Марка машины:{$this->carBrand}. Стаж вождения:{$this->drivingExperience}.</p>";
    }
}

$driver = new Driver('Рома', '+7(000)000-00-00', '13.10.2021 10:00', 'Самара', 'Тольятти', 4, 'LADA Vesta',6);
$driver->printPost();
// Выводит: Имя:Рома. Телефон:+7(000)000-00-00. Маршрут:Самара - Тольятти. Количество мест:4. Дата и время поездки:13.10.2021 10:00. Марка машины:LADA Vesta. Стаж вождения:6.

