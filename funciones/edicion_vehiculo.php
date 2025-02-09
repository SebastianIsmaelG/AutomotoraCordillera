<!DOCTYPE html>
<?php
    if (!isset($_POST["btn_ver"])) {
      header('location:../paginas_administracion/vehiculos_administrativo.php');
    }else {
      if (isset($_POST["nombre_auto_cambiar"])) {
        $post = $_POST["nombre_auto_cambiar"];

        $id_auto= substr($post,0, 6);

        include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';
        if (!$cnn) {
            die("Conexion Fallida: " . mysqli_connect_error());
        }else {
            try {
                $busid= mysqli_prepare($cnn,"SELECT v.codigo_vehiculo FROM vehiculos as v WHERE (v.codigo_vehiculo=?) ");
                mysqli_stmt_bind_param($busid,"i",$id_auto);
                $rs = mysqli_stmt_execute($busid);

                if ($fila = mysqli_stmt_fetch($busid)!=null) {
                    mysqli_stmt_free_result($busid);
                  try {
                      $sql = mysqli_prepare($cnn,"SELECT categoria,estado, marca, modelo, precio, color, ano, combustible,
                         transmision, kilometraje, cilindrada, equipamiento, foto1, foto2, foto3, foto4, foto5, ubicacion
                         FROM vehiculos WHERE (codigo_vehiculo = ?)");
                      mysqli_stmt_bind_param($sql,"i",$id_auto);
                      $rs = mysqli_stmt_execute($sql);

                      mysqli_stmt_bind_result($sql,$categoria,$estado,$marca,$modelo,$precio,$color,$ano,$combustible,$transmision,$kilometraje,$cilindrada,$equipamiento,$foto1,$foto2,$foto3,$foto4,$foto5,$sucursal);
                        while ($fila = mysqli_stmt_fetch($sql)) {
                          $ca_vehiculo = $categoria;
                          $es_vehiculo = $estado;
                          $ma_vehiculo = $marca;
                          $mo_vehiculo = $modelo;
                          $pr_vehiculo = $precio;
                          $co_vehiculo = $color;
                          $ano_vehiculo = $ano;
                          $com_vehiculo = $combustible;
                          $tr_vehiculo = $transmision;
                          $ki_vehiculo = $kilometraje;
                          $ci_vehiculo = $cilindrada;
                          $eq_vehiculo = $equipamiento;
                          $f1_vehiculo = $foto1;
                          $f2_vehiculo = $foto2;
                          $f3_vehiculo = $foto3;
                          $f4_vehiculo = $foto4;
                          $f5_vehiculo = $foto5;
                          $ub_vehiculo = $sucursal;
                        }
                      mysqli_stmt_free_result($sql);

                      //Busqueda del nombre categoria en base al codigo primario
                      $sql = mysqli_prepare($cnn,"SELECT categoria FROM categorias WHERE (codigo_categoria=?)");
                      mysqli_stmt_bind_param($sql,"i",$ca_vehiculo);
                      $rs = mysqli_stmt_execute($sql);
                      mysqli_stmt_bind_result($sql,$n_cat);
                      while ($fila = mysqli_stmt_fetch($sql)){
                        $N_categoria_vehiculo = $n_cat;
                      }
                      mysqli_stmt_free_result($sql);

                      //Busqueda del nombre marca en base al codigo primario
                      $sql = mysqli_prepare($cnn,"SELECT marca FROM marcas WHERE (codigo_marca=?)");
                      mysqli_stmt_bind_param($sql,"i",$ma_vehiculo);
                      $rs = mysqli_stmt_execute($sql);
                      mysqli_stmt_bind_result($sql,$n_ma);
                      while ($fila = mysqli_stmt_fetch($sql)){
                        $N_marca_vehiculo = $n_ma;
                      }
                      mysqli_stmt_free_result($sql);

                      //Busqueda del nombre combustible en base al codigo primario
                      $sql = mysqli_prepare($cnn,"SELECT combustible FROM combustible WHERE (codigo_combustible=?)");
                      mysqli_stmt_bind_param($sql,"i",$com_vehiculo);
                      $rs = mysqli_stmt_execute($sql);
                      mysqli_stmt_bind_result($sql,$n_co);
                      while ($fila = mysqli_stmt_fetch($sql)){
                        $N_combustible_vehiculo = $n_co;
                      }
                      mysqli_stmt_free_result($sql);

                      //Busqueda del nombre transmision en base al codigo primario
                      $sql = mysqli_prepare($cnn,"SELECT transmision FROM transmision WHERE (codigo_transmision=?)");
                      mysqli_stmt_bind_param($sql,"i",$tr_vehiculo);
                      $rs = mysqli_stmt_execute($sql);
                      mysqli_stmt_bind_result($sql,$n_tra);
                      while ($fila = mysqli_stmt_fetch($sql)){
                        $N_transmision_vehiculo = $n_tra;
                      }
                      mysqli_stmt_free_result($sql);

                      //Busqueda del nombre sucursal en base al codigo primario
                      $sql = mysqli_prepare($cnn,"SELECT nombre_sucursal FROM sucursal WHERE (codigo_sucursal=?)");
                      mysqli_stmt_bind_param($sql,"i",$ub_vehiculo);
                      $rs = mysqli_stmt_execute($sql);
                      mysqli_stmt_bind_result($sql,$n_su);
                      while ($fila = mysqli_stmt_fetch($sql)){
                        $N_sucursal_vehiculo = $n_su;
                      }
                      mysqli_stmt_free_result($sql);

                      mysqli_close($cnn);

                  } catch (\Exception $e) {
                    printf("Error: %s.\n", mysqli_stmt_error($sql));
                  }

                }else {
                  ?>
                   <script type="text-javascript">alert("No se encontro el vehiculo ingresado, compruebe los datos ingresados.");
                      window.location="../paginas_administracion/vehiculos_administrativo.php";//Revisar
                      </script>
                  <?php
                }
              } catch (\Exception $e) {

            }



        }

      }else {
        header('location:../paginas_administracion/vehiculos_administrativo.php');
      }
    }
 ?>
<html lang="es" dir="ltr">
  <head>
    <head>
      <meta charset="utf-8">
      <meta name="author" content="Sebastian Gutierrez">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" type="text/css" href="../css/style.css">
      <link rel="stylesheet" href="../css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
      <link rel="shortcut icon" href="../images/icons/favicon.ico" />
      <title>Modificacion de datos</title>
    </head>
  </head>
  <body>
    <div class="container text-right" style="padding:10px;" >
      <a class="btn btn-primary" href="../paginas_administracion/vehiculos_administrativo.php">Volver Atras</a>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h4>EDICIÓN <span id="title_red">VEHICULO</span></span></h4>
        </div>
      </div>
      <form class="" action="../paginas_funciones/editar_vehiculo.php" method="post" enctype="multipart/form-data">
        <div id="form_vehiculos">
          <div class="row">
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="form-group">
                  <label for="sel_categoria" class="control-label"><strong>Categoria</strong></label>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="form-group">
                  <select class="form-control" id="sel_categoria" name="sel_categoria" required>
                    <option value="<?php echo $ca_vehiculo; ?>"><?php echo $N_categoria_vehiculo; ?></option>
                    <option value="" disabled></option >
                    <?php
                        include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\select_categorias.php';
                     ?>
                  </select>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="form-group">
                  <label for="sel_estado" class="control-label"><strong>Estado</strong></label>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="form-group">
                  <select name="sel_estado" id="sel_estado" class="form-control" required>
                    <option value="<?php echo $es_vehiculo; ?>"><?php echo $es_vehiculo; ?></option>
                    <option value="" disabled></option >
                    <option value="Nuevo">Nuevo</option>
                    <option value="Usado">Usado</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="form-group">
                  <label for="sel_marca" id="sel_marca" class="control-label"><strong>Marca</strong></label>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="form-group">
                  <select class="form-control" id="sel_marca" name="sel_marca" required>
                    <option value="<?php echo $ma_vehiculo; ?>"><?php echo $ma_vehiculo."--".$N_marca_vehiculo; ?></option>
                    <option value="" disabled></option >
                    <?php
                        include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\select_marcas.php';
                     ?>
                  </select>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="form-group">
                  <label for="text_modelo" class="control-label"><strong>Modelo</strong></label>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="form-group">
                    <input type="text" class="form-control" name="text_modelo" id="text_modelo"  maxlength="15" placeholder="Ingrese un modelo" value="<?php echo $mo_vehiculo; ?>" required>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="form-group">
                  <label for="text_precio" class="control-label"><strong>Precio(CLP)</strong></label>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="form-group">
                  <input type="text" name="text_precio" class="form-control" id="evento_miles" maxlength="10" onkeypress="return soloNumeros(event)" placeholder="Ingrese el valor de venta del vehiculo" value="<?php echo $pr_vehiculo; ?>"required>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="form-group">
                  <label for="text_color" class="control-label"><strong>Color</strong></label>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="form-group">
                  <input type="text" class="form-control" name="text_color" maxlength="12" onkeypress="return soloLetras(event)"  placeholder="Ingrese el color del vehiculo" value="<?php echo $co_vehiculo; ?>" required>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="form-group">
                  <label for="sel_año" class="control-label"><strong>Año</strong></label>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="form-group">
                  <select name="sel_año" id="sel_año" class="form-control" required>
                      <option value="<?php echo $ano_vehiculo; ?>"><?php echo $ano_vehiculo; ?></option>
                      <option value="" disabled></option >
                        <?php
                        for($i=1990;$i<=2018;$i++) {
                           echo "<option value='".$i."'>".$i."</option>";
                        }

                      ?>
                  </select>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="form-group">
                  <label for="sel_combustible" class="control-label"><strong>Combustible</strong></label>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="form-group">
                  <select name="sel_combustible" id="sel_combustible" class="form-control" required>
                    <option value="<?php echo $com_vehiculo; ?>"><?php echo $N_combustible_vehiculo; ?></option>
                    <option value="" disabled></option >
                    <?php
                      include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\select_combustibles.php';
                     ?>
                  </select>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="form-group">
                  <label for="sel_trasmision" class="control-label"><strong>Transmisión</strong></label>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="form-group">
                  <select name="sel_trasmision" id="sel_trasmision" class="form-control" required>
                    <option value="<?php echo $tr_vehiculo; ?>"><?php echo $N_transmision_vehiculo; ?></option>
                    <option value="" disabled></option >
                    <?php
                      include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\select_transmision.php';
                     ?>
                  </select>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="form-group">
                  <label for="text_kilometraje" class="control-label"><strong>Kilometraje</strong></label>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="form-group">
                  <input type="text" name="text_kilometraje" class="form-control" id="text_kilometraje"  placeholder="Ingrese el kilometraje actual del vehiculo" maxlength="6" onkeypress="return soloNumeros(event)" value="<?php echo $ki_vehiculo; ?>" required>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="form-group">
                  <label for="text_cilindrada" class="control-label"><strong>Cilindrada</strong></label>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="form-group">
                  <input type="text" name="text_cilindrada" class="form-control"  id="evento_miles2"  placeholder="Ingrese la cilindrada del vehiculo cc" maxlength="6" onkeypress="return soloNumeros(event)" value="<?php echo $ci_vehiculo; ?>" required>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="form-group">
                  <label for="sel_ubicacion" class="control-label"><strong>Ubicación</strong></label>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="form-group">
                  <select name="sel_ubicacion" id="sel_ubicacion" class="form-control" required>
                    <option value="<?php echo $ub_vehiculo; ?>"><?php echo $N_sucursal_vehiculo; ?></option>
                    <option value="" disabled></option >
                      <?php
                        include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\select_sucursales.php';
                       ?>
                  </select>
                </div>
              </div>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
              <div class="form-group">
                <label class="control-label" for="text_equipamiento"><strong>Equipamiento</strong></label>
              </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
              <div class="form-group">
                <textarea id="text_equipamiento" class="form-control" name="text_equipamiento"  style="height:100px" placeholder="Ingrese detalles del vehiculo" required><?php echo $eq_vehiculo; ?></textarea>
              </div>
            </div>
          </div>
          <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
              <p><small>*Si desea modificar una fotografia debe subir todas las fotos al servidor otra vez.</small> </p>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <div class="form-group">
              <label class="control-label" for="fotografia_1"><strong>Fotografia 1</strong></label>
            </div>
          </div>
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
            <div class="form-group">
              <input type="hidden" name="old_fotografia1" value="<?php echo $f1_vehiculo; ?>">
              <input type="file" id="fotografia_1" class="form-control" name="fotografia_1">
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <div class="form-group">
              <label class="control-label" for="fotografia_2"><strong>Fotografia 2</strong></label>
            </div>
          </div>
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
            <div class="form-group">
              <input type="hidden" name="old_fotografia2" value="<?php echo $f2_vehiculo; ?>">
              <input type="file" id="fotografia_2" class="form-control" name="fotografia_2">
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <div class="form-group">
              <label class="control-label" for="fotografia_3"><strong>Fotografia 3</strong></label>
            </div>
          </div>
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
            <div class="form-group">
              <input type="hidden" name="old_fotografia3" value="<?php echo $f3_vehiculo; ?>">
              <input type="file" id="fotografia_3" class="form-control" name="fotografia_3">
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <div class="form-group">
              <label class="control-label" for="fotografia_4"><strong>Fotografia 4</strong></label>
            </div>
          </div>
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
            <div class="form-group">
              <input type="hidden" name="old_fotografia4" value="<?php echo $f4_vehiculo; ?>">
              <input type="file" id="fotografia_4" class="form-control" name="fotografia_4">
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <div class="form-group">
              <label class="control-label" for="fotografia_5"><strong>Fotografia 5</strong></label>
            </div>
          </div>
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
            <div class="form-group">
              <input type="hidden" name="old_fotografia5" value="<?php echo $f5_vehiculo; ?>">
              <input type="file" id="fotografia_5" class="form-control" name="fotografia_5">
            </div>
          </div>
        </div>
        </div>
        <br>
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <div class="form-group">
                <input type="hidden" name="text_codigo_auto" value="<?php echo $id_auto; ?>">
                <input type="submit" class="btn btn-success form-control" name="btn_guardar" value="Guardar">
              </div>
            </div>
          </div>
      </form>
    </div>


    <!--JavaScript al final para optimizar-->
    <script type="text/javascript" src="../js/jquery-3.3.1.min.js">  </script>
    <script type="text/javascript" src="../js/bootstrap.bundle.js"> </script>
    <script src="../js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous" ></script>
    <script language="javascript">
        function soloNumeros(e){
              key = e.keyCode || e.which;
              tecla = String.fromCharCode(key).toLowerCase();
              letras = " 0123456789";//caracteres permitidos
              especiales = "8-37-39-46";//teclas especiales ejem espacio, se puede ver en numero de la letra en el mapa de caracteres

              tecla_especial = false
              for(var i in especiales){
                   if(key == especiales[i]){
                       tecla_especial = true;
                       break;
                   }
               }

               if(letras.indexOf(tecla)==-1 && !tecla_especial){
                   return false;
               }
           }
           function soloLetras(e){
              key = e.keyCode || e.which;
              tecla = String.fromCharCode(key).toLowerCase();
              letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";//caracteres permitidos
              especiales = "8-37-39-46";//teclas especiales ejem espacio, se puede ver en numero de la letra en el mapa de caracteres

              tecla_especial = false
              for(var i in especiales){
                   if(key == especiales[i]){
                       tecla_especial = true;
                       break;
                   }
               }

               if(letras.indexOf(tecla)==-1 && !tecla_especial){
                   return false;
               }
           }
       </script>
       <script type="text/javascript">
             $("#evento_miles").on({
            "focus": function(event) {
              $(event.target).select();
            },
            "keyup": function(event) {
              $(event.target).val(function(index, value) {
                return value.replace(/\D/g, "")
                 //.replace(/([0-9])([0-9]{2})$/, '$1.$2')
                  .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
              });
            }
            });

            $("#evento_miles2").on({
           "focus": function(event) {
             $(event.target).select();
           },
           "keyup": function(event) {
             $(event.target).val(function(index, value) {
               return value.replace(/\D/g, "")
                //.replace(/([0-9])([0-9]{2})$/, '$1.$2')
                 .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
             });
           }
           });
       </script>
  </body>
</html>
