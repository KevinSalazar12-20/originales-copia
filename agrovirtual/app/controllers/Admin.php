<?php

class Admin extends Controlador
{
    public function __construct()
    {        

    }
    public function index()
    {
        
        $this->vista('trastienda/Vadmin');
    }
}
