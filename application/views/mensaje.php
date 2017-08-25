<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <title>Resultado</title>
    <link rel="stylesheet" href="<?php echo base_url();?>/css/estilos.css">
</head>

<body>

  <h1>Resultado de la solicitud</h1>
    <span><?php echo $mensaje;?></span>
    <div>
      <a href="<?php echo $url;?>">Continuar</a>
    </div>

</body>
</html>