<?php

    require_once __DIR__ . "/Funcionario.php";
    require_once __DIR__ . "/Documento.php";

    class Candidato {
        private int $idCandidato;
        private ?Funcionario $funcionarioFK;
        private string $fotoCandidato;
        private string $numeroCandidato;
        private string $cargoCandidato;
        private string $dataRegistroCandidato;
        private ?Documento $eleicaoFK;
        private string $statusCandidatoAta;
        private int $quantidadeVotoCandidato;

        public function __construct(
            ?Funcionario $funcionarioFK = null,
            string $fotoCandidato,
            string $numeroCandidato,
            string $cargoCandidato,
            string $dataRegistroCandidato,
            ?Documento $eleicaoFK = null,
            string $statusCandidatoAta,
            int $quantidadeVotoCandidato = 0,
            int $idCandidato = 0
        ) {
            $this->idCandidato = $idCandidato;
            $this->funcionarioFK = $funcionarioFK;
            $this->fotoCandidato = $fotoCandidato;
            $this->numeroCandidato = $numeroCandidato;
            $this->cargoCandidato = $cargoCandidato;
            $this->dataRegistroCandidato = $dataRegistroCandidato;
            $this->eleicaoFK = $eleicaoFK;
            $this->statusCandidatoAta = $statusCandidatoAta;
            $this->quantidadeVotoCandidato = $quantidadeVotoCandidato;
        }

        public function getIdCandidato() { return $this->idCandidato; } [cite: 7]
        public function getFuncionarioFK(): Funcionario { return $this->funcionarioFK; } [cite: 8]
        public function getFotoCandidato() { return $this->fotoCandidato; } [cite: 9]
        public function getNumeroCandidato() { return $this->numeroCandidato; } [cite: 10]
        public function getCargoCandidato() { return $this->cargoCandidato; } [cite: 11]
        public function getDataRegistroCandidato() { return $this->dataRegistroCandidato; } [cite: 12]
        public function getEleicaoFK(): Documento { return $this->eleicaoFK; } [cite: 13]
        public function getStatusCandidatoAta() { return $this->statusCandidatoAta; } [cite: 14]
        public function getQuantidadeVotoCandidato() { return $this->quantidadeVotoCandidato; } [cite: 15]
    }

?>