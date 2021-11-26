<?php
    include_once('cabecalho1.php');
    require_once 'conexao.php';

    if (isset($_GET['n'])) {
        $a = $_GET['n'];
        if ($a == 1) {
            $video = $_FILES['file2']['name'];
            $tmp_name2 = $_FILES['file2']['tmp_name'];
            $position = strpos($video, ".");
            $fileextension2 = substr($video, $position + 1);
            $fileextension2 = strtolower($fileextension2);
            $imagem = $_FILES['file']['name'];
            $tmp_name = $_FILES['file']['tmp_name'];
            $titulo = $_POST['titulo'];
            $descricao = $_POST['descricao'];
            $categoria = $_POST['categoria'];
            #$categoria_array = mysqli_real_escape_string();


            $position = strpos($imagem, ".");
            $fileextension = substr($imagem, $position + 1);
            $fileextension = strtolower($fileextension);

            $sql = "SELECT * FROM filmes WHERE imagem='$imagem' OR video ='$video'";
            $result = mysqli_query($connect, $sql);
            if (mysqli_num_rows($result) >= 1) {
                echo '<script>alert("Nome de video ou imagem ja em uso na base de dados!");</script>';
            } else {
                $sql = "SELECT * FROM filmes WHERE titulo ='$titulo'";
                $result = mysqli_query($connect, $sql);
                if (mysqli_num_rows($result) >= 1) {
                    echo '<script>alert("Titulo do filme ja em uso na base de dados!");</script>';
                } else {
                    if (!empty($descricao) and !empty($titulo)) {
                        if (isset($imagem) and isset($video)) {
                            $path = 'files/';
                            if (!empty($imagem) and !empty($video)) {
                                if (move_uploaded_file($tmp_name, $path . $imagem)) {
                                    if (move_uploaded_file($tmp_name2, $path . $video)) {
                                            mysqli_query($connect, "INSERT INTO filmes (id_filme,titulo,descricao,categoria,imagem,video) VALUES (NULL,'".$titulo."','".$descricao."','".$categoria."', '".$imagem."', '".$video."')");
                                            echo "<script>alert('Filme Inserido!');
                                                    window.location='adicionar_filme.php';
                                                </script>";
                                    }else {
                                        echo
                                            "<script>alert('Filme não inserido!');
                                                window.location='adicionar_filme.php';
                                            </script>";
                                    }
                                }
                            }else {
                                echo
                                    "<script>alert('Filme não inserido falta de Imagem ou de Filme!');
                                        window.location='adicionar_filme.php';
                                    </script>";
                            }
                        }
                    }else {
                        echo
                            "<script>alert('Filme não inserido falta de Descrição ou de Titulo!');
                                window.location='adicionar_filme.php';
                            </script>";
                    }
                }
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
            top: 50%;
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
        <div class="contact-box">
            <form action="adicionar_filme.php?n=1" method='post' enctype="multipart/form-data">
                <h2>Formulário para inserção de filme</h2><br>
                <label id="label_insercao_atividades"> Titulo do Filme : </label><br>
                <input type="text" class="input-field" name="titulo" required>
                <br>
                <br>
                <label id="label_insercao_atividades"> Descrição : </label><br>
                <textarea type="text" class="input-field textarea-field" name="descricao" required> </textarea>
                <br>
                <br>
                <label  for="label">Categoria :</label><br>
                <select id="categoria" class="input-field" name="categoria" >
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
                <script>
                    function selecionar_varios() {
                        document.getElementById("categoria").multiple = true;
                    }
                </script>
                <br>
                <br>
                <br>
                <label for="file">Adicione a imagem </label><br><br>
                <div class="container">
                    <input type="file" id="button_inserir_imagem" name="file" accept=".jpg, .jpeg, .png" required />
                </div>
                <br>
                <br>
                <label for="file">Adicione o video </label><br>
                <br>
                <div class="container">  
                    <input type="file" id="button_inserir_video" name="file2" accept=".mp4, .AVCHD, .mkv, .mov, .qt .avi, .avchd, .fvl, .swf, .realvideo" required />
                </div>
                <div class="center">
                    <button type="submit" class="btn"> Adicionar filme </button>
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
