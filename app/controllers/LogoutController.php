<?php

class LogoutController extends Controller{
    public function index(){

        session_start();
        session_unset();
        session_destroy();

        header('Location: ' . BASE_URL . 'index.php?url=signin');
        exit;
        
    }
}