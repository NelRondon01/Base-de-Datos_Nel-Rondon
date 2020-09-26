 <?php
    error_reporting(0);
    include("conexion.php");


    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $cedula = $_POST["cedula"];
    $correo = $_POST["correo"];
    $lenguajes = $_POST["lenguajes"];
    $fecha_c = date("d/m/Y");

    $sql = "INSERT INTO nelrondon.programador (Nombre, Apellido, Cedula, Correo, Lenguajes, Fecha_de_Creacion) VALUES ('$nombre', '$apellido', '$cedula', '$correo', '$lenguajes', '$fecha_c')";
    
    // Resultado de Operacion y Mensaje
    if(mysqli_query($conexion, $sql)){
        $myJSON->result_opr = "La operacion fue realizada con exito";
        $myJSON->mensage = "Se agrego un nuevo registro a la base de datos";
    }else{
        $myJSON->mensage = "Ocurrio un error en la ejecucion de la llamada, no fue agregada informacion a la base de datos.";
        $myJSON->result_opr = "La operacion tuvo un problema en la ejecucion";
    }

    // Total Programadores
    $sql = "SELECT COUNT(ID) FROM nelrondon.programador";
    $respuesta = mysqli_query($conexion, $sql);

    $i = 0;
    while ($fila = mysqli_fetch_array($respuesta)) {
        $myJSON->numero_programadores = $fila[$i];
        $i++;
    }

    // Presentacion de Datos
    $sql = "SELECT * FROM nelrondon.programador";
    $respuesta = mysqli_query($conexion, $sql);

    echo "<table border='1'>";
    echo "<tr> <td>Nombre</td> <td>Apellido</td> <td>Cedula</td> <td>Correo</td> <td>Lenguajes</td> <td>Fecha de Creacion</td> </tr>";
    while ($x = mysqli_fetch_array($respuesta)) {
        echo "<tr>";
        echo "<td>".$x["Nombre"]."</td>";
        echo "<td>".$x["Apellido"]."</td>";
        echo "<td>".$x["Cedula"]."</td>";
        echo "<td>".$x["Correo"]."</td>";
        echo "<td>".$x["Lenguajes"]."</td>";
        echo "<td>".$x["Fecha_de_Creacion"]."</td>";
        echo "</tr>";
    }
    echo "<table> <br>";

    echo json_encode($myJSON);

?>