<?php
function obtenerConexion() {

    mysqli_report(MYSQLI_REPORT_OFF);

    $conexion = new mysqli("db", "root", "test", "db_voyagesMachado","3306");
    // $conexion = mysqli_connect('db', 'root', 'test', "empresa");
    mysqli_set_charset($conexion, 'utf8');

    return $conexion;
}