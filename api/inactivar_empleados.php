<?php  
 require_once 'conexion.php';
 
     $cc=$_POST['cc_e_emp'];
     $no="no";
     
     $actualizar = "UPDATE emp_empresa SET emp_activo='$no' where cc_e_emp='$cc'";
	$resultado=$conexion->query($actualizar);
     
    if (mysqli_affected_rows($conexion)> 0){
             ?>
              <script type="text/javascript">
                $(document).ready(function(){

                  swal({
                    title: "Perfecto !",
                    text: "Usuario inactivo",
                    icon: "success",
                    buttons: {
                    catch: {
                      text: "continuar",
                      value: "catch",
                      },
                    },
                  })
                  .then((value) => {
                    switch (value) {
                      case "catch":
                     document.location.href='inicio_empresa.php';
                    }
                  })
                });
              </script>
             <?php
            }else{
              ?>
              <script type="text/javascript">
                $(document).ready(function(){

                  swal({
                    title: "error!",
                    text: "Algo salio mal",
                    icon: "error",
                    buttons: {
                    catch: {
                      text: "continuar",
                      value: "catch",
                      },
                    },
                  })
                  .then((value) => {
                    switch (value) {
                      case "catch":
                      document.location.href='inicio_empresa.php';
                    }
                  })
                });
              </script>
             <?php
            }
?>
