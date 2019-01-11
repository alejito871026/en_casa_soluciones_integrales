<?php   require_once 'conexion.php';
 
     $cc=$_POST['cc'];
     
      $buscar="SELECT cc_e_emp FROM emp_empresa WHERE cc_e_emp='$cc'";
      $resultado = $conexion->query($buscar);
    if($resultado->num_rows == 0) {
      $data['respu']='ok';
    }else{
      $data['respu']='error';
    }
  echo json_encode($data);

?>
