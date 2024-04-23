
<?php
$host = 'localhost'; 
$usuario = 'root'; 
$contraseña = ''; 
$base_de_datos = 'sansur_first_try'; 

// Establecer la conexión
$conexion = mysqli_connect($host, $usuario, $contraseña, $base_de_datos);

// Verificar la conexión
if (!$conexion) {
    die('Error de conexión: ' . mysqli_connect_error());
}
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
</head>

<body>
  <div class="opacidad" id="opacidad"></div>
  <header>
    <nav class="menu">
      <div class="logazo">
        <a class="brand" href="./index.php"><img src="Public/img/logo_sansur.png" alt="Logo_de_Sansur"></a>
      </div>
      

      <div class="menu-items">
        <div class="search-container">
          <input type="text" class="search-box" placeholder="Buscar...">
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
            <form action="" method="post">

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
                <label for="nombreRegion">Región:</label>
                <br>
                <input type="text" id="nombreRegion" name="nombreRegion" required>
                <br>
                <label for="nombreDistrito">Distrito:</label>
                <br>
                <input type="text" id="nombreDistrito" name="nombreDistrito" required>
                <br>
                <label for="descripcionDireccion">Dirección:</label>
                <br>
                <textarea id="descripcionDireccion" name="descripcionDireccion" required></textarea>
                <br>
                <button type="submit">Registrarse</button>
            </form>
        </section>
        <?php
            // Verificar si el formulario ha sido enviado
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Obtener los datos del formulario
                $nombreUsuario = $_POST['nombreUsuario'];
                $apellidoPaterno = $_POST['apellidoPaterno'];
                $apellidoMaterno = $_POST['apellidoMaterno'];
                $eMail = $_POST['eMail'];
                $contrasenia = $_POST['contrasenia'];
                $celular = $_POST['celular'];
                $fechaRegistro = $_POST['fechaRegistro'];
                $nombreRegion = $_POST['nombreRegion'];
                $nombreDistrito = $_POST['nombreDistrito'];
                $descripcionDireccion = $_POST['descripcionDireccion'];

                // Insertar en la tabla Region
                $sql = "INSERT INTO Region (nombreRegion) VALUES ('$nombreRegion')";
                if (mysqli_query($conexion, $sql)) {
                    // Obtener el ID de la región recién insertada
                    $idRegion = mysqli_insert_id($conexion);

                    // Insertar en la tabla Distrito
                    $sql = "INSERT INTO Distrito (nombreDistrito, Region_idRegion) VALUES ('$nombreDistrito', '$idRegion')";
                    if (mysqli_query($conexion, $sql)) {
                        // Obtener el ID del distrito recién insertado
                        $idDistrito = mysqli_insert_id($conexion);

                        // Insertar en la tabla Direccion
                        $sql = "INSERT INTO Direccion (descripcionDireccion, Distrito_idDistrito) VALUES ('$descripcionDireccion', '$idDistrito')";
                        if (mysqli_query($conexion, $sql)) {
                            // Obtener el ID de la dirección recién insertada
                            $idDireccion = mysqli_insert_id($conexion);

                            // Insertar en la tabla Usuario
                            $sql = "INSERT INTO Usuario (nombreUsuario, apellidoPaterno, apellidoMaterno, eMail, contrasenia, celular, fechaRegistro, Direccion_idDireccion) 
                                    VALUES ('$nombreUsuario', '$apellidoPaterno', '$apellidoMaterno', '$eMail', '$contrasenia', '$celular', '$fechaRegistro', '$idDireccion')";
                            if (mysqli_query($conexion, $sql)) {
                                echo "Registro exitoso";
                            } else {
                                echo "Error al guardar el usuario: " . mysqli_error($conexion);
                            }
                        } else {
                            echo "Error al guardar la dirección: " . mysqli_error($conexion);
                        }
                    } else {
                        echo "Error al guardar el distrito: " . mysqli_error($conexion);
                    }
                } else {
                    echo "Error al guardar la región: " . mysqli_error($conexion);
                }
            }
        ?>

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
    
  
  <section id="inicio">
    
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
  <script src="./Public/js/script.js"></script>
  <script src="./Public/js/script2.js"></script>
</body>

</html>