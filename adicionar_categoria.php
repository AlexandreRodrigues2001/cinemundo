<?php
    include_once('cabecalho1.php');
    require_once 'conexao.php';
    if (isset ($_GET['n'])){
        $a = $_GET['n'];
            if ($a==1){
                $p_categoria = $_POST['nova_categoria'];
                $sql = "SELECT nome_categoria FROM categoria WHERE nome_categoria ='$p_categoria'";
                $resultado = mysqli_query($connect, $sql);
                if (mysqli_num_rows($resultado) >= 1) {
                    echo '<script>alert("está categoria já existe!");</script>';
                } else {

            // Inserir registo
                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        // set the PDO error mode to exception
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $sql = "INSERT INTO categoria (nome_categoria) VALUES ('".$p_categoria."')";
                        // use exec() because no results are returned
                        $conn->exec($sql);
                    } 
                    catch (PDOException $e) {
                        echo $sql . "<br>" . $e->getMessage();
                    }
                    $conn = null;
                    echo '<script>alert("Categoria inserida com sucesso!");</script>';
                }
            }
    }
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
            <form method="POST" action="adicionar_categoria.php?n=1">
                <h2>Formulário para adicionar uma categoria</h2><br> 
                <label id="label">Crie uma nova categoria</label><br>
                <input id="input" class="input-field" type="text" name="nova_categoria" ><br><br>
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