<?php

require_once("classMenu.php");

$agregarItem = new Menu();
$buscaProducto = new Menu();
$buscaProductos = new Menu();

$producto = $_POST['producto'];
$precio = $_POST['precio'];

$consulta = $buscaProducto->getProducto($producto);

if ($consulta){
    Echo "El producto existe en mi base de datos";
}else{
    if(!empty($producto) and $precio!=0){
    $agregarItem->setItem($producto,$precio);
    }
}

$productos = $buscaProductos->getProductos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
</head>
<body>
<form action="" method="post">
    <div>
        <label for="producto"> Producto: </label>
        <input type="text" name="producto" id="producto" required placeholder="Producto">
    </div>
    <div>
        <label for="precio"> Precio: </label>
        <input type="number" name="precio" id="precio" required placeholder="Precio">
    </div>

    <div>
        <input type="submit" value="Crear">
    </div>
</form>

<table >
    <tr>
        <th>ID</th>
        <th>Producto</th>
        <th>Precio</th>
        <th>Fecha Creacion</th>

    </tr>

    <?php

    $concat = '';

    foreach ($productos as $product) {
        
        $concat .= '<tr>';
        $concat .= '<td>' . $product['id'] .'</td>';
        $concat .= '<td>' . $product['producto'] .'</td>';
        $concat .= '<td>' . $product['precio'] .'</td>';
        $concat .= '<td>' . $product['fecha_creacion'] .'</td>';
        


        $concat .= '</tr>';
    }

    echo $concat;
    ?>

</table>
<form action="classMesa.php">
    <input type="submit" value="Hacer un pedido">
</form>
</body>
</html>
