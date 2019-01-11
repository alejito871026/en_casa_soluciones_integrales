<?php require ('encabezado.php'); 
	  require_once ('conexion.php'); ?>
<body id="body_index" data-spy="scroll" data-target=".navbar" data-offset="60">
<?php require_once ('barrainicio.php');?>
    
  <div class="jumbotron text-center" id="jumboini">
    <h1>EN <i class="fa fa-home"></i></a></h1> 
      <h3>Soluciones integrales</h3>
    <?php require_once ('carousel.php'); ?>
  </div>

    <input type="hidden" name="nite" id="nite">
    <input type="hidden" name="passe" id="passe">
    <input type="hidden" name="entrar" id="entrar">
  <?php  
    require_once ('conocenos.php'); 
    require_once ('servicios.php'); 
    require_once ('suscri_empresa.php');
    require_once ('modal_ini_sesion.php');
    /*require_once 'modal_ini_sede.php';
    require_once 'modal_ini_empleado_sede.php';
    
    require_once 'modal_ini_sesion_empleado.php'
  */?>  


<footer id="footer">
  <CENTER>pie de pagina</CENTER>
</footer>
<script type="text/javascript" src="js/js.js"></script>
</body>
</html>