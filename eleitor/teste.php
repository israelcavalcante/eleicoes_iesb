<?php
include_once 'Eleitor.php';

$eleitor = new Eleitor();

$resultado = $eleitor->existeTitulo(123);

print_r($resultado);