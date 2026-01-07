<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);?>

<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Cadastrar Funcionário</title>
</head>
<body>

<form method="post" action="/cipa_t1/funcionario/cadastrar">
    <input type="hidden" name="idFuncionario" value="">

    <label for="nomeFuncionario">Nome:</label>
    <input type="text" id="nomeFuncionario" name="nomeFuncionario" required>
    <br>

    <label for="sobrenomeFuncionario">Sobrenome:</label>
    <input type="text" id="sobrenomeFuncionario" name="sobrenomeFuncionario" required>
    <br>

    <label for="cpfFuncionario">CPF:</label>
    <input type="text" id="cpfFuncionario" name="cpfFuncionario" required>
    <br>

    <label for="dataNascimentoFuncionario">Data de Nascimento:</label>
    <input type="date" id="dataNascimentoFuncionario" name="dataNascimentoFuncionario" required>
    <br>

    <label for="dataContratacaoFuncionario">Data de Contratação:</label>
    <input type="date" id="dataContratacaoFuncionario" name="dataContratacaoFuncionario" required>
    <br>

    <label for="telefoneFuncionario">Telefone:</label>
    <input type="tel" id="telefoneFuncionario" name="telefoneFuncionario">
    <br>

    <label for="matriculaFuncionario">Matrícula:</label>
    <input type="text" id="matriculaFuncionario" name="matriculaFuncionario">
    <br>

    <label for="codigoVotoFuncionario">Código de Voto:</label>
    <input type="text" id="codigoVotoFuncionario" name="codigoVotoFuncionario">
    <br>

    <label for="ativoFuncionario">Ativo:</label>
    <input type="checkbox" id="ativoFuncionario" name="ativoFuncionario" value="1">
    <br>

    <label for="admFuncionario">Administrador:</label>
    <input type="checkbox" id="admFuncionario" name="admFuncionario" value="1">
    <br>

    <label for="emailFuncionario">Email:</label>
    <input type="email" id="emailFuncionario" name="emailFuncionario" required>
    <br>

    <label for="senhaFuncionario">Senha:</label>
    <input type="password" id="senhaFuncionario" name="senhaFuncionario" required>
    <br>

    <button type="submit">Salvar</button>
</form>

    <a href="/cipa_t1/">Voltar</a>

</body>
</html>