<?php


class ContactDirector
{

    private $builder;

    public function __construct(IContactBuilder $contactBuilder)
    {
        $this->builder = $contactBuilder;
    }

    public function newContact(): IContactBuilder
    {
        return $this->builder->reset();
    }

    public function testContact(): ContactBuilder
    {
        return $this->builder->phone('8888888888')
            ->name('TestNameNoLastName')
            ->address('TestAdressNoEmail')
            ->build();
    }
}