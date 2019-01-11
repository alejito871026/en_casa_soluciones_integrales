
<div  id="suscribirse" class="jumbotron text-center">	
	<h1 id="sus">REGISTRESE</h1>
</div>

<div class="container-fluid text-center">
		<div class="container-fluid">
			<h2>ESTAS A PUNTO DE DESCUBRIR UN MUNDO DE SOLUCIONES <br>DISEÑADAS PARA USTED</h2>
			<BR><BR><BR>
		</div>
		<div  class="row">
			<div class="col-lg-3"></div>
			<form id="ini_sesion" class="col-lg-6" method="post">
				
				<input type="hidden" name="vnit" id="vnit">
				<input type="hidden" name="vpass" id="vpass">
				<input type="hidden" name="vpassigual" id="vpassigual">

				<div class="form-group" >
					<div class="input-group " >
						<h5>NIT EMPRESA: </h5>&nbsp&nbsp&nbsp&nbsp<input type="text"  id="nueve" name="nueve" class="form-control" required=""  autocomplete="off" style="border-left:none;border-right:none; border-top:none;">
                			<div class="input-group-btn">
                  				<button type="button" class="btn btn-warning" id="rr" ><i class="fa fa-exclamation-circle" style="color:white;"></i></button>
                			</div>
              		</div>              		
              	</div>					
					<div class="form-group">
						<div class="input-group " >
						<h5>RAZóN SOCIAL: </h5>&nbsp&nbsp&nbsp&nbsp<input type="text" id="dos" name="dos" class="form-control" required="" autocomplete="off" style="border-left:none;border-right:none; border-top:none">
					</div>
					</div>
		        	<div class="form-group">
		        		<div class="input-group " >
						<h5>	DIRECCION: </h5>&nbsp&nbsp&nbsp&nbsp<input type="text"  id="tres" name="tres" class="form-control" required="" autocomplete="off" style="border-left:none;border-right:none; border-top:none">
					</div>
					</div>
					<div class="form-group"> 
					<div class="input-group " >     		
				    	<H5>CIUDAD: </h5>&nbsp&nbsp&nbsp&nbsp<select name="cuatro" id="cuatro" class="form-control" style="border-left:none;border-right:none; border-top:none">
				        	<option value=""></option>
				        		<?php
				          			$ciudad = $conexion->query("SELECT * FROM ciudad");	          
				          			while ($city = mysqli_fetch_array($ciudad)) {
				            			//echo "<option value='".$city['id_ciudad']."'>".$city['nombre_ciudad']."</option>";
				          		?>
				          				<option value="<?php echo $city['id_ciudad'];?>"><?php echo $city['nom_ciudad']; ?> </option>
				          		<?php
				          			}
				      			?>
				     	 </select>
				     	</div>
				    </div>						
					<div class="form-group">
						<div class="input-group " >
					    <H5>TELEFONO: </h5>&nbsp&nbsp&nbsp&nbsp<input type="text"  id="cinco" name="cinco" class="form-control" required="" autocomplete="off" style="border-left:none;border-right:none; border-top:none;">
					</div>
					</div>
					<div class="form-group">
						<div class="input-group " >
					    <H5>EMAIL: </h5>&nbsp&nbsp&nbsp&nbsp<input type="email"  id="seis" name="seis" class="form-control"  required="" autocomplete="off" style="border-left:none;border-right:none; border-top:none">
					</div>
					</div>
					<div class="form-group">
						<div class="input-group">
		                     <H5>CONTRASEÑA: </h5>&nbsp&nbsp&nbsp&nbsp<input type="password"  autocomplete="off" id="siete" name="siete" class="form-control" required="" minlength="6"  maxlength="14" data-toggle="tooltip" title="letras, numeros y mas de 6 caracteres!" style="border-left:none;border-right:none; border-top:none">
					                <div class="input-group-btn">
					                  <button type="text" class="btn btn-warning" id="ss"> <i class="fa fa-exclamation-circle" style="color:white;"></i></button>
			                		</div>
			                		<div class="input-group-btn">
					                  <button type="text" class="btn btn-warning" id="col"><i class="fa fa-exclamation-circle" style="color:white;"></i></button>
			                		</div>
			                		<div class="input-group-btn">
					                  <button type="text" class="btn btn-warning" id="let"><i class="fa fa-exclamation-circle" style="color:white;"></i></button>
			                		</div>
			                		<div class="input-group-btn">
					                  <button type="text" class="btn btn-warning" id="num"><i class="fa fa-exclamation-circle" style="color:white;"></i></button>
			                		</div>
			              </div>
			              <div id="co">	</div>
					</div>	
										
					<div class="form-group">
						<div class="input-group">
							<H5>REPETIR CONTRASEÑA: </h5>&nbsp&nbsp&nbsp&nbsp<input type="password"  id="ocho" name="ocho" class="form-control"  required="" autocomplete="off" style="border-left:none;border-right:none; border-top:none">
								<div class="input-group-btn">
									<button type="text" class="btn btn-warning" id="contr"><i class="fa fa-exclamation-circle" style="color:white;"></i></button>
								</div>
						</div>
					</div>
					<br>								
			  		<div class="text-center"><!--Paso 3></!-->
						<button type="button" class="btn btn-primary" id="registrarse">Registrarse</button>
							<a href="#jumboini" class="btn btn-success"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atrás</a><!--Paso 4></!-->
			  		</div>
			</form>
			<div class="col-lg-3"></div>
		</div>
		<br><br>
</div>
<?php /*este div recibe el resultado de la inserccion de los datos de la empresa en la base de*/ ?>
<div id="muestra"></div> 
<?php /*este script envia el nit que se esta digitando a la pagina validanit.php y recibe en el campo con id rr la respuesta de la validacion para saber si esta registrado o no el nit  */ ?>
<script type="text/javascript">
    $('#nueve').on("keyup", function(e){
        $("#nueve").each(function(){
        	  nit = $(this).val();
        	  if (nit!="") {
        	  	$.ajax({
				url:'validanit.php',
				type:'POST',
				dataType:'json',
				data:{
				nit:nit},
				})
				.done(function(respuesta){
					if(respuesta.respu=='ok'){
						$("#rr").html('<i class="fa fa-check" style="color: green;"></i>');
						$("#vnit").val(0);

					}else{
						$("#rr").html('<i class="fa fa-times" style="color: red"></i> ');
						$("#vnit").val(1);
					}                				
			})
			}else{
				$("#rr").html("<i class='fa fa-exclamation-circle' style='color:white'></i>");
			}
		});
   });
</script>

<?php /*este script compara los datos insertados en el campo con id siete cuando el campo id ocho  se encuentre con algun texto digitado verificando la iguadad de las contraseñas*/ ?>
<script type="text/javascript">
  $(document).ready(function(){
    $("#siete").keyup(function(){
    	contra =$("#siete").val();
    	contras =$("#ocho").val();
    	if (contra!=contras) {
    		$("#contr").html("<i class='fa fa-times' style='color: red'></i>");
    		$("#vpass").val(1);
    	}else{
    		$("#contr").html("<i class='fa fa-check' style='color: green'></i>");
    		$("#vpass").val(0);
    	}
    	
    	
    	});
	});
</script>
<?php  /* este script compara el id ocho con lo que se a insertado en el id siete verificando la igualdad de los mismos y enviando una alerta si no son iguales*/ ?>
<script type="text/javascript">
  $(document).ready(function(){
    $("#ocho").keyup(function(){
    	contra =$("#siete").val();
    	contras =$("#ocho").val();
    	if (contra!=contras) {
    		$("#contr").html("<i class='fa fa-times' style='color: red'></i>");
    		$("#vpass").val(1);
    	}else{
    		$("#contr").html("<i class='fa fa-check' style='color: green'></i>");
    		$("#vpass").val(0);
    	}
    	if ($("#ocho").val()=="") {
    		$("#contr").html("<i class='fa fa-exclamation-circle' style='color:white;'></i>");
    	}
    	});
	});
</script>
<?php /* este escrip verifica que los datos insertados en el campo de la contraseña con id siete contengan letras, numeros, mas de 6 y meos de 14 caracteres */ ?>
<script type="text/javascript">
	 $(document).ready(function(){
	 	$("#siete").on("keyup", function(e){
	 		var aprov=1;
	 		$("#ss").html('<i class="fa fa-times" style="color: red"></i>');
	 		var z=$("#col").html($("#siete").val().length);
	 		var x=$("#siete").val();
	 		
	 		if (x.match(/[^a-z]/)) {
	 			var aprov=2;
    		$("#num").html("<i class='fa fa-hashtag' style='color:green'></i>");
			}else{
				$("#num").html("<i class='fa fa-hashtag' style='color:red'></i>");
			}
			if (x.match(/[^0-9]/)) {
				var aprova=3;
    		$("#let").html("<i class='fa fa-font' style='color:green'></i>");
			}else{
				$("#let").html("<i class='fa fa-font' style='color:red'></i>");
			}
			 if($("#siete").val().length>=6 && aprov == 2 && aprova ==3){
				$("#ss").html(' <i class="fa fa-check" style="color: green"></i> ');
				$("#col").css("color","green");
				$("#vpassigual").val(0);
			}else{
				$("#col").css("color","red");
				$("#vpassigual").val(1);
			}	
			if (x=="") {
	 			var aprov=1;	
	 		$("#num").html("<i class='fa fa-exclamation-circle'style='color:white'></i>");
	 		$("#let").html(" <i class='fa fa-exclamation-circle' style='color:white'></i> ");
	 		$("#ss").html(" <i class='fa fa-exclamation-circle' style='color:white'></i> ");
	 		$("#col").html(" <i class='fa fa-exclamation-circle' style='color:white'></i>");
	 		}
	 			
	 	});	
   });
</script>
<?php /* este script recibe todos los datos de los imputs del formulario de registro y verifica que ninguno este vacio, que se cumplan las condiciones para enviar los datos a agrega_empresa.php que se encargara de guardar la informacion en la base de datos mediante la variable de serializacin data.*/ ?>
<script type="text/javascript">
  $(document).ready(function(){
    $("#registrarse").click(function(){
      nit_empr=$("#nueve").val();
      r_s_empr=$("#dos").val();
      dir_empr=$("#tres").val();
      id_ciudad=$("#cuatro").val();
      telf_empr=$("#cinco").val();
      email_empr=$("#seis").val();
      pass_empr=$("#siete").val();     
      pass_empr_dos=$("#ocho").val();
      var vnit=$("#vnit").val();
      var vpassigual=$("#vpassigual").val();
      var vpass=$("#vpass").val();
	 var data=$("#ini_sesion").serialize();       
      	pass=pass_empr.length;
      if (nit_empr=="" || r_s_empr=="" || dir_empr=="" || id_ciudad=="" || telf_empr=="" || email_empr=="" || pass_empr=="" || pass_empr_dos==""){
       swal({
  				title: "Error!",
  				text: "ningun campo debe estar vacio",
  				icon: "error",
  				button: false,
  				timer: 2000,
				});

   		}else{ 
	  		if(vnit==0 && vpass==0 && vpassigual==0){
	      $.ajax({
		    url:'agrega_empresa.php',
		    type:'POST',
		    dataType:'html',
		    data:data
		    /*{
		      nit_empr:nit_empr,
		      r_s_empr:r_s_empr,
		      dir_empr:dir_empr,
		      id_ciudad:id_ciudad,
		      telf_empr:telf_empr,
		      email_empr:email_empr,
		      pass_empr_dos:pass_empr_dos}*/,
		    })
	      .done(function(respuesta){
		    $("#muestra").html(respuesta);
		   }) 
	  	}else{
	  		if ($("#vnit").val()==1) {
	  			swal({
  				title: "Error!",
  				text: "este nit ya esta registrado",
  				icon: "error",
  				button: false,
  				timer: 2000,
				});	
	  		}
	  		if ($("#vpass").val()==1) {
	  			
	  			swal({
  				title: "Error!",
  				text: "las contraseñas no son iguales",
  				icon: "error",
  				button: false,
  				timer: 2000,
				});	
	  		} 
	  		if ($("#vpassigual").val()==1) {
	  			
	  			swal({
  				title: "Error!",
  				text: "debes cumplir con lo requerido en la contraseña",
  				icon: "error",
  				button: false,
  				timer: 2000,
				});
	  		}
	  	}
	  }
 	});
});
</script>

<?php /*este script muetra en pantalla un aviso sobre las condiciones para el registro de la contraseña*/ ?>
<script type="text/javascript">
	 $(document).ready(function(){
    	$('#siete').on("focus", function(e){
    			$("#co").html("<button class='btn btn-success'> debe contener numeros, letras, mas de 6 y menos de 14 caracteres</button>").show(300).delay(3000).hide(500);
    		
    		
		});	
   });
</script>
