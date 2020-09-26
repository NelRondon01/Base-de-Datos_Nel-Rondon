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
    mysqli_query($conexion, $sql);
    
    // Resultado de Operacion y Mensaje
    if(mysqli_query($conexion, $sql)){
        $myJSON->result_opr = "La operacion fue realizada con exito";
        $myJSON->mensage = mysqli_error($conexion);
    }else{
        $myJSON->mensage = mysqli_error($conexion);
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

    echo json_encode($myJSON);

?>