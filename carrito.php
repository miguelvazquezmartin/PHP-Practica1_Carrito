<?php
session_start();

    //Comprobamos que post tiene un valor asignado y se lo pasamos a una variable
    if(isset($_POST['cantidad'])!= ""){
        $cantidad = $_POST['cantidad'];
    }else{
        echo "Esto está vacio";
    }
    
     //extraer el precio desde "value" del "select" de productos
     $nombre = explode("€", $_POST['productos'])[1];
     $precio = floatval(explode("€", $_POST['productos'])[0]);

     //creamos una lista, uno para cada elemento que queremos registrar
     if($nombre != "" && $cantidad != "" && $precio != ""){
         
         $lista = array("productos" => $nombre, "cantidad" => $cantidad, "precio" => $precio);
     
     }

     
     $_SESSION["listaCompra"][] = $lista;


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
        <div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 bg-info text-center">
                        <h1>MARKET</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 pt-3 pb-3 bg-primary text-center fw-lighter">
                        <h3>Carrito</h3>
                    </div>
                </div>
            </div>
            <div class="col-8 justify-content-center mx-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Artículo</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Precio €</th>
                        </tr>
                    </thead>
                    <form action="carrito.php" method="post"></form>
                        <tbody>
                            <tr>
                                <td>---</td>
                                <td>---</td>
                                <td>---</td>
                            </tr>
                            <?php
                                $sumaTotal = 0;
                                foreach($_SESSION["listaCompra"] as $value => $yep){ 
                                    
                                    $sumaProducto = $yep["precio"]*$yep["cantidad"];
                                    $sumaTotal += $sumaProducto;
                                    
                                    echo "<tr>
                                        <td>" 
                                            . $yep["productos"] . 
                                        "</td>
                                        <td>" 
                                            . $yep["cantidad"] . 
                                        "</td>
                                        <td>" 
                                            . $yep["precio"] .
                                        "</td>
                                        <td>"
                                            . $sumaProducto . 
                                        "</td>
                                    </tr>";
                                    
                                }
                               print "<tr>
                                    <td>
                                         <p> Total a pagar: "   . $sumaTotal . 
                                    "€ </td>
                                    </tr>"; 
                            ?>
                        </tbody>
                    </form>
                </table>
            </div>
        </div>
        <div class="col-12 text-center">
            <a  href="inicio.php"><button class="btn btn-success">Seguir comprando</button></a>
            <form action="pedidos.php" method="post">
                <button class="btn btn-warning" name="tramitarPedido">Tramitar compra</button>
            </form>
        </div>
    </body>
</html>