<?php

require_once __DIR__ . "/../models/Funcionario.php";
require_once __DIR__ . "/../utils/Conexao.php";

class FuncionarioDAO extends Conexao {

    private $db;

    public function __construct() {
        try {
            $this->db = parent::pegarConexao();
        } catch (PDOException $e) {
            // Log de erro ou redirecionamento
            die("Erro ao conectar: " . $e->getMessage());
        }
    }

    // CREATE
    public function inserir(Funcionario $f) {
        try {
            $sql = "INSERT INTO funcionario (nome_funcionario, sobrenome_funcionario, CPF_funcionario, 
                    data_nascimento_funcionario, data_contratacao_funcionario, telefone_funcionario, 
                    matricula_funcionario, codigo_voto_funcionario, ativo_funcionario, ADM_funcionario, 
                    email_funcionario, senha_funcionario) 
                    VALUES (:nome, :sobrenome, :cpf, :nasc, :contra, :tel, :matri, :voto, :ativo, :adm, :email, :senha)";
            
            $stmt = $this->db->prepare($sql);
            
            $stmt->bindValue(':nome',      $f->getNomeFuncionario());
            $stmt->bindValue(':sobrenome', $f->getSobrenomeFuncionario());
            $stmt->bindValue(':cpf',       $f->getCpfFuncionario());
            $stmt->bindValue(':nasc',      $f->getDataNascimentoFuncionario());
            $stmt->bindValue(':contra',    $f->getDataContratacaoFuncionario());
            $stmt->bindValue(':tel',       $f->getTelefoneFuncionario());
            $stmt->bindValue(':matri',     $f->getMatriculaFuncionario());
            $stmt->bindValue(':voto',      $f->getCodigoVotoFuncionario());
            $stmt->bindValue(':ativo',     $f->getAtivoFuncionario() ? 1 : 0, PDO::PARAM_BOOL);
            $stmt->bindValue(':adm',       $f->getAdmFuncionario() ? 1 : 0, PDO::PARAM_BOOL);
            $stmt->bindValue(':email',     $f->getEmailFuncionario());
            $stmt->bindValue(':senha',     password_hash($f->getSenhaFuncionario(), PASSWORD_DEFAULT));

            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Erro ao inserir funcionário: " . $e->getMessage());
            return false;
        }
    }

    // READ - Buscar todos
    public function buscarTodos() {
        try {
            $sql = "SELECT * FROM funcionario";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erro ao buscar funcionários: " . $e->getMessage());
            return [];
        }
    }

    // READ - Buscar por ID
    public function buscarPorId(int $id) {
        try {
            $sql = "SELECT * FROM funcionario WHERE id_funcionario = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
        } catch (PDOException $e) {
            error_log("Erro ao buscar funcionário por ID: " . $e->getMessage());
            return null;
        }
    }

    // UPDATE
    public function atualizar(Funcionario $f) {
        try {
            $sql = "UPDATE funcionario SET nome_funcionario = :nome, sobrenome_funcionario = :sobrenome, 
                    CPF_funcionario = :cpf, telefone_funcionario = :tel, ativo_funcionario = :ativo, 
                    ADM_funcionario = :adm, email_funcionario = :email 
                    WHERE id_funcionario = :id";
            
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':nome',      $f->getNomeFuncionario());
            $stmt->bindValue(':sobrenome', $f->getSobrenomeFuncionario());
            $stmt->bindValue(':cpf',       $f->getCpfFuncionario());
            $stmt->bindValue(':tel',       $f->getTelefoneFuncionario());
            $stmt->bindValue(':ativo',     $f->getAtivoFuncionario(), PDO::PARAM_INT);
            $stmt->bindValue(':adm',       $f->getAdmFuncionario(),   PDO::PARAM_INT);
            $stmt->bindValue(':email',     $f->getEmailFuncionario());
            $stmt->bindValue(':id',        $f->getIdFuncionario(),    PDO::PARAM_INT);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Erro ao atualizar funcionário: " . $e->getMessage());
            return false;
        }
    }

    // DELETE
    public function deletar(int $id) {
        try {
            $sql = "DELETE FROM funcionario WHERE id_funcionario = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Erro ao deletar funcionário: " . $e->getMessage());
            return false;
        }
    }
}