//  console.log("Generalidaddes cargado");
 const boton = document.getElementById("btnMostrarFormulario");
  const formulario = document.getElementById("formularioRegistroVehiculo");
 if (boton && formulario){
    boton.addEventListener("click", function () {
    formulario.classList.toggle("ocultar");

    // Cambia el texto del botón
    if (formulario.classList.contains("ocultar")) {
      boton.textContent = "Registrar Vehiculo";
    } else {
      boton.textContent = "Ocultar formulario";
    };
  });
 };
  
