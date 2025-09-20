<?php 
include "header.php";
include "../user/connection.php"
?>


<div id="content">

    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Home" class="tip-bottom"><i class="icon-home"></i>
            Adicionando novo usuário</a></div>
    </div>
   

   
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
             <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Cadastrar novo usuário</h5>
        </div>
        <div class="widget-content nopadding">
          <form name="form1" action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Primeiro nome:</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Primeiro nome:" name="firstname" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Ultimo nome:</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Ultimo nome:" name="lastname"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Nome do usuário:</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="Usuário" name="username"  />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Senha:</label>
              <div class="controls">
                <input type="password"  class="span11" placeholder="senha" name="password"  />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">selecione o cargo::</label>
              <div class="controls">
                <select name="role" id="role" class="span11">
                    <option value="user">usuario</option>
                    <option value="admin">admin</option>
                    </select>
              </div>
            </div> 
            
            <div class="alert alert-danger" id="errorUser" style="display: none;">
                  Esse usuário já existe! Por favor, tente outro!
                </div>   
                    
            
            <div class="form-actions">
              <button type="submit" name="submit1" class="btn btn-success">Salvar</button>
                </div>

                 
                <div class="alert alert-success" id="success" style="display: none;">
                  Usuário criado com sucesso!
                </div>

                
            </form>
        </div>        
      </div>
      <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th> Primeiro nome </th>
                  <th> Sobrenome </th>
                  <th> Nome de usuário </th>
                  <th> Cargo </th>
                  <th> Status </th>
                  <th> Editar </th>
                  <th> Deletar </th>
                </tr>
              </thead>
              <tbody>
                <?php
                $res = mysqli_query($link, "select * from user_registration"); // seleciono a tabela do banco de dados

                while($row=mysqli_fetch_array($res)){ // leras linhas da tabela do banco, e as transforma em arrays
                  ?>
                  <tr>
                  <td><?php echo $row["firstname"]?></td>
                  <td><?php echo $row["lastname"]?></td>
                  <td><?php echo $row["username"]?></td>
                  <td class="center"><?php echo $row["role"]?></td>
                  <td class="center"><?php echo $row["status"]?></td>
                  <td><a href="edit_user.php?id=<?php echo $row["id"]?>"> Editar </a></td>
                  <td><a href="delete_user.php?id=<?php echo $row["id"]; ?>"> Deletar </a></td>
                </tr>
                  <?php
                }

                ?>
              </tbody>
            </table>
          </div>

        </div>
        </div>

    </div>
</div>

<?php

if(isset($_POST["submit1"])){

  $username = mysqli_real_escape_string($link,$_POST["username"]);
  $count = 0;
  $res = mysqli_query($link,"SELECT * FROM user_registration WHERE username = '$username' ");
  $count = mysqli_num_rows($res);

  if($count>0){
    ?>
    <script type="text/javascript">
      
      document.getElementById("success").style.display = "none";
      document.getElementById("errorUser").style.display = "block";
      
      </script>
    <?php
  }
  else{
    mysqli_query($link,"INSERT INTO user_registration values(null, '$_POST[firstname]', '$_POST[lastname]', '$_POST[username]','$_POST[password]', '$_POST[role]','active') ");
     ?>
    <script type="text/javascript">
      
      document.getElementById("errorUser").style.display = "none";
      document.getElementById("success").style.display = "block";
      setTimeout(function(){
        window.location.href = window.location.href;
      }, 3000);

      </script>
    <?php
  }

}

?>

<?php 
include "footer.php";
?>