<?php
require_once ('conexion.php');
foreach ($_REQUEST as $var => $val) {
  $$var=$val;
}

 /* $nit_empr = $_POST['nit_empr'];
  $r_s_empr = $_POST['r_s_empr'];
  $dir_empr = $_POST['dir_empr'];
  $id_ciudad = $_POST['id_ciudad'];
  $telf_empr = $_POST['telf_empr'];
  $email_empr = $_POST['email_empr'];*/
  //$pass_empr_dos =sha1( $_POST['pass_empr_dos']);       

$insertar = mysqli_query($conexion,"INSERT INTO empresa (nit_empr, r_s_empr, dir_empr, id_ciudad, telf_empr, email_empr, pass_emp) 
VALUES ('$nueve', '$dos', '$tres', '$cuatro', '$cinco', '$seis','$ocho')");
              
            if (mysqli_affected_rows($conexion)> 0){
             ?>
              <script type="text/javascript">
                $(document).ready(function(){

                  swal({
                    title: "Perfecto !",
                    text: "Registro Exitoso",
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
                      $("body").load("index.php");                    
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
                    title: "Error !",
                    text: "algo salio mal",
                    icon: "error",
                    button: false,
                    timer: 2200;
                  });
                });
              </script>
             <?php
            }
        ?>