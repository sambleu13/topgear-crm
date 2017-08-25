<div class="table-page">

	<div class="table">
<div class="table-responsive">
	        <table class="table table-bordered table-hover">
	            <thead>
	                <tr>
	                    <th>Vendedor</th>
	                    <th>Nombre</th>
	                    <th>Correo</th>
	                    <th>Eliminar</th>
	                </tr>
	            </thead>
	            <tbody>
	                <?php
	                $contador = 0;
					if($vendedores->num_rows() > 0):
						foreach($vendedores->result() as $vendedor):
							$contador ++;
						?>
					<tr>
						<td><?php echo $contador; ?></td>
						<td><?php echo $vendedor->nombre; ?></td>
						<td><?php echo $vendedor->correo; ?></td>
						<td>
							<a href="<?php echo base_url(); ?>portal/eliminar?$vendedor['correo']"><i class="fa fa-fw fa-trash"></i></a>
						</td>
					</tr>
					<?php
						endforeach;?> 

					</tbody>
	        </table>
						<?php
						else : 
					?>
							<div class="no-resultados">
								No se encontraron productos
							</div>
					<?php
						endif;
						?>     
	    </div>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>