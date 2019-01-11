<?php
require_once('conexion.php');

  $cc_e_emp = $_POST['cc_e_emp'];
  $nombre_e_emp = $_POST['nombre_e_emp'];
  $apellido_e_emp = $_POST['apellido_e_emp'];
  $passdos = $_POST['passdos'];
  $id_cargo = $_POST['id_cargo'];
  $telf_e_emp = $_POST['telf_e_emp'];
  $nit_empr = $_POST['nit_empr'];
  $email_e_emp = $_POST['email_e_emp'];

  $data=array();

		$insertar = mysqli_query($conexion,"INSERT INTO emp_empresa (cc_e_emp,nombre_e_emp,apellido_e_emp,contrasena,telf_e_emp,nit_empr,email_e_emp) VALUES ('$cc_e_emp','$nombre_e_emp','$apellido_e_emp','$passdos','$telf_e_emp','$nit_empr','$email_e_emp')");

    $insertardos=mysqli_query($conexion,"INSERT INTO emp_cargo (id_cargo,cc_e_emp)VALUES('$id_cargo','$cc_e_emp')");



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
                      $("body").load("inicio_empresa.php");
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
                      $("body").load("inicio_empresa.php");
                    }
                  })
                });
              </script>
             <?php
            }
?>