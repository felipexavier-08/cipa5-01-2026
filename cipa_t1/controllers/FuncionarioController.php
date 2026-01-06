<?php

    require_once __DIR__ . "/../models/Funcionario.php";
    require_once __DIR__ . "/../repositories/FuncionarioDAO.php";

    class FuncionarioController {

        private $dao;

        public function __construct() {
            $this->dao = new FuncionarioDAO();
        }

        public function criarFuncionario($requisicao) {
          
            if($requisicao == "POST"){

                $func = new Funcionario(
                    $_POST['nomeFuncionario'],
                    $_POST['sobrenomeFuncionario'],
                    $_POST['cpfFuncionario'],
                    $_POST['dataNascimentoFuncionario'],
                    $_POST['dataContratacaoFuncionario'],
                    $_POST['telefoneFuncionario'],
                    $_POST['matriculaFuncionario'],
                    $_POST['codigoVotoFuncionario'],
                    isset($_POST['ativoFuncionario']) ? 1 : 0,
                    isset($_POST['admFuncionario']) ? 1 : 0,
                    $_POST['emailFuncionario'],
                    $_POST['senhaFuncionario'],
                    0
                );

                $respostaBD = $this->dao->inserir($func);

                if($respostaBD){
                    header("Location: /cipa_t1/");
                    exit ;
                } else {
                    echo "Erro ao cadastrar funcionário.";
                }

            }

            if($requisicao == "GET"){
                include "./views/funcionario/cadastrar.php";
            }

        }


        public function buscarTodosFuncionarios($requisicao) {
            if($requisicao == "GET") {
                $funcionarios = $this->dao->buscarTodos();

                if(!empty($funcionarios)) {
                    $funcionarios = $this->converterArray($funcionarios);
                    if(session_status() === PHP_SESSION_NONE){
                        session_start();
                    }
                    $_SESSION['funcionarios'] = $funcionarios;
                    include "./views/funcionario/lista.php";
                }
                else{
                    
                    include "./views/funcionario/lista.php";

                }
                

                
            }
        
        }

        public function converterArray ($arrayAssociativo) {
            $funcionarios = [];
            foreach ($arrayAssociativo as $item) {
                $funcionario = new Funcionario(
                    $item['nome_funcionario'],
                    $item['sobrenome_funcionario'],
                    $item['CPF_funcionario'],
                    $item['data_nascimento_funcionario'],
                    $item['data_contratacao_funcionario'],
                    $item['telefone_funcionario'],
                    $item['matricula_funcionario'],
                    $item['codigo_voto_funcionario'],
                    $item['ativo_funcionario'],
                    $item['ADM_funcionario'],
                    $item['email_funcionario'],
                    $item['senha_funcionario'],
                    $item['id_funcionario']
                    );
                    $funcionarios[] = $funcionario;
            }
            return $funcionarios;
        }

        public function deletarFuncionario($requisicao) {
            if ($requisicao == "GET") {
                $respostaBD = $this->dao->deletar($_GET['id']);
                if ($respostaBD) {
                    header("Location: /cipa_t1/funcionario/listar");
                    exit;
                } else {
                    echo "Erro ao deletar funcionário.";
                }
            }
        }
    }

?>