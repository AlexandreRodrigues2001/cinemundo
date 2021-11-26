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
                        <button onclick="myFunction()" class="dropbtn1">Filmes 
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div id="myDropdown" class="dropdown1-content">
                            <a href="adicionar_filme.php">Adicionar</a>
                            <a href="atualizar_filme.php">Atualizar</a>
                            <a href="apagar_filme.php">Apagar</a>
                        </div>
                    </div>
                    <div class="dropdown1">
                        <button onclick="myFunction()" class="dropbtn1">Categorias 
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div id="myDropdown" class="dropdown1-content">
                            <a href="adicionar_categoria.php">Adicionar</a>
                            <a href="alterar_categoria.php">Alterar</a>
                            <a href="apagar_categoria.php">Apagar</a>
                            <a href="listar_categorias.php">Listar</a>
                        </div>
                    </div>
                </div>
            </ul> 
        </nav>
    </body>
</html>