# FullPizza Web
Proyecto Full-Pizza-Web, es el portal usuario-administrativo, donde los clientes pueden adquirir productos.

## Comenzando 
Mira **Deployment** para conocer como desplegar el proyecto.
### Pre-requisitos 
```
1-Php.
2-MySql.
3-Servidor Web (Apache)
```

### Instalaci�n 
```
Instalaci�n del Servidor Web. 
Se debe instalar y configurar el servidor web, preferiblemente apache.

Instalaci�n de Php
Proceder a instalar Php la versi�n m�nima 5.6.

Instalaci�n de MySql. 
Realizar la instalaci�n de MySQL as� como phpMyAdmin(el manejador de la base de datos).
```

### Configuraci�n de los aplicativos
``` 
1- Luego de la instalaci�n se debe configurar puerto y asignaci�n de ip el servidor web.
2- Se debe realizar el restore del backup de la base de datos.
```
### Configuraci�n de la aplicaci�n Web
``` 
1- Archivos a modificar:
	1. config.ini.php: El objeto $objSite, se debe contar con un usuario con las siguientes credenciales, como se detallan a continuaci�n.
$objSite = new Site($db_host="localhost",$db_name="r0@ms0ft",$db_user="developer",$db_pwd="P@55w0rd");
    2. cron_cron.php: El objeto $objSite, se debe contar con un usuario con las siguientes credenciales, como se detallan a continuaci�n.
$objSite = new Site($db_host="localhost",$db_name="r0@ms0ft",$db_user="developer",$db_pwd="P@55w0rd");
	3. dbDetails: Archivo utilizado para colocar las credenciales para establecer la conexi�n con la Base de Datos.
			#Site Base Url Folder
				define("SITE_FOLDER","");

				#Database Details
				define("DATABASE_HOST","localhost");
				define("DATABASE_USER","root");
				define("DATABASE_PWD","");
				//define("DATABASE_USER","site-fullpizza");
				//define("DATABASE_PWD","u5y3yju4u");
				define("DATABASE_NAME","admin_fullpizzadev");
				define("TBL_PREFIX","rt_");
	4. setup.php: Archivo donde se establece la ruta de la aplicaci�n, se debe colocar las credenciales del servidor (ip o nombre).
	if($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == 'fullpizzadev.mobilemediacms.com'){
```

## Ejecutando las pruebas 
Luego de aplicar las configuraciones previas se puede correr la aplicaci�n con la url asignada desde el servidor.

## Deployment 
Se recomiendan montar un ambiente de prueba previa puesta en producci�n, con el fin de verificar la correcta visibilidad de los templates.
 
## Versionado 
Usamos [SemVer](http://semver.org/) para el versionado. Para todas las versiones disponibles, mira los [tags el repositorio](https://github.com/tu/proyecto/tags).

## Autores 
* **Gisilbek Parra** 
- *Trabajo Final* - [gisimobile](https://bitbucket.org/gisimobile/)
Tambi�n puedes mirar la lista de todos los [contribuyentes](https://github.com/your/project/contributors) qu�enes han participado en este proyecto. 

