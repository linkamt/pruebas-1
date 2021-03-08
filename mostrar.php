<?php
	$conexion=mysqli_connect('localhost','root','','prueba')
  or die ("problemas al conectar");
	$Barrio=$_POST['Barrio'];
  $resultado=mysqli_query($conexion,"SELECT barrio.nombre_barrio,
     municipio.nombre_municipio, departamento.nombre_departamento,
      pais.nombre_pais from (((barrio INNER JOIN municipio on
         barrio.codigo_municipio=municipio.codigo_municipio)
          INNER JOIN departamento on municipio.codigo_departamento
           = departamento.codigo_departamento) INNER JOIN pais on
            departamento.codigo_pais=pais.codigo_pais) WHERE codigo_barrio='$Barrio'");

  while ($iter=mysqli_fetch_array($resultado)) {
    echo "<p>El Municipio es: ".$iter[1]."</p>";
    echo "<p>El Departamento es: ".$iter[2]."</p>";
    echo "<p>El País es: ".$iter[3]."</p>";

  }

?>
