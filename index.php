<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sansur</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js" defer></script>
</head>

<body>
  <div class="opacidad" id="opacidad"></div>
  <header>
    <nav class="menu">
      <a class="brand" href="#">Brand</a>      
      <div class="menu-items">
        <a href="#">Inicio</a>
        <a href="#">Opción 1</a>
        <a href="#">Opción 2</a>
        <a href="#">Opción 3</a>
        <div class="multiopcion">
          <span>Multiopcion</span>
          <div class="submenu">
            <ul>
              <li><a class="opcionessubmenu" href="#">Opción A</a></li>
              <li><a class="opcionessubmenu" href="#">Opción B</a></li>
              <li><a class="opcionessubmenu" href="#">Opción C</a></li>
            </ul>
          </div>
        </div>
        <a class="cajasnav" id="Registrarseid">Registrar</a>
        <a class="cajasnav" id="iniciarid">Iniciar Sesión</a>
        <a class="cajasnav" id="carritoid">Carrito de Compras</a>
        <a class="icono" onclick="modooscuro()"><span id="icono">☀️</span></a>
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
                  <label for="usuario">Usuario:</label>
                  <br>
                  <input type="text" id="usuario" name="usuario" required>
                  <br>
                  <label for="email">Email:</label>
                  <br>
                  <input type="email" id="email" name="email" required>
                  <br>
                  <label for="contrasena">Contraseña:</label>
                  <br>
                  <input type="password" id="contrasena" name="contrasena" required>
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
                    <label for="usuario">Usuario:</label>
                    <br>
                    <input type="text" id="usuario" name="usuario" required>
                    <br>
                    <label for="contrasena">Contraseña:</label>
                    <br>
                    <input type="password" id="contrasena" name="contrasena" required>
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
                <h2>Carrito de Compras</h2>
                <div class="carrito">
                    <ul id="listaCarrito">
                        <!-- La lista de productos en el carrito se llenará dinámicamente con JavaScript -->
                    </ul>
                    <p>Total: $<span id="totalCarrito">0.00</span></p>
                    <button type="submit">Comprar Carrito</button>
                </div>
            </section>
        </div>
    </div>
    
    
  <section id="inicio">
    <h1>Bag UPC</h1>
    <p>Hola</p>
    <p>Hola</p>
    <a class="botoninicio">Opción C</a>
  </section>

  <section id="valores">
    <h2>Valores de la Startup</h2>
    <ul>
      <li>Productos de alta calidad</li>
      <li>Finos accesorios</li>
      <li>Diseños únicos</li>
    </ul>
  </section>

  <section id="informacion">
    <h2>Sobre Bag UPC S.A.C.</h2>
    <p>es una Startup peruana fundada en 2020...</p>
    <!-- Puedes continuar con más información sobre la empresa -->
  </section>


  <section id="redes-sociales">
    <h2>Síguenos en redes sociales</h2>
    <ul>
      <li><a href="https://www.facebook.com/tucuenta" target="_blank">Facebook</a></li>
      <li><a href="https://www.instagram.com/tucuenta" target="_blank">Instagram</a></li>
      <li><a href="https://www.linkedin.com/company/tucuenta" target="_blank">LinkedIn</a></li>
      <li><a href="https://www.youtube.com/c/tucuenta" target="_blank">YouTube</a></li>
    </ul>
  </section>

  <footer>
    <p>&copy; 2023 Sansur. Todos los derechos reservados.</p>
  </footer>
</body>

</html>