# FullPizza Web

Proyecto Full-Pizza-Web, es el portal usuario-administrativo, donde los clientes pueden adquirir productos.

## Comenzando 🚀


Mira **Deployment** para conocer como desplegar el proyecto.


### Pre-requisitos 📋

```
1-Php.
2-MySql.
3-Servidor Web (Apache)

```

### Instalación 🔧

```
Instalación del Servidor Web. 
Se debe instalar y configurar el servidor web, preferiblemente apache.

Instalacion de Php
Proceder a instalar Php la versión minimo 5.6.

Instalación de MySql. 
Realizar la instalación de MySQL asi como phpMyAdmin(el manejador de la base de datos).
```

### Configuración de los aplicativos🔧

``` 
1- Luego de la instalación se debe configurar puerto y asignación de ip el servidor web.

2- Se debe realizar el restore del backup de la base de datos.

```

### Configuración de los aplicación Web🔧
``` 
1- Archivos a modificar:
	1. config.ini.php: El objeto $objSite, se debe contar con un usuario con las siguientes credenciales, como se detallan a continuación.
		$objSite = new Site($db_host="localhost",$db_name="r0@ms0ft",$db_user="developer",$db_pwd="P@55w0rd");
    2. cron_cron.php: El objeto $objSite, se debe contar con un usuario con las siguientes credenciales, como se detallan a continuación.
		$objSite = new Site($db_host="localhost",$db_name="r0@ms0ft",$db_user="developer",$db_pwd="P@55w0rd");
	3. dbDetails: Archivo utilizado para colocar las credenciales para establecer la conexión con la Base de Datos.
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
	4. setup.php: Archivo donde se establece la ruta de la aplicación, se debe colocar las credenciales del servidor (ip o nombre).
			if($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == 'fullpizzadev.mobilemediacms.com'){

```


## Ejecutando las pruebas ⚙️

Luego de aplicar las configuraciones previas se puede correr la aplicacion con la url asignada desde el servidor.

## Deployment 📦

Se recomiendan montar un ambiente de prueba previa puesta en producción, con el fin de verificar la correcta visibilidad de los templates.
 
## Versionado 📌

Usamos [SemVer](http://semver.org/) para el versionado. Para todas las versiones disponibles, mira los [tags el repositorio](https://github.com/tu/proyecto/tags).

## Autores ✒️

* **Gisilbek Parra** - *Trabajo Final* - [gisimobile](https://bitbucket.org/gisimobile/)

También puedes mirar la lista de todos los [contribuyentes](https://github.com/your/project/contributors) quíenes han participado en este proyecto. 

