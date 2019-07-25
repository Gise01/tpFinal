<?php

interface StorageInterface{

    public function getSource();

    public function insertar(array $dato);

    public function getId();
}