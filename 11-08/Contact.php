<?php


class Contact implements IContactBuilder
{

    private $contact;

    public function __construct()
    {
        $this->reset();
    }

    public function reset(): IContactBuilder
    {
        $this->contact = new ContactBuilder();

        return $this;
    }

    public function phone($value): IContactBuilder
    {
        $this->contact->phone = $value;

        return $this;
    }

    public function name($value): IContactBuilder
    {
        $this->contact->name = $value;

        return $this;
    }

    public function surname($value): IContactBuilder
    {
        $this->contact->surname = $value;

        return $this;
    }

    public function email($value): IContactBuilder
    {
        $this->contact->email = $value;

        return $this;
    }

    public function address($value): IContactBuilder
    {
        $this->contact->address = $value;

        return $this;
    }

    public function build(): ContactBuilder
    {
        $build = $this->contact;
        $this->reset();

        return $build;
    }
}