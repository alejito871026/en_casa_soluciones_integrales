<?php require_once 'conexion.php';



if (isset($_POST['ver'])) {
  $l= $_POST['ver'];
?>


  <div class="form-group col-lg-12 text-center">
      <div class="form-group">
            <?php
              $empresa = $conexion->query("SELECT * FROM emp_empresa where cc_e_emp=$l");           
              $emp = mysqli_fetch_array($empresa);
                          //echo "<option value='".$city['id_ciudad']."'>".$city['nombre_ciudad']."</option>";
            ?>
            <div class="form-group"><h6>NOMBRE Y APELLIDOS:</h6><?php echo $emp['nombre_e_emp']; echo(" "); ?><?php echo $emp['apellido_e_emp'];?></div>
            <?php
            ?>
      </div>
      
      <div class="form-group">
            <?php
              $empresa = $conexion->query("SELECT * FROM emp_empresa where cc_e_emp=$l");           
              $emp = mysqli_fetch_array($empresa);
                          //echo "<option value='".$city['id_ciudad']."'>".$city['nombre_ciudad']."</option>";
            ?>
            <div class="form-group"><h6>CEDULA #:</h6><?php echo $emp['cc_e_emp']; ?> </div>
            <?php
            ?>
      </div>
      <div class="form-group">
            <?php
              $empresa = $conexion->query("SELECT * FROM emp_empresa where cc_e_emp=$l");           
              $emp = mysqli_fetch_array($empresa);
                          //echo "<option value='".$city['id_ciudad']."'>".$city['nombre_ciudad']."</option>";
            ?>
            <div class="form-group"><H6>TELEFONO: </H6><?php echo $emp['telf_e_emp']; ?> </div>
            <?php
            ?>
      </div>
      <div class="form-group">
            <?php
              $empresa = $conexion->query("SELECT * FROM emp_empresa as a  inner join empresa as b where a.cc_e_emp=$l and a.nit_empr=b.nit_empr");           
              $emp = mysqli_fetch_array($empresa);
                          //echo "<option value='".$city['id_ciudad']."'>".$city['nombre_ciudad']."</option>";
            ?>
            <div class="form-group"><h6>EMPRESA:</h6><?php echo $emp['r_s_empr']; ?> </div>
            <?php
            ?>
      </div>
      <div class="form-group">
            <?php
              $empresa = $conexion->query("SELECT * FROM emp_empresa where cc_e_emp=$l");           
              $emp = mysqli_fetch_array($empresa);
                          //echo "<option value='".$city['id_ciudad']."'>".$city['nombre_ciudad']."</option>";
            ?>
            <div class="form-group"><H6>EMAIL:</H6><?php echo $emp['email_e_emp']; ?> </div>
            <?php
            ?>
      </div>      
    </td>
  </tbody>
  <?php
   ?>
  </table>
             <?php
              $empresa = $conexion->query("SELECT cc_e_emp FROM emp_empresa where cc_e_emp='$l'");           
              $emp = mysqli_fetch_array($empresa);
            ?>

        <CENTER><button class="btn btn-danger"  id="inactivar_empl" name="inactivar_empl" value="<?php echo $emp['cc_e_emp'];?>"><i class='fa fa-trash' aria-hidden='true'></i>eliminar empleado</button></CENTER>

  <?php
    }else{
      ?>
        <div class="text-right">
          <a >< no coincide con los datos</a>
        </div>
      <?php
    }
  ?>
  </div>
</div>

<script type="text/javascript">
     $(document).ready(function(){
  $("#inactivar_empl").click(function(e){
    $("#inactivar_empl").each(function(){
        var cc_e_emp = $("#inactivar_empl").val();   
          $.ajax({
        url:'inactivar_empleados.php',
        type:'POST',
        dataType:'html',
        data:
        {
          cc_e_emp:cc_e_emp},
        })
        .done(function(valor){
          $("#inactivado").html(valor);          
      })  
    });
  })
});
</script>
