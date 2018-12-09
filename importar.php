<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="main.js"></script>
</head>
<body>
    <?php
        $conn = new mysqli("localhost", "root", "", "db_csv");
        mysqli_set_charset($conn,"utf8");

        $arquivo = $_FILES['file']['tmp_name'];
        $nome = $_FILES['file']['name'];

        $ext = explode(".", $nome);

        $extensao = end($ext);

        if($extensao !== "csv"){
            echo '<div class="alert alert-danger" role="alert">
                    Extensão de arquivo inválida !
                </div>';
        }else{
            $objeto = fopen($arquivo, 'r');

            while(($dados = fgetcsv($objeto, 1000, ';')) !== FALSE){
                $nome = utf8_encode($dados[0]);
                $email = utf8_encode($dados[1]);
                
                $result = $conn->query("INSERT INTO contatos (nome,email) VALUES ('$nome', '$email')");

            }
            if($result){
                
                echo '<div class="alert alert-success" role="alert">
                   Arquivo importado com sucesso !
                </div>';
                fclose($objeto);
            }else{
                echo '<div class="alert alert-danger" role="alert">
                    Erro ao inserir os dados, favor tente novamente !
                </div>';
                fclose($objeto);
            }
        }
    ?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

