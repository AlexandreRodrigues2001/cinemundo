<?php
    include_once('cabecalho1.php');
    require_once 'conexao.php';  
    if (isset($_GET['n'])) {
        $a = $_GET['n'];
        if ($a == 1) {
            $titulo = $_POST['titulo'];
            $alterar_titulo = $_POST['alterar_titulo'];

            $sql = "SELECT * FROM filmes  WHERE titulo = '$titulo'";
            $resultado = mysqli_query($connect, $sql);


            if (mysqli_num_rows($resultado) > 0) {
        
                $sql = "SELECT * FROM filmes WHERE titulo = '$alterar_titulo' ";
                $resultado = mysqli_query($connect, $sql);

                if (mysqli_num_rows($resultado) <= 0) {
                    $sql = "UPDATE filmes SET titulo = '$alterar_titulo'  WHERE titulo = '$titulo'";
                    $resultado = mysqli_query($connect, $sql);

                    echo "<script>alert('Titulo editado com sucesso!');
                            window.location='atualizar_filme.php?ver=atualizar_filme.php';
                                    </script>";
                } else {
                    echo "<script>alert('Este titulo já existe!');
                        window.location='atualizar_filme.php?ver=atualizar_filme.php'
                        </script>";;
                }
            }
        }
        if ($a == 2) {
            $titulo = $_POST['titulo'];
            $alterar_descricao = $_POST['alterar_descricao'];

            $sql = "SELECT * FROM filmes  WHERE titulo = '$titulo'";
            $resultado = mysqli_query($connect, $sql);


            if (mysqli_num_rows($resultado) > 0) {
        
                $sql = "SELECT * FROM filmes WHERE descricao = '$alterar_descricao' ";
                $resultado = mysqli_query($connect, $sql);

                if (mysqli_num_rows($resultado) <= 0) {
                    $sql = "UPDATE filmes SET descricao = '$alterar_descricao'  WHERE titulo = '$titulo'";
                    $resultado = mysqli_query($connect, $sql);

                    echo "<script>alert('Descricão editada com sucesso!');
                        window.location='atualizar_filme.php?ver=atualizar_filme.php';
                        </script>";
                } else {
                    echo "<script>alert('Esta Descricão já existe!');
                        window.location='atualizar_filme.php?ver=atualizar_filme.php'
                        </script>";;
                }
            }
        }
        if ($a == 3) {
            $titulo = $_POST['titulo'];
            $alterar_categoria = $_POST['alterar_categoria'];

            $sql = "SELECT * FROM filmes  WHERE titulo = '$titulo'";
            $resultado = mysqli_query($connect, $sql);


            if (mysqli_num_rows($resultado) > 0) {
        
                
                $sql = "UPDATE filmes SET categoria = '$alterar_categoria'  WHERE titulo = '$titulo'";
                $resultado = mysqli_query($connect, $sql);

                echo "<script>alert('Categoria editada com sucesso!');
                        window.location='atualizar_filme.php?ver=atualizar_filme.php';
                        </script>";
            } else {
                echo "<script>alert('Não foi possivel alterar categoria!');
                    window.location='atualizar_filme.php?ver=atualizar_filme.php'
                    </script>";
            }
        }
        if ($a == 4) {
            $titulo = $_POST['titulo'];
            $imagem = $_FILES['file']['name'];
            $tmp_name = $_FILES['file']['tmp_name'];
            
            $position = strpos($imagem, ".");
            $fileextension = substr($imagem, $position + 1);
            $fileextension = strtolower($fileextension);
            
            $path = 'files/';

            $sql = "SELECT * FROM filmes  WHERE titulo = '$titulo'";
            $resultado = mysqli_query($connect, $sql);


            if (mysqli_num_rows($resultado) > 0) {

                $sql1 = "SELECT * FROM filmes WHERE imagem ='$imagem'";
                $result = mysqli_query($connect, $sql1);
                if (mysqli_num_rows($result) >= 1) {
                    echo '<script>alert("Nome da imagem ja em uso na base de dados!");</script>';
                } else {
                    if (isset($imagem)) {
                        
                        if (!empty($imagem)) {
                            
                            if (move_uploaded_file($tmp_name, $path . $imagem)) {
                                while ($row = mysqli_fetch_array($resultado)) {
                                    $files_field = $row['imagem'];
                                    $files_show = "files/$files_field";
                                }
                                unlink($files_show);
                                mysqli_query($connect, "UPDATE filmes SET imagem = '$imagem'  WHERE titulo = '$titulo'");
                                                echo "<script>alert('Imagem Editada!');
                                                        window.location='atualizar_filme.php';
                                                    </script>";
                            }else {
                                echo "<script>alert('Não foi possivel inserir a imagem!');
                                    window.location='atualizar_filme.php';
                                    </script>";
                                        }
                        }else {
                            echo "<script>alert('Imagem não foi colocada porque ainda não deu upload!');
                                window.location='atualizar_filme.php';
                                </script>";
                        }
                    }
                }
            }
        }
        if ($a == 5) {
            $titulo = $_POST['titulo'];
            $video = $_FILES['file2']['name'];
            $tmp_name2 = $_FILES['file2']['tmp_name'];
            $position = strpos($video, ".");
            $fileextension2 = substr($video, $position + 1);
            $fileextension2 = strtolower($fileextension2);
            $path = 'files/';

            $sql = "SELECT * FROM filmes  WHERE titulo = '$titulo'";
            $resultado = mysqli_query($connect, $sql);


            if (mysqli_num_rows($resultado) > 0) {

                $sql = "SELECT * FROM filmes WHERE video ='$video'";
                $result = mysqli_query($connect, $sql);
                if (mysqli_num_rows($result) >= 1) {
                    echo '<script>alert("Nome do video ja em uso na base de dados!");</script>';
                } else {
                    if (isset($video)) {
                        
                        if (!empty($video)) {
                            
                            if (move_uploaded_file($tmp_name2, $path . $video)) {
                                while ($row = mysqli_fetch_array($resultado)) {
                                    $files_field2 = $row['video'];
                                    $files_show2 = "files/$files_field2";
                                }
                                unlink($files_show2);
                                mysqli_query($connect, "UPDATE filmes SET video = '$video'  WHERE titulo = '$titulo'");
                                                echo "<script>alert('Video Editado!');
                                                        window.location='atualizar_filme.php';
                                                    </script>";
                            }else {
                                echo "<script>alert('Não foi possivel inserir o video!');
                                    window.location='atualizar_filme.php';
                                    </script>";
                                        }
                        }else {
                            echo "<script>alert('Video não foi colocado porque ainda não deu upload!');
                                window.location='atualizar_filme.php';
                                </script>";
                        }
                    }
                }
            }
        }    
    }
?>
<html>
    <head>
        <title>Editar filme</title>
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
        .contact-box1{
            width:500px;
            background-color: #fff;
            box-shadow: 0 0 20px 0 #999;
            top: 30%;
            left: 50%;
            transform:translate(-50%,-50%);
            position:relative;
        }
        .contact-box2{
            width:500px;
            background-color: #fff;
            box-shadow: 0 0 20px 0 #999;
            top: 23%;
            left: 50%;
            transform:translate(-50%,-50%);
            position:relative;
        }
        .contact-box3{
            width:500px;
            background-color: #fff;
            box-shadow: 0 0 20px 0 #999;
            top: 23%;
            left: 50%;
            transform:translate(-50%,-50%);
            position:relative;
        }
        .contact-box4{
            width:500px;
            background-color: #fff;
            box-shadow: 0 0 20px 0 #999;
            top: 23%;
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
            <form method="POST" action="atualizar_filme.php?n=1">
                <h2>Formulário para atualização de titulo</h2><br>
                <label id="label">Digite o titulo do filme que deseja alterar : </label>
                <input id="input" class="input-field"type="text" name="titulo" required><br><br>
                            
                <label id="label">Alterar o titulo</label>
                <input id="input" class="input-field"type="text" name="alterar_titulo">

                <div class="center">
                    <button type="submit" class="btn"> Alterar </button>
                </div>
            </form>
        </div>

        <div class="contact-box1">
            <form method="POST" action="atualizar_filme.php?n=2">  
                <h2>Formulário para atualização de descrição</h2><br>  
                <label id="label">Digite o titulo do filme que deseja alterar : </label>
                <input id="input"class="input-field" type="text" name="titulo" required><br><br>
                                
                <label id="label">Alterar o descrição</label>
                <textarea type="text" class="input-field textarea-field" name="descricao" required> </textarea>

                <div class="center">
                    <button type="submit" class="btn"> Alterar </button>
                </div>
            </form>
        </div>

        <div class="contact-box2">
            <form method="POST" action="atualizar_filme.php?n=3">
                <h2>Formulário para atualização de categoria</h2><br>
                <label id="label">Digite o titulo do filme que deseja alterar : </label>
                <input id="input" class="input-field" type="text" name="titulo" required><br><br>

                <label id="label">Alterar a categoria </label>
                <select id="categoria" class="input-field" name="alterar_categoria" >
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

                <div class="center">
                    <button type="submit" class="btn"> Alterar </button>
                </div>
            </form>
        </div>

        <div class="contact-box3">
            <form method="POST" action="atualizar_filme.php?n=4" enctype="multipart/form-data">
                <h2>Formulário para atualização de imagem</h2><br>
                <label id="label">Digite o titulo do filme que deseja alterar : </label>
                <input id="input" class="input-field" type="text" name="titulo" required><br><br>

                <label  for="file">Alterar Imagem : </label>
                <input type="file" name="file" accept=".jpg, .jpeg, .png" required />
                        
                <div class="center">
                    <button type="submit" class="btn"> Alterar </button>
                </div>
            </form>
        </div>
  
        <div class="contact-box4">
            <form method="POST" action="atualizar_filme.php?n=5" enctype="multipart/form-data">
                <h2>Formulário para atualização de video</h2><br>
                <label id="label">Digite o titulo do filme que deseja alterar : </label>
                <input id="input" class="input-field"type="text" name="titulo" required><br><br>

                <label id="label_insercao_atividades" for="file">Alterar Video : </label><br>
                <input type="file" id="button_inserir_atividades" name="file2" accept=".mp4, .AVCHD, .mkv, .mov, .qt .avi, .avchd, .fvl, .swf, .realvideo" required />
                            
                <div class="center">
                    <button type="submit" class="btn"> Alterar </button>
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