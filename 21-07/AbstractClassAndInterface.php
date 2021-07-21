<?php

/*
 * Интерфейс - это шаблон для определения функциональности.
 * У интерфейса нет свойств, все методы только public и не имеют реализации.
 * У класса можен быть сколько угодно интерфейсов и только один наследуемый класс.
 * Все методы интерфейса должны быть реализованы в наследуемом классе (иначе класс должен быть объявлен как абстрактный).
 * В абстрактном класса обязательно должны быть реализованы только абстрактные методы.
 *
 *
 * Пример Интерфейса
 * */

interface Car
{
    public function speed();

    public function color();
}

interface Speed
{
    public function maxSpeed();

    public function scale();
}

class Nissan implements Car, Speed
{

    public function speed()
    {
        // TODO: Implement speed() method.
    }

    public function color()
    {
        // TODO: Implement color() method.
    }

    public function maxSpeed()
    {
        // TODO: Implement maxSpeed() method.
    }

    public function scale()
    {
        // TODO: Implement scale() method.
    }
}

/*
 *
 * Пример абстрактного класса
 * */

abstract class Store
{
    protected $products = array();

    public function addProduct($product)
    {
        $this->products[] = $product;
    }

    abstract public function StoreAddress();
}

class  SomeStore extends Store
{

    public function StoreAddress()
    {
        // TODO: Implement StoreAddress() method.
    }
}