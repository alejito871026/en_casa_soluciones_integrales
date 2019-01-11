//este codigo jquery ha sido descargado desde	https://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_theme_company_complete_animation
//sirve para animar el desplazamineto de la pagina inicial entre los diferenes botones
$(document).ready(function(){

  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });

  $(window).scroll(function() {
    $(".slideanim").each(function(){

      var pos = $(this).offset().top;
      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {

          $(this).addClass("slide");
        }
    });
  });
});
//fin del codigo descargado

//esta funcion es para iniciar sesion cada inmobiliaria.
//se validan que los campos no esten vacios y que coorespondan como tal a una inmobiliaria creada;
//si el nit es erroneo o si la contaseña es erronea envia boton de alerta.
//si es correcta la informacion sera direccionado a la pagina de inicio reservada para empresas "inicio_empresa.php"
//
$(document).ready(function(){
  $("#inicio_sesion").click(function(e){
    $("#inicio_sesion").each(function(){
      var nit_empr=$("#nit").val();
      var pass_empr=$("#pass").val();
      var total=nit_empr.length*pass_empr.length;
    if ( total>0) {
          $.ajax({
          url:'ini_empresa.php',
          type:'POST',
          dataType:'json',
          data:{
          nit:nit_empr,
          pass:pass_empr},
        })
        .done(function(valor){
          if(valor.r=='nite'){
            $("#error").html('<button class="btn btn-danger btn-block">nit no registrado </button>').show(300).delay(3000).hide(500);
            $("#nit").focus();

          }else if (valor.r=='pase') {
            $("#error").html('<button class="btn btn-danger btn-block">password erroneo </button>').show(300).delay(3000).hide(500);
            $("#pass").focus();
            //esta linea nos envia al lik inicio_empresa.php cuando los valores inexados son correctos
          }else if (valor.r=='logeado') {
            document.location.href='inicio_empresa.php';
          }
        })
       }else{
        $("#error").html('<button class="btn btn-danger btn-block">ningun campo debe estar vacio</button>').show(300).delay(3000).hide(500);
        $("#nit").focus();
      }
    });
  });
});
$(document).ready(function(){
  $("#myBtn").click(function(){
    $("#myModal").modal();
  });
});







