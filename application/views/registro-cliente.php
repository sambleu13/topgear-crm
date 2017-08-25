<div class="edit-page">
  <div class="edit">
    <h2><strong>NUEVO CLIENTE</strong></h2>
    <form name="cliente" action="<?php echo base_url();?>principal/registro" method="post" enctype="multipart/form-data">
    	<h3><strong>Cuenta</strong></h3>
        <div class="form-group">
	    	<label>Nombre</label>
	    	<input type="text" name="nombre">
    	</div>
    	<div class="form-group">
	    	<label>Correo</label> 
	    	<input type="text" name="correo" placeholder="user@example.com">
    	</div>
    	<div class="form-group">
	    	<label>Contraseña</label>
	    	<input type="password" name="contrasena">
    	</div>
    	<div class="form-group">
	    	<label>RFC</label>
	    	<input type="text" name="rfc">
    	</div>
    	<div>
    		<label>Edad</label>
    		<input type="text" name="edad">
    	</div>
    	<div>
    		<label>Historial Crediticio</label>
        	<input type="file" name="historial">
        </div>
        <h3><strong>Solicitud</strong></h3>
        <select name="probabilidad">
        	<option value="muybaja">Muy baja</option>
        	<option value="baja">Baja</option>
        	<option value="media">Media</option>
        	<option value="alta">Alta</option>
        	<option value="seguro">Seguro</option>
        </select>
        <select name="estado">
        	<option value="prospecto">Prospecto</option>
        	<option value="cotizacion">Cotización del vehículo</option>
        	<option value="resolucion">Esperando resolución de crédito</option>
        	<option value="aprobado">Aprobado</option>
        	<option value="vendido">Vendido</option>
        	<option value="entregado">Entregado</option>
        	<option value="postventa">Postventa</option>              
        </select>
        <h3>Vehículo</h3>
        <div>
    		<label>Marca</label>
			<input type="text" name="marca">
    	</div>
        <div>
        	<label>Modelo</label>
        	<input type="text" name="modelo" placeholder="Modelo">
        </div>
        <div>
        	<label>Año</label>
	        <input type="text" name="ano" placeholder="Año">
	    </div>
	    <div>
	    	<label>Costo</label>
        	<input type="text" name="costo" placeholder="Costo">
        </div>
      <center><button>Crear cliente</button></center>
    </form>
  </div>
</div>