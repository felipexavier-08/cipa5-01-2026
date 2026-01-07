<?php
    // Inicializa variáveis
    $id = '';
    $nome = $sobrenome = $cpf = $dataNascimento = $dataContratacao = $telefone = $matricula = $codigoVoto = $ativo = $adm = $email = '';

    // 1) Se o controller forneceu $funcionario, usa
    if (!empty($funcionario)) {
        if (is_object($funcionario)) {
            $id = $funcionario->getIdFuncionario() ?? $funcionario->getId() ?? '';
            $nome = $funcionario->getNomeFuncionario() ?? $funcionario->getNome() ?? '';
            $sobrenome = $funcionario->getSobrenomeFuncionario() ?? $funcionario->getSobrenome() ?? '';
            $cpf = $funcionario->getCpfFuncionario() ?? $funcionario->getCpf() ?? '';
            $dataNascimento = $funcionario->getDataNascimentoFuncionario() ?? $funcionario->getDataNascimento() ?? '';
            $dataContratacao = $funcionario->getDataContratacaoFuncionario() ?? $funcionario->getDataContratacao() ?? '';
            $telefone = $funcionario->getTelefoneFuncionario() ?? $funcionario->getTelefone() ?? '';
            $matricula = $funcionario->getMatriculaFuncionario() ?? $funcionario->getMatricula() ?? '';
            $codigoVoto = $funcionario->getCodigoVotoFuncionario() ?? $funcionario->getCodigoVoto() ?? '';
            $ativo = $funcionario->getAtivoFuncionario() ?? ($funcionario->isAtivo() ? 1 : 0) ?? 0;
            $adm = $funcionario->getAdmFuncionario() ?? ($funcionario->isAdm() ? 1 : 0) ?? 0;
            $email = $funcionario->getEmailFuncionario() ?? $funcionario->getEmail() ?? '';
            $senha = $funcionario->getSenhaFuncionario() ?? $funcionario->getSenha() ?? '';
        } elseif (is_array($funcionario)) {
            $id = $funcionario['idFuncionario'] ?? $funcionario['id'] ?? '';
            $nome = $funcionario['nome_funcionario'] ?? $funcionario['nome'] ?? '';
            $sobrenome = $funcionario['sobrenome_funcionario'] ?? $funcionario['sobrenome'] ?? '';
            $cpf = $funcionario['CPF_funcionario'] ?? $funcionario['cpf'] ?? '';
            $dataNascimento = $funcionario['data_nascimento_funcionario'] ?? $funcionario['dataNascimento'] ?? '';
            $dataContratacao = $funcionario['data_contratacao_funcionario'] ?? $funcionario['dataContratacao'] ?? '';
            $telefone = $funcionario['telefone_funcionario'] ?? $funcionario['telefone'] ?? '';
            $matricula = $funcionario['matricula_funcionario'] ?? $funcionario['matricula'] ?? '';
            $codigoVoto = $funcionario['codigo_voto_funcionario'] ?? $funcionario['codigoVoto'] ?? '';
            $ativo = $funcionario['ativo_funcionario'] ?? $funcionario['ativo'] ?? 0;
            $adm = $funcionario['ADM_funcionario'] ?? $funcionario['adm'] ?? 0;
            $email = $funcionario['email_funcionario'] ?? $funcionario['email'] ?? '';
            $senha = $funcionario['senha_funcionario'] ?? $funcionario['senha'] ?? '';
        }
    }

    // 2) Se ainda não tem id, tenta GET/POST
    if (empty($id)) {
        $id = trim((string)($_GET['id'] ?? $_POST['idFuncionario'] ?? ''));
    }

    // 3) Se tiver id mas campos vazios, tenta carregar de data/funcionarios.json (fallback)
    if (!empty($id) && empty($nome)) {
        $dataFile = __DIR__ . '/../../data/funcionarios.json';
        if (file_exists($dataFile)) {
            $json = file_get_contents($dataFile);
            $arr = json_decode($json, true);
            if (is_array($arr)) {
                foreach ($arr as $item) {
                    if ((string)($item['idFuncionario'] ?? $item['id'] ?? '') === (string)$id) {
                        $nome = $item['nomeFuncionario'] ?? $item['nome'] ?? '';
                        $sobrenome = $item['sobrenomeFuncionario'] ?? $item['sobrenome'] ?? '';
                        $cpf = $item['cpfFuncionario'] ?? $item['cpf'] ?? '';
                        $dataNascimento = $item['dataNascimentoFuncionario'] ?? $item['dataNascimento'] ?? '';
                        $dataContratacao = $item['dataContratacaoFuncionario'] ?? $item['dataContratacao'] ?? '';
                        $telefone = $item['telefoneFuncionario'] ?? $item['telefone'] ?? '';
                        $matricula = $item['matriculaFuncionario'] ?? $item['matricula'] ?? '';
                        $codigoVoto = $item['codigoVotoFuncionario'] ?? $item['codigoVoto'] ?? '';
                        $ativo = $item['ativoFuncionario'] ?? $item['ativo'] ?? 0;
                        $adm = $item['admFuncionario'] ?? $item['adm'] ?? 0;
                        $email = $item['emailFuncionario'] ?? $item['email'] ?? '';
                        $senha = $item['senhaFuncionario'] ?? $item['senha'] ?? '';
                        break;
                    }
                }
            }
        }
    }

    $ativoChecked = ((int)$ativo === 1) ? 'checked' : '';
    $admChecked = ((int)$adm === 1) ? 'checked' : '';
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
    <form method="post" action="/cipa_t1/funcionario/editar">
        <input type="hidden" name="idFuncionario" value="<?php echo htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?>">

        <label for="nomeFuncionario">Nome:</label>
        <input type="text" id="nomeFuncionario" name="nomeFuncionario" value="<?php echo htmlspecialchars($nome, ENT_QUOTES, 'UTF-8'); ?>" required>
        <br>

        <label for="sobrenomeFuncionario">Sobrenome:</label>
        <input type="text" id="sobrenomeFuncionario" name="sobrenomeFuncionario" value="<?php echo htmlspecialchars($sobrenome, ENT_QUOTES, 'UTF-8'); ?>" required>
        <br>

        <label for="cpfFuncionario">CPF:</label>
        <input type="text" id="cpfFuncionario" name="cpfFuncionario" value="<?php echo htmlspecialchars($cpf, ENT_QUOTES, 'UTF-8'); ?>" required>
        <br>

        <label for="dataNascimentoFuncionario">Data de Nascimento:</label>
        <input type="date" id="dataNascimentoFuncionario" name="dataNascimentoFuncionario" value="<?php echo htmlspecialchars($dataNascimento, ENT_QUOTES, 'UTF-8'); ?>" required>
        <br>

        <label for="dataContratacaoFuncionario">Data de Contratação:</label>
        <input type="date" id="dataContratacaoFuncionario" name="dataContratacaoFuncionario" value="<?php echo htmlspecialchars($dataContratacao, ENT_QUOTES, 'UTF-8'); ?>" required>
        <br>

        <label for="telefoneFuncionario">Telefone:</label>
        <input type="tel" id="telefoneFuncionario" name="telefoneFuncionario" value="<?php echo htmlspecialchars($telefone, ENT_QUOTES, 'UTF-8'); ?>">
        <br>

        <label for="matriculaFuncionario">Matrícula:</label>
        <input type="text" id="matriculaFuncionario" name="matriculaFuncionario" value="<?php echo htmlspecialchars($matricula, ENT_QUOTES, 'UTF-8'); ?>">
        <br>

        <label for="codigoVotoFuncionario">Código de Voto:</label>
        <input type="text" id="codigoVotoFuncionario" name="codigoVotoFuncionario" value="<?php echo htmlspecialchars($codigoVoto, ENT_QUOTES, 'UTF-8'); ?>">
        <br>

        <label for="ativoFuncionario">Ativo:</label>
        <input type="checkbox" id="ativoFuncionario" name="ativoFuncionario" value="1" <?php echo $ativoChecked; ?>>
        <br>

        <label for="admFuncionario">Administrador:</label>
        <input type="checkbox" id="admFuncionario" name="admFuncionario" value="1" <?php echo $admChecked; ?>>
        <br>

        <label for="emailFuncionario">Email:</label>
        <input type="email" id="emailFuncionario" name="emailFuncionario" value="<?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>" required>
        <br>

        <label for="senhaFuncionario">Senha: (preencha apenas se quiser alterar)</label>
        <input type="password" id="senhaFuncionario" name="senhaFuncionario" value="<?php echo htmlspecialchars($senha, ENT_QUOTES, 'UTF-8');?>">
        <br>

        <button type="submit">Salvar</button>
    </form>

    <a href="./lista">Voltar</a>

</body>
</html>