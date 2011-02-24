drop table socios cascade;

create table socios (
  numero    numeric(6) constraint pk_socios primary key,
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
  codigo          numeric(5) constraint pk_peliculas primary key,
  titulo          varchar(30) not null,
  precio_compra   numeric(5,2),
  precio_alquiler numeric(4,2),
  fecha_alta      date
) without oids;

insert into peliculas (codigo, titulo, precio_compra, precio_alquiler, fecha_alta)
values (1, 'Ciudadano Kane', 110, 1, current_date - 3);
insert into peliculas (codigo, titulo, precio_compra, precio_alquiler, fecha_alta)
values (2, 'Los bingueros', 90, 1.50, current_date - 2);
insert into peliculas (codigo, titulo, precio_compra, precio_alquiler, fecha_alta)
values (3, 'Avatar', 180, 3, current_date - 1);

drop table alquileres cascade;

create table alquileres (
  numero numeric(6) constraint fk_alquileres_socios references socios (numero)
                    on delete no action on update cascade,
  codigo numeric(5) constraint fk_alquileres_peliculas references peliculas (codigo)
                    on delete no action on update cascade,
  falq   date,
  fdev   date,
  constraint pk_alquileres primary key (numero, codigo, falq)
) without oids;

insert into alquileres (numero, codigo, falq, fdev)
values (1, 1, current_date, null);
insert into alquileres (numero, codigo, falq, fdev)
values (2, 3, current_date - 1, current_date);

drop table ci_sessions cascade;

create table ci_sessions (
  session_id varchar(40) DEFAULT '0' NOT NULL,
  ip_address varchar(16) DEFAULT '0' NOT NULL,
  user_agent varchar(50) NOT NULL,
  last_activity int4 DEFAULT 0 NOT NULL constraint ck_positivo check (last_activity >= 0),
  user_data text DEFAULT '' NOT NULL,
  PRIMARY KEY (session_id)
);
