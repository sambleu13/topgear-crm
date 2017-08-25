	<nav class="navbar" role="navigation" id="navegacion">
		<div class="navbar-header"> TOPGEAR </div>
		<ul class="nav navbar-right top-nav nav-pills">
	    	<li>
	    		<a href="<?php echo base_url(); ?>portal"><i class="fa fa-fw fa-home"></i>  Portal</a>
	    	</li>
	    	<li>
	       		<a href="<?php echo base_url(); ?>portal/archivos"><i class="fa fa-fw fa-file"></i> Documentos</a>
	        </li>
	        <li>
	       		<a href="<?php echo base_url(); ?>portal/mensajear"><i class="fa fa-fw fa-envelope"></i> Mensajes</a>
	        </li>
	        <li class="dropdown">
	            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	                <i class="fa fa-user"></i> <strong><?php echo $nombre;?> </strong><b class="caret"></b>
	            </a>
	            <ul class="dropdown-menu">
	                <li>
	                    <center></i> <?php echo $correo; ?></center>
	                </li>
	                <li>
	                    <a href="<?php echo base_url(); ?>portal/editar_cliente"><i class="fa fa-fw fa-edit"></i> Editar</a>
	                </li>
	                <li class="divider"></li>
	                <li>
	                    <a href="<?php echo base_url(); ?>principal/logout"><i class="fa fa-fw fa-power-off"></i> Salir</a>
	                </li>
	            </ul>
	        </li>
	    </ul>
	</nav>