<?php
    $funcionarioEditavel = null;
    foreach ($_SESSION["funcionarios"] as $funcionario) {
        
        if ($funcionario->getIdFuncionario() == $_GET["id"]) {
            $funcionarioEditavel = $funcionario;
            break;
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Funcionário</title>
</head>
<body>

    <h1>Editar Funcionário</h1>
    <form method="post" action="/code/cipa_t1/funcionario/editar">
        <input 
            type="hidden"  
            name="idFuncionario" 
            value="<?php echo $funcionario->getIdFuncionario(); ?>"    
        >

        <label for="nomeFuncionario">Nome:</label>
        <input 
            type="text" 
            id="nomeFuncionario" 
            name="nomeFuncionario" 
            value="<?php echo $funcionario->getNomeFuncionario(); ?>" 
            required>
        <br>

        <label for="sobrenomeFuncionario">Sobrenome:</label>
        <input 
            type="text" 
            id="sobrenomeFuncionario" 
            name="sobrenomeFuncionario" 
            value="<?php echo $funcionario->getSobrenomeFuncionario(); ?>"
            required>
        <br>

        <label for="cpfFuncionario">CPF:</label>
        <input 
            type="text" 
            id="cpfFuncionario" 
            name="cpfFuncionario" 
            value="<?php echo $funcionario->getCpfFuncionario(); ?>"
            required>
        <br>

        <label for="dataNascimentoFuncionario">Data de Nascimento:</label>
        <input 
            type="date" 
            id="dataNascimentoFuncionario"
            name="dataNascimentoFuncionario"
            value="<?php echo $funcionario->getDataNascimentoFuncionario(); ?>"
            required>
        <br>

        <label for="dataContratacaoFuncionario">Data de Contratação:</label>
        <input 
            type="date"
            id="dataContratacaoFuncionario"
            name="dataContratacaoFuncionario"
            value="<?php echo $funcionario->getDataContratacaoFuncionario(); ?>"
            required>
        <br>

        <label for="telefoneFuncionario">Telefone:</label>
        <input 
            type="tel" 
            id="telefoneFuncionario" 
            name="telefoneFuncionario" 
            value="<?php echo $funcionario->getTelefoneFuncionario(); ?>"
        >
        <br>

        <label for="matriculaFuncionario">Matrícula:</label>
        <input 
            type="text" 
            id="matriculaFuncionario" 
            name="matriculaFuncionario" 
            value="<?php echo $funcionario->getMatriculaFuncionario(); ?>"
        >
        <br>

        <label for="codigoVotoFuncionario">Código de Voto:</label>
        <input 
            type="text" 
            id="codigoVotoFuncionario"
            name="codigoVotoFuncionario" 
            value="<?php echo $funcionario->getCodigoVotoFuncionario(); ?>"    
        >
            
        <br>

        <label for="ativoFuncionario">Ativo:</label>
        <input type="checkbox" id="ativoFuncionario" name="ativoFuncionario" value="1" checked>
        <br>

        <label for="admFuncionario">Administrador:</label>
        <input type="checkbox" id="admFuncionario" name="admFuncionario" value="0" >
        <br>

        <label for="emailFuncionario">Email:</label>
        <input type="email" id="emailFuncionario" name="emailFuncionario" required>
        <br>

        <label for="senhaFuncionario">Senha: (preencha apenas se quiser alterar)</label>
        <input type="password" id="senhaFuncionario" name="senhaFuncionario" >
        <br>

        <button type="submit">Salvar</button>
    </form>

    <a href="/code/cipa_t1/funcionario/listar">Voltar</a>

</body>
</html>