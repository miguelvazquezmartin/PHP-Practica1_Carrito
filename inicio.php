<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
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
                        <h3>Lista de productos</h3>
                    </div>
                </div>
            </div>
            <form action="carrito.php" method="post">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-4 justify-content-center mx-auto">
                        <table class="table table-striped table-borderless table-center">
                            <thead>
                                <tr>
                                    <th>Artículo</th>
                                    <th>Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <select name="productos">
                                            <option value="seleccionar" selected>Elegir...</option>
                                            <option value="1.5€ Leche">Leche 1.5€</option>
                                            <option value="2.5€ Huevo">Huevo 2.5€</option>
                                            <option value="4.6€ Carne">Carne 4.6€</option>
                                            <option value="2.45€ Tomate">Tomate 2.45€</option>
                                            <option value="3.83€ Pimiento">Pimiento 3.83€</option>
                                            <option value="7.92€ Pechuga de pollo">Pechuga de pollo 7.92€</option>
                                            <option value="8.2€ Pechuga de pavo">Pechuga de pavo 8.2€</option>
                                            <option value="0.9€ Lechuga">Lechuga 0.9€</option>
                                            <option value="11.68€ Pescado">Pescado 11.68€</option>
                                            <option value="0.75€ Naranja">Naranja 0.75€</option>
                                            <option value="1.1€ Pera">Pera 1.1€</option>
                                        </select>
                                    </td>
                                    <td>
                                        <div class="col-12">
                                            <input type="number" class="form-control" min="1" name="cantidad" placeholder="0">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-6">
                                             <input type="submit" class="btn btn-success" value="Comprar"></input>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table> 
                    </div>
                </div>
            </div>
            </form>
        </div> 
    </body>
</html>

