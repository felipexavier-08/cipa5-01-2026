<?php
    $documentos = $_SESSION["documentos"] ?? [];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Documentos</title>
</head>
<body>
    <h1>Lista de Documentos</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Título</th>
                <th>Data Início</th>
                <th>Data Fim</th>
                <th>Tipo</th>
                <th>Documento</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($documentos) && is_array($documentos)): ?>
                <?php foreach ($documentos as $doc):
                    // Acessa os dados conforme sua estrutura
                    if (is_object($doc)) {
                        $titulo = $doc->getTituloDocumento();
                        $dataInicio = $doc->getDataInicioDocumento();
                        $dataFim = $doc->getDataFimDocumento();
                        $tipo = $doc->getTipoDocumento();
                        $pdf = $doc->getPdfDocumento();
                    } else {
                        $titulo = $doc['tituloDocumento'] ?? $doc['TituloDocumento'] ?? '';
                        $dataInicio = $doc['dataInicioDocumento'] ?? $doc['DataInicioDocumento'] ?? '';
                        $dataFim = $doc['dataFimDocumento'] ?? $doc['DataFimDocumento'] ?? '';
                        $tipo = $doc['tipoDocumento'] ?? $doc['TipoDocumento'] ?? '';
                        $pdf = $doc['pdfDocumento'] ?? $doc['PdfDocumento'] ?? '';
                    }
                    
                    // Formata a data para exibição (opcional)
                    $dataInicioFormatada = date('d/m/Y', strtotime($dataInicio));
                    $dataFimFormatada = date('d/m/Y', strtotime($dataFim));
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($titulo); ?></td>
                    <td><?php echo htmlspecialchars($dataInicioFormatada); ?></td>
                    <td><?php echo htmlspecialchars($dataFimFormatada); ?></td>
                    <td><?php echo htmlspecialchars($tipo); ?></td>
                    <td>
                        <?php if (!empty($pdf)): ?>
                            <!-- Link para visualizar o PDF em nova aba -->
                            <a href="../<?php echo($pdf); ?>" target="_blank">
                                🔍 Visualizar PDF
                            </a>
                            
                            <!-- Ou para download -->
                            <!-- 
                            <a href="<?php echo htmlspecialchars($pdf); ?>" download>
                                ⬇️ Baixar PDF
                            </a>
                            -->
                        <?php else: ?>
                            <em>Não disponível</em>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">Nenhum documento cadastrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    
    <br>
    <a href="/code/cipa_t1/documento/cadastrar">➕ Novo Documento</a> |
    <a href="/code/cipa_t1/">🏠 Página Inicial</a>

</body>
</html>