<?php
    require_once  __DIR__ . "/../models/Documento.php";
    require_once __DIR__ . "/../utils/Util.php";
    require_once  __DIR__ . "/../repositories/DocumentoDAO.php";

    class DocumentoControlller {
        private ?DocumentoDAO $dao;
        public function __construct() {
            $this->dao = new DocumentoDAO();            
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
        }

        public function buscarTodosDocumento($requisicao) {
            if ($requisicao === "GET") {
                $resposta = $this->dao->buscarTodos();
                

                if (!empty($resposta)) {
                    var_dump($resposta);
                    $resposta = Util::converterArrayDoc($resposta);
                    $_SESSION["documentos"] = $resposta;
                    include "./views/documento/lista.php";
                }
            }
        }

        

        public function criarDocumento($requisicao) {
            if ($requisicao === "GET") {
                include "./views/documento/cadastrar.php";
            }

            if ($requisicao === "POST") {
                $caminhoArquivo = $this->salvarPdf();
                $documento = new Documento(                    
                    $_POST["dataInicioDocumento"],
                    $_POST["dataFimDocumento"],
                    $_POST["tituloDocumento"],
                    $_POST["tipoDocumento"],
                    $caminhoArquivo,
                );

                $resposta = $this->dao->inserir($documento);
                
                if ($resposta) {
                    header("Location: /code/cipa_t1/");
                    exit;
                }
            }
        }

        public function salvarPdf() {
            $pastaDestino = "../uploads/docs";
            $arquivo = $_FILES["pdfDocumento"];            
            //cria pasta caso nao exista
            if (!file_exists($pastaDestino)) {
                mkdir($pastaDestino, 0775, true);                
            }

            $extensao = pathinfo($arquivo["name"], PATHINFO_EXTENSION); //pega a extensão do arquivo;
            $novoNomeArquivo = uniqid("doc_") . "." . $extensao; //cria uma hash e concatena para o novo nome do arquivo;

            $caminhoCompleto = $pastaDestino . $novoNomeArquivo;

            //mover arquivo para pasta de destino
            if (move_uploaded_file($arquivo["tmp_name"], $caminhoCompleto)) {
                return $caminhoCompleto;
            } else {
                $error = error_get_last();
                echo("erro" . $error);
                return null;
            }
        }
    }