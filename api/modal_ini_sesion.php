
  <style>
  .modal-header, h4, .close {
    background-color: #5858FA;
    color:white !important;
    text-align: center;
    font-size: 30px;
  }
  .modal-footer {
    background-color: #f9f9f9;
  }
  </style>
</head>
<body>

<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="ini_empr" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          
          <h4 class="justify-content-center"> <i class="fa fa-lock">   </i>    INGRESO   EMPRESAS</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form">
            <div class="form-group">
              <label for="nit_empr">Nit Empresa</label>
                <input type="text"  autofocus name="nit" id="nit" class="form-control" placeholder="nit empresa" required="" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="pass_empr">contraseña</label>
              <input type="password" name="pass" id="pass" class="form-control" placeholder="contraseña" required="">
            </div>
              <button type="button" formmethod="post" class="btn btn-primary btn-block" name="inicio_sesion" id="inicio_sesion">iniciar sesión</button>
              <button type="submit" class="btn btn-danger btn-block" data-dismiss="modal"> Cancelar</button>
              <br>
              <div id="error" class="text-center" > </div>
          </form>
        </div>
      </div>
      
    </div>
  </div> 
</div>
