<?php 
    $host = "localhost";
    $user = "root";
    $pass = "";
    
    $conexion = mysqli_connect($host, $user, $pass);
    
    // CREANDO BASE DE DATOS
    $sql = "CREATE DATABASE nelrondon";
    mysqli_query($conexion, $sql);
    
    // CREANDO TABLA
    $sql = "CREATE TABLE nelrondon.programador (ID int NOT NULL AUTO_INCREMENT, Nombre varchar(15), Apellido varchar(15), Cedula varchar (15), Correo varchar(20), Lenguajes varchar(100), Fecha_de_Creacion varchar(10), PRIMARY KEY(ID))";
    mysqli_query($conexion, $sql);

?>