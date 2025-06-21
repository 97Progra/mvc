//Ajax formulario de registro
const registro = document.getElementById('formularioRegistrar');
const login = document.getElementById('formularioLogin');
const registroVehiculos = document.getElementById('formularioRegistroVehiculo');
const eliminarVehiculo = document.querySelectorAll('.eliminarVehiculo');
const actualizarVehiculo = document.getElementById('formularioActualizar');
if(registro){
registro.addEventListener('submit', function(event){
event.preventDefault();
const  formularioRegistro = new FormData(this); 

fetch('index.php?ruta=registrarse',{
  method: 'POST',
  body: formularioRegistro
})

.then(response => response.text())

.then(mensajeControlador => {
  document.getElementById('respuesta').innerHTML = mensajeControlador;
  this.reset();
});

});
}


//Ajax de Login
if(login){
  login.addEventListener('submit', function(event){
event.preventDefault();
const formularioLogin = new FormData(this);

fetch('index.php?ruta=vehiculos',{
    method: 'POST',
    body: formularioLogin
})

.then(res => res.json())

.then(mensaje =>{
    if(mensaje.estado === 'ok'){
        // Redireccionas manualmente si login fue exitoso
            window.location.href = "index.php?ruta=listarvehiculos";
    }else{
        document.getElementById('respuesta').innerHTML = mensaje.mensaje;
    }
});

});  
}
//Ajax para registrar vehiculo
//  console.log('Registro form:', registroVehiculos);
if (registroVehiculos){
    registroVehiculos.addEventListener('submit', function(e){
    e.preventDefault();
    const datosVehiculo = new FormData(this);


    fetch('index.php?ruta=listarvehiculos',{
        method: 'POST',
        body: datosVehiculo
    })

    .then(response => response.json())
    .then(mensaje =>{
        let msm = '';
        if(mensaje.estado === 'ok'){
            msm = mensaje.mensaje;
            window.location.href = `index.php?ruta=listarvehiculos&mensaje=${msm}`;
        }else if(mensaje.estado === 'placa'){
            msm = mensaje.mensaje;
            window.location.href = `index.php?ruta=listarvehiculos&mensaje=${msm}`;
        }else if(mensaje.estado === 'vacio'){
            msm = mensaje.mensaje;
            window.location.href = `index.php?ruta=listarvehiculos&mensaje=${msm}`;
        }else if(mensaje.estado === 'error'){
            msm = mensaje.mensaje;
            window.location.href = `index.php?ruta=listarvehiculos&mensaje=${msm}`;
        }
    });

});
}
// console.log('Eliminar form:', eliminarVehiculo);
if(eliminarVehiculo.length > 0){
    eliminarVehiculo.forEach(boton => {
            boton.addEventListener('submit', function(e){
        e.preventDefault();
        
        // Poner la confirmación aquí
    const confirmacion = confirm('¿Estás seguro de eliminar este vehículo?');
    // Si el usuario cancela, no hagas nada
    if (!confirmacion) {
        return; 
    }
        const data = new FormData(this);

        fetch('index.php?ruta=listarvehiculos',{
            method: 'POST',
            body: data
        })

        .then(response => response.json())
        .then(mensaje => {
            let msm = '';
            if(mensaje.estado === 'ok'){
                msm = mensaje.mensaje;
                window.location.href = `index.php?ruta=listarvehiculos&mensaje=${msm}`;
            }else{
                 msm = mensaje.mensaje;
                window.location.href = `index.php?ruta=listarvehiculos&mensaje=${msm}`;
            }

        });
        // .catch(err => {
        // alert('Ocurrió un error: ' + err.message);
        // });
    });
    });

}
//  console.log('Actualizar form:', actualizarVehiculo);
if(actualizarVehiculo){
    actualizarVehiculo.addEventListener('submit',function(event){
        event.preventDefault();

        const datos = new FormData(this);

        fetch('index.php?ruta=listarvehiculos',{
            method: 'POST',
            body: datos
        })

        .then(res => res.json())
        .then(mensaje => {
            let msm = '';
            if(mensaje.estado === 'ok'){
                msm = mensaje.mensaje;
                window.location.href = `index.php?ruta=listarvehiculos&mensaje=${msm}`;
            }else{
                msm = mensaje.mensaje;
                window.location.href = `index.php?ruta=listarvehiculos&mensaje=${msm}`;
            }

        });
    });
}