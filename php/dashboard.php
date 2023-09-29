    <?php
    session_start();

    ?>


    <!DOCTYPE html>
    <html>
    <head>
    <title>Sistema de gerenciamento clínica da família Augusta King</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('img/med1.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            font-family: 'Times New Roman', Times, serif;
            color: #000;
        }

        .dashboard-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
        }

        /* Estilos para os botões e título */
        .dashboard-title {
            font-size: 24px;
            margin-bottom: 30px; /* Espaço abaixo do título */
        }

        .dashboard-btn-group {
            display: flex;
            flex-direction: row; /* Alterado para layout horizontal */
            justify-content: center; /* Centralizar os botões horizontalmente */
            gap: 50px; /* Espaço entre os botões */
        }

        .dashboard-btn {
            width: 120px; /* Largura dos botões */
        }

        /* Estilos para o efeito de máquina de escrever */
        .typewriter-text {
            overflow: hidden; /* Certifica-se de que o texto não é visível fora do contêiner */
            border-right: .15em solid orange; /* Adicione um cursor piscando antes do texto */
            white-space: nowrap; /* Impede que o texto seja quebrado em várias linhas */
            margin: 0 auto; /* Centraliza o texto horizontalmente */
            letter-spacing: .15em; /* Define o espaço entre as letras */
            animation: typing 3.5s steps(40, end), blink-caret .75s step-end infinite;
        }

        footer {
            text-align: center;
            background-color: #007bff;
            color: white;
            padding: 10px;
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        /* Animação para a máquina de escrever */
        @keyframes typing {
            from {
                width: 0;
            }
            to {
                width: 100%;
            }
        }

        /* Animação para o cursor piscando */
        @keyframes blink-caret {
            from, to {
                border-color: transparent;
            }
            50% {
                border-color: orange;
            }
        }
    </style>
</head>
<body class= "d-flex justify-content-center align-items-center vh-100">

    <div class="text-center">
           <!-- <h2>Gerenciamento de pacientes</h2>
            <br> -->
            <?php
            $user_type = $_SESSION["user_type"];

            if ($user_type == "medico") {
                echo "<h2 class='typewriter-text'>Seja bem-vindo(a), Doutor(a)!</h2> <br>";
                echo "<div class='btn-group-vertical'>";
                echo "<a href='pacientes.php' class='btn btn-primary mb-4'>Gerenciar pacientes</a>";
                echo "<a href='marcarexame.php' class='btn btn-primary mb-4'>Marcar exame</a>";
                echo "<a href='examesmarcados.php' class='btn btn-primary mb-4'>Exames marcados</a>";

                echo "</div>";
            } elseif ($user_type == "enfermeiro") {
                echo "<h2 class='typewriter-text'>Seja bem-vindo(a), Enfermeiro(a)!</h2> <br>";
                echo "<div class='btn-group-vertical'>";
                echo "<a href='listagempacientes.php' class='btn btn-primary mb-4'>Pacientes cadastrados</a>";
                echo "<a href='marcarconsultas.php' class='btn btn-primary mb-4'>Marcar consulta</a>";
                echo "<a href='consultasmarcadas.php' class='btn btn-primary mb-4'>Ver consultas marcadas</a>";
                echo "<a href='examesmarcados.php' class='btn btn-primary mb-4'>Exames marcados</a>";

                echo "</div>";
            } elseif ($user_type == "agentescomusaude") {
                echo "<h2 class='typewriter-text'>Seja bem-vindo(a), Agente!</h2> <br>";
                echo "<div class='btn-group-vertical'>";
                echo "<a href='cadpacientes.php' class='btn btn-primary mb-4'>Cadastrar paciente</a>";
                echo "<a href='listarpacientesagente.php' class='btn btn-primary mb-4'>Pacientes cadastrados</a>";
                echo "<a href='examesmarcados.php' class='btn btn-primary mb-4'>Exames marcados</a>";

                echo "</div>";
            }
            ?>
            <br>
            <a href="index.php" class="btn btn-info mt-3">Deslogar</a>
        </div>



<footer style="background-color: #007bff; color: white; text-align: center; padding: 20px 0;">
    Desenvolvido por <a href="https://mtech-solutions.vercel.app/" style="color: black; text-decoration: underline;">M.TECH - soluções em T.I</a>
</footer>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>




