create table usuario(
id serial,
nombre varchar(30),
apellido varchar(30),
cedula varchar(10),
primary key (id)
);

INSERT INTO usuario (id, nombre, apellido, cedula) VALUES
(default, 'Yordy', 'Jimenez', '26782727'),
(default, 'Juan', 'Chirinos', '26464654'),
(default, 'Yordy', 'Jimenez', '26782727'),
(default, 'Maria', 'Díaz', '26782727'),
(default, 'Jose', 'Falcón', '26782727'),
(default, 'Ana', 'Perez', '26782727'),
(default, 'Eduardo', 'Torres', '26782727'),
(default, 'Carlos', 'Ortiz', '26782727'),
(default, 'Escarlet', 'Rodriguez', '26782727'),
(default, 'Julio', 'Soto', '26782727'),
(default, 'Carla', 'Ortiz', '26782727');