<div id="muestra_empleados_inactivos">
            <br><br>
  <?php  
    $m_emp=" SELECT * FROM emp_empresa AS A INNER JOIN empresa  AS B ON A.nit_empr=$nit and B.nit_empr=$nit and emp_activo='no'";
    $empleado = $conexion -> query($m_emp);
      if($empleado ->num_rows > 0) {
      ?>
        <div class="jumbotron col-lg-12" style="background-color:#5858FA" >
          <CENTER><h2> EMPLEADOS INACTIVOS <?php echo  $emp['r_s_empr'] ;?></h2></CENTER>
        </div>
        <div class="col-lg-12">
          <table class="table table-hover" id="prueba">
            <thead>
              <tr>
                <div id="inactivado"></div>
                 
                <br>
              </tr> 
              <tr class="text-center">
                <th></th>
                <th></th>
                <th class="text-center">#</th>
                <th class="text-center">CC</th>
                <th class="text-center">NOMBRE</th>
                <th class="text-center">TELEFONO</th>
                <th class="text-center">EMAIL</th>
                <th class="text-center">OPCIONES</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
             <?php   
              $ttt=0;    
               while ($emplead= $empleado->fetch_assoc()) {
                $ttt++;
             ?>
                <td></td>
                <td></td>
                <td class='text-center'>  <?php echo $ttt;?></td>
                <td class='text-center'>  <?php echo $emplead ['cc_e_emp'];?></td>
                <td class='text-center'>  <?php echo $emplead ['nombre_e_emp'];?>  <?php echo $emplead ['apellido_e_emp'];?></td>
                <td class='text-center'>  <?php echo $emplead ['telf_e_emp'];?></td>
                <td class='text-center'>  <?php echo $emplead ['email_e_emp'];?></td>
                <td class='text-center'>
                  <button class="btn btn-warning" type='submit'  id="cedulados" name="cedulados" value="<?php echo $emplead['cc_e_emp'];?>"  href='#'  data-toggle='modal' data-target='#ver_empleado_inactivo'><i class='fa fa-eye' aria-hidden='true'></i></button>
                </td>
                <td></td>
                <td></td>
            </tbody>
              <?php
                }
               ?>
          </table>
            <div class="text-center"><a type="button" data-toggle="tooltip"  title="atraz" class="btn btn-warning text-right" id="atraz">Cerrar Inactivos <i class="fa fa-arrow-left" aria-hidden="true"></i></a></div>
            <br><br>
            <?php
            }else{
              ?>
                <div class="jumbotron" style="background-color:#5858FA" >
                  <CENTER><h2> EMPLEADOS INACTIVOS <?php echo  $emp['r_s_empr'] ;?></h2></CENTER>
                </div>
                <div class="text-center"><h2>No existen empleados inactivos</h2>
                  <br><br>
               <a type="button" data-toggle="tooltip"  title="atraz" class="btn btn-warning text-right" id="atraz">Cerrar Inactivos <i class="fa fa-arrow-left" aria-hidden="true"></i></a></div><br><br>
              <?php
            }
          ?>
    </div>
</div