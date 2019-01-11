<?php require_once 'conexion.php';



if (isset($_POST['verdos'])) {
  $l= $_POST['verdos'];
?>


  <div class="form-group col-lg-12 text-center">
      <div class="form-group">
          <label for="nombre">Nombre</label>
            <?php
              $empresa = $conexion->query("SELECT * FROM emp_empresa where cc_e_emp=$l");           
              $emp = mysqli_fetch_array($empresa);
                          //echo "<option value='".$city['id_ciudad']."'>".$city['nombre_ciudad']."</option>";
            ?>
            <div class="form-group"><?php echo $emp['nombre_e_emp']; ?> </div>
            <?php
            ?>
      </div>
      <div class="form-group">
          <label for="nombre">ApellidoS</label>
            <?php
              $empresa = $conexion->query("SELECT * FROM emp_empresa where cc_e_emp=$l");           
              $emp = mysqli_fetch_array($empresa);
                          //echo "<option value='".$city['id_ciudad']."'>".$city['nombre_ciudad']."</option>";
            ?>
            <div class="form-group"><?php echo $emp['apellido_e_emp']; ?> </div>
            <?php
            ?>
      </div>
      
      <div class="form-group">
          <label for="nombre">cedula</label>
            <?php
              $empresa = $conexion->query("SELECT * FROM emp_empresa where cc_e_emp=$l");           
              $emp = mysqli_fetch_array($empresa);
                          //echo "<option value='".$city['id_ciudad']."'>".$city['nombre_ciudad']."</option>";
            ?>
            <div class="form-group"><?php echo $emp['cc_e_emp']; ?> </div>
            <?php
            ?>
      </div>
      <div class="form-group">
          <label for="nombre">telefono</label>
            <?php
              $empresa = $conexion->query("SELECT * FROM emp_empresa where cc_e_emp=$l");           
              $emp = mysqli_fetch_array($empresa);
                          //echo "<option value='".$city['id_ciudad']."'>".$city['nombre_ciudad']."</option>";
            ?>
            <div class="form-group"><?php echo $emp['telf_e_emp']; ?> </div>
            <?php
            ?>
      </div>
      <div class="form-group">
          <label for="nombre">empresa</label>
            <?php
              $empresa = $conexion->query("SELECT * FROM emp_empresa as a  inner join empresa as b where a.cc_e_emp=$l and a.nit_empr=b.nit_empr");           
              $emp = mysqli_fetch_array($empresa);
                          //echo "<option value='".$city['id_ciudad']."'>".$city['nombre_ciudad']."</option>";
            ?>
            <div class="form-group"><?php echo $emp['r_s_empr']; ?> </div>
            <?php
            ?>
      </div>
      <div class="form-group">
          <label for="nombre">email</label>
            <?php
              $empresa = $conexion->query("SELECT * FROM emp_empresa where cc_e_emp=$l");           
              $emp = mysqli_fetch_array($empresa);
                          //echo "<option value='".$city['id_ciudad']."'>".$city['nombre_ciudad']."</option>";
            ?>
            <div class="form-group"><?php echo $emp['email_e_emp']; ?> </div>
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

        
        
        <button class="btn btn-success"  id="reactivar_emp" name="reactivar_emp" value="<?php echo $emp['cc_e_emp'];?>"><i class="fa fa-recycle"></i>  Reactivar Empleado</button>

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
  $("#reactivar_emp").click(function(e){
    $("#reactivar_emp").each(function(){

          var cc_e_emp = $("#reactivar_emp").val();   
        alert(cc_e_emp);
          $.ajax({
        url:'reactivar_empleado.php',
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