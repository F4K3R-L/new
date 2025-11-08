<?php
session_start();

// Productos (mismos que en index.php)
$productos = [
    1 => ["nombre" => "Pan Popular", "precio" => 0.16, "anterior" => 0.20, "imagen" => "img/popular.jpg"],
    2 => ["nombre" => "Bizcocho", "precio" => 0.33, "anterior" => 0.40, "imagen" => "img/bizcocho.jpg"],
    3 => ["nombre" => "Cacho", "precio" => 0.20, "anterior" => 0.25, "imagen" => "img/cacho.jpg"],
    4 => ["nombre" => "Camote", "precio" => 0.25, "anterior" => 0.30, "imagen" => "img/camote.jpg"],
    5 => ["nombre" => "Choclo", "precio" => 0.20, "anterior" => 0.25, "imagen" => "img/choclo.jpg"],
    6 => ["nombre" => "Cumpado", "precio" => 0.33, "anterior" => 0.40, "imagen" => "img/cumpado.jpg"],
    7 => ["nombre" => "Mollete", "precio" => 0.33, "anterior" => 0.40, "imagen" => "img/mollete.jpg"],
    8 => ["nombre" => "Maiz", "precio" => 0.33, "anterior" => 0.40, "imagen" => "img/maiz.jpg"],
    9 => ["nombre" => "Mantequilla", "precio" => 0.20, "anterior" => 0.30, "imagen" => "img/mantequilla.jpg"],    
    10 => ["nombre" => "Trigo", "precio" => 0.20, "anterior" => 0.30, "imagen" => "img/trigo.jpg"],
    11 => ["nombre" => "Galletas", "precio" => 0.20, "anterior" => 0.25, "imagen" => "img/galletas.jpg"],    
    12 => ["nombre" => "Bombitas", "precio" => 0.20, "anterior" => 0.25, "imagen" => "img/bombitas.jpg"],
    13 => ["nombre" => "Brillantes", "precio" => 0.20, "anterior" => 0.25, "imagen" => "img/brillantes.jpg"],
    14 => ["nombre" => "Dulce de Maiz", "precio" => 0.20, "anterior" => 0.25, "imagen" => "img/dulce de maiz.jpg"],
    15 => ["nombre" => "Bocadillo", "precio" => 0.20, "anterior" => 0.25, "imagen" => "img/rosquitas.jpg"],
];

// Actualizar cantidad
if (isset($_GET['accion'])) {
    $id = $_GET['id'];
    if ($_GET['accion'] == 'sumar') {
        $_SESSION['carrito'][$id]++;
    } elseif ($_GET['accion'] == 'restar') {
        $_SESSION['carrito'][$id]--;
        if ($_SESSION['carrito'][$id] <= 0) {
            unset($_SESSION['carrito'][$id]);
        }
    } elseif ($_GET['accion'] == 'eliminar') {
        unset($_SESSION['carrito'][$id]);
    }
    header("Location: carrito.php");
    exit;
}

// Vaciar carrito
if (isset($_GET['vaciar'])) {
    unset($_SESSION['carrito']);
    header("Location: carrito.php");
    exit;
}

// Calcular total
$total = 0;
if (!empty($_SESSION['carrito'])) {
    foreach ($_SESSION['carrito'] as $id => $cantidad) {
        $total += $productos[$id]['precio'] * $cantidad;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Tu carrito | Panadería Chachá</title>
<link rel="stylesheet" href="style.css">
<style>
/* 🔹 Ventana Modal */
.modal {
  display: none;
  position: fixed;
  z-index: 999;
  padding-top: 150px;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0,0,0,0.6);
}

.modal-content {
  background-color: #fff8e1;
  margin: auto;
  padding: 25px;
  border: 2px solid #ff6600;
  width: 60%;
  max-width: 700px;
  border-radius: 15px;
  text-align: center;
  box-shadow: 0 5px 20px rgba(0,0,0,0.3);
  animation: fadeIn 0.4s ease;
}

@keyframes fadeIn {
  from {opacity: 0; transform: translateY(-20px);}
  to {opacity: 1; transform: translateY(0);}
}

.modal h3 {
  color: #ff6600;
  font-size: 22px;
  margin-bottom: 10px;
}

.modal p {
  font-size: 17px;
  color: #333;
  margin: 8px 0;
}

.close {
  color: #ff6600;
  float: right;
  font-size: 25px;
  font-weight: bold;
  cursor: pointer;
  margin-top: -10px;
}

.close:hover {
  color: red;
}

.btn-nota {
  display: inline-block;
  margin: 15px auto;
  padding: 10px 25px;
  background-color: #ff6600;
  color: white;
  border-radius: 10px;
  text-decoration: none;
  font-weight: bold;
  transition: background 0.3s;
}

.btn-nota:hover {
  background-color: #e05500;
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

<main class="carrito-container">
    <h2>🛒 Tu Carrito de Compras</h2>

    <!-- 🔹 Botón para abrir la nota -->
    <div style="text-align:center;">
        <button id="abrirNota" class="btn-nota">ℹ️ Condiciones del Pedido</button>
    </div>

    <?php if (empty($_SESSION['carrito'])): ?>
        <p style="text-align:center; font-size:18px;">Tu carrito está vacío 😢</p>
        <div style="text-align:center; margin-top:20px;">
            <a href="index.php" class="btn-carrito">Volver a comprar</a>
        </div>
    <?php else: ?>
        <table class="tabla-carrito">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['carrito'] as $id => $cantidad): ?>
                    <tr>
                        <td><img src="<?php echo $productos[$id]['imagen']; ?>" alt="<?php echo $productos[$id]['nombre']; ?>"></td>
                        <td><?php echo $productos[$id]['nombre']; ?></td>
                        <td>S/ <?php echo number_format($productos[$id]['precio'], 2); ?></td>
                        <td>
                            <a href="?accion=restar&id=<?php echo $id; ?>" class="btn-carrito">-</a>
                            <?php echo $cantidad; ?>
                            <a href="?accion=sumar&id=<?php echo $id; ?>" class="btn-carrito">+</a>
                        </td>
                        <td>S/ <?php echo number_format($productos[$id]['precio'] * $cantidad, 2); ?></td>
                        <td><a href="?accion=eliminar&id=<?php echo $id; ?>" class="btn-eliminar">Eliminar</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="total">
            Total: S/ <?php echo number_format($total, 2); ?>
        </div>

        <a href="?vaciar=true" class="btn-eliminar" style="margin-right:10px;">Vaciar carrito</a>

        <?php
        // Enlace a WhatsApp con lista de productos
        $mensaje = "Hola, quiero realizar el siguiente pedido:%0A";
        foreach ($_SESSION['carrito'] as $id => $cantidad) {
            $mensaje .= "- " . $productos[$id]['nombre'] . " x" . $cantidad . " = S/ " . number_format($productos[$id]['precio'] * $cantidad, 2) . "%0A";
        }
        $mensaje .= "%0ATotal: S/ " . number_format($total, 2);
        $whatsapp = "https://wa.me/51900000000?text=" . $mensaje; // Cambia por tu número
        ?>

        <a href="<?php echo $whatsapp; ?>" target="_blank" class="btn-comprar">Finalizar compra por WhatsApp</a>
    <?php endif; ?>
</main>

<!-- 🔹 Ventana Modal de Noticia -->
<div id="notaModal" class="modal">
  <div class="modal-content">
    <span class="close" id="cerrarNota">&times;</span>
    <h3>🧾 Condiciones Importantes del Pedido</h3>
    <p>📌 Todo pedido deberá ser confirmado con un <strong>adelanto del 50%</strong> del pago total.</p>
    <p>📍 Las compras menores a <strong>S/ 10.00</strong> deberán ser <strong>recogidas en nuestras sedes</strong>.</p>
    <p>🚚 Las compras mayores a <strong>S/ 15.00</strong> cuentan con <strong>delivery gratuito</strong> a la dirección proporcionada por el cliente.</p>
    <br>
    <a href="#" class="btn-nota" id="cerrarNota2">Entendido ✅</a>
  </div>
</div>

<script>
// Mostrar y ocultar la ventana de noticia
const modal = document.getElementById("notaModal");
const abrir = document.getElementById("abrirNota");
const cerrar = document.getElementById("cerrarNota");
const cerrar2 = document.getElementById("cerrarNota2");

abrir.onclick = function() {
  modal.style.display = "block";
}
cerrar.onclick = function() {
  modal.style.display = "none";
}
cerrar2.onclick = function() {
  modal.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

<?php include 'redes_flotantes.html'; ?>

</body>
</html>
