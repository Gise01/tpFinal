<?php

abstract class Validador{

    protected $errors = [];

    public abstract function validate();
    public abstract function getErrors();
    public abstract function getError($campo); 
    public abstract function estaValidado();

}