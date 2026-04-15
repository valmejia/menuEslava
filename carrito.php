<?php
declare(strict_types=1);

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $item = trim($_POST['item'] ?? '');
    $cantidad = (int) ($_POST['cantidad'] ?? 0);

    if ($item !== '' && $cantidad > 0) {
        if (!isset($_SESSION['itemsEnCesta'])) {
            $_SESSION['itemsEnCesta'] = [];
        }

        if (isset($_SESSION['itemsEnCesta'][$item])) {
            $_SESSION['itemsEnCesta'][$item] += $cantidad;
        } else {
            $_SESSION['itemsEnCesta'][$item] = $cantidad;
        }
    }
}
?>
<html>
<body>
    <tt>
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            Dime el producto: <input type="text" name="item" size="20"><br>
            Cuántas unidades: <input type="number" name="cantidad" size="20"><br>
            <input type="submit" value="Añadir a la cesta"><br>
        </form>
        <?php if (!empty($_SESSION['itemsEnCesta'])): ?>
            <br><b>El contenido de la cesta de la compra es:</b><br>
            <?php foreach ($_SESSION['itemsEnCesta'] as $producto => $uds): ?>
                <?= "Artículo: " . htmlspecialchars($producto) . " | Unidades: " . $uds . "<br>"; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </tt>
</body>
</html>
