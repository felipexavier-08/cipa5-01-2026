<?php
    
?>

<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Cadastrar Documento</title>
</head>
<body>

<form method="post" action="/code/cipa_t1/documento/cadastrar" enctype="multipart/form-data">
    <input type="hidden" name="idDocumento" value="">

    <label for="tituloDocumento">Título:</label>
    <input type="text" id="tituloDocumento" name="tituloDocumento" required>
    <br>

    <label for="tipoDocumento">Tipo de Documento:</label>
    <select id="tipoDocumento" name="tipoDocumento" required>
        <option value="">Selecione...</option>
        <option value="ATA">ATA</option>
        <option value="RELATORIO">Edital</option>                
    </select>
    <br>

    <label for="dataInicioDocumento">Data de Início:</label>
    <input type="date" id="dataInicioDocumento" name="dataInicioDocumento" required>
    <br>

    <label for="dataFimDocumento">Data de Término:</label>
    <input type="date" id="dataFimDocumento" name="dataFimDocumento" required>
    <br>
    
    <label for="pdfDocumento">Documento PDF:</label>
    <input type="file" id="pdfDocumento" name="pdfDocumento" accept=".pdf" required>
    <br>

    <button type="submit">Salvar</button>
</form>

    <a href="/code/cipa_t1/">Página Inicial</a>

</body>
</html>