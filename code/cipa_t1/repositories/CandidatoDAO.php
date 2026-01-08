<?php
    require_once __DIR__ . "/../models/Candidato.php";
    require_once __DIR__ . "/../utils/Conexao.php";
    class CandidatoDAO extends Conexao {
        private ?PDO $db;
        public function __construct() {
            $this->db = $this::pegarConexao();
        }

        public function inserir(Candidato $model, string $cpf, string $matricula) {
            try {
                $this->db->beginTransaction();

                $sqlFuncionario = "SELECT id_funcionario FROM funcionario 
                WHERE cpf_funcionario = :cpf AND matricula_funcionario = :matricula LIMIT 1";

                $stmtFuncionario = $this->db->prepare($sqlFuncionario);
                
                $stmtFuncionario->bindValue(":cpf", $cpf, PDO::PARAM_STR);
                $stmtFuncionario->bindValue(":matricula", $matricula, PDO::PARAM_STR);
                $stmtFuncionario->execute();
                $idFuncionario = $stmtFuncionario->fetchColumn();

                if (!$idFuncionario) {
                    throw new Exception("Funcionario não encontrado");
                }

                $sqlEleicao = "SELECT id_eleicao FROM eleicao
                WHERE status_eleicao = 'ABERTA' LIMIT 1";

                $sql = "INSERT INTO candidato (
                        id_candidato,
                        foto_candidato,
                        numero_candidato,
                        cargo_candidato,
                        data_registro_candidato,
                        status_candidato,
                        quantidade_voto_candidato,
                        usuario_fk,
                        eleicao_fk
                    ) VALUES (
                        0,
                        '',
                        '',
                        '',
                        curdate(),
                        '',
                        0,
                        0,
                        0);";
            } catch (PDOException $e) {

            }
        }
    }