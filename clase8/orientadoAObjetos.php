<?php
    // establecer la coneccion
    $coneccion = new mysqli('127.0.0.1','root','background124d80','tienda');
    // verificar la coneccion
    if($coneccion -> connect_errno){
        echo 'fallo la coneccion a mysql' . $coneccion -> connect_error . PHP_EOL;
    }
    // Ejecutar la instruccion sql
    $resultado = $coneccion -> query('SELECT NOMBRE, PRECIO FROM PRODUCTOS');
    // imprimir las filas
    while($fila = $resultado -> fetch_assoc()){
        echo "{$fila['NOMBRE']} cuesta {$fila['PRECIO']} soles" . PHP_EOL;
    }
    // liberar la Memoria
    $resultado -> free();
    // Cerrar la coneccion
    $coneccion -> close();
