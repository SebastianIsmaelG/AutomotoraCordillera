<!DOCTYPE html>
<?php
    session_start();
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    //Comprueba el usuario aceptado y trae datos
    include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\prepare_admin_user.php';

 ?>
 <html lang="es">
   <head>
     <meta charset="utf-8">
     <meta name="author" content="Sebastian Gutierrez">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="stylesheet" type="text/css" href="../css/style.css">
     <link rel="stylesheet" href="../css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
     <link rel="shortcut icon" href="../images/icons/favicon.ico" />
     <title>Menu Administrativo</title>
   </head>
   <body>
     <div>
       <div class="container-fluid" >
         <div class="row">
           <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
             <img src="../images/Cordillera2.png" class="img-fluid" alt="">
           </div>
           <div class="col-lg-4 col-md-4 d-none d-md-block">

           </div>
           <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
             <div class="" id="div_usuario">
               <div class="row">
                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" id="division_col_xs">
                   <div class="">
                     <h5 >Usuario conectado: </h5>
                   </div>
                 </div>
                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" id="division_col_xs">
                   <div class="">
                     <p><?php echo $ns; ?>  <?php echo $as; ?></p>
                   </div>
                 </div>
               </div>
               <div class="row">
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                   <form class="" action="../paginas_funciones/logout.php" method="post">
                     <div class="text-right">
                       <input class="btn btn-danger" type="submit" value="Cerrar Sesión" />
                     </div>
                   </form>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
       <br>
       <div class="container-fluid">
         <header>
           <nav class="navbar navbar-expand-lg navbar-dark bg-primary" id="navbar_administracion" >
             <a id="nav-link" class="navbar-brand" href="../paginas_administracion/principal_administrativo.php">Menu Principal<span class="sr-only">Home</span></a>
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
             </button>
             <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav mr-auto">
                 <li id="li_navbar" class="nav-item">
                   <a id="nav-link" class="nav-link" href="../paginas_administracion/vehiculos_administrativo.php">Vehiculos<span class="sr-only">Vehiculos</span></a>
                 </li>
                 <li id="li_navbar" class="nav-item">
                   <a id="nav-link" class="nav-link" href="../paginas_administracion/marcas_administrativo.php">Marcas<span class="sr-only">Marcas</span></a>
                 </li>
                 <li id="li_navbar" class="nav-item">
                   <a id="nav-link" class="nav-link" href="../paginas_administracion/usuarios_administrativo.php">Usuarios<span class="sr-only">Usuarios</span></a>
                 </li>
                 <li id="li_navbar" class="nav-item">
                   <a id="nav-link" class="nav-link" href="../paginas_administracion/cotizaciones_administrativo.php">Cotizaciones<span class="sr-only">Cotizaciones</span></a>
                 </li>
                 <li id="li_navbar" class="nav-item">
                   <a id="nav-link" class="nav-link" href="../paginas_administracion/detalles_administrativo.php">Estadisticas</a>
                 </li>
               </ul>
             </div>
           </nav>
         </header>
       </div>
     </div>

     <!--JavaScript al final para optimizar-->
     <script type="text/javascript" src="../js/jquery-3.3.1.min.js">  </script>
     <script type="text/javascript" src="../js/bootstrap.bundle.js"> </script>
     <script src="../js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous" ></script>
   </body>

 </html>
