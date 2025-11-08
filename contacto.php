<?php
// contacto.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['nombre']);
    $telefono = trim($_POST['telefono']);
    $mensaje = trim($_POST['mensaje']);

    if (empty($nombre) || empty($telefono) || empty($mensaje)) {
        $respuesta = "⚠️ Por favor completa todos los campos.";
    } else {
        // ✅ Número de WhatsApp al que se enviarán los mensajes (sin + ni espacios)
        $numero_whatsapp = "51960640920"; // ← CAMBIA ESTE NÚMERO

        // Construir el texto del mensaje
        $texto = "📩 Nuevo mensaje desde la web Panadería Chachá:%0A%0A"
                . "👤 Nombre: $nombre%0A"
                . "📞 Teléfono: $telefono%0A"
                . "📝 Mensaje: $mensaje";

        // Redirigir al enlace de WhatsApp
        header("Location: https://wa.me/$numero_whatsapp?text=$texto");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Contáctanos | Panadería Chachá</title>
<link rel="stylesheet" href="style.css">
<style>
/* ====== FORMULARIO DE CONTACTO ====== */
.contacto {
    max-width: 1100px;
    margin: 60px auto;
    background: rgba(255,255,255,0.95);
    border-radius: 15px;
    padding: 40px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
}
.contacto h2 {
    text-align: center;
    color: #ff6600;
    margin-bottom: 30px;
}
.formulario {
    display: flex;
    flex-direction: column;
    gap: 20px;
    width: 100%;
}
.formulario input, 
.formulario textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-size: 16px;
    resize: none;
    transition: border 0.2s;
}
.formulario input:focus, 
.formulario textarea:focus {
    outline: none;
    border-color: #ff6600;
    box-shadow: 0 0 5px rgba(255,102,0,0.3);
}
.boton-enviar {
    background: #25d366;
    color: #fff;
    border: none;
    padding: 14px;
    font-size: 17px;
    border-radius: 8px;
    cursor: pointer;
    transition: background 0.3s, transform 0.2s;
    font-weight: bold;
}
.boton-enviar:hover {
    background: #1ebe5b;
    transform: scale(1.03);
}
.mensaje-resultado {
    text-align: center;
    font-size: 18px;
    margin-top: 20px;
}
/* ====== MAPA ====== */
.mapa {
    margin-top: 60px;
}
.mapa h3 {
    text-align: center;
    color: #3b4a59;
    margin-bottom: 20px;
}
.mapa-contenedor {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 30px;
}
.mapa iframe {
    width: 100%;
    height: 300px;
    border: none;
    border-radius: 10px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.2);
}
.mapa a {
    display: inline-block;
    background: #ff6600;
    color: white;
    padding: 10px 16px;
    border-radius: 8px;
    font-weight: bold;
    text-decoration: none;
    transition: background 0.3s;
}
.mapa a:hover {
    background: #cc5200;
}
@media (max-width: 800px) {
    .mapa-contenedor {
        grid-template-columns: 1fr;
    }
}
/* ====== CONTACTO PIE ====== */
.contacto-pie {
    margin-top: 40px;
    text-align: center;
    background: rgba(255, 255, 255, 0.8);
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.15);
}
.contacto-pie h4 {
    color: #ff6600;
    margin-bottom: 10px;
}
.contacto-pie p {
    margin: 5px 0;
    color: #333;
    font-size: 15px;
}
.contacto-pie a {
    color: #ff6600;
    text-decoration: none;
    font-weight: bold;
}
.contacto-pie a:hover {
    text-decoration: underline;
}
/* ====== BOTÓN VOLVER ====== */
.boton-volver {
    display: block;
    margin: 30px auto 0;
    padding: 12px 20px;
    background: #ff6600;
    color: #fff;
    text-decoration: none;
    font-weight: bold;
    border-radius: 8px;
    transition: background 0.3s;
    text-align: center;
    width: fit-content;
}
.boton-volver:hover {
    background: #cc5200;
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
        <a href="contacto.php" class="activo">CONTACTANOS</a>
        <a href="carrito.php">CARRITO 🛒</a>
    </nav>
</header>

<main>
    <section class="contacto">
        <h2>Contáctanos</h2>

        <?php if (isset($respuesta)) echo "<p class='mensaje-resultado'>$respuesta</p>"; ?>

        <form class="formulario" method="POST" action="">
            <input type="text" name="nombre" placeholder="Tu nombre completo" required>
            <input type="tel" name="telefono" placeholder="Número de celular" required>
            <textarea name="mensaje" rows="5" placeholder="Escribe tu mensaje..." required></textarea>
            <button type="submit" class="boton-enviar">💬 Enviar por WhatsApp</button>
        </form>

        <!-- 🔹 SECCIÓN DE MAPAS -->
        <div class="mapa">
            <h3>📍 Nuestras Sucursales</h3>
            <div class="mapa-contenedor">

                <!-- 🏠 Sucursal Plazuela - Burgos -->
                <div>
                    <h4>Sucursal Plazuela - Burgos</h4>
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3900.835733337427!2d-77.04357342421518!3d-12.047512142461037!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c8c7c930c4c5%3A0x6a55b7a25dfe6633!2sPlazuela%20de%20Burgos!5e0!3m2!1ses!2spe!4v1730750900000!5m2!1ses!2spe" 
                        allowfullscreen="" loading="lazy">
                    </iframe>
                    <div style="text-align:center; margin-top:10px;">
                        <a href="https://maps.app.goo.gl/G3PpwHTJYbt2zjr78" target="_blank">🌍 Ver en Google Maps</a>
                    </div>
                </div>

                <!-- 🏠 Sucursal Mercado - Yance -->
                <div>
                    <h4>Sucursal Mercado - Yance</h4>
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3900.871337005197!2d-77.0307454242151!3d-12.045512142463046!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c8e2c2c6a1ad%3A0x64d0f3b21c6cbd01!2sMercado%20Yance!5e0!3m2!1ses!2spe!4v1730751000000!5m2!1ses!2spe" 
                        allowfullscreen="" loading="lazy">
                    </iframe>
                    <div style="text-align:center; margin-top:10px;">
                        <a href="https://maps.app.goo.gl/68CcperWKiwMQcEP8" target="_blank">🌍 Ver en Google Maps</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- 🔹 PIE DE CONTACTO -->
        <div class="contacto-pie">
            <h4>📞 Información de Contacto</h4>
            <p><strong>Teléfonos:</strong> 941966304 - 950017338</p>
            <p><strong>Correo:</strong> <a href="mailto:oscar955678@gmail.com">oscar955678@gmail.com</a></p>
            <p><strong>Dirección:</strong> Prolongación Santo Domingo 133</p>
        </div>

        <!-- 🔹 BOTÓN VOLVER -->
        <a href="index.php" class="boton-volver">⬅ Volver al Inicio</a>
    </section>
</main>

<?php include 'redes_flotantes.html'; ?>

</body>
</html>
