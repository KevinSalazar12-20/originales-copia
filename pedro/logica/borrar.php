<?php


$xml = new DOMDocument("1.0");
$xml->load('../datos/libreria.xml');
$id = $_GET['id'];

$arbol = new DOMXPath($xml);


foreach ($arbol->query("/libreria/libro[id = $id]") as $nodo) {
   $nodo->parentNode->removeChild($nodo);
}
$xml->formatOutput = True;
$xml->save('../datos/libreria.xml');
echo "registro Eliminado !";
echo "<a href='../index.php'> Regresar  </a>";
