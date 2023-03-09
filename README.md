# CRUD-YII2-Angular

NOTA: Todo el proyecto de Yii2 fue corrido desde la carpeta www con apache.

##YII2

1. Trabaje en el archivo de configuración main.php e hice las rutas más amigables, además configure los request para que no halla problema cuando se quiera interpretar un JSON.
2. Genere las migraciones de las 3 tablas.
3. Genere sus respectivos modelos y agregue métodos al modelo Client para acceder a los datos de perfil y address.
4. Trabaje en el controlador para las rutas que se especificaron en las 3 tablas y todas admiten los métodos de request: GET | POST | PUT | DELETE.
5. Además, tuve que configurar cada controlador para que admitiera las peticiones desde un puerto distinto, ya que al iniciar el servidor de desarrollo de angular, este inicia en el puerto 4200 y esto hace que rechace cada interacción que tenia angular con Yii2.

Nota: para hacer que trabajen Yii2 y angular en el mismo servidor solo se necesita compilar angular a javascript y luego mover la carpeta del build al directorio principal del proyecto para correrlo desde ahí.


##Angular

El proyecto de angular ya está trabajando y funcionando con Yii2 manejando la lógica del backend.
Aquí podemos ver algunas imágenes.

![image](https://user-images.githubusercontent.com/10742738/223891849-0c23caa1-0186-4031-b8c5-797a7eaf27b4.png)
![image](https://user-images.githubusercontent.com/10742738/223891900-1de522dc-c0cc-43a7-8c11-a71e5055f5e2.png)
![image](https://user-images.githubusercontent.com/10742738/223891979-0a46d005-d0a8-4edb-bd7a-f6abf76dcd94.png)
