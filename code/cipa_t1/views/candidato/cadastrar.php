<?php
    // Inicia a sessão para acessar as eleições carregadas pelo controller
    if (session_status() === PHP_SESSION_NONE) { session_start(); }

    // No seu controller, você deve popular $_SESSION["eleicoes"] com objetos Eleicao
    $eleicoes = $_SESSION["eleicoes"] ?? [];
?>

<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Cadastrar Candidato</title>
</head>
<body>

    <h1>Cadastrar Novo Candidato</h1>

    <form method="post" action="/code/cipa_t1/candidato/cadastrar" enctype="multipart/form-data">
        
        <fieldset>
            <legend>Vincular Funcionário</legend>
            <label for="matriculaFuncionario">Matrícula do Funcionário:</label>
            <input type="text" id="matriculaFuncionario" name="matriculaFuncionario" required maxlength="8">
            <br><br>

            <label for="cpfFuncionario">CPF do Funcionário:</label>
            <input type="text" id="cpfFuncionario" name="cpfFuncionario" required maxlength="11">
            <p><small>O sistema buscará o funcionário automaticamente por esses dados.</small></p>
        </fieldset>

        <br>

        <fieldset>
            <legend>Dados da Candidatura</legend>            
            <br><br>

            <label for="numeroCandidato">Número do Candidato:</label>
            <input type="text" id="numeroCandidato" name="numeroCandidato" required placeholder="Ex: 101">
            <br><br>

            <label for="cargoCandidato">Cargo:</label>
            <input type="text" id="cargoCandidato" name="cargoCandidato" required placeholder="Ex: Titular CIPA">
            <br><br>

            <label for="fotoCandidato">Foto do Candidato:</label>
            <input type="file" id="fotoCandidato" name="fotoCandidato" accept="image/*" required>
        </fieldset>

        <br>
        <button type="submit">Finalizar Cadastro</button>
    </form>

    <br>
    <a href="/code/cipa_t1/">Página Inicial</a>

</body>
</html>