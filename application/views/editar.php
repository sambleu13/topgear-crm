<div class="edit-page">
  <div class="edit">
    <h2><strong>EDITAR CUENTA</strong></h2>
    <form name="vendedor" action="<?php echo base_url();?>principal/edit" method="post">
    	<div class="form-group">
    	<label>Nombre</label>
    	<input type="text" name="nombre" value="<?php echo $nombre;?>">
    	</div>
    	<div class="form-group">
    	<label>Correo</label> 
    	<input type="text" name="read" placeholder="<?php echo $correo;?>" id="readonly" readonly>
    	</div>
    	<div class="form-group">
    	<label>Contraseña</label>
    	<input type="password" name="contrasena">
    	</div>
        <input type="hidden" value="<?php echo $correo;?>" name="correo" />
    	<center><button>Guardar cambios</button></center>
    </form>
  </div>
</div>