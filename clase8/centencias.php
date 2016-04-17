<?php
    /**
     * Establenciendo la coneccion
     * @var mysqli
     */
    $conection = new mysqli('127.0.0.1','root','background124d80','tienda');


    /**
     * Verificando la coneccion
     */
    if($conection -> errno){
        echo "Fallo la coneccion a mysqli: {$conection -> arror}" . PHP_EOL;
    }



    /**
     * PREPARACION
     * @var string
     */
    $sql = "INSERT INTO PRODUCTOS(NOMBRE, TALLA, PRECIO) VALUES(?,?,?)";
    $sentencia = $conection -> prepare($sql);
    if(!$sentencia){
        echo 'Fallo la preparacion' . " ({$sentencia -> errno}) {$sentencia -> error}\n";
    }




    /**
     * VINCULAR PARAMETROS
     */
    $nombre = 'Camiseta de GIT';
    $talla = 'S';
    $precio = 145;

    if(!$sentencia -> bind_param('ssi',$nombre,$talla,$precio)){
        echo "Fallo Al vincular los parametros ({$sentencia -> errno}) {$sentencia -> error}\n";
    }


    /**
     * Ejecutar
     */
    if($sentencia -> execute()){
        echo "{$sentencia -> affected_rows} Filas Insertadas";
    }else{
        echo "Fallo Al vincular los parametros ({$sentencia -> errno}) {$sentencia -> error}\n";
    }
