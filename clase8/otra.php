<?php
    $conection = new mysqli('127.0.0.1','root','background124d80','tienda');

    if($conection -> errno){
        echo "Fallo la Coneccion {$conection -> error}" . PHP_EOL;
    }

    /**
     * Insertando datos A SQL
     */
     $SQL01 = 'INSERT INTO PRODUCTOS(NOMBRE,TALLA,PRECIO) VALUES(?,?,?)';
     $sentencia01 = $conection -> prepare($SQL01);

     $dato1 = 'Camiseta de C++';
     $dato2 = 'L';
     $dato3 = 110;

     $sentencia01 -> bind_param('ssi',$dato1,$dato2,$dato3);

     $sentencia01 -> execute();

     $sentencia01 -> close();
    /**
     * Consulta SQL
     * @var string
     */
    $SQL = 'SELECT ID, NOMBRE, TALLA, PRECIO FROM PRODUCTOS';
    $sentencia = $conection -> prepare($SQL);

    $sentencia -> execute();

    $sentencia -> bind_result($id,$nombre,$talla,$precio);

    while($fila = $sentencia -> fetch()){
        echo "({$id}): la {$nombre} de {$talla} cuesta {$precio}.\n";
    }
    $sentencia -> close();
    $conection -> close();
