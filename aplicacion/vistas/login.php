<?php 
$p=1;
$usuario = get_cookie('usuario');
$clave = get_cookie('clave');
if (isset($usuario) && isset($clave)) {
  $valusuario = "value='".$usuario."'";
  $valclave = "value='".$clave."'";
} else {
  $valusuario = "";
  $valclave = "";
}
?>
<script type="text/javascript">//alert("<?php echo $valusuario; ?>")</script>
<body class="login-img3-body">
  <div class="container">
    <div class="row">
      <div class = "col-md-4 col-md-offset-4">
        <form action="" method="post">
          <div lass="form-group">
            <label for="usuario"></label>
            <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuario" <?php echo $usuario ?>>
          </div>
          <div class="form-group">
            <label for="clave"></label>
            <input type="password" name="clave" id="clave" class="form-control" placeholder="Clave" <?php echo $clave ?>>
          </div>        
<!--           <div class="form-group">
            <input type="checkbox" name="recordarme" id="recordarme">
            <label for="recordarme" style="color:#fff !important;font-weight:bold !important;"
            >Recordarme</label> 
          </div> -->
          <button type="submit" class="form-control btn btn-elegant" name="submit">Ingresar</button>
        </form>
      </div>
    </div>
  </div>
</body>