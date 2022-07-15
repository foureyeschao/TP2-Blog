<?php

class RequirePage{
    static function requireModel($page){
        return require_once 'model/Model'.$page.'.php';
    }

    static function redirect($url){
        header("location: https://e1195264.webdev.cmaisonneuve.qc.ca/TP2-Blog/$url");
    }

    static function absolutPath($page){
        return 'https://e1195264.webdev.cmaisonneuve.qc.ca/TP2-Blog/'.$page;
    }

    static function requireLibrary($page){
        return require_once 'library/'.$page.'.php';
    }
}