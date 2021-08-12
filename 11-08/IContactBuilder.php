<?php

interface IContactBuilder
{
    public function reset(): IContactBuilder;

    public function build(): ContactBuilder;

    public function name($value): IContactBuilder;

    public function surname($value): IContactBuilder;

    public function phone($value): IContactBuilder;

    public function email($value): IContactBuilder;

    public function address($value): IContactBuilder;

}