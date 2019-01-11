

$(document).ready(function(){
	$("#ejecutandose").show();
    $("#finalizados").show();
	$("#muestra_empleados").hide();
	$("#muestra_empleados_inactivos").hide();	
});


$(document).ready(function(){
  $(document).on("click",'#ver_emp',function(){
    $("#muestra_empleados").show();
    $("#ejecutandose").hide();
    $("#finalizados").hide();
  })
});

$(document).ready(function(){
  $(document).on("click",'#cargar_inactivos',function(){
    $("#muestra_empleados_inactivos").show();
  })
});
$(document).ready(function(){
  $(document).on("click",'#3',function(){
     $("#ejecutandose").show();
    $("#finalizados").show();
    $("#muestra_empleados_inactivos").hide();
    $("#muestra_empleados").hide();
  })
});
$(document).ready(function(){
  $(document).on("click",'#atraz',function(){    
    $("#muestra_empleados_inactivos").hide();
  })
});


$(ver_empleado());
  function ver_empleado(ver){
    $.ajax({
      url:'ver_empleado.php',
      type:'POST',
      dataType:'html',
      data:{ver: ver},
    })
    .done(function(respuesta){
      $("#ver_activo").html(respuesta);
    })
    .fail(function(){
      console.log("error");
    })
  }

  $(document).ready(function(){
  $(document).on("click",'#cedula',function(){
    valor = $(this).val();
    if (valor!="") {
       ver_empleado(valor);
    }else {
      ver_empleado();
     }
    })
  });




  $(fdd());
 function fdd(verdos){
    $.ajax({
      url:'ver_empleado_inactivo.php',
      type:'POST',
      dataType:'html',
      data:{verdos: verdos},
    })
    .done(function(respuesta){
      $("#ver_inactivo").html(respuesta);
    })
    .fail(function(){
      console.log("error");
	})
}
$(document).ready(function(){
   $(document).on("click",'#cedulados',function(){
	valor = $(this).val();
    if (valor!="") {
       fdd(valor);
	 }else {
       fdd();
   	 }
   })
});

$(document).ready(function(){
    $("#passdos").keyup(function(){
      contra =$("#passuno").val();
      contras =$("#passdos").val();
      if (contra!=contras) {
        $("#pass_emp").val(1);
      }else{

        $("#pass_emp").val(0);
      }
      });
  });
$(document).ready(function(){
    $("#passuno").keyup(function(){
      contra =$("#passuno").val();
      contras =$("#passdos").val();
      if (contra!=contras) {
        $("#pass_emp").val(1);
      }else{
        $("#pass_emp").val(0);
      }
      });
  });

$('#cc_e_emp').on("keyup", function(e){
        $("#cc_e_emp").each(function(){
        	var ccaprov=$('#ccaprov').val();
        	
            cc = $(this).val();
            nittt= $("#nit_empr").val();
            if (cc!="") {
              $.ajax({
        url:'validacc.php',
        type:'POST',
        dataType:'json',
        data:{
        cc:cc},
        })
        .done(function(respuesta){
          if(respuesta.respu=='ok'){
            $("#ccaprov").html('<i class="fa fa-check" style="color: green;" ></i>');            
            $("#ccaprov").val(5);
            $("#noaprov").hide();
             }else{
            $("#ccaprov").html('<i class="fa fa-times" style="color: red;" ></i> ');
            $("#ccaprov").val(6);
            $("#noaprov").show();
            $("#noaprov").html('<p>esta cedula ya se encuentra registrada</p>').show(300).delay(2500).hide(400);
            
          }                       
      })
      }else{
        $("#ccaprov").html('<i class="fa fa-exclamation-circle"></i>');
         $("#noaprov").hide();
      }
    });
   });

$(document).ready(function(){
  $("#crear_empleado").click(function(e){
    $("#crear_empleado").each(function(){

          var cc_e_emp = $("#cc_e_emp").val();
          var nombre_e_emp = $("#nombre_e_emp").val();
          var apellido_e_emp =$("#apellido_e_emp").val();
          var passuno=$("#passuno").val();
          var passdos=$("#passdos").val();
          var id_cargo =$("#id_cargo").val();
          var telf_e_emp =$("#telf_e_emp").val();
          var nit_empr =$("#nit_empr").val();
          var email_e_emp =$("#email_e_emp").val();
          var pass_emp=$("#pass_emp").val();
          var ccaprov=$("#ccaprov").val();
          var total = cc_e_emp.length*nombre_e_emp.length*apellido_e_emp.length*passuno.length*id_cargo.length*telf_e_emp.length*nit_empr.length*email_e_emp.length;
    	alert(ccaprov);
    	
    if ( total>0 && pass_emp==0 && ccaprov==5) {

      alert(ccaprov);
          $.ajax({
        url:'agregar_empleado.php',
        type:'POST',
        dataType:'html',
        data:
        {
          cc_e_emp:cc_e_emp,
          nombre_e_emp:nombre_e_emp,
          apellido_e_emp:apellido_e_emp,
          passdos:passdos,
          id_cargo:id_cargo,
          telf_e_emp:telf_e_emp,
          nit_empr:nit_empr,
          email_e_emp:email_e_emp},
        })
        .done(function(respuesta){
        $("#empleado_agregado").html(respuesta);
       })
      }else{
      	if (total=="") {
      		$("#empleado_agregado").html('<button class="btn btn-danger">ningun campo debe estar vacio</button>').show(300).delay(3000).hide(500);
        } else{
        	if (ccaprov==6) {
    		$("#empleado_agregado").html('<button class="btn btn-danger">debes escribir una cedula valida</button>').show(300).delay(3000).hide(500);
    	}else{
        if (pass_emp==1) {
          $("#empleado_agregado").html('<button class="btn btn-danger">las contraseñas no coinciden</button>').show(300).delay(3000).hide(500);
        	}
       	 }
        }
      }
    });
  })
});


