<?php
    require('config.php');
    $sql_numero_notificacao = "SELECT * FROM notificacao WHERE status = '0'";
    $query_numero_notificacao = mysqli_query($conexao, $sql_numero_notificacao);
    $rows = mysqli_num_rows($query_numero_notificacao);
    echo $rows;
?>