# St UACH
# Programos utilizados
- Mysql 
- Node.js
- PHP
# Pasos para realizar la ejecucion
Crear nuevas tablas

```sql
CREATE TABLE solicitud_tutorias (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    nombre VARCHAR(50) NOT NULL UNIQUE,
    motivo varchar(250) NOT NULL,
    horario DATETIME NOT NULL,
    
);

CREATE TABLE asignaciones (
    id INT AUTO_INCREMENT PRIMARY KEY,         -- Identificador único de la asignación
    tutor_matricula CHAR(6) NOT NULL,          -- Matrícula del tutor
    estudiante_matricula CHAR(6) NOT NULL,     -- Matrícula del estudiante
    FOREIGN KEY (tutor_matricula) REFERENCES usuarios(matricula), -- Relación con la tabla usuarios
    FOREIGN KEY (estudiante_matricula) REFERENCES usuarios(matricula), -- Relación con la tabla usuarios
    UNIQUE (tutor_matricula, estudiante_matricula) -- Evitar duplicados en la asignación
);



CREATE TABLE solicitud_tutor (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    nombre VARCHAR(50) NOT NULL UNIQUE,
    motivo varchar(250) NOT NULL
);


CREATE TABLE evaluacion_tutor (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    matricula VARCHAR(50) NOT NULL,
    evaluacion INT,
    comentario varchar(250),
    matricula_tutor VARCHAR(50) NOT NULL
);
```



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
