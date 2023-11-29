<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="icone.png">
    <style>
        body {
            background-color: #0489aa;
        }

        .dp-menu {
            width: 400px;
            position: relative;
            margin: auto;
            z-index: 5;
        }

        :root {
            --cor-fundo: #fff;
            --cor-hover: #0489aa;
            --cor-primaria: #0489aa;
        }

        .dp-menu ul {
            list-style-type: none;
            padding: 0;
            border-radius: 10px;
            background-color: var(--cor-fundo);
            border: 2px #0489aa solid;
            text-align: right;
        }

        .dp-menu ul li {
            display: inline;
            position: relative;
            align-items: right;
            border-radius: 10px;
            text-align: left;
            width: 100px;

        }

        .dp-menu ul li a {
            color: var(--cor-primaria);
            text-decoration: none;
            display: inline-block;
            padding: 10px;
            width: 80px;
        }

        .dp-menu ul li :hover {
            font-weight: bold;
        }

        /*sub menu*/
        .dp-menu ul ul {
            display: none;
            left: 0;
            position: absolute;
        }

        .dp-menu ul li:hover ul {
            display: block;
            width: 103px;
        }

        .dp-menu ul ul li a {
            display: block;
        }

        .txt{
            display: inline;
            margin-right: 4%;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
        .txt:hover{
            display: inline;
            margin-right: 4%;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            color: #0489aa;
            transition: color 0.4s;
        }
    </style>
</head>

<nav class="dp-menu">
    <ul>
        <h4 class="txt">Plataforma de Inscrição</h4>
        <li>
            <a>Participante</a>
            <ul>
                <li>
                    <a href="../../../participante/tarefas/Adicionar/adicionar.php">Adicionar Participante</a>
                </li>
                <li>
                    <a href="../../../participante/tarefas/Listar/listar.php">Ver Participantes</a>
                </li>
            </ul>
        </li>
        <li><a>Veículo</a>
            <ul>
                <li>
                    <a href="../../../veiculo/tarefas/Adicionar/adicionar.php">Adicionar Veículo</a>
                </li>
                <li>
                    <a href="../../../veiculo/tarefas/Listar/listar.php">Ver Veículos</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>