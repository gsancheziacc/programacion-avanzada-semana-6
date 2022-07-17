<?php
require_once('../util/session.php');
require_once('../models/ProductModel.php');
validateSession();
if(isset($_POST['addtocart'])) {
	if(isset($_SESSION['cart'])) {
        $_SESSION['cart'][$_POST['addtocart']] = $_SESSION['cart'][$_POST['addtocart']] + 1;
    }else {
		$_SESSION['cart'][$_POST['addtocart']] = 1;
	}
}
$products = getProducts();
$productsInCart = [];
foreach($products as $product) {
    $productInCart = clone $product;
    if(isset($_SESSION['cart'][$productInCart->getId()])) {
		$productStock = $product->getStock() - $_SESSION['cart'][$productInCart->getId()];
		if($productStock <= 0) {
            $product->setStock(0);
		}else {
			$product->setStock($productStock);
		}
        $productInCart->setStock($_SESSION['cart'][$productInCart->getId()]);
        array_push($productsInCart, $productInCart);
    }else {
        $productInCart->setStock(0);
        array_push($productsInCart, $productInCart);
    }
}
?>

<html>
<head>
    <title>Productos</title>
</head>
<body>
	<h1>Productos</h1>
	<table style="border-collapse: collapse; width: 100%">
		<thead>
			<tr>
				<th style="border: 1px solid; ">Id</th>
				<th style="border: 1px solid; ">Nombre</th>
				<th style="border: 1px solid; ">Precio</th>
				<th style="border: 1px solid; ">Stock</th>
				<th style="border: 1px solid; ">Acciones</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($products as $product) {
				echo '<tr>';
				echo '<td style="border: 1px solid; min-width: 50px">' . '<strong>' . $product->getId() . '</strong>' . '</td>';
				echo '<td style="border: 1px solid; min-width: 100px">' . $product->getName() . '</td>';
	            echo '<td style="border: 1px solid; min-width: 50px">' . $product->getPrice() . '</td>';
	            echo '<td style="border: 1px solid; min-width: 50px">' . $product->getStock() . '</td>';
                echo '<td style="border: 1px solid; min-width: 50px">';
				if($product->getStock() > 0) {
					echo '<form method="post">';
					echo '<button name="addtocart" value="' . $product->getId() . '">Agregar al carrito</button>';
					echo '</form>';
				}else {
					echo '<strong style="color: red">Producto agotado</strong>';
                }
				echo '</td>';
				echo '</tr>';
			}
			?>
		</tbody>
	</table>
	<h1>Carrito</h1>
	<table style="border-collapse: collapse; width: 100%">
		<thead>
		<tr>
			<th style="border: 1px solid; ">Id</th>
			<th style="border: 1px solid; ">Nombre</th>
			<th style="border: 1px solid; ">Precio</th>
			<th style="border: 1px solid; ">Stock</th>
		</tr>
		</thead>
		<tbody>
        <?php foreach ($productsInCart as $product) {
            echo '<tr>';
            echo '<td style="border: 1px solid; min-width: 50px">' . '<strong>' . $product->getId() . '</strong>' . '</td>';
            echo '<td style="border: 1px solid; min-width: 100px">' . $product->getName() . '</td>';
            echo '<td style="border: 1px solid; min-width: 50px">' . $product->getPrice() . '</td>';
            echo '<td style="border: 1px solid; min-width: 50px">' . $product->getStock() . '</td>';
            echo '</tr>';
        }
        ?>
		</tbody>
	</table>
</body>
</html>

