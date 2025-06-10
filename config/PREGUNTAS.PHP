//Preguntar diferencias entre die y echo (lista)
    die corta el script------------echo imprime en pantalla


// si puedo tener un archivo diferente para la conexion
    Si es lo mejor siempre 

// Que me explique como funciona las rutas require, include _DIR_ TODAS Y LAS DIREFENCIAS 
include 'archivo.php';	Incluye el archivo	❌ No falla fatal: si no lo encuentra, sigue ejecutando	Cuando no es obligatorio

require 'archivo.php';	Incluye el archivo	✅ Falla fatal: si no lo encuentra, se detiene todo	Cuando el archivo es obligatorio

2. ¿Qué son require_once e include_once?

Son iguales a los anteriores, pero aseguran que el archivo solo se incluya una vez, aunque lo llames muchas veces.

Parte	¿Por qué se usa?
$resultado	Es el "puntero" al conjunto de resultados
Arreglo $vehiculos	Para guardar todas las filas obtenidas
while + mysqli_fetch_assoc	Para recorrer una a una las filas del resultado
return $vehiculos;	Para usar luego los datos en la vista (por ejemplo, una tabla HTML)


mvc sin Poo

✅ Mejores prácticas en MVC (sin POO):
📌 1. Las funciones que generan HTML deben estar en la vista
Ejemplo: mostrarListaVehiculos($vehiculos) imprime HTML → debe estar en la vista.

Su responsabilidad es mostrar los datos, no obtenerlos ni procesarlos.

📌 2. El controlador no debe generar HTML directamente
El controlador se encarga de:

Recoger datos del modelo (listarVehiculos()).

Tomar decisiones según la acción (crear, eliminar, etc.).

Pasar esos datos a la vista adecuada.

📌 3. El modelo solo se encarga de acceder a la base de datos
Como tu función listarVehiculos(), que hace un SELECT y devuelve un array.


✅ ¿Cuándo usar htmlspecialchars()?
Uso	¿Recomendado usar htmlspecialchars()?
Imprimir datos del usuario en HTML	✅ Sí
Usar en JavaScript o atributos HTML	✅ Sí (con cuidado adicional)
Guardar en la base de datos	❌ No (usa tal cual, escapa solo en la vista)