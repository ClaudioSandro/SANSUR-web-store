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