<?php

spl_autoload_register();

$contact = new Contact();
$newContact = $contact->phone('000-555-000')
    ->name("John")
    ->surname("Surname")
    ->email("john@email.com")
    ->address("Some address")
    ->build();

$contactDirector = new ContactDirector($contact);

$testContact = $contactDirector->testContact();
$anotherContact = $contactDirector->newContact()->email('q@qq.qqq')->build();

echo '<pre>';

print_r($newContact);
print_r($testContact);
print_r($anotherContact);

echo '</pre>';
