<?php
    require_once __DIR__ . "/../models/Eleicao.php";
    require_once __DIR__ . "/../models/Documento.php";
    require_once __DIR__ . "/../repositories/DocumentoDAO.php";
    require_once __DIR__ . "/../repositories/EleicaoDAO.php";
    require_once __DIR__ . "/../utils/Util.php";

    class EleicaoController {
        private ?DocumentoDAO $documentoDAO;
        private ?EleicaoDAO $eleicaoDAO;

        public function __construct() {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $this->documentoDAO = new DocumentoDAO();
            $this->eleicaoDAO = new EleicaoDAO();
        }

        public function inserirEleicao($requisicao) {
            if ($requisicao === "GET") {
                $documentos = $this->documentoDAO->buscarTodos();
                if (!empty($documentos)) {
                    $documentos = Util::converterArrayDoc($documentos);
                    $_SESSION["documentos"] = $documentos;
                    include "./views/eleicao/cadastrar.php";
                }
            }

            if ($requisicao === "POST") {
                $respostaDocumento = $this->documentoDAO->buscarPorId($_POST["idDocumento"]);
                $documento = new Documento(
                    $respostaDocumento['data_inicio_documento'],  // Obrigatório
                    $respostaDocumento['data_fim_documento'],     // Obrigatório
                    $respostaDocumento['titulo_documento'],       // Obrigatório
                    $respostaDocumento['tipo_documento'],         // Obrigatório
                    $respostaDocumento['pdf_documento'],          // Opcional (valor padrão "")
                    $respostaDocumento['data_hora_documento'],    // Opcional (valor padrão "")
                    $respostaDocumento['id_documento']  
                );
                
                $eleicao = new Eleicao(
                    $_POST["dataInicioEleicao"],
                    $_POST["dataFimEleicao"],
                    $_POST["statusEleicao"],
                    $documento
                );

                $resposta = $this->eleicaoDAO->inserir($eleicao);

                if ($resposta) {
                    header("Location: /code/cipa_t1/");
                    exit;
                }
            }
        }
    }