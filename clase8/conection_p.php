<?php
    // Conectandose a la base de datos
    //
    $conct1 = mysqli_connect('127.0.0.1','root','background124d80','tienda');
    // verificando la coneccion
    //
    if(mysqli_connect_errno($conct1)){
        echo 'Fallo al conectarse a la mysql' . mysqli_connect_error();
    }

    // Consulta
    //
    $resultado = mysqli_query($conct1,"SELECT NOMBRE, PRECIO FROM PRODUCTOS");
    // Mostrar las filas
    //
    while($fila = mysqli_fetch_assoc($resultado)){
        echo "{$fila['NOMBRE']} cuesta {$fila['PRECIO']} soles" . PHP_EOL;
    }
    // Liberar La Memoria
    //
    mysqli_free_result($resultado);
    // Cerrar la coneccion 1
    //
    mysqli_close($conct1);
