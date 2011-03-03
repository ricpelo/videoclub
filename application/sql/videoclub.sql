drop table socios cascade;

create table socios (
  id_socio  bigserial constraint pk_socios primary key,
  numero    numeric(6) constraint uq_numero unique,
  nombre    varchar(20) not null,
  apellidos varchar(40),
  direccion varchar(100),
  telefono  numeric(9)
) without oids;

insert into socios (numero, nombre, apellidos, direccion, telefono)
values (1, 'Ricardo', 'Pérez López', 'C/. Falsa 123', 956956956);
insert into socios (numero, nombre, apellidos, direccion, telefono)
values (2, 'Felipe', 'Cuarto de Baño', 'C/. Errónea 456', 856856856);
insert into socios (numero, nombre, apellidos, direccion, telefono)
values (3, 'Néstor', 'Tilla de Patatas', 'C/. Incorrecta 789', 756756756);

drop table peliculas cascade;

create table peliculas (
  id_pelicula     bigserial constraint pk_peliculas primary key,
  codigo          numeric(5) constraint uq_pelicula unique,
  titulo          varchar(30) not null,
  precio_alq      numeric(4,2),
  fech_alt_pel    date default current_date,
  activa          bool not null default true
) without oids;

insert into peliculas (codigo, titulo, precio_alq, fech_alt_pel)
values (1, 'Ciudadano Kane', 1, current_date - 3);
insert into peliculas (codigo, titulo, precio_alq, fech_alt_pel)
values (2, 'Los bingueros', 1.50, current_date - 2);
insert into peliculas (codigo, titulo, precio_alq, fech_alt_pel)
values (3, 'Avatar', 3, current_date - 1);

drop table alquileres cascade;

create table alquileres (
  id_alquiler bigserial constraint pk_alquileres primary key,
  id_socio bigint constraint fk_alquileres_socios references socios (id_socio)
                  on delete no action on update cascade,
  id_pelicula bigint constraint fk_alquileres_peliculas references peliculas (id_pelicula)
                     on delete no action on update cascade,
  falq   date,
  fdev   date
) without oids;

insert into alquileres (id_socio, id_pelicula, falq, fdev)
values (1, 1, current_date, null);
insert into alquileres (id_socio, id_pelicula, falq, fdev)
values (2, 3, current_date - 1, current_date);

drop table ci_sessions cascade;

create table ci_sessions (
  session_id varchar(40) DEFAULT '0' NOT NULL,
  ip_address varchar(16) DEFAULT '0' NOT NULL,
  user_agent varchar(50) NOT NULL,
  last_activity int4 DEFAULT 0 NOT NULL constraint ck_positivo check (last_activity >= 0),
  user_data text DEFAULT '' NOT NULL,
  PRIMARY KEY (session_id)
) without oids;

drop table usuarios cascade;

create table usuarios (
  id_usuario     bigserial constraint pk_usuarios primary key,
  nombre_usuario varchar(15) not null constraint uq_nombre_usuario_unico unique,
  password       char(32) not null
) without oids;

insert into usuarios(nombre_usuario, password)values('leandro', md5('leandro'));

drop view disponibles cascade;

create view disponibles as
SELECT peliculas.codigo
   FROM peliculas
  WHERE NOT (peliculas.id_pelicula IN (SELECT alquileres.id_pelicula
           FROM alquileres
          WHERE alquileres.fdev IS NULL));

drop view disponibles_y_activas cascade;

create view disponibles_y_activas as
SELECT peliculas.codigo
   FROM peliculas
  WHERE NOT (peliculas.id_pelicula IN ( SELECT alquileres.id_pelicula
           FROM alquileres
          WHERE alquileres.fdev IS NULL)) AND peliculas.activa = true;

drop view pelis cascade;

create view pelis as
SELECT peliculas.codigo, peliculas.titulo, peliculas.precio_alq, peliculas.fech_alt_pel, peliculas.activa, true AS disponible
           FROM peliculas
          WHERE (peliculas.codigo IN ( SELECT disponibles.codigo
                   FROM disponibles))
UNION 
         SELECT peliculas.codigo, peliculas.titulo, peliculas.precio_alq, peliculas.fech_alt_pel, peliculas.activa, false AS disponible
           FROM peliculas
          WHERE NOT (peliculas.codigo IN ( SELECT disponibles.codigo
                   FROM disponibles));

drop view pelis_activas cascade;

create view pelis_activas as
SELECT peliculas.codigo, peliculas.titulo, peliculas.precio_alq, peliculas.fech_alt_pel, true AS disponible
           FROM peliculas
          WHERE peliculas.activa = true AND (peliculas.codigo IN ( SELECT disponibles_y_activas.codigo
                   FROM disponibles_y_activas))
UNION 
         SELECT peliculas.codigo, peliculas.titulo, peliculas.precio_alq, peliculas.fech_alt_pel, false AS disponible
           FROM peliculas
          WHERE peliculas.activa = true AND NOT (peliculas.codigo IN ( SELECT disponibles_y_activas.codigo
                   FROM disponibles_y_activas));

