<?php
include('conexion.php');
if(isset($_SESSION['nit'])==false or isset($_SESSION['pass'])==false or isset($_SESSION['usuario'])==false){
  header('Location: index.php');
}else if ($_SESSION['usuario']=='administrador'){
    $nit=$_SESSION['nit'];
    $empresa = $conexion->query("SELECT * FROM empresa where nit_empr='$nit'");            
    $emp = mysqli_fetch_array($empresa);
  } else if ($_SESSION['usuario']=='empleado') {
    header('Location: inicio_empresa_empleado.php');
  }  else if ($_SESSION['usuario']=='adsede') {
    header('Location: inicio_sede.php');
  }else if ($_SESSION['usuario']=='emp_sede') {
    header('Location:inicio_empresa_empleado_sede.php');
  }else if ($_SESSION['nit']=='87102654860') {
    header('Location:inicio_empresa_empleado_sede.php');
  }
?>
<?php 
require_once 'encabezado.php';?>

<nav class="navbar navbar-expand-md  navbar-dark sticky-top">
  <a class="navbar-brand" href="">EN <i class="fa fa-home"></i> Soluciones Integrales</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end " id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a href="#" id="ver_emp" class="nav-link"><i class="fa fa-users" aria-hidden="true"></i> empleados</a></li>
      </li>
      <li class="nav-item">
        <a href="#" id="por_cot" class="nav-link"><i class="fa fa-files-o" aria-hidden="true"></i>
           por Cotizar</a>
      </li>
      <li class="nav-item">
        <a href="#"id="por_aprovar_empresa" class="nav-link"><i class="fa fa-files-o" aria-hidden="true"></i>Contratos por Aprobar</a>
      </li> 
      <li class="nav-item">
        <a href="#" class="nav-link">Contratos en ejecucion</a>
      </li>  
       <li class="nav-item">
        <a href="#" class="nav-link">Contratos terminados</a>
      </li>
       <li class="nav-item">
        <a href="#" class="nav-link">Contratos no aceptados</a>
      </li> <li class="nav-item">
        <a href="cerrar_sesion.php" class="nav-link">salir</a>
      </li> 
    </ul>
  </div>  
</nav>



<div class="jumbotron text-center" style="background-color:#5858FA" id="ejecutandose">
  <h2 style="color:white">Contratos En Ejecucion: <?php echo  $emp['r_s_empr'] ;?></h2>
  <div class="container-fluid text-center">
    <form class="navbar-form " action="/action_page.php">
        <div class="input-group ">
          <input type="text" autofocus="autofocus" id="" name="direccion" class="form-control" placeholder="buscar direccion">
            <div class="input-group-btn">
              <a  class="btn btn-default"><i class="glyphicon glyphicon-search"></i></a>
            </div>
        </div>
    </form>
  </div>
</div>



<div class="jumbotron text-center" id="finalizados" style="background-color:#5858FA">
  <h2 style="color:white">Contratos Finalizados: <?php echo  $emp['r_s_empr'] ;?></h2>
  <div class="container-fluid text-center">
    <form class="navbar-form " action="/action_page.php">
      <div class="input-group ">
        <input type="text" autofocus="autofocus" id="direccion" name="" class="form-control" placeholder="buscar direccion">
          <div class="input-group-btn">
            <a  class="btn btn-default"><i class="glyphicon glyphicon-search"></i></a>
          </div>
        </div>
      </form>
    </div>
</div>



<div id="muestra_empleados">
  <?php  
    $m_emp=" SELECT * FROM emp_empresa AS A INNER JOIN empresa  AS B ON A.nit_empr=$nit and B.nit_empr=$nit and emp_activo='si'";
    $empleado = $conexion-> query($m_emp);
      if($empleado -> num_rows > 0) {
      ?>
        <div class="jumbotron" id="jumboini" >
          <CENTER><h2> EMPLEADOS <?php echo  $emp['r_s_empr'];?> </h2></CENTER>
        </div>
        <div class="col-lg-12">
          <table class="table table-hover" id="prueba">
            <thead>
              <tr>
                 <div class="text-center">
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#crear_emp"><i class="fa fa-plus" aria-hidden="true"> Empleado</i></a>               
                  <a type="button" data-toggle="tooltip"  title="regresar" class="btn btn-warning text-right" id="3">Regresar <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                </div>
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
              $tt=0;    
               while ($emplead= $empleado->fetch_assoc()) {
                $tt++;
                $r=$emplead ['cc_e_emp'];
             ?>
             <td></td>
              <td></td>
                <td class='text-center'>  <?php echo $tt;?></td>
                <td class='text-center'>  <?php echo $r;?></td>
                <td class='text-center'>  <?php echo $emplead ['nombre_e_emp'];?>  <?php echo $emplead ['apellido_e_emp'];?></td>
                <td class='text-center'>  <?php echo $emplead ['telf_e_emp'];?></td>
                <td class='text-center'>  <?php echo $emplead ['email_e_emp'];?></td>
                <td class='text-center'>
                    <button class="btn btn-warning" type='submit'  id="cedula" name="cedula" value="<?php echo $emplead['cc_e_emp'];?>"  href='#'  data-toggle='modal' data-target='#ver_empleado'><i class='fa fa-eye' aria-hidden='true'></i></button>
                    
                </td>
                <td></td>
              <td></td>
            </tbody>
              <?php
                }
               ?>
          </table>
          <div class="text-center">
            <button class="btn btn-primary" id="cargar_inactivos">Empleados Inactivos</button>        
                </div> 
                <br><br>
            <?php
            require_once ('inactivos.php');
            }else{
              ?>
                <div class="jumbotron" style="background-color:#5858FA" >
                  <CENTER><h2> EMPLEADOS <?php echo  $emp['r_s_empr'];?></h2></CENTER>
                </div>
                <div class="text-center"><h3>No exiten empleados registrados</h3></div>


                <div class="text-center">
                  <div class="text-center" id="acc">
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#crear_emp"><i class="fa fa-plus" aria-hidden="true"> Empleado</i></a>
                
                  <a type="button" data-toggle="tooltip"  title="regresar" class="btn btn-warning" id="3">Regresar <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                </div>
                <br><br>
            <button class="btn btn-primary" id="cargar_inactivos">Empleados Inactivos</button>
            <br><br>
          </div>
              <?php
              require_once ('inactivos.php');

            }
          ?>
    </div>
</div>


<CENTER><div id="agregada" class="col-lg-12"></div></CENTER>
<div id="mostrando"></div>
<div id="inactivado"></div>
<input type="hidden" name="pass_emp" id="pass_emp">

<div id="ver_empleado" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#5858FA">
        <h1 class="modal-title text-center col-lg-12" style="color:white" >Informacion Detallada</h1>
      </div>
      <div class="modal-body col-lg-12">
        <div class="container text-center" id="ver_activo"></div>
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>    
      </div>
    </div>
  </div>
</div>

<div id="ver_empleado_inactivo" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#5858FA">
        <h1 class="modal-title text-center col-lg-12" style="color:white">Informacion Detallada</h1>
      </div>
      <div class="modal-body col-lg-12">
        <div class="container text-center" id="ver_inactivo"></div>
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>        
      </div>
    </div>
  </div>
</div>

<div class="modal fade col-md-12" id="crear_emp">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header jumbotron" id="jumboini">
        <h2 class="text-center">Agregar Empleado</h2>
      </div>
        <div class="modal-body">          
            <form id="ingreso" method="post" action="">
              <div class="container" id="ingreso" >
                  <div class="col-lg-12"><!--Paso 7 para que quede centrado></!-->
                    <div class="form-group">                      
                        <div class="input-group"> 
                          <h5>Cedula: &nbsp &nbsp &nbsp &nbsp</h5><input type="text"  autofocus name="cc_e_emp" id="cc_e_emp" class="form-control" style="border-left:none;border-right:none; border-top:none;" >                            
                          <button type="button" class="btn btn-warning" id="ccaprov"><i class="fa fa-exclamation-circle"></i></button>
                        </div>
                        <div id="noaprov" class="btn-danger"></div>
                      <div class="input-group"> 
                          <h5>Nombres: &nbsp &nbsp &nbsp &nbsp</h5><input type="text"  autofocus name="nombre_e_emp" id="nombre_e_emp" class="form-control" style="border-left:none;border-right:none; border-top:none;" >
                        </div>
                      
                      <div class="input-group"> 
                          <h5>Apellidos: &nbsp &nbsp &nbsp &nbsp</h5><input type="text"  autofocus name="apellido_e_emp" id="apellido_e_emp" class="form-control" style="border-left:none;border-right:none; border-top:none;" >
                        </div>
                  

                      <div class="input-group"> 
                          <h5>Contraseña: &nbsp &nbsp &nbsp &nbsp</h5><input type="password"  autofocus name="passuno" id="passuno" class="form-control" style="border-left:none;border-right:none; border-top:none;" >
                        </div>
                      

                      <div class="input-group"> 
                          <h5>Repetir Contraseña: &nbsp &nbsp &nbsp &nbsp</h5><input type="password"  autofocus name="passdos" id="passdos" class="form-control" style="border-left:none;border-right:none; border-top:none;" >
                      </div>

                      <div class="input-group"> 
                          <h5>Cargo: &nbsp &nbsp &nbsp &nbsp</h5>
                          <select name="id_cargo" id="id_cargo" class="form-control" " style="border-left:none;border-right:none; border-top:none;">
                            <option value=""></option>
                            <?php
                              $empresa = $conexion->query("SELECT * FROM cargo");           
                                while ($emp = mysqli_fetch_array($empresa)) {
                                        //echo "<option value='".$city['id_ciudad']."'>".$city['nombre_ciudad']."</option>";
                            ?>
                              <option value="<?php echo $emp['id_cargo'];?>"><?php echo $emp['nom_cargo']; ?> </option>
                            <?php
                            }
                            ?>
                          </select>      
                      </div>

                      <div class="input-group"> 
                          <h5>Telefono: &nbsp &nbsp &nbsp &nbsp</h5><input type="text"  autofocus name="telf_e_emp" id="telf_e_emp" class="form-control" style="border-left:none;border-right:none; border-top:none;" >
                      </div>

                      <div class="input-group"> 
                          <h5>Empresa: &nbsp &nbsp &nbsp &nbsp</h5>
                          <select name="nit_empr" class="form-control" id="nit_empr" style="border-left:none;border-right:none; border-top:none;">
                              <?php
                                $empresa = $conexion->query("SELECT * FROM empresa where nit_empr=$nit");            
                                  $emp = mysqli_fetch_array($empresa);
                                        //echo "<option value='".$city['id_ciudad']."'>".$city['nombre_ciudad']."</option>";
                                  ?>
                                  <option value="<?php echo $emp['nit_empr'];?>"><?php echo $emp['r_s_empr']; ?> </option>
                                  <?php
                              ?>
                            </select>
                      </div>

                      <div class="input-group"> 
                          <h5>Email: &nbsp &nbsp &nbsp &nbsp</h5><input type="text"  autofocus name="email_e_emp" id="email_e_emp" class="form-control" style="border-left:none;border-right:none; border-top:none;" >
                      </div>
                                          
              
                  <div class="text-center">
                    <br><br><!--Paso 3></!-->
                    <button type="button" formmethod="post" class="btn btn-primary" id="crear_empleado">Crear Empleado</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                  </div>
                  <div id="empleado_agregado" class="text-center"></div>
                 
              </div>
            </div> 
           </div>   
              <br>
            </form>            
        </div>
    </div>  
  </div>
  
</div>

<?php 
/*<div id="ver_por_cotizar" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title text-center">Editar Informacion</h1>
      </div>
      <div class="modal-body">
        <div class="container text-center" id="mostrando_por_cotizar"></div>
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>        
      </div>
    </div>
  </div>
</div>



<div id="por_cotizar">
  <?php
    $m_emp=" SELECT * FROM contrato  as  A inner join inmueble as B inner join emp_empresa as C  on A.nit_empr=$nit and B.nit_empr=$nit and C.nit_empr=$nit and A.id_inmueble=B.id_inmueble and A.cc_e_emp=C.cc_e_emp and cotizado='no'";
    $empleado = $conexion->query($m_emp);
    if($empleado ->num_rows > 0) {
  ?>
    <div class="jumbotron" id="jumboini" >
      <CENTER><h2> Contratos por Cotizar <?php echo  $emp['r_s_empr'] ;?></h2></CENTER>
    </div>
      <div class="col-lg-12">
        <table class="table table-hover">
          <thead>
            <tr>
              <div class="text-center">
                <a type="button" data-toggle="tooltip"  title="regresar" class="btn btn-warning" id="3">Regresar <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
              </div>
            </tr>
            <br>  
            <tr>
              <th></th>
               <th></th>
              <th class='text-center'>#</th>
              <th class='text-center'>CONTRATO N°</th>
              <th class='text-center'>FECHA</th>
              <th class='text-center'>DIRECCION INMUEBLE</th>
              <th class='text-center'>EMPLEADO</th>
              <th class='text-center'>DESCRIPCION</th>
              <th class='text-center'>VER CONTRATO</th>
              <th></th>
               <th></th>
            </tr>
          </thead>
          <tbody>
            <?php  
              $t=0;     
              while ($emplead= $empleado->fetch_assoc()) {
                $t++;
            ?>
              <td></td>
              <td></td>
              <td class='text-center'>  <?php echo $t;?></td>
              <td class='text-center'>  <?php echo $emplead ['id_contrato'];?></td>
              <td class='text-center'>  <?php echo $emplead ['fecha'];?></td>
              <td class='text-center'>  <?php echo $emplead ['dir_inmb'];?></td>
              <td class='text-center'>  <?php echo $emplead ['nombre_e_emp'];?>  <?php echo $emplead ['apellido_e_emp'];?></td>
              <td class='text-center'>  <?php echo $emplead ['descripcion'];?></td>
              <td class='text-center'>
                <button class="btn btn-warning" type='submit'  id="ver_x_cot" name="ver_x_cot" value="<?php echo $emplead['cc_e_emp'];?>"  href='#'  data-toggle='modal' data-target="#ver_por_cotizar"><i class='fa fa-eye' aria-hidden='true'></i></button>
              </td>
              <td></td>
              <td></td>
          </tbody>
            <?php
             }
            ?>
      </table>
            <?php
         }else{
            ?>
            <div class="jumbotron" id="jumboini" >
              <CENTER><h2> EMPLEADOS <?php echo  $emp['r_s_empr'] ;?> </h2></CENTER>
            </div>
            <div class="text-right">
              <a type="button" data-toggle="tooltip"  title="regresar" class="btn btn-warning" id="3">Regresar <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
            </div>
            <?php
            }
            ?>
    </div>
 </div>

<div id="por_aprovar_emp">
  <?php
    $m_emp=" SELECT * FROM contrato  as  A inner join inmueble as B  on A.nit_empr=$nit and B.nit_empr=$nit and A.id_inmueble=B.id_inmueble  and cotizado='si'";
    $empleado = $conexion->query($m_emp);
    if($empleado ->num_rows > 0) {
  ?>
    <div class="jumbotron" id="jumboini" >
      <CENTER><h2> contratos <?php echo  $emp['r_s_empr'] ;?> </h2></CENTER>
    </div>
      <div class="col-lg-12">
        <table class="table table-hover">
          <thead>
            <tr>
              <div class="text-center">
                <a type="button" data-toggle="tooltip"  title="regresar" class="btn btn-warning" id="3">Regresar <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
              </div>
            </tr>
            <br>  
            <tr>
              <th>  </th>
              <th>  </th>
              <th class='text-center'>Contrato N°</th>
              <th class='text-center'>fecha cotizacion</th>
              <th class='text-center'>direccion inmueble</th>
              <th class='text-center'>ver contrato</th>
              <th>  </th>
              <th>  </th>
            </tr>
          </thead>
          <tbody>
            <?php       
              while ($emplead= $empleado->fetch_assoc()) {
            ?>
            <td>  </td>
            <td>  </td>
              <td class='text-center'>  <?php echo $emplead ['id_contrato'];?></td>
              <td class='text-center'>  <?php echo $emplead ['fecha_cotizado'];?></td>
              <td class='text-center'>  <?php echo $emplead ['dir_inmb'];?></td>
              <td class='text-center'>
                <button class="btn btn-warning" type='submit'  id="ver_x_cot" name="ver_x_cot" value="<?php echo $emplead['cc_e_emp'];?>"  href='#'  data-toggle='modal' data-target="#ver_por_cotizar"><i class='fa fa-eye' aria-hidden='true'></i></button>
             </td>
             <td> </td>
             <td> </td>
          </tbody>
            <?php
             }
            ?>
      </table>
            <?php
         }else{
            ?>
            <div class="jumbotron" id="jumboini" >
              <CENTER><h2> EMPLEADOS <?php echo  $emp['r_s_empr'] ;?> </h2></CENTER>
            </div>
            <div class="text-right">
              <a type="button" data-toggle="tooltip"  title="regresar" class="btn btn-warning" id="3">Regresar <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
            </div>
            <?php
            }
            ?>
    </div>
 </div>





<div class="modal fade" id="crear_contrato">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <h1 class="text-center">Agregar contrato</h1>
        </div>
        <div class="modal-body">
            <div class="container  col-lg-12">
              <form id="ingreso" method="post" action="">
                <div class="container" id="ingreso" >
                  <div class="col-md-5">
                    <br><br>
                      <div class="col-lg-12">
                        <select name="id_inmueble" id="id_inmueble" class="form-control">
                            <option value="">direccion</option>
                             <option value="0">debe crear el inmueble</option>
                              <?php
                                  $casa = $conexion->query("SELECT * FROM inmueble where nit_empr=$nit");
                                  if (mysqli_num_rows($casa)!=0){
                                    while ($inm = mysqli_fetch_array($casa)) {
                                    //echo "<option value='".$city['id_ciudad']."'>".$city['nombre_ciudad']."</option>";
                                ?>
                                    <option value="<?php echo $inm['id_inmueble'];?>"><?php echo $inm['dir_inmb']; ?> </option>
                                    
                                <?php
                                  }
                                }
                                  
                              ?>
                        </select>
                   </div>
                    <div class="col-lg-12 " name="agr_inmb " id="agr_inmb" class="form-control"></div>
                      <div class="col-lg-12"><!--Paso 7 para que quede centrado></!-->
                          <div class="form-group">
                            <div class="form-group"> 
                              <label for="nombre">Empresa</label>         
                              <select  class="form-control" name="nit_empr" id="nit_empr">
                              <?php
                                $empresass = $conexion->query("SELECT * FROM empresa where nit_empr=$nit");            
                                $empr = mysqli_fetch_array($empresass);
                                ?>
                                  <input type="text" name="" class="form-control" value="<?php echo $empr['nit_empr'];?>"><?php echo $empr['r_s_empr']; ?> >
                                <?php  ?>
                              </select>
                            </div>
                          <div>
                            <label for="nombre">Empleado</label>
                            <select  class="form-control" name="ccc" id="ccc">
                              <option value="">empleado</option>
                              <?php
                                $empresa = $conexion->query("SELECT * FROM emp_empresa where nit_empr=$nit");            
                                while ($emp = mysqli_fetch_array($empresa)) {
                                ?>
                                  <option value="<?php echo $emp['cc_e_emp'];?>"><?php echo $emp['nombre_e_emp']; ?>  <?php echo $emp['apellido_e_emp']; ?> </option>
                                <?php 
                              }
                                 ?>
                              </select>
                          </div>
                          <div class="form-group">
                            <label for="nombre">Descripcion</label>
                            <textarea type="text" name="descripcion" id="descripcion" class="form-control" placeholder="describe e problema" required=""></textarea>
                          </div>
                        </div> 
                        <div class="text-center"><!--Paso 3></!-->
                          <button type="button" formmethod="post" class="btn btn-primary" id="ccont">Crear contrato</button>
                          <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>  
              </form> 
            </div>  
          </div>
        <div class="modal-footer"></div>
         <br><CENTER><div id="contrato_agregado"></div></CENTER>
      </div> 
    </div>
  </div>




        <div class="modal fade" id="agrega_inmueble">
          <div class="modal-dialog">
              <div class="modal-content">
              
                <!-- Modal Header -->
                <div class="modal-header">
                  <br><br>
                  <h1 class="text-center">agregar inmueble</h1>
                </div>
                <div class="modal-body">
            <div class="container  col-lg-12">
              <form id="ingreso" method="post" action="">
                <div class="container" id="ingreso" >
                  <div class="col-md-5">
                    <br><br>

                            <div class="col-lg-12"><!--Paso 7 para que quede centrado></!-->
                                <div class="form-group">
                                  

                                  <div class="form-group">
                                    <label for="dir_inmb">direccion</label>
                                       <input type="text"  autofocus name="dir_inmb" id="dir_inmb" class="form-control" placeholder="Ej:cr, cll, diag, trsv" required="">
                                </div>
                                <div class="form-group"> 
                                  <label for="nombre">Empresa</label>         
                      <select name="nit_empresa" class="form-control" id="nit_empresa">
                            <?php
                                  $empresass = $conexion->query("SELECT * FROM empresa where nit_empr=$nit");            
                                     $empr = mysqli_fetch_array($empresass)
                                  //echo "<option value='".$city['id_ciudad']."'>".$city['nombre_ciudad']."</option>";
        ?>
                              <option value="<?php echo $nit?>"><?php echo $empr['r_s_empr']?> </option>
                              <?php
                                
                            ?>
                      </select>
                    </div>
                                <div class="form-group">
                                    <label for="nombre">Nombre propietario</label>
                                    <input type="text" name="nom_prop" id="nom_prop" class="form-control" placeholder="" required="">
                                </div>
                                <div class="form-group">
                                    <label for="nombre">Apellidos propietario</label>
                                    <input type="text" name="ape_prop" id="ape_prop" class="form-control" placeholder="" required="">
                                </div>
                                <div class="form-group"> 
                                  <label for="nombre">CC propietario</label>
                                  <input type="text" name="cc_prop" id="cc_prop" class="form-control" placeholder="" required=""> 
                                </div>
                                <div class="form-group">
                                    <label for="nombre">email</label>
                                    <input type="email" name="email_prop" id="email_prop" class="form-control" placeholder="email" required="">
                                </div>
                             </div> <br>
                              <div class="text-center"><!--Paso 3></!-->
                                    <button type="button" formmethod="post" class="btn btn-primary" id="agregar_inmueble">Crear Inmueble</button>
                                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                              </div>
                              
                    </div>
                  </div>  
                <br><br>
             </form> 
             </div>  
              </div>               
                <div class="modal-footer">                  
                </div>
                
               
              </div>  
              </div>
          </div>
          */ ?>
 </div>
  <footer id="footer">
 <CENTER>pie de pagina</CENTER>
</footer>
<script type="text/javascript" src="js/jsempresa.js"></script>