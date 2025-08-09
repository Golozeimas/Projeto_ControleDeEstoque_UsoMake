<?php 
include "header.php";
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
          <form action="#" method="get" class="form-horizontal">
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
                <select name="role" class="span11">
                    <option value="">usuario</option>
                    <option value="">admin</option>
                    </select>
              </div>
            </div>
            
            <div class="form-actions">
              <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
      </div>
      

        </div>
        </div>

    </div>
</div>


<?php 
include "footer.php";
?>