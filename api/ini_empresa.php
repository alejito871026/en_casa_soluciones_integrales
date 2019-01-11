<?php
  require_once 'conexion.php';

  $u = $_REQUEST['nit'];
  $u = $u;
  $c = $_REQUEST['pass'];
  $c = $c;
  $admin='administrador';
  $data=array();
      $buscar="SELECT * FROM empresa WHERE nit_empr='$u' and nit_empr!=''";
      $resultado = $conexion->query($buscar);
    if($resultado->num_rows <1) {
      $data['r']='nite';
      }else{
      $buscar2="SELECT * FROM empresa WHERE nit_empr='$u' AND pass_emp='$c'";
      $si_existe=$conexion->query($buscar2);
      if ($si_existe->num_rows<1) {
      $data['r']='pase';
      }else{
        $_SESSION['nit']=$u;
        $_SESSION['pass']=$c;
        $_SESSION['usuario']=$admin;
        $data['r']='logeado'; 
        
        
      }
}
  echo json_encode($data);

?>