 const boton = document.getElementById("btnMostrarFormulario");
  const formulario = document.getElementById("formularioRegistro");

  boton.addEventListener("click", function () {
    formulario.classList.toggle("ocultar");

    // Cambia el texto del botón
    if (formulario.classList.contains("ocultar")) {
      boton.textContent = "Registrar";
    } else {
      boton.textContent = "Ocultar formulario";
    }
  });