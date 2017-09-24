README by Iraitz Mendoza

Descomprimimos el fichero Prueba_On4u.zip en donde queramos.

Back-End:
	En primer lugar necesitamos tener PHP y MySQL instalados en nuestro equipo.
	
	En el fichero 'app\config\parameters.yml' deberemos indicar los parametros de la ubicación de la base de datos, así como los de acceso a la misma, en nuestro caso:
		database_host: 127.0.0.1
		database_port: 3306
		...
		database_user: root
		database_password: root
		
	Abrimos la consola y nos situamos en el directorio de "backend".

	Ejecutamos el siguiente comando:
		$ app/console doctrine:database:create
	El cuál nos creará el esquema necesario en la base de datos.

	A continuación, ejecutamos este otro:
		$ app/console doctrine:schema:update --force
	Que nos creará la tabla dentro del esquema.
	
	Ahora debemos crear un usuario y darle permisos:
		$ app/console fos:user:create admin admin@email password
		$ app/console fos:user:promote admin ROLE_API
		
		**El usuario necesita el rol ROLE_API para ignorar la protección estándar CSRF en los formularios Symfony2. También se puede ajustar esta configuración en la configuración del FOSRestBundle.**

	Por último, ejecutamos el comando necesario para arrancar el servidor que contendrá la aplicación.
		$ app/console server:run
		
		
Front-End:
	Necesitamos un servidor para nuestra aplicación, en esta prueba usaremos el Apache Tomcat 7.0.81
	
	Una vez lo tengamos instalado, copiamos la carpeta 'productosApp' que venía en el ZIP en la ruta "webApps" de la instalación del servidor. En nuestro caso es 'C:\Apache\apache-tomcat-7.0.81\webapps'.
	Con esto hecho, arracamos el servidor y ya tendríamos desplegada nuestra aplicación AngularJS en el servidor.
	
	Finalmente, abrimos un navegador (a ser posible, no IE) e introducimos la url de la aplicación: 
		http://localhost:8080/productosApp
		
	
		
		

	
	