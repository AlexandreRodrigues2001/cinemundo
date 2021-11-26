<?php
    include_once('cabecalho.php');
    require_once 'conexao.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pesquisa por Categoria</title>
        <script src="https://kit.fontawesome.com/44a29f837f.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style.css">
    </head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');

    body{
        margin: 0;
        padding: 0;
        font-family: 'Montserrat', sans-serif;

    }

    .maincard{
        color: #fff;
        width: 760px;
        height: 390px;
        margin: 50px auto;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        max-width: 770px;
        background: #0084ff;
        background: -webkit-linear-gradient(to right,#f74040 , #0084ff);
        background: -webkit-gradient(linear, left top, right top, from(#f74040), to(#0084ff));
        background: -webkit-linear-gradient(left, #f74040 , #0084ff);
        background: -o-linear-gradient(left, #f74040, #0084ff);
        background: linear-gradient(to right, #f74040, #0084ff);
        box-shadow: 0 0 40px rgba(0,0,0,0.3);
    }

    .card-left{
        width: 90%;
        text-align: justify;
    }
    .card-details {
        width: 90%;
        padding: 30px;
        margin-top: -25px;
        text-align: justify;
    }
    .card-details h1 {
        font-size: 30px;
    }
    .card-cat {
        width: 100%;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
    }
    .genre{
        color: #f74040;
        padding: 10px;
        font-weight: bold;
        border-radius: 15px;
        background: #fff;
    }

    .desc {
        font-weight: 100;
        line-height: 21px;
        text-align: justify;
    }
    a {
        color: #fff;
        display: block;
        text-decoration: underline;
    }
    .card-right{
        border-radius: 2px;
    }
    .card-right img {
        height: 390px;
        width: 290px;
        border-radius: 2px;
    }
    .social-btn{
        margin-left: -10px;
    }
    button {
        color: #f74040;
        border: none;
        padding: 20px;
        outline: none;
        font-size: 12px;
        margin-top: 30px;
        margin-left: 10px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 0 20px rgba(0,0,0,0.2);
        -o-transition: 200ms ease-in-out;
        transition: 200ms ease-in-out;
        cursor: pointer;
    }
    button:hover {
        -webkit-transform: scale(1.1);
        -ms-transform: scale(1.1);
        transform: scale(1.1);
    }

    @-webkit-keyframes bounce {
        8%{
            transform: scale(0.3);
            -webkit-transform: scale(0.8);
            opacity: 1;
        }
        10% {
            transform: scale(1.8);
            -webkit-transform: scale(2);
            opacity: 0;
        }
    }

    @keyframes bounce {
        8% {
            transform: scale(0.3);
            -webkit-transform: scale(0.8);
            opacity: 1;
        }
        20%{
            transform: scale(1.8);
            -webkit-transform: scale(2);
            opacity: 0;
        }
    }
    /* footer */
    .logo {
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 32px;
        color: #ffffff;
        }
        footer {
        position:relative;
        bottom:0;
        width:100%;
        }
        .footer-bottom {
        background-color: #000001;
        padding: 30px 0;
        }
    </style>
    <body>
        <?php
            $pesquisar = $_POST['pesquisa_por_categoria'];
            $pesquisa_na_db = mysqli_query($connect,"SELECT * FROM filmes WHERE categoria LIKE '%$pesquisar%'")or die(mysqli_error($connect));
            while ($row = mysqli_fetch_array($pesquisa_na_db)) {
                $ID = $row['id_filme'];
                $titulo = $row['titulo'];
                $descricao =$row['descricao'];
                $categoria =$row['categoria'];
                $files_field = $row['imagem'];
                $files_field2 = $row['video'];
                $files_show = "files/$files_field";
                $files_show2 = "files/$files_field2";
        ?>
        <div class="wrapper">
            <div class="maincard">
                <div class="card-left">
                    <div class="card-details">
                        <h1><?php echo $titulo; ?></h1>
                        <div class="card-cat">
                            <p class="genre"><?php echo $categoria; ?></p>
                        </div>
                        <p class="desc" text-align="justify"><?php echo $descricao; ?></p>
                        <div class="social-btn">
                            <!-- watch trailer -->
                            <form method="POST" action="ver_filme.php">
                                <input type="hidden" name="id" value="<?php echo $ID; ?>">
                                <button type="submit"> Ver Filme </button>
                            </form>
                        </div>                  
                    </div>
                </div>
                <div class="card-right">
                    <div class="img-container">
                        <?php
                            echo "<div>";
                            echo    "<img src='$files_show' width='200' height='300' ></img >";
                            echo "</div>";
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </body>
    <footer>
        <div class="footer-bottom">
            <a href="index.php"class="logo">CINEMUNDO</a>
        </div>
    </footer>
</html>