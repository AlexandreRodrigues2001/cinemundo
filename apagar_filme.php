<?php
    include_once('cabecalho1.php');
    require_once 'conexao.php';
    if (isset($_GET['n'])) {
        $a = $_GET['n'];
        if ($a == 1) {
            $deletar_filme = $_POST['delete_filme'];
            $sql = "SELECT * FROM filmes WHERE titulo ='$deletar_filme'";
            $resultado = mysqli_query($connect, $sql);
            if (mysqli_num_rows($resultado) > 0) {
                while ($row = mysqli_fetch_array($resultado)) {
                    $files_field = $row['imagem'];
                    $files_field2 = $row['video'];
                    $files_show = "files/$files_field";
                    $files_show2 = "files/$files_field2";
                }
                unlink($files_show);
                unlink($files_show2);
                $delete = "DELETE FROM filmes WHERE titulo = '$deletar_filme'";
                $resultado1 = mysqli_query($connect, $delete);
                echo "<script>alert('Filme excluido com sucesso!');
                    window.location='apagar_filme.php';
                    </script>";
            } else {
                echo "<script>alert('Este filme não existe!');
                    window.location='apagar_filme.php';
                    </script>";
            }
        }
    }
?>
<html>
    <head>
        <title> Página Eliminar Filmes </title>
    </head>
    <style>
        body{
            background-color: #efefef;
            font-family: sans-serif;
        }
        .contact-box{
            width:500px;
            background-color: #fff;
            box-shadow: 0 0 20px 0 #999;
            top: 20%;
            left: 50%;
            transform:translate(-50%,-50%);
            position:relative;
        }
        form{
            margin: 35px;
        }
        .input-field{
            width: 400px;
            height: 40px;
            margin-top: 20px;
            padding-left: 10px;
            padding-right: 10px;
            border: 1px solid #777;
            border-radius: 14px;
            outline: none;
        }
       .btn{
           border-radius: 20px;
           color: #ffffff;
           margin-top: 18px;
           padding: 20px;
           background-color: #000001;
           font-size: 12px;
           border: none;
           cursor: pointer;
       }
       .center{
            display: flex;
            justify-content: center;
            align-items: center;
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
        position:absolute;
        bottom:0;
        width:100%;
        }
        .footer-bottom {
        background-color: #000001;
        padding: 30px 0;
        }
    </style>
    <body>
        <div class="contact-box">
            <form action="apagar_filme.php?n=1" method='post'>
                <h2>Formulário para deleção de filme</h2><br>
                <label id="label">Digite o titulo do filme que deseja apagar : </label><br>
                <input id="input" class="input-field" type="text" name="delete_filme" ><br><br>
                <div class="center">
                    <button type="submit" class="btn"> Apagar filme </button>
                </div>
            </form>
        </div>
    </body>
    <footer>
        <div class="footer-bottom">
            <a href="index.php"class="logo">CINEMUNDO</a>
        </div>
    </footer>
</html>
