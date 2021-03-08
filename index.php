
<html>
<head>
  <title>Demo de menú desplegable</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.7/jquery.min.js "></script>

  <link rel="stylesheet" href="css/index.css">

</head>
<body>
  <h1>Bienvenido usuario</h1>
  <div class="margen">
    <h2>Elige el Barrio </h2>

    <select id="barrio" class="opciones">
      <option value = "">Selecciona un Barrio</option>
      <?php
        $conexion = mysqli_connect("localhost", "root", "", "prueba") or die ("problemas al conectar");

        $registros = mysqli_query($conexion, "select * from barrio") or
          die("Problemas en el select:" . mysqli_error($conexion));
        while ($reg = mysqli_fetch_array($registros)) {
          echo "<option value=\"$reg[codigo_barrio]\">$reg[nombre_barrio]</option>";
      }
      ?>
    </select>
    </div>


    <br>
    <div id="otros_datos" class="margen"></div>

    <script type = "text/javascript">


        $(document).ready(function(){
        //actualizacion de evento al cambiar
    		$('#barrio').on('change', function(){
    				buscando_datos();
    		});
    	});
    </script>

    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="gmaps.js"></script>

    <script type="text/javascript">
      //funcion de busqueda de los otros datos
      function buscando_datos(){
        $.ajax({
          type:"POST",
          url:"mostrar.php",
          data:"Barrio=" + $('#barrio').val(),
          success:function(r){
            $('#otros_datos').html(r);
          }   });
      }
    </script>

    </div>

</body>

</html>
