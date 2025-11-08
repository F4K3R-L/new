<?php
session_start();

// Productos disponibles
$productos = [
    "panes" => [
        1 => [
            "nombre" => "Pan Popular",
            "precio" => 0.16,
            "anterior" => 0.20,
            "imagen" => "img/popular.jpg"
        ],
        2 => [
            "nombre" => "Bizcocho",
            "precio" => 0.33,
            "anterior" => 0.40,
            "imagen" => "img/bizcocho.jpg"
        ],
         3 => [
            "nombre" => "Cacho",
            "precio" => 0.20,
            "anterior" => 0.25,
            "imagen" => "img/cacho.jpg"
        ],
         4 => [
            "nombre" => "Camote",
            "precio" => 0.25,
            "anterior" => 0.30,
            "imagen" => "img/camote.jpg"
        ], 5 => [
            "nombre" => "Choclo",
            "precio" => 0.20,
            "anterior" => 0.25,
            "imagen" => "img/choclo.jpg"
        ], 6 => [
            "nombre" => "Cumpado",
            "precio" => 0.33,
            "anterior" => 0.40,
            "imagen" => "img/cumpado.jpg"
        ], 7 => [
            "nombre" => "Mollete",
            "precio" => 0.33,
            "anterior" => 0.40,
            "imagen" => "img/mollete.jpg"
        ], 8 => [
            "nombre" => "Maiz",
            "precio" => 0.33,
            "anterior" => 0.40,
            "imagen" => "img/maiz.jpg"
       
        ],9 => [
            "nombre" => "Mantequilla",
            "precio" => 0.20,
            "anterior" => 0.30,
            "imagen" => "img/mantequilla.jpg"
       
        ],10 => [
            "nombre" => "Trigo",
            "precio" => 0.20,
            "anterior" => 0.30,
            "imagen" => "img/trigo.jpg"
       
        ],
    ],
    "bocaditos" => [
        11 => [
            "nombre" => "Galletas",
            "precio" => 0.20,
            "anterior" => 0.25,
            "imagen" => "img/galletas.jpg"
        ],
        12 => [
            "nombre" => "Bombitas",
            "precio" => 0.20,
            "anterior" => 0.25,
            "imagen" => "img/bombitas.jpg"
        ],13 => [
            "nombre" => "Brillantes",
            "precio" => 0.20,
            "anterior" => 0.25,
            "imagen" => "img/brillantes.jpg"
        ],14 => [
            "nombre" => "Dulce de Maiz",
            "precio" => 0.20,
            "anterior" => 0.25,
            "imagen" => "img/dulce de maiz.jpg"
        ],15 => [
            "nombre" => "Bocadillo",
            "precio" => 0.20,
            "anterior" => 0.25,
            "imagen" => "img/rosquitas.jpg"
        ]
    ]
];

// Agregar producto
if (isset($_GET['add'])) {
    $id = $_GET['add'];
    $_SESSION['carrito'][$id] = ($_SESSION['carrito'][$id] ?? 0) + 1;
    header("Location: index.php");
    exit;
}

// Vaciar carrito
if (isset($_GET['vaciar'])) {
    unset($_SESSION['carrito']);
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Panadería CHACHA</title>
<link rel="stylesheet" href="style.css">
<style>
.categoria {
    text-align: center;
    font-size: 28px;
    margin: 50px 0 20px;
    color: #ff6600;
    font-weight: 600;
    text-transform: uppercase;
}
</style>
</head>
<body>

<header class="navbar">
    <div class="logo-container">
        <img src="img/logo.png" alt="logo" class="logo">
        <h1>PANADERÍA CHACHA</h1>
    </div>
    <nav class="menu">
        <a href="index.php">INICIO</a>
        <a href="sobre.php">NOSOTROS</a>
        <a href="contacto.php">CONTACTANOS</a>
        <a href="carrito.php">CARRITO 🛒</a>
    </nav>
</header>

<main class="inicio-fondo">
    <div class="overlay">
        <h2 class="titulo-seccion">NUESTROS PRODUCTOS</h2>

        <!-- 🥖 SECCIÓN PANES -->
        <h3 class="categoria">Panes</h3>
        <div class="productos">
            <?php foreach ($productos['panes'] as $id => $p): ?>
            <div class="producto">
                <div class="oferta">¡Oferta!</div>
                <img src="<?php echo $p['imagen']; ?>" alt="<?php echo $p['nombre']; ?>">
                <h3><?php echo $p['nombre']; ?></h3>
                <p class="precio">
                    <span class="anterior">S/ <?php echo number_format($p['anterior'], 2); ?></span>
                    <span class="actual">S/ <?php echo number_format($p['precio'], 2); ?></span>
                </p>
                <a href="?add=<?php echo $id; ?>" class="btn">Añadir al carrito</a>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- 🍪 SECCIÓN BOCADITOS -->
        <h3 class="categoria">Bocaditos</h3>
        <div class="productos">
            <?php foreach ($productos['bocaditos'] as $id => $p): ?>
            <div class="producto">
                <div class="oferta">¡Oferta!</div>
                <img src="<?php echo $p['imagen']; ?>" alt="<?php echo $p['nombre']; ?>">
                <h3><?php echo $p['nombre']; ?></h3>
                <p class="precio">
                    <span class="anterior">S/ <?php echo number_format($p['anterior'], 2); ?></span>
                    <span class="actual">S/ <?php echo number_format($p['precio'], 2); ?></span>
                </p>
                <a href="?add=<?php echo $id; ?>" class="btn">Añadir al carrito</a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>

<?php include 'redes_flotantes.html'; ?>

</body>
</html>
