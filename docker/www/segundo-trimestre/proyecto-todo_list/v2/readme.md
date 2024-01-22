# código utilizado para la creación de la base de datos:

```sql
CREATE DATABASE IF NOT EXISTS tareas;

USE tareas;

CREATE TABLE IF NOT EXISTS usuarios (
  id INT PRIMARY KEY AUTO_INCREMENT,
  usuario VARCHAR(50) NOT NULL,
  password VARCHAR(200) NOT NULL
);

CREATE TABLE IF NOT EXISTS tarea (
  id INT PRIMARY KEY AUTO_INCREMENT,
  titulo VARCHAR(20) NOT NULL,
  descripcion VARCHAR(200)
);

CREATE TABLE IF NOT EXISTS usuarios_tarea (
  id INT PRIMARY KEY AUTO_INCREMENT,
  tarea INT,
  usuario INT,
  FOREIGN KEY (tarea) REFERENCES tarea(id),
  FOREIGN KEY (usuario) REFERENCES usuarios(id)
);
```

---

# código para reiniciar la base de datos:

```sql
DELETE FROM usuarios_tarea;

ALTER TABLE usuarios_tarea AUTO_INCREMENT = 1;

DELETE FROM usuarios;

ALTER TABLE usuarios AUTO_INCREMENT = 1;

DELETE FROM tarea;

ALTER TABLE tarea AUTO_INCREMENT = 1;
```