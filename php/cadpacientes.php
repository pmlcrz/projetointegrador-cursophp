<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        body {
           background-color: #87CEFA;
        }
        h2{
            text-align: center;
        }
        .branco-com-texto-preto {
            background-color: white;
            color: black;
        }

        .azul-com-texto-branco {
            background-color: #1E90FF;
            color: white;
        }
        .mensagem {
            display: none;
            background-color: #28a745;
            color: white;
            padding: 15px;
            margin-top: 20px;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            border-radius: 5px;
        }
        footer {
            text-align: center;
            background-color: #007bff;
            color: white;
            padding: 10px;
            position: fixed;
            width: 100%;
            margin-top: 220px;
        }
    </style>
    <title>Cadastrar Paciente</title>
</head>
<body>

<nav class="navbar navbar-dark bg-primary">
    <a class="navbar-brand" href="index.php">CMS Augusta King</a>
    <span class="navbar-text ml-auto">Cuidar das pessoas é o nosso dever</span>
</nav>

<div class="container mt-5">
    <h2>Cadastrar Paciente</h2>
    <br>
    <form method="post" action="inserirpaciente.php">
        <div class="row">
            <!-- Div da esquerda -->
            <div class="col-md-6 branco-com-texto-preto p-3">
                <div class="mb-3">
                    <label for="nomepaciente">Nome completo:</label>
                    <input type="text" class="form-control" id="nomepaciente" name="nomepaciente" required>
                </div>
                <div class="mb-3">
                    <label for="datanascimento">Data de Nascimento:</label>
                    <input type="date" class="form-control" id="datanascimento" name="datanascimento" required>
                </div>
                <div class="mb-3">
                    <label for="rgpaciente">RG:</label>
                    <input type="text" class="form-control" id="rgpaciente" name="rgpaciente" required>
                </div>
                <div class="mb-3">
                    <label for="cpfpaciente">CPF:</label>
                    <input type="text" class="form-control" id="cpfpaciente" name="cpfpaciente" required>
                </div>
                <div class="mb-3">
                    <label for="nacionalidade">Nacionalidade:</label>
                    <input type="text" class="form-control" id="nacionalidade" name="nacionalidade" required>
                </div>
                <div class="mb-3">
                    <label for="raca">Raça:</label>
                    <input type="text" class="form-control" id="raca" name="raca" required>
                </div>
                <div class="mb-3">
                    <label for="nomemae">Nome da mãe:</label>
                    <input type="text" class="form-control" id="nomemae" name="nomemae">
                </div>
                <div class="mb-3">
                    <label for="nomepai">Nome do pai:</label>
                    <input type="text" class="form-control" id="nomepai" name="nomepai">
                </div>
                <div class="mb-3">
                    <label for="telefone">Telefone:</label>
                    <input type="text" class="form-control" id="telefone" name="telefone">
                </div>
                <div class="mb-3">
                    <label for="tiposanguineo">Tipo sanguíneo:</label>
                    <input type="text" class="form-control" id="tiposanguineo" name="tiposanguineo" required>
                </div>
            </div>
            <!-- Div da direita -->
            <div class="col-md-6 azul-com-texto-branco p-3">
                <div class="mb-3">
                    <label for="enderecopaciente">Endereço:</label>
                    <input type="text" class="form-control" id="enderecopaciente" name="enderecopaciente" required>
                </div>
                <div class="mb-3">
                    <label for="email">E-mail:</label>
                    <input type="text" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="numcartaosus">Cartão do SUS:</label>
                    <input type="text" class="form-control" id="numcartaosus" name="numcartaosus" required>
                </div>
                <div class="mb-3">
                    <label for="equipe">Equipe:</label>
                    <select class="form-control" id="equipe" name="equipe" required>
                        <option value="asteca">Asteca</option>
                        <option value="dumont">Dumont</option>
                        <option value="veteranos">Veteranos</option>
                        <option value="força do amanhã">Força do amanhã</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="doencapreexis">Doença pré-existente:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="doencapreexis" id="Sim" value="Sim" data-toggle="collapse" data-target="#detalhesDoenca">
                        <label class="form-check-label" for="doencaSim">
                            Sim
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="doencapreexis" id="Não" value="Não" data-toggle="collapse" data-target="#detalhesDoenca">
                        <label class="form-check-label" for="doencaNao">
                            Não
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="qualdoenca">Qual doença?</label>
                    <input type="text" class="form-control" id="qualdoenca" name="qualdoenca">
                </div>
                <div class="mb-3">
                    <label for="sexo">Sexo:</label>
                    <select class="form-control" id="sexo" name="sexo" required>
                        <option value="Feminino">Feminino</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Outro">Outro</option>
                    </select>
                </div>
                <div class="mb-6">
                    <label for="statuspac">Status:</label>
                    <select class="form-control" id="statuspac" name="statuspac" required>
                        <option value="ativo">Ativo</option>
                        <option value="inativo">Inativo</option>
                    </select>
                </div>
                <div class="text-center mt-5" >
            <button type="submit" class="btn btn-light">Cadastrar</button>
                </div>
            </div>
        </div>
        <br>
        <div class="text-center">
            <a href="dashboard.php" class="btn btn-info">Voltar</a>
            <a href="index.php" class="btn btn-info">Deslogar</a>

        </div>
    </form>
    <div class="mensagem" id="mensagemCadastro">
        Paciente cadastrado: <a href="listarpacientes.php" id="verRegistro">Ver Registro</a>
    </div>
</div>

</div>

<footer style="background-color: #007bff; color: white; text-align: center; padding: 10px 0; position: relative; bottom: 0; width: 100%;">
    Desenvolvido por <a href="https://mtech-solutions.vercel.app/" style="color: black; text-decoration: underline;">M.TECH - soluções em T.I</a>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>


</body>
</html>
