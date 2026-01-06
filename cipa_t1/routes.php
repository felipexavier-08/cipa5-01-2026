<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once __DIR__ . "/controllers/FuncionarioController.php";
    $funcionarioController = new FuncionarioController();
    //captura a url
    $url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

    //caminho para a base do projeto no xampp
    $base_path = "/cipa_t1/";
    $requisicao = $_SERVER["REQUEST_METHOD"];

   switch($url) {

        case $base_path:
            include "./views/home.php";
            break;
        
        case $base_path . "funcionario/cadastrar":
            $funcionarioController->criarFuncionario($requisicao);
            break;

        case $base_path . "funcionario/listar":
            $funcionarioController->buscarTodosFuncionarios($requisicao);
            break;

        case $base_path . "funcionario/deletar":
            $funcionarioController->deletarFuncionario($requisicao);
            break;
        
        default:
            header("Location: ./views/erro.php");
            exit ;
            break;

    }