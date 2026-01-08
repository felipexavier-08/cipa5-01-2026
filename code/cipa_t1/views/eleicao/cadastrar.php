<?php
    // Simulando a busca de documentos do banco de dados 
    // No seu projeto, isso viria do DocumentoRepository->buscarTodos()
    // Exemplo de como você deve preparar a variável $documentos:
    // $documentos = $documentoRepository->buscarTodos();
    if (isset($_SESSION["documentos"])) {
        $documentos = $_SESSION["documentos"];
    }
?>

<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Cadastrar Eleição</title>
</head>
<body>

    <h1>Cadastrar Nova Eleição</h1>

    <form method="post" action="/code/cipa_t1/eleicao/cadastrar">
        <input type="hidden" name="idEleicao" value="">

        <label for="idDocumento">Edital Relacionado:</label>
        <select id="idDocumento" name="idDocumento" required>
            <option value="">Selecione um edital...</option>
            <?php if (isset($documentos) && is_array($documentos)): ?>
                <?php foreach ($documentos as $doc): ?>
                    <option value="<?= $doc->getIdDocumento() ?>">
                        <?= $doc->getTituloDocumento() ?>
                    </option>
                <?php endforeach; ?>
            <?php else: ?>
                <option value="" disabled>Nenhum documento encontrado</option>
            <?php endif; ?>
        </select>
        <br><br>

        <label for="dataInicioEleicao">Data de Início:</label>
        <input type="date" id="dataInicioEleicao" name="dataInicioEleicao" required>
        <br><br>

        <label for="dataFimEleicao">Data de Término:</label>
        <input type="date" id="dataFimEleicao" name="dataFimEleicao" required>
        <br><br>

        <label for="statusEleicao">Status da Eleição:</label>
        <select id="statusEleicao" name="statusEleicao" required>
            <option value="ABERTA">Aberta</option>
            <option value="FECHADA">Fechada</option>
            <option value="EM_ANDAMENTO">Em Andamento</option>
            <option value="FINALIZADA">Finalizada</option>
        </select>
        <br><br>

        <button type="submit">Salvar Eleição</button>
    </form>

    <br>
    <a href="/code/cipa_t1/">Página Inicial</a>

</body>
</html>