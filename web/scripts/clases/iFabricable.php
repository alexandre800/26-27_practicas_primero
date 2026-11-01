<?php
/**
 * Interfaz que obliga a implementar los métodos necesarios para describir
 * cómo se fabrica y cómo se recicla un objeto.
 */
interface iFabricable
{

    public function metodoFabricacion(): string;
    public function metodoReciclado(): string;

}