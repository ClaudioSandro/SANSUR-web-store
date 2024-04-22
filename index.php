
<?php
/*$host = "localhost"; 
$usuario = "root"; 
$contraseña = ""; 
$base_de_datos = "sansur"; 


$conexion = new mysqli($host, $usuario, $contraseña, $base_de_datos);

// Verificar la conexión
if (!$conexion ->connect_error) {
    die('Error de conexión: ' . $conexion ->connect_error);
}
else {
  echo "<h2>Conectado</h2>" ;
}*/
?>


<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sansur</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
</head>

<body>
  <div class="opacidad" id="opacidad"></div>


  <script>
    
        document.getElementById('searchInput').addEventListener('input', function () {
          const searchTerm = this.value.toLowerCase();
          const producto = document.querySelectorAll('.producto');
    
          producto.forEach((item) => {
            const questionText = item.querySelector('.producto-detalles h3').innerText.toLowerCase();
            const isVisible = questionText.includes(searchTerm);
            item.style.display = isVisible ? 'block' : 'none';
          });
        });
      </script>



  <header>
    <nav class="menu">
      <div class="logazo">
        <a class="brand" href="./index.php"><img src="Public/img/logo_sansur.png" alt="Logo_de_Sansur"></a>
      </div>
      

      <div class="menu-items">
        <div class="search-container">
          <input type="text" id="searchInput" class="search-box" placeholder="Buscar...">
          <button class="search-button">Buscar</button>
        </div>
          <a class="cajasnav" id="Registrarseid">Registrarse</a>
          <a class="cajasnav" id="iniciarid">Iniciar sesión</a>
          <a class="cajasnav" id="carritoid"><i class="fa-solid fa-cart-shopping"></i> <span id="numerito" class="numerito">0</span></a>
      </div>
        <div class="menuplegable">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </div>
    </nav>
  </header>
  
  <div id="aprobacion">
    <div class="contenido">
      <p>Bienvenido</p>
    </div>
  </div>


  <div id="Registrarsebox" class="modal">
    <div class="box-content">
        <span id="CerrarRegistrarse">&times;</span>
        <section id="Registrarse">
            <h2>Registrarse</h2>
            <form onsubmit="aprobacion()">
                <label for="nombreUsuario">Nombre:</label>
                <br>
                <input type="text" id="nombreUsuario" name="nombreUsuario" required>
                <br>
                <label for="apellidoPaterno">Apellido Paterno:</label>
                <br>
                <input type="text" id="apellidoPaterno" name="apellidoPaterno" required>
                <br>
                <label for="apellidoMaterno">Apellido Materno:</label>
                <br>
                <input type="text" id="apellidoMaterno" name="apellidoMaterno" required>
                <br>
                <label for="eMail">Email:</label>
                <br>
                <input type="email" id="eMail" name="eMail" required>
                <br>
                <label for="contrasenia">Contraseña:</label>
                <br>
                <input type="password" id="contrasenia" name="contrasenia" required>
                <br>
                <label for="celular">Celular:</label>
                <br>
                <input type="tel" id="celular" name="celular" required>
                <br>
                <label for="fechaRegistro">Fecha de Registro:</label>
                <br>
                <input type="date" id="fechaRegistro" name="fechaRegistro" required>
                <br>
                <label for="region">Región:</label>
                <br>
                <input type="text" id="region" name="region" required>
                <br>
                <label for="distrito">Distrito:</label>
                <br>
                <input type="text" id="distrito" name="distrito" required>
                <br>
                <label for="direccion">Dirección:</label>
                <br>
                <textarea id="direccion" name="direccion" required></textarea>
                <br>
                <button type="submit">Registrarse</button>
            </form>
        </section>
    </div>
  </div>
  
    <div id="iniciarSesionbox" class="modal">
        <div class="box-content">
            <span id="CerrarIniciar">&times;</span>
            <section id="iniciarSesion">
                <h2>Iniciar Sesión</h2>
                <form>
                    <label for="nombreUsuario">Nombre:</label>
                    <br>
                    <input type="text" id="nombreUsuario" name="nombreUsuario" required>
                    <br>
                    <label for="contrasenia">Contraseña:</label>
                    <br>
                    <input type="password" id="contrasenia" name="contrasenia" required>
                    <br>
                    <button type="submit">Iniciar Sesión</button>
                </form>
            </section>
        </div>
    </div>

    <div id="carritoComprasbox" class="modal">
        <div class="box-content">
            <span id="CerrarCarrito">&times;</span>
            <section id="carritoCompras">
            <div class="wrapper">
        <header class="header-mobile">
            <h1 class="logo">CarpiShop</h1>
            <button class="open-menu" id="open-menu">
                <i class="bi bi-list"></i>
            </button>
        </header>
        <aside>
            <button class="close-menu" id="close-menu">
                <i class="bi bi-x"></i>
            </button>
            <header>
                <h1 class="logo">CarpiShop</h1>
            </header>
            <nav>
                <ul>
                    <li>
                        <a class="boton-menu boton-volver" href="./index.html">
                            <i class="bi bi-arrow-return-left"></i> Seguir comprando
                        </a>
                    </li>
                    <li>
                        <a class="boton-menu boton-carrito active" href="./carrito.html">
                            <i class="bi bi-cart-fill"></i> Carrito
                        </a>
                    </li>
                </ul>
            </nav>
            <footer>
                <p class="texto-footer">© 2022 Carpi Coder</p>
            </footer>
        </aside>
        <main>
            <h2 class="titulo-principal">Carrito</h2>
            <div class="contenedor-carrito">
                <p id="carrito-vacio" class="carrito-vacio">Tu carrito está vacío. <i class="bi bi-emoji-frown"></i></p>

                <div id="carrito-productos" class="carrito-productos disabled">
                    <!-- Esto se va a completar con el JS -->
                </div>

                <div id="carrito-acciones" class="carrito-acciones disabled">
                    <div class="carrito-acciones-izquierda">
                        <button id="carrito-acciones-vaciar" class="carrito-acciones-vaciar">Vaciar carrito</button>
                    </div>
                    <div class="carrito-acciones-derecha">
                        <div class="carrito-acciones-total">
                            <p>Total:</p>
                            <p id="total">$3000</p>
                        </div>
                        <button id="carrito-acciones-comprar" class="carrito-acciones-comprar">Comprar ahora</button>
                    </div>
                </div>

                <p id="carrito-comprado" class="carrito-comprado disabled">Muchas gracias por tu compra. <i class="bi bi-emoji-laughing"></i></p>

            </div>
        </main>
    </div>
            </section>
        </div>
    </div>
    
  
  <section id="swiper">
  <div class="swiper swiper-hero">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
        <!-- Slides -->
            <div class="swiper-slide">
                <img src="./Public/img/pantalones/04.jpg"
                    alt=""
                />

            </div>
            <div class="swiper-slide">
                <img src="./Public/img/pantalones/04.jpg"
                    alt=""
                />
            </div>
            <div class="swiper-slide">
                <img src="./Public/img/pantalones/04.jpg"
                    alt=""
                />
            </div>
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

    </div>
  </section>

  <section id="valores">
    
  </section>

  <section id="tienda">
  
      <div class="wrapper">
            
            <div id="contenedor-productos" class="contenedor-productos">
                <!-- Esto se va a rellenar con JS -->
            </div>
      </div>
  </section>


 

  <?php 
  include './Public/Components/footer.php'; 
  
  
  ?>

  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/5f7875a9e1.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="./Public/js/script.js"></script>
  <script src="./Public/js/script2.js"></script>
</body>

</html>