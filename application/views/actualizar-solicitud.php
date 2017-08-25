<div class="register-page">
  <div class="register">
    <h2><strong>Solicitud</strong></h2>
    <form name="cliente" action="<?php echo base_url();?>principal/registro" method="post">
    	<h3><strong>Cuenta</strong></h3>
        <input type="text" name="nombre" placeholder="Nombre">
        <input type="text" name="correo" placeholder="Cuenta">
        <input type="password" name="contrasena" placeholder="Contrasena">
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
        <input type="text" name="marca" placeholder="Marca">
        <input type="text" name="modelo" placeholder="Modelo">
        <input type="text" name="ano" placeholder="Año">
        <input type="text" name="costo" placeholder="Costo">
      <button>Crear cliente</button>
    </form>
  </div>
</div>