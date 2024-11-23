# St UACH
# Programos utilizados
- Mysql o cualquier base de datos
- Node.js
- PHP
# Pasos para realizar la ejecucion

## 1
Ingresar al directorio del proyecto eh ingresar 
```
    npm install
```

## 2 
En el directorio inludes/config/database.php modificar a las credenciales de tu base de datos

```bash
    $db = mysqli_connect('localhost o direccion IP', 'usuario', 'Contraseña', 'nombres_base_de_datos');
```

## 3 Ejecutar el servidor PHP

```
php -S localhost:8000
```

## 4 agregar usuarios
Ingresar a http://localhost:8000/adduser.php
