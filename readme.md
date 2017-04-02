# Prueba la Pelicula

Es Proyecto creado en el framework Laravel 5.3, con base de datos en MySQL con el objetivo de cumplir prueba técnica con las siguientes especificaciones:

● Es imprescindible el uso de un framework MVC PHP.
● Es imprescindible el uso de GIT como repositorio de código.
● Es imprescindible el uso de bootstrap u otro framework de frontend.
● Los datos de deben almacenar en una base de datos MySQL.
● Se debe usar el paquete de composer katzgrau/klogger para guardar en un fichero
de texto cada vez que se realiza una valoración.
● Debemos guardar datos de los clientes, películas y valoraciones (no significa que
sean obligatoriamente 3 tablas)
○ Clientes
 - Nombre
 - Apellidos
○ Películas
   - Título
   - Categoría (Acción, ciencia ficción, thriller, etc.)
○ Valoraciones
   - Valoración (de 0 a 10)
   - Fecha
● Únicamente es obligatorio el CRUD de valoraciones. Los clientes y películas pueden
ser insertados directamente en la base de datos.
● Se debe poder listar las películas, hayan sido valoradas por el cliente o no,
incluyendo la valoración del cliente (en el caso de que la haya valorado), el número
de clientes que han valorado la película y la valoración media de todos los clientes.
● Un cliente puede cambiar la valoración que le ha dado a una película.


## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
