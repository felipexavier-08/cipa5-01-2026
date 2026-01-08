<?php
    require_once __DIR__ . "/../models/Eleicao.php";
    require_once __DIR__ . "/../models/Funcionario.php";
    require_once __DIR__ . "/../models/Candidato.php";
    require_once __DIR__ . "/../repositories/EleicaoDAO.php";
    require_once __DIR__ . "/../repositories/FuncionarioDAO.php";

    class CandidatoController {
        private ?FuncionarioDAO $funcionarioDAO;
        private ?EleicaoDAO $eleicaoDAO;
        public function __construct() {
            $this->funcionarioDAO = new FuncionarioDAO();
            $this->eleicaoDAO = new EleicaoDAO();
            
        }

    }