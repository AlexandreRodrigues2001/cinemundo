<?php
    include_once('cabecalho1.php');
    require_once 'conexao.php';
?>
<html>
    <head>
        <title> Adicionar Filme </title>
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
            top: 25%;
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
            padding: 10px 0;
            
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
            <form>
                <h2>Lista de todas as categorias já existentes </h2>
                <?php
                $query = "SELECT nome_categoria FROM categoria ORDER BY nome_categoria";
                $dados = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_array($dados)) {
                        $nome = $row['nome_categoria'];
                    ?>
                        <div class="input-field">
                            <p class="center" text-align="justify"><?php echo $nome;?></p>
                        </div>
                <?php
                    } 
                ?>
            <br>
        </div>
    </body>
    <footer>
        <div class="footer-bottom">
            <a href="index.php"class="logo">CINEMUNDO</a>
        </div>
    </footer>
</html>