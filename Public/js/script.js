//header
var hamburger = document.querySelector(".menuplegable");
var menu = document.querySelector(".menu-items");
var opacidad = document.getElementById("opacidad");
var header = document.querySelector(".menu");


    function abrirMenu() {
        document.body.style.overflow = 'hidden';
        menu.classList.add("active");
        hamburger.classList.add("close");
        opacidad.classList.add("activo"); // Agregar la clase activo para mostrar la opacidad
    }


    function cerrarMenu() {
        document.body.style.overflow = 'auto';
        menu.classList.remove("active");
        hamburger.classList.remove("close");
        opacidad.classList.remove("activo"); // Quitar la clase activo para ocultar la opacidad
    }


    hamburger.addEventListener("click", function(event){
        if (menu.classList.contains("active")) {
          
            cerrarMenu(); // Si el menú está abierto, ciérralo
        } else {
          
            abrirMenu(); // Si el menú está cerrado, ábrelo
        }
        event.stopPropagation(); // Evita que el clic en el icono propague al documento
      });
      

      document.addEventListener("click", function(event) {
        if (!menu.contains(event.target) && !hamburger.contains(event.target)) {
          cerrarMenu();
        }
        });
        
        menu.addEventListener("click", function(event) {
        event.stopPropagation();
        });

        header.addEventListener("click", function(event) {
            // Verifica si el menú está activo
            if (menu.classList.contains("active")) {
                // Si el menú está activo, detén la propagación del evento
                event.stopPropagation();
            }
        });



//////

document.getElementById('iniciarid').addEventListener('click', function() {  
    closePopup('carritoComprasbox');
    closePopup('Registrarsebox');

    showPopup('iniciarSesionbox');
});

document.getElementById('CerrarIniciar').addEventListener('click', function() {
    closePopup('iniciarSesionbox');
});


document.getElementById('carritoid').addEventListener('click', function() {
    closePopup('iniciarSesionbox');
    closePopup('Registrarsebox');

    showPopup('carritoComprasbox');
});

document.getElementById('CerrarCarrito').addEventListener('click', function() {
    closePopup('carritoComprasbox');

    location.reload();
});


document.getElementById('Registrarseid').addEventListener('click', function() {
    closePopup('iniciarSesionbox');
    closePopup('carritoComprasbox');

    showPopup('Registrarsebox');
});

document.getElementById('CerrarRegistrarse').addEventListener('click', function() {
    closePopup('Registrarsebox');
});



document.getElementById('opacidad').addEventListener('click', function() {
    closePopup('iniciarSesionbox');
    closePopup('carritoComprasbox');
    closePopup('Registrarsebox');
    cerrarMenu();
});


document.getElementById('iniciarSesionbox').addEventListener('click', function(event) {
    event.stopPropagation(); // Detiene la propagación del evento hacia arriba
});

document.getElementById('carritoComprasbox').addEventListener('click', function(event) {
    event.stopPropagation(); // Detiene la propagación del evento hacia arriba
});

document.getElementById('Registrarsebox').addEventListener('click', function(event) {
    event.stopPropagation(); // Detiene la propagación del evento hacia arriba
});


function showPopup(Id) {
    opacidad.classList.add("activo"); // Muestra el fondo oscuro
    document.getElementById(Id).style.display = 'block'; // Muestra la ventana emergente
    document.body.style.overflow = 'hidden'; // Desactiva el desplazamiento
    event.stopPropagation();
    if (Id === 'carritoComprasbox') {
        actualizarCarrito();
    }
}


function closePopup(Id) {
    var popup = document.getElementById('carritoComprasbox');
    if(popup.style.display == 'block'){
        opacidad.classList.remove("activo"); // Oculta el fondo oscuro
        document.getElementById(Id).style.display = 'none'; // Oculta la ventana emergente
        document.body.style.overflow = 'auto'; // Reactiva el desplazamiento
        event.stopPropagation();
        location.reload();
    }else{

        if (!menu.classList.contains("active")) {
            opacidad.classList.remove("activo"); 
        }
        document.getElementById(Id).style.display = 'none'; // Oculta la ventana emergente
        document.body.style.overflow = 'auto'; // Reactiva el desplazamiento
        event.stopPropagation();
    }
}

function aprobacion() {
    closePopup('Registrarsebox'); 
    showPopup('aprobacion');
    setTimeout(function() {
        closePopup('aprobacion');
    }, 3000);
}


/////swiper

const swiper = new Swiper('.swiper-hero', {
    direction: 'horizontal',
    loop: false,
    allowTouchMove: true,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    }

});






////////////////////////////////////////////////////tienda

let productos = [];

fetch("./Public/js/productos.json")
    .then(response => response.json())
    .then(data => {
        productos = data;
        cargarProductos(productos);
    });

const contenedorProductos = document.querySelector("#contenedor-productos");
let botonesAgregar;
const numerito = document.querySelector("#numerito");

function cargarProductos(productosElegidos) {
    contenedorProductos.innerHTML = "";

    productosElegidos.forEach(producto => {
        const div = document.createElement("div");
        div.classList.add("producto");
        div.innerHTML = `
            <img class="producto-imagen" src="${producto.imagen}" alt="${producto.titulo}">
            <div class="producto-detalles">
                <h3 class="producto-titulo">${producto.titulo}</h3>
                <p class="producto-precio">$${producto.precio}</p>
                <button class="producto-agregar" id="${producto.id}">AGREGAR</button>
            </div>
        `;
        contenedorProductos.append(div);
    });

    actualizarBotonesAgregar();
}

function actualizarBotonesAgregar() {
    botonesAgregar = document.querySelectorAll(".producto-agregar");
    botonesAgregar.forEach(boton => {
        boton.addEventListener("click", agregarAlCarrito);
    });
}

let productosEnCarrito;
let productosEnCarritoLS = localStorage.getItem("productos-en-carrito");

if (productosEnCarritoLS) {
    productosEnCarrito = JSON.parse(productosEnCarritoLS);
    actualizarNumerito();
} else {
    productosEnCarrito = [];
}

function agregarAlCarrito(e) {
    Toastify({
        text: "Producto agregado",
        duration: 3000,
        close: true,
        gravity: "bottom", // `top` or `bottom`
        position: "right", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
            background: "linear-gradient(to right, #004691, #007BFF)",
            borderRadius: "15px",
            textTransform: "uppercase",
            fontSize: ".75rem"
        },
        offset: {
            x: '40px', // horizontal axis - can be a number or a string indicating unity. eg: '2em'
            y: '40px' // vertical axis - can be a number or a string indicating unity. eg: '2em'
        },
        onClick: function () {} // Callback after click
    }).showToast();

    const idBoton = e.currentTarget.id;
    const productoAgregado = productos.find(producto => producto.id === idBoton);

    if (productosEnCarrito.some(producto => producto.id === idBoton)) {
        const index = productosEnCarrito.findIndex(producto => producto.id === idBoton);
        productosEnCarrito[index].cantidad++;
    } else {
        productoAgregado.cantidad = 1;
        productosEnCarrito.push(productoAgregado);
    }

    actualizarNumerito();
    localStorage.setItem("productos-en-carrito", JSON.stringify(productosEnCarrito));
}

function actualizarNumerito() {
    let nuevoNumerito = productosEnCarrito.reduce((acc, producto) => acc + producto.cantidad, 0);
    numerito.innerText = nuevoNumerito;
}




/////////carrito



function actualizarCarrito() {
    let carritoGuardado = localStorage.getItem("productos-en-carrito");
    Carrito = carritoGuardado ? JSON.parse(carritoGuardado) : [];
    cargarProductosCarrito();
}



let Carrito = localStorage.getItem("productos-en-carrito");
Carrito = JSON.parse(Carrito);

const contenedorCarritoVacio = document.querySelector("#carrito-vacio");
const contenedorCarritoProductos = document.querySelector("#carrito-productos");
const contenedorCarritoAcciones = document.querySelector("#carrito-acciones");
const contenedorCarritoComprado = document.querySelector("#carrito-comprado");
let botonesEliminar = document.querySelectorAll(".carrito-producto-eliminar");
const botonVaciar = document.querySelector("#carrito-acciones-vaciar");
const contenedorTotal = document.querySelector("#total");
const botonComprar = document.querySelector("#carrito-acciones-comprar");


function cargarProductosCarrito() {
    if (Carrito && Carrito.length > 0) {

        contenedorCarritoVacio.classList.add("disabled");
        contenedorCarritoProductos.classList.remove("disabled");
        contenedorCarritoAcciones.classList.remove("disabled");
        contenedorCarritoComprado.classList.add("disabled");
    
        contenedorCarritoProductos.innerHTML = "";
    
        Carrito.forEach(producto => {
    
            const div = document.createElement("div");
            div.classList.add("carrito-producto");
            div.innerHTML = `
                <img class="carrito-producto-imagen" src="${producto.imagen}" alt="${producto.titulo}">
                <div class="carrito-producto-titulo">
                    <small>Título</small>
                    <h3>${producto.titulo}</h3>
                </div>
                <div class="carrito-producto-cantidad">
                    <small>Cantidad</small>
                    <p>${producto.cantidad}</p>
                </div>
                <div class="carrito-producto-precio">
                    <small>Precio</small>
                    <p>$${producto.precio}</p>
                </div>
                <div class="carrito-producto-subtotal">
                    <small>Subtotal</small>
                    <p>$${producto.precio * producto.cantidad}</p>
                </div>
                <button class="carrito-producto-eliminar" id="${producto.id}"><i class="bi bi-trash-fill"></i></button>
            `;
    
            contenedorCarritoProductos.append(div);
        })
    
    actualizarBotonesEliminar();
    actualizarTotal();
	
    } else {
        contenedorCarritoVacio.classList.remove("disabled");
        contenedorCarritoProductos.classList.add("disabled");
        contenedorCarritoAcciones.classList.add("disabled");
        contenedorCarritoComprado.classList.add("disabled");
    }

}

cargarProductosCarrito();

function actualizarBotonesEliminar() {
    botonesEliminar = document.querySelectorAll(".carrito-producto-eliminar");

    botonesEliminar.forEach(boton => {
        boton.addEventListener("click", eliminarDelCarrito);
    });
}

function eliminarDelCarrito(e) {
    Toastify({
        text: "Producto eliminado",
        duration: 3000,
        close: true,
        gravity: "bottom", // `top` or `bottom`
        position: "right", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
          background: "linear-gradient(to right, #004691, #007BFF)",
          borderRadius: "2rem",
          textTransform: "uppercase",
          fontSize: ".75rem"
        },
        offset: {
            x: '40px', // horizontal axis - can be a number or a string indicating unity. eg: '2em'
            y: '40px' // vertical axis - can be a number or a string indicating unity. eg: '2em'
          },
        onClick: function(){} // Callback after click
      }).showToast();

    const idBoton = e.currentTarget.id;
    const index = Carrito.findIndex(producto => producto.id === idBoton);
    
    Carrito.splice(index, 1);
    cargarProductosCarrito();

    localStorage.setItem("productos-en-carrito", JSON.stringify(Carrito));
// Actualizar el número de productos en el carrito
const numeritoSpan = document.getElementById('numerito');
numeritoSpan.textContent = Carrito.reduce((total, producto) => total + producto.cantidad, 0);
}

botonVaciar.addEventListener("click", vaciarCarrito);
function vaciarCarrito() {

    Swal.fire({
        title: '¿Estás seguro?',
        icon: 'question',
        html: `Se van a borrar ${Carrito.reduce((acc, producto) => acc + producto.cantidad, 0)} productos.`,
        showCancelButton: true,
        focusConfirm: false,
        confirmButtonText: 'Sí',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            Carrito.length = 0;
            localStorage.setItem("productos-en-carrito", JSON.stringify(Carrito));
            cargarProductosCarrito();
            location.reload();
        }
    })
}


function actualizarTotal() {
    const totalCalculado = Carrito.reduce((acc, producto) => acc + (producto.precio * producto.cantidad), 0);
    total.innerText = `$${totalCalculado}`;
}

botonComprar.addEventListener("click", comprarCarrito);
function comprarCarrito() {

    Carrito.length = 0;
    localStorage.setItem("productos-en-carrito", JSON.stringify(Carrito));
    
    contenedorCarritoVacio.classList.add("disabled");
    contenedorCarritoProductos.classList.add("disabled");
    contenedorCarritoAcciones.classList.add("disabled");
    contenedorCarritoComprado.classList.remove("disabled");

}


