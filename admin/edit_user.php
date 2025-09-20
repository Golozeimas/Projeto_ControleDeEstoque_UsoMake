<?php 
include "header.php";
include "../user/connection.php";
$id = $_GET["id"];

$res = mysqli_query($link,"SELECT * FROM user_registration WHERE id=$id");
$firstname = "";
$lastname = "";
$username = "";
$password = "";
$role = "";
$status = "";
while($row = mysqli_fetch_array($res)){
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $username = $row['username'];
    $password = $row['password'];
    $role = $row['role'];
    $status = $row['status'];
}
?>


<div id="content">

    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Home" class="tip-bottom"><i class="icon-home"></i>
            Página Principal</a></div>
    </div>
   

   
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
           <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Editar usuário</h5>
        </div>
        <div class="widget-content nopadding">
          <form name="form1" action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Primeiro nome:</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Primeiro nome:" name="firstname" value="<?php echo $firstname; ?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Ultimo nome:</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Ultimo nome:" name="lastname" value="<?php echo $lastname; ?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Nome do usuário:</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="Usuário" name="username" readonly value="<?php echo $username; ?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Senha:</label>
              <div class="controls">
                <input type="password"  class="span11" placeholder="senha" name="password" value="<?php echo $password; ?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">selecione o cargo::</label>
              <div class="controls">
                <select name="role" id="role" class="span11">
                    <option value="user" <?php if($role =="user") echo "selecionado"; ?>>usuario</option>
                    <option value="admin" <?php if($role =="admin") echo "selecionado"; ?>>admin</option>
                    </select>
              </div>
            </div>

             <div class="control-group">
              <label class="control-label">selecione o cargo::</label>
              <div class="controls">
                <select name="role" id="role" class="span11">
                    <option value="user" <?php if($status =="active") echo "selecionado"; ?>>ativo</option>
                    <option value="admin" <?php if($status =="inactive") echo "selecionado"; ?>>inativo</option>
                    </select>
              </div>
            </div> 
            
                    
            <div class="form-actions">
              <button type="submit" name="submit1" class="btn btn-success"> Salvar alterações</button>
                </div>

                 
                <div class="alert alert-success" id="success" style="display: none;">
                  Usuário mudado com sucesso!
                </div>

                
            </form>
        </div>        
      </div>
        </div>

    </div>
</div>

<?php
if(isset($_POST["submit1"]))
{
mysqli_query($link,"UPDATE user_registration SET firstname='$_POST[firstname]',lastname='$_POST[lastname]',password='$_POST[password]',role='$_POST[role]',status='$_POST[role]' WHERE id=$id ") or die(mysqli_error($link));
?>
<script type="text/javascript">
      
    
      document.getElementById("success").style.display = "block";
      setTimeout(function(){
        window.location="add_new_user.php";
      }, 3000);

      </script>
<?php
}


include "footer.php";