<?php
    require_once __DIR__ . "/../models/Eleicao.php";
    require_once __DIR__ . "/../utils/Conexao.php";
    
    class EleicaoDAO extends Conexao {
        private ?PDO $db;
        public function __construct() {
            $this->db = $this::pegarConexao();
        }

        public function inserir(Eleicao $model) {
            try {
                $sql = "INSERT INTO eleicao (
                    data_inicio_eleicao,
                    data_fim_eleicao,
                    status_eleicao,
                    documento_fk
                ) VALUES (
                    :data_inicio,
                    :data_fim,
                    :status_e,
                    :doc
                )";
                $stmt = $this->db->prepare($sql);
                $stmt->bindValue(":data_inicio", $model->getDataInicioEleicao(), PDO::PARAM_STR);
                $stmt->bindValue(":data_fim", $model->getDataFimEleicao(), PDO::PARAM_STR);
                $stmt->bindValue(":status_e", $model->getStatusEleicao(), PDO::PARAM_STR);
                $stmt->bindValue(":doc", $model->getEditalFK()->getIdDocumento(), PDO::PARAM_INT);
                return $stmt->execute();
            } catch (PDOException $e) {
                error_log($e->getMessage());
                return false;
            }
        }
    }