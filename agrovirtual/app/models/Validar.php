<?php
class Validar
{
    public function ValidarEntero($data)
    {

        $data = (int)$data;
        if (is_int($data)) {
            $ent = (filter_var($data, FILTER_SANITIZE_NUMBER_INT));
            return $ent;
        } else {
            return "false";
        }
    }

    public function ValidarCedula($data)
    {
        $num  =strlen ($data);
        if($num <= 10){
            return true;
        }else{
            return false;
        }

    }

    public function ValidarInt($data)
    {
        $data = (int)$data;
        if (is_int($data)) {
            $ent = (filter_var($data));
            return true;
        } else {
            return false;
        }
    }

    function ValidarEmail($str)
    {
        $matches = null;
        return (1 === preg_match('/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/', $str, $matches));
    }

    public function limpiarDatos($datos)
    {
        $datos = trim($datos);
        $datos = htmlspecialchars($datos);
        $datos = filter_var($datos, FILTER_SANITIZE_STRING);
        return $datos;
    }

    function ValidarFecha($fecha)
    {

        $valores = explode('-', $fecha);

        if (count($valores) == 2 && checkdate($valores[1], $valores[0], $valores[2])) {
            return true;
        } else {
            return false;
        }
    }

    function Numero($data)
    {
        if (is_numeric($data)) {
            return true;
        } else {
            return false;
        }

    }
}