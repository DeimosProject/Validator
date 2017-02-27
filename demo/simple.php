<?php

include_once dirname(__DIR__) . '/vendor/autoload.php';

$validator = new \Deimos\Validator\Validator();

$validator->field('login')
    ->alphaDigits() // [A-Za-z0-9А-Яа-я]
    ->minLength(3, 'Min length equal 3 symbols')
    ->maxLength(16, 'Max length equal 16 symbols');

$validator->field('password')
    ->anyWord() // [A-Za-z0-9А-Яа-я_]
    ->minLength(6, 'Min length equal 6 symbols')
    ->maxLength(32, 'Max length equal 32 symbols');

$validator->field('rememberMe')->typeBool();

var_dump(['validate' => $validator->validate($_POST)]);

foreach ($validator as $field)
{
    if ($field->error())
    {
        var_dump($field);
    }
    else
    {
        var_dump([$field->name() => $field->get()]);
    }
}
