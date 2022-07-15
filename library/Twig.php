<?php

class Twig{
  static public function render($template, $data = array()){
    $loader = new \Twig\Loader\FilesystemLoader('view');
    $twig = new \Twig\Environment($loader, array('auto_reload' => true,'cache' => false));
    $twig->addGlobal('path', 'https://e1195264.webdev.cmaisonneuve.qc.ca/TP2-Blog/');
    echo $twig->render($template, $data);
  }
}