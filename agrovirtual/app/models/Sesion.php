<?php
class Sesion
{
    public function __construct()
    {
        session_start();
    }
    public function setCurrentUser($idUser)
    {
        $_SESSION['id'] = $idUser;
    }
    public function getCurrentUser()
    {
        return $_SESSION['id'];
    }
    public function setPermission($rol)
    {
        $_SESSION['rol'] = $rol;
    }
    public function getPermission()
    {
        return $_SESSION['rol'];
    }
    public function closeSession()
    {
        session_unset();
        session_destroy();
    }
}