<?php 
//conexao com o BD
include_once 'conexao_try_catch.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"/>
    <link rel="shortcut icon" href="imagens/favicon.ico"/>
    <title>Celke - LEFT JOIN</title>
</head>

<body>

    <h1>LEFT JOIN - Recupera registro de duas tabelas</h1>

    <?php 
        /*
        A clausula LEFT JOIN permite obter não apenas os dados relacionamento de duas tebelas, mas tambem os dados não relacionados.
    
        SELECT column_name
        FROM table_name1
        LEFT JOIN table_name2 ON
        table_name1.column_name =
        table_name2.column_name;
        */
        $query_usuarios = "SELECT usr.id, usr.nome, usr.email,
        ende.logradouro AS log_ende, ende.numero AS num_ende,
        cont.celular AS cel_cont
        /*Erro: O browser não retornava devido uma virgula.*/
            FROM usuarios AS usr 
            LEFT JOIN enderecos AS ende ON ende.usuario_id = usr.id
            LEFT JOIN contatos AS cont ON cont.usuario_id = usr.id
            ORDER BY usr.id ASC";
        $result_usuarios = mysqli_query($conn, $query_usuarios);


        while ($row_usuario = mysqli_fetch_assoc($result_usuarios)){
            /*echo "<pre>";
            var_dump($row_usuario);
            echo "</pre>";*/
            extract($row_usuario);
            echo "Id do usuario: $id <br>";
            echo "Nome do usuario: $nome <br>";
            echo "E-mail do usuario: $email <br>";
            echo "Endereço: $log_ende $num_ende <br>";
            echo "Celular: $cel_cont <br>";
            echo "<hr>";
        }
    ?>

</body>
</html>