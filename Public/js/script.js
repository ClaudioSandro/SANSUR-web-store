//header
var hamburger = document.querySelector(".menuplegable");
	var menu = document.querySelector(".menu-items");

	hamburger.addEventListener("click", function(){
		menu.classList.toggle("active");
	})

//////

document.getElementById('iniciarid').addEventListener('click', function() {
    showPopup('iniciarSesionbox');
});

document.getElementById('CerrarIniciar').addEventListener('click', function() {
    closePopup('iniciarSesionbox');
});


document.getElementById('carritoid').addEventListener('click', function() {
    showPopup('carritoComprasbox');
});

document.getElementById('CerrarCarrito').addEventListener('click', function() {
    closePopup('carritoComprasbox');
});


document.getElementById('Registrarseid').addEventListener('click', function() {
    showPopup('Registrarsebox');
});

document.getElementById('CerrarRegistrarse').addEventListener('click', function() {
    closePopup('Registrarsebox');
});



document.getElementById('opacidad').addEventListener('click', function() {
    closePopup('iniciarSesionbox');
    closePopup('carritoComprasbox');
    closePopup('Registrarsebox');
});

function showPopup(Id) {
    document.getElementById('opacidad').style.display = 'block'; // Muestra el fondo oscuro
    document.getElementById(Id).style.display = 'block'; // Muestra la ventana emergente
    document.body.style.overflow = 'hidden'; // Desactiva el desplazamiento
}

function closePopup(Id) {
    document.getElementById('opacidad').style.display = 'none'; // Oculta el fondo oscuro
    document.getElementById(Id).style.display = 'none'; // Oculta la ventana emergente
    document.body.style.overflow = 'auto'; // Reactiva el desplazamiento
}

function modooscuro() {
    const icono = document.getElementById('icono');

    if (document.body.classList.contains('dark-mode')) {
        icono.textContent = "☀️";
        document.body.classList.remove('dark-mode');
    } else {
        icono.textContent = "🌙";
        document.body.classList.add('dark-mode');
    }
}

function aprobacion() {
    closePopup('Registrarsebox'); 
    showPopup('aprobacion');
    setTimeout(function() {
        closePopup('aprobacion');
    }, 3000);
}


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
        gravity: "top", // `top` or `bottom`
        position: "right", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
            background: "linear-gradient(to right, #4b33a8, #785ce9)",
            borderRadius: "2rem",
            textTransform: "uppercase",
            fontSize: ".75rem"
        },
        offset: {
            x: '1.5rem', // horizontal axis - can be a number or a string indicating unity. eg: '2em'
            y: '1.5rem' // vertical axis - can be a number or a string indicating unity. eg: '2em'
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



