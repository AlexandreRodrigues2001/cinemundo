<?php
    include_once('cabecalho1.php');
    require_once 'conexao.php';
    if (isset ($_GET['n'])){
        $a = $_GET['n'];
            if ($a == 1) {
                $categoria_anterior = $_POST['nome_categoria_anterior'];
                $alterar_categoria = $_POST['alterar_categoria'];
                $sql = "SELECT * FROM categoria WHERE nome_categoria ='$categoria_anterior'";
                $resultado = mysqli_query($connect, $sql);
                if (mysqli_num_rows($resultado) > 0) {
                    $alterar = "UPDATE categoria SET nome_categoria = '$alterar_categoria' WHERE nome_categoria='$categoria_anterior'";
                    $resultado1 = mysqli_query($connect, $alterar);
                    echo "<script>alert('Categoria atualizada com sucesso!');
                    window.location='categorias.php';
                    </script>";
                }
            }
    }
?>
<html>
    <head>
        <title> Alterar categoria </title>
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
            top: 30%;
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
       .textarea-field{
           height: 150px;
           padding-top: 10px;
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
       .container{
           font-size:16px;
           background: #ffffff;
           border-radius:50px;
           width:350px;
           outline:1px;
       }

       ::-webkit-file-upload-button{
           color:white;
           background: #000001;
           padding:20px;
           border:none;
           border-radius:50px;
           outline:none;
       }
       ::-webkit-file-upload-button:hover{
           background:#000001;
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
            <form method="POST" action="alterar_categoria.php?n=1">
                <h2>Formulário para alteração de categoria</h2><br> 
                <label id="label">Selecione a categoria que pretende alterar</label><br>
                <select id="categoria" class="input-field" name="nome_categoria_anterior">
                <?php 
                    $sql_query_com_select_com_informações_de_categoria = "SELECT nome_categoria FROM categoria";
                    $dados_da_tabela_categorias = $connect->query($sql_query_com_select_com_informações_de_categoria);
                    if ($dados_da_tabela_categorias->num_rows > 0) {
                        while ($linha_da_tabela = $dados_da_tabela_categorias->fetch_array()) {
                            echo '<option>' . $linha_da_tabela["nome_categoria"] . '</option><br>';
                        }
                    }
                ?>
            </select>
            <br>
            <br>
                <label id="label">Digite a categoria atualizada</label><br>
                <input id="input" type="text" class="input-field" name="alterar_categoria" ><br><br>
                <div class="center">
                    <button type="submit" class="btn"> Criar </button>
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