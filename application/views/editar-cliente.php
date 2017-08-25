<div class="edit-page">
  <div class="edit">
    <h2><strong>EDITAR CUENTA</strong></h2>
    <form name="cliente" action="<?php echo base_url();?>principal/edit_client" method="post" enctype="multipart/form-data">
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
        <div class="form-group">
            <label>RFC</label>
            <input type="text" name="rfc" placeholder="<?php echo $rfc;?>" readonly>
        </div>
        <div>
            <label>Edad</label>
            <input type="text" name="edad" value="<?php echo $edad;?>">
        </div>
        <div>
            <label>Historial Crediticio</label>
            <input type="file" name="historial">
        </div>
        <input type="hidden" value="<?php echo $correo;?>" name="correo" />
      <center><button>Guardar cambios</button></center>
    </form>
  </div>
</div>