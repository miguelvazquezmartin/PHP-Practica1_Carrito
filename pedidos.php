<?php
session_start();

$fecha = "";
$numeroPedido = 0;

if(isset($_COOKIE["fecha"])){
    $fecha = $_COOKIE["fecha"];
}

if(isset($_COOKIE["numeroPedido"])){
    $numeroPedido = $_COOKIE["numeroPedido"];
}

//borra la sesión e indica la hora y el número de pedidos
$tramitar = isset($_POST["tramitarPedido"]);

if($tramitar){
    $fecha = date("d/m/Y H:i:s");
    $numeroPedido = 1;
    if(isset($_COOKIE["numeroPedido"])){
        $numeroPedido = $_COOKIE["numeroPedido"] + 1;
    }
    
    setcookie("numeroPedido", $numeroPedido, time()+3600, "/");
    setcookie("fecha", $fecha, time()+3600, "/");
    
    unset($_SESSION["listaCompra"]);
}


//borra el historial de pedidos
$borrar = isset($_POST["borrarHistorial"]);

if($borrar){
    setcookie("numeroPedido", "", time()-50000, "/");//se le indica  la cookie que practicamente no guarde nada de tiempola información
    setcookie("fecha", "", time()-50000, "/");//se le indica  la cookie que practicamente no guarde nada de tiempola información
    $numeroPedido = 0;
}

?>

<!DOCTYPE html>
<html lang="es">
    <head> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <title>DWES | Tema 1 | Práctica 1</title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 bg-info text-center">
                    <h1>Historial de pedidos</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                     <p><?php if($numeroPedido > 0){
                        print "Has realizados " . $numeroPedido . " compra/s.";
                     }
                    ?> </p>
                    <p><?php print "Su última compra se ha realizado en la fecha: " . $fecha . "." ?> </p>
                </div>
            </div>
            <div class="col-12 text-center">
                <form action="pedidos.php" method="post" class="borrar">
                    <button type="text" class="btn btn-danger" name="borrarHistorial">Borrar historial</button>  
                </form>    
            </div>
            <div class="col-12 text-center">
                <?php
                if($borrar){
                    print "<a  href='inicio.php'><button class='btn btn-success'>Volver a inicio</button></a>";
                }
                ?> 
            </div>
        </div>
    </body>
</html>