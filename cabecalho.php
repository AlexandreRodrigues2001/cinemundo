<?php
    include_once('conexao.php');
?>
<html>
    <style>
        /* Utilitarios */
        * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        }
        body {
        font-family: cursive;
        }
        a {
        text-decoration: none;
        }
        li {
        list-style: none;
        }
        ::-webkit-input-placeholder { /* Chrome/Opera/Safari */
        color: white;
        }
        ::-moz-placeholder { /* Firefox 19+ */
        color: white;
        }
        :-ms-input-placeholder { /* IE 10+ */
        color: white;
        }
        :-moz-placeholder { /* Firefox 18- */
        color: white;
        }
        /* Estilos da  NAVBAR  */
        .navbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 20px;
        background-color: #000001;
        color: #000001;
        }
        .nav-links a {
        color: #000001;
        }
        .nav-links form {
        color: #000001;
        }
        
        /* LOGO */
        .logo {
        font-size: 32px;
        color: #ffffff;
        }
        /* NAVBAR MENU */
        .menu {
        display: flex;
        gap: 1em;
        font-size: 18px;
        }
        .menu li:hover {
        background-color: #000001;
        border-radius: 5px;
        transition: 0.3s ease;
        }
        .menu li {
        padding: 5px 14px;
        }     
        /* Estilo do butão da Dropdown */
        .btn {
        position: relative;
        font-size: 18px;
        background-color: teal;
        color: white;
        cursor: pointer;
        padding: 10px 14px;
        border: none;
        }
        /* label para a pesquisa por titulo */
        .pesquisar_titulo{
        position: relative;
        font-size: 18px;
        background-color: #000001;
        color: white;
        padding: 10px 14px;
        border: none;
        }
        
        /* butão da dropdown */
        .dropbtn {
        position: relative;
        font-size: 18px;
        background-color: #000001;
        color: white;
        cursor: pointer;
        padding: 10px 14px;
        border: none;
        }
        
        /* dropdown de categorias */
        .dropdown {
        position: relative;
        display: inline-block;
        }

        .dropdown-content {
        display: none;
        position: absolute;
        background-color: #000001;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
        }

        .dropdown-content a {
        color: white;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        }

        .dropdown-content a:hover {background-color: #000001}

        .dropdown:hover .dropdown-content {
        display: block;
        }

        .dropdown:hover .dropbtn {
        background-color: #000001;
        }

        /* dropdown de filmes*/
        .dropdown1 {
        float: left;
        overflow: hidden;
        }

        .dropdown1 .dropbtn1 {
        font-size: 16px;  
        border: none;
        outline: none;
        color: white;
        padding: 14px 16px;
        background-color: inherit;
        font-family: inherit;
        margin: 0;
        }

        .dropdown1:hover .dropbtn1 {
        background-color: #000001;
        }

        .dropdown1-content {
        display: none;
        position: absolute;
        background-color: black;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
        }

        .dropdown1-content a {
        float: none;
        color: white;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        text-align: left;
        }

        .dropdown1-content a:hover {
        background-color: black;
        }

        .dropdown1:hover .dropdown1-content {
        display: block;
        }
    </style>
    <body>
        <nav class="navbar">
            <a href="index.php"class="logo">CINEMUNDO</a>
            <ul class="nav-links">
                <div class="menu">
                    <div class="dropdown1">
                        <button onclick="myFunction()" class="dropbtn1">Categorias 
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div id="myDropdown" class="dropdown1-content">
                            <a href="adicionar_categoria.php">Adicionar</a>
                            <a href="atualizar_categoria.php">Atualizar</a>
                            <a href="apagar_categoria.php">Apagar</a>
                            <a href="listar_categorias.php">Listar </a>
                        </div>
                    </div> 
                    <div class="dropdown1">
                        <button onclick="myFunction()" class="dropbtn1">Filmes 
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div id="myDropdown" class="dropdown1-content">
                            <a href="adicionar_filme.php">Adicionar </a>
                            <a href="alterar_filme.php">Alterar </a>
                            <a href="apagar_filme.php">Apagar </a>
                        </div>
                    </div> 
                    <label class="pesquisar_titulo">Pesquisar por titulo : </label>
                    <form method="POST" action="pesquisar_por_titulo.php">
                            <li>
                                <input type="text" name="pesquisar" placeholder="Digite o titulo do Filme" class="pesquisar_titulo">
                                <input id="pesquisar" type="submit" class="pesquisar_titulo" value="Pesquisar">
                            </li>
                            
                    </form>
                    <div class="dropdown">
                        <form  id="pesquisa_por_categoria" action="pesquisar_por_categoria.php" method='POST'>
                            <select class="dropbtn"name="pesquisa_por_categoria" onchange="this.form.submit()";>
                                <?php 
                                    $sql_query_com_select_com_informações_de_categoria = "SELECT nome_categoria FROM categoria";
                                    $dados_da_tabela_categorias = $connect->query($sql_query_com_select_com_informações_de_categoria);
                                    if ($dados_da_tabela_categorias->num_rows > 0) {
                                        while ($linha_da_tabela = $dados_da_tabela_categorias->fetch_array()) {
                                            echo '<option>' . $linha_da_tabela["nome_categoria"] . '</option><br>';
                                        }
                                     }?> 
                            </select>
                        </form>                        
                    </div>
                </div>
            </ul>
        </nav>
    </body>
    <script>
        /* When the user clicks on the button, 
        toggle between hiding and showing the dropdown content */
        function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
        if (!event.target.matches('.dropbtn1')) {
            var dropdowns = document.getElementsByClassName("dropdown1-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
            }
        }
        }
    </script>

</html>