<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    $conn = new mysqli("localhost", "root", "", "sisgeresaude");

    $query = "SELECT * FROM pacientes WHERE id = $id";
    $result = $conn->query($query);


    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
    } else {
        header("Location: pacientes.php");
        exit();
    }

    $conn->close();
} else {
    header("Location: pacientes.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Paciente</title>
    <!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Paciente</title>
    <style>
        body {
            background-color: #87CEFA;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 0;
            font-family: 'Times New Roman', Times, serif;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }
        button{
            background-color: #007bff;
            padding: 10px;
            color: #fff;
            margin-top: 8px;
            margin-right: 12px;
        }
        a{
            background-color: #007bff;
            padding: 10px;
            color: #fff;
            text-decoration: none;
            margin-top: 8px;

        }
    </style>
</head>
<body>


    <form method="post" action="atualizarpaciente.php">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <h2>Editar Paciente</h2>

    <label>Nome:</label>
        <input type="text" name="nomepaciente" value="<?php echo $row["nomepaciente"]; ?>">
        <br>
        <br>
        
        <label>RG:</label>
        <input type="text" name="rgpaciente" value="<?php echo $row["rgpaciente"]; ?>">
        <br>
        <br>


        <label>CPF:</label>
        <input type="text" name="cpfpaciente" value="<?php echo $row["cpfpaciente"]; ?>">
        <br>
        <br>


        <label>Telefone:</label>
        <input type="text" name="telefone" value="<?php echo $row["telefone"]; ?>">
        <br>
        <br>

        <label>Endereço:</label>
        <input type="text" name="enderecopaciente" value="<?php echo $row["enderecopaciente"]; ?>">
        <br>
        <br>


        <label>E-mail:</label>
        <input type="text" name="email" value="<?php echo $row["email"]; ?>">
        <br>
        <br>

        <label>Equipe:</label>
<select name="equipe">
    <option value="Asteca" <?php if ($row["equipe"] === 'Asteca') echo 'selected'; ?>>Asteca</option>
    <option value="Dumont" <?php if ($row["equipe"] === 'Dumont') echo 'selected'; ?>>Dumont</option>
    <option value="Veteranos" <?php if ($row["equipe"] === 'Veteranos') echo 'selected'; ?>>Veteranos</option>
    <option value="Força do Amanhã" <?php if ($row["equipe"] === 'Força do Amanhã') echo 'selected'; ?>>Força do amanhã</option>
</select>
<br>
<br>



        <label>Nacionalidade:</label>
        <input type="text" name="nacionalidade" value="<?php echo $row["nacionalidade"]; ?>">
        <br>
        <br>

        <label>Nome da mãe:</label>
        <input type="text" name="nomemae" value="<?php echo $row["nomemae"]; ?>">
        <br>
        <br>

        <label>Nome do pai:</label>
        <input type="text" name="nomepai" value="<?php echo $row["nomepai"]; ?>">
        <br>
        <br>

        <label>Cartão do sus:</label>
        <input type="text" name="numcartaosus" value="<?php echo $row["numcartaosus"]; ?>">
        <br>
        <br>

        <label>Raça:</label>
        <input type="text" name="raca" value="<?php echo $row["raca"]; ?>">
        <br>
        <br>

        <label>Sexo:</label>
<select name="sexo">
    <option value="Feminino" <?php if ($row["sexo"] === 'Feminino') echo 'selected'; ?>>Feminino</option>
    <option value="Masculino" <?php if ($row["sexo"] === 'Masculino') echo 'selected'; ?>>Masculino</option>
    <option value="Outro" <?php if ($row["sexo"] === 'Outro') echo 'selected'; ?>>Outro</option>
</select>
<br>
<br>


        <label>Tipo sanguineo:</label>
        <input type="text" name="tiposanguineo" value="<?php echo $row["tiposanguineo"]; ?>">
        <br>
        <br>


        <label>Data de Nascimento:</label>
        <input type="date" name="datanascimento" value="<?php echo $row["datanascimento"]; ?>">
        <br>
        <br>


        <label>Status:</label>
<select name="statuspac">
    <option value="ativo" <?php if ($row["statuspac"] === 'ativo') echo 'selected'; ?>>Ativo</option>
    <option value="inativo" <?php if ($row["statuspac"] === 'inativo') echo 'selected'; ?>>Inativo</option>
</select>
<br>
<br>


        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <button type="submit">Salvar</button>
        <a class="backb" href="pacientes.php">Voltar</a>

    </form>
    <br>

   <!-- <footer style="background-color: #007bff; color: white; text-align: center; padding: 10px 0; position: relative; bottom: 0; width: 100%;">
    Desenvolvido por <a href="https://mtech-solutions.vercel.app/" style="color: black; text-decoration: underline;">M.TECH - soluções em T.I</a>
</footer> -->

</body>
</html>
