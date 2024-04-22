document.addEventListener('DOMContentLoaded', ()=>{
    darkMode();
    eventListeners();
});

function eventListeners() {
    const movilMenu = document.querySelector('.movil-menu');
    movilMenu.addEventListener('click', navegacionResponsive);

    //Muestra campos condicionales
    const contacto = document.querySelectorAll('input[name="contacto[contacto]"]');
    
    contacto.forEach(input => input.addEventListener('click', mostrarMetodosContacto))
}

function mostrarMetodosContacto(e){
    const contactoDiv = document.querySelector('#contacto');
    if (e.target.value === 'telefono') {
        contactoDiv.innerHTML = `
            
            <label for="telefono">Tu telefono</label>
            <input type="tel" placeholder="Tu Telefono" id="telefono" name="contacto[telefono]">

            <p>Elija la fecha y la hora para ser contactado por telefono</p>

            <label for="fecha">Fecha</label>
            <input type="date" id="fecha" name="contacto[fecha]">

            <label for="hora">Hora</label>
            <input type="time" placeholder="Telefono" id="hora" min="09:00" max="18:00" name="contacto[hora]">`
    } else{
        contactoDiv.innerHTML = `
            <label for="email">E-mail</label>
            <input type="email" placeholder="Tu E-mail" id="email" name="contacto[email]">
        `
    }
}


function darkMode() {
    const darkModeImg = document.createElement('img');
    if (window.location.pathname.includes('/admin/propiedades/')) {
        // Si el archivo está en el directorio /admin/propiedades/
        darkModeImg.src = '../../build/img/dark-mode.svg';
    } else {
        // Si el archivo está en otro lugar
        darkModeImg.src = '/build/img/dark-mode.svg';
    }


    darkModeImg.alt = 'dark mode';
    darkModeImg.classList.add('dark-mode-boton');

    divDarkMode.appendChild(darkModeImg);

    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');
    if (prefiereDarkMode.matches) {
        document.body.classList.add('dark-mode');
        divDarkMode.classList.add('dark-mode-boton');
    } else{
        document.body.classList.remove('dark-mode');
        divDarkMode.classList.remove('dark-mode-boton');
    }


    //No se lo que hace D:

    // prefiereDarkMode.addEventListener('change', ()=>{        

    //     if (prefiereDarkMode.matches) {
    //         document.body.classList.add('dark-mode');
    //         divDarkMode.classList.add('dark-mode-boton');
    //     } else {
    //         document.body.classList.remove('dark-mode');
    //         divDarkMode.classList.remove('dark-mode-boton');
    //     }
    // })

    const darkmode = document.querySelector('.contenedor-darkmode');
    darkmode.addEventListener('click', ()=>{
        document.body.classList.toggle('dark-mode');
        divDarkMode.classList.toggle('dark-mode-boton');
    });
}

function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion-barra');
    navegacion.classList.toggle('mostrar') 

    //Hace lo mismo que abajo 

    // if (navegacion.classList.contains('mostrar')){
    //     navegacion.classList.remove('mostrar');
    // } else{
    //     navegacion.classList.add('mostrar');
    // }

}



const navegacion = document.querySelector('.navegacion');

const divNavegacion = document.createElement('DIV');
divNavegacion.classList.add('navegacion-darkmode');

//Hace que solo afecte al que tenga "data-page="index""
// const currentPage = document.querySelector('html').getAttribute('data-page');

divNavegacion.classList.toggle('navegacion-barra');

//Agrega el nuevo div al mismo nivel que el elemento de navegación
navegacion.parentNode.insertBefore(divNavegacion, navegacion);

//Mueve el elemento de navegación dentro del nuevo div
divNavegacion.appendChild(navegacion);

// Crear un nuevo div
const divDarkMode = document.createElement('DIV');
divDarkMode.classList.add('contenedor-darkmode');

// Agregar el nuevo div después del elemento de navegación
navegacion.insertAdjacentElement('afterend', divDarkMode);

const iconos = document.querySelectorAll('img[src^="build/img/icono_"]');
iconos.forEach(icono => {
    icono.classList.add('iconos');
});
