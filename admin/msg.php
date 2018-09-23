<?php                    
  $sql = "SELECT * FROM contato, notificacao WHERE contato.idcontato = notificacao.idcontato AND notificacao.status = 0 ORDER BY contato.idcontato desc";
  $query = mysqli_query($conexao, $sql);
 
    while ($dados = mysqli_fetch_assoc($query)) {
      echo '<li><!-- start message -->
          <div class="pull-left">
            <img src="image/mail.jpg" class="img-circle" alt="User Image">
          </div>
          <h4>
          '.$dados['nome'].'
          </h4>
          <p>'.$dados['mensagem'].'</p>
        </li>
        <!-- end message -->';
      }

?>
      