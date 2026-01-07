<?php
require_once __DIR__ . "/../models/Documento.php";
require_once __DIR__ . "/../utils/Conexao.php";

class DocumentoDAO extends Conexao {
    private $db;

    public function __construct() {
        $this->db = parent::pegarConexao();
    }

    public function inserir(Documento $model) {
        try {
            $sql = "INSERT INTO documento (
            data_hora_documento, 
            data_inicio_documento, 
            data_fim_documento, 
            pdf_documento, 
            titulo_documento, 
            tipo_documento) 
                VALUES (
            :dataHora, 
            :dataInicio, 
            :dataFim, 
            :pdf, 
            :titulo, 
            :tipo)";

            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':dataHora', $model->getDataHoraDocumento());
            $stmt->bindValue(':dataInicio', $model->getDataInicioDocumento());
            $stmt->bindValue(':dataFim', $model->getDataFimDocumento());
            $stmt->bindValue(':pdf', $model->getPdfDocumento());
            $stmt->bindValue(':titulo', $model->getTituloDocumento());
            $stmt->bindValue(':tipo', $model->getTipoDocumento());
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Erro DocumentoDAO inserir: " . $e->getMessage());
            return false;
        }
    }

    public function buscarTodos() {
        try {
            return $this->db->query("SELECT * FROM documento")->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }
}