
<?php  /* este query recibe por medio de jquiery la variable nit que se esta tecleandp en el imput con id nueve del formulario de registro de empresas y verifica que el nit no exista y enviando una alerta  */
 require_once 'conexion.php';
if (isset($_POST['nit'])) {  
     $nit=$_POST['nit'];
      $buscar="SELECT nit_empr FROM empresa WHERE nit_empr='$nit' and nit_empr!=''";
      $resultado = $conexion->query($buscar);
    if($resultado->num_rows == 0) {
      $data['respu']='ok';
    }else{
      $data['respu']='error';
    }

  echo json_encode($data);
}
?>
