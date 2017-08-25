<?php 
switch ($solicitud['estado']) {
    case 'prospecto':
            $porcentaje = 10;
        break;
    case 'cotizacion':
            $porcentaje = 26;
        break;
    case 'resolucion':
            $porcentaje = 38;
        break;
    case 'aprobado':
            $porcentaje = 50;
        break;
    case 'vendido':
            $porcentaje = 66;
        break;
    case 'entregado':
            $porcentaje = 82;
        break;
    case 'postventa':
            $porcentaje = 100;
        break;
    default:
            $porcentaje = 100; 
}
    ?>
<div class="table-page">
	<div class="table">
		<div class="page-header">
		    <h2><strong>Solicitud: <?php echo $solicitud['estado']; ?></strong></h2>
		</div>
		<div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $porcentaje; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $porcentaje; ?>%;"><span class="sr-only"><?php echo $porcentaje; ?>% Complete</span>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">probabilidad <?php echo $solicitud['probabilidad']; ?></h3>
            </div>
            <div class="panel-body">
                <p>Marca: <?php echo $solicitud['marca']; ?></p>
                <p>Modelo: <?php echo $solicitud['modelo']; ?></p>
                <p>Costo: <?php echo number_format($solicitud['costo'],2); ?></p>
            </div>
        </div>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>