<?php

    //captura a url
    $url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

    //caminho para a base do projeto no xampp
   $base_path = "/cipa_t1/";

   switch($url) {

        case $base_path:
            include "./views/home.php";
            break;
        
        default:
            header("Location: ./views/erro.php");
            exit ;
            break;

    }