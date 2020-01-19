<?php
header("Content-type:text/html; charset=utf8");
//importar a classe Alunos
require_once "Classes(config)/Alunos.php";
//instaciar a classe Alunos
$Alunos = new Alunos();

//recuperar os dados do aluno escolhido no index_alunos.php
if (isset($_GET["matricula"])) {
    $dadosAluno = $Alunos->listarID($_GET["matricula"]);
}
//chamando a função alterar após o usuário clicar no botão salvar
if (isset($_POST["Salvar"])) {
    //   chamar a funcao alterar
    $Alunos->alterar();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Sistema Escolar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/estilo.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="index_adm.php">Sistema Escolar - Painel Administrativo</a>

        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index_alunos.php">Alunos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index_professores.php">Professor</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index_funcionarios.php">Funcionários</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index_cursos.php">Cursos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index_disciplinas.php">Disciplinas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php">Sair</a>
            </li>
        </ul>
    </nav>

    <div class="container lista">
        <div align="center">
            <img src="img/logo.png" alt="Logo">
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form action="alterar_aluno.php?matricula=<?php echo $dadosAluno->matricula; ?>" method="post">
                    <div class="row">
                        <div class="form-group col-lg-9">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" class="form-control" value="<?php echo $dadosAluno->nome; ?>">
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="sexo">Sexo</label>
                            <select name="sexo" class="form-control">
                                <option value="Masculino" <?php if ($dadosAluno->sexo == "Masculino") {
                                                                echo "selected";
                                                            } ?>>Masculino</option>
                                <option value="Feminino" <?php if ($dadosAluno->sexo == "Feminino") {
                                                                echo "selected";
                                                            } ?>>Feminino</option>
                                <option value="Outros" <?php if ($dadosAluno->sexo == "Outros") {
                                                            echo "selected";
                                                        } ?>>Outros</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" class="form-control" value="<?php echo $dadosAluno->email; ?>">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="endereco">Endereço</label>
                            <input type="text" name="endereco" class="form-control" value="<?php echo $dadosAluno->endereco; ?>">
                        </div>
                        <div class="form-group col-lg-2">
                            <label for="telefone">Telefone</label>
                            <input type="text" name="telefone" class="form-control" value="<?php echo $dadosAluno->telefone; ?>">
                        </div>
                        <div class="form-group col-lg-2">
                            <label for="senha">Senha</label>
                            <input type="password" name="senha" class="form-control" value="<?php echo $dadosAluno->senha; ?>">
                        </div>
                    </div>
                    <div align="center">
                        <button class="btn btn-success" type="submit" name="Salvar">Salvar</button>
                        <a class="btn btn-outline-danger" href="index_alunos.php">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html