<?php
    class DataBase
    {
        public static function ObtenerConexion()
        {
            return new PDO('mysql:host=localhost;dbname=test', 'root', '');
        }
    }