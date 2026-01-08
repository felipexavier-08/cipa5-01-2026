<?php    
    require_once __DIR__ . "/controllers/FuncionarioController.php";
    require_once __DIR__ . "/controllers/DocumentoControlller.php";
    require_once __DIR__ . "/controllers/EleicaoController.php";

    $funcionarioController = new FuncionarioController();
    $documentoController = new DocumentoControlller();
    $eleicaoController = new EleicaoController();
    //captura a url
    $url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

    //caminho para a base do projeto no xampp
    
    $requisicao = $_SERVER["REQUEST_METHOD"];

   switch($url) {

        case "/code/cipa_t1/":
            include "./views/home.php";
            break;
        
        case "/code/cipa_t1/funcionario/cadastrar":            
            $funcionarioController->criarFuncionario($requisicao);
            break;

        case "/code/cipa_t1/funcionario/listar":
            $funcionarioController->buscarTodosFuncionarios($requisicao);
            break;

        case "/code/cipa_t1/funcionario/deletar":
            $funcionarioController->deletarFuncionario($requisicao);
            break;

        case "/code/cipa_t1/funcionario/editar":
            $funcionarioController->editarFuncionario($requisicao);
            break;

        case "/code/cipa_t1/documento/cadastrar":
            $documentoController->criarDocumento($requisicao);
            break;

        case "/code/cipa_t1/documento/listar":
            $documentoController->buscarTodosDocumento($requisicao);
            break;
        case "/code/cipa_t1/eleicao/cadastrar":
            $eleicaoController->inserirEleicao($requisicao);
            break;
        case "/code/cipa_t1/candidato/cadastrar":
            break;
        default:
            header("Location: ./views/erro.php");
            exit ;
            break;

    }