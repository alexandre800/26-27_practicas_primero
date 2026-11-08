<?php

/**
 * Clase normal con el siguiente comportamiento
 * Si la propiedad empieza por m o M la doy por buena
 * las propiedades sobrecargadas las voy a poner a valor 234
 */
class ClaseSobrecarga
{

    public int $numero = 10;

    //métodos mágicos para control de la sobrecarga
    public function __set(string $name, mixed $value): void
    {
        if (mb_substr(mb_strtoupper($name), 0, 1) !== "M")
            throw new \Exception("La propiedad " . $name . "no existe");
    }

    public function __get(string $name): mixed
    {
        if (mb_substr(mb_strtoupper($name), 0, 1) !== "M")
            throw new \Exception("La propiedad " . $name . "no existe");

        return 234;
    }

    public function __isset(string $name): bool
    {
        return (mb_substr(mb_strtoupper($name), 0, 1) === "M");
    }

    public function __unset(string $name): void {}
}
