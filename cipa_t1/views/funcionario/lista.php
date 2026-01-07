<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Funcionários</title>
</head>
<body>
    <h1>Lista de Funcionários</h1>

    <table>
        <thead>
            <tr>
		<th>Id</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Data de Nascimento</th>
                <th>Data de Contratação</th>
                <th>Ativo</th>
                <th>Deletar</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($funcionarios) && is_array($funcionarios)): ?>
                <?php foreach ($funcionarios as $f):
                    // Suporta tanto objetos quanto arrays associativos
		            $id = $f->getIdFuncionario();
                    $nome = $f->getNomeFuncionario();
                    $sobrenome = $f->getSobrenomeFuncionario();
                    $dataNasc = $f->getDataNascimentoFuncionario();
                    $dataContr = $f->getDataContratacaoFuncionario();
                    $ativo =  $f->getAtivoFuncionario();
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($id); ?></td>
                    <td><?php echo htmlspecialchars($nome); ?></td>
                    <td><?php echo htmlspecialchars($sobrenome); ?></td>
                    <td><?php echo htmlspecialchars($dataNasc); ?></td>
                    <td><?php echo htmlspecialchars($dataContr); ?></td>
                    <td><?php echo ($ativo == 1) ? 'Sim' : 'Não'; ?></td>
                    <td>
                        <a href="/cipa_t1/funcionario/deletar?id=<?php echo $f->getIdFuncionario(); ?>">Deletar</a>
                    </td> 
                     <td>
                        <a href="/cipa_t1/funcionario/editar?id=<?php echo $f->getIdFuncionario(); ?>">Editar</a>
                    </td> 
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="5">Nenhum funcionário encontrado.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>