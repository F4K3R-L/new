<?php
// sobre.php
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Sobre Nosotros | Panadería Chachá</title>
<link rel="stylesheet" href="style.css">
<style>
/* ====== SECCIÓN SOBRE NOSOTROS ====== */
.sobre-nosotros {
    max-width: 1100px;
    margin: 60px auto;
    background: rgba(255, 255, 255, 0.9);
    border-radius: 15px;
    padding: 40px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 40px;
    align-items: center;
}

.sobre-texto h2 {
    font-size: 28px;
    color: #ff6600;
    margin-bottom: 15px;
}

.sobre-texto p {
    color: #333;
    line-height: 1.6;
    font-size: 17px;
}

.sobre-texto h3 {
    margin-top: 25px;
    color: #3b4a59;
}

.sobre-imagen img {
    width: 100%;
    border-radius: 15px;
    object-fit: cover;
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    transition: transform 0.3s;
}

.sobre-imagen img:hover {
    transform: scale(1.03);
}

/* ====== BOTÓN VOLVER ====== */
.boton-volver {
    display: inline-block;
    margin: 30px auto 0;
    padding: 12px 20px;
    background: #ff6600;
    color: #fff;
    font-weight: bold;
    text-decoration: none;
    border-radius: 8px;
    box-shadow: 0 3px 8px rgba(0,0,0,0.2);
    transition: background 0.3s, transform 0.2s;
}

.boton-volver:hover {
    background: #cc5200;
    transform: scale(1.05);
}

@media (max-width: 850px) {
    .sobre-nosotros {
        grid-template-columns: 1fr;
    }
    .sobre-imagen {
        order: -1;
    }
    .sobre-texto {
        text-align: center;
    }
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
        <a href="sobre.php">SOBRE NOSOTROS</a>
        <a href="contacto.php">CONTACTANOS</a>
        <a href="carrito.php">CARRITO 🛒</a>
    </nav>
</header>

<main>
    <section class="sobre-nosotros">
        <div class="sobre-texto">
            <h2>Sobre Nosotros</h2>
            <p>En <strong>Panadería Chachá</strong> llevamos más de 12 años ofreciendo los mejores panes, tortas y bocaditos hechos con amor y dedicación. Cada producto es elaborado de manera artesanal, manteniendo el sabor tradicional y la frescura que nos caracteriza.</p>

            <h3>Nuestra Misión</h3>
            <p>Brindar productos de panadería de alta calidad, elaborados con ingredientes frescos y naturales, fomentando el bienestar y la satisfacción de nuestros clientes cada día.</p>

            <h3>Nuestra Visión</h3>
            <p>Ser la panadería preferida en la región, reconocida por la calidad, el sabor y el servicio cálido que ofrecemos a nuestros clientes.</p>

            <!-- 🔹 Botón para volver al inicio -->
            <a href="index.php" class="boton-volver">⬅ Volver al Inicio</a>
        </div>

        <div class="sobre-imagen">
            <img src="img/01_nosotros.jpg" alt="Panadería Chachá">
        </div>
    </section>
</main>

<?php include 'redes_flotantes.html'; ?>

</body>
</html>
