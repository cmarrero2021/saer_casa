create table tipo_vuelos (id_tipo_vuelo serial not null,tipo_vuelo character varying(20) not null, constraint pkey_tipo_vuelos_id_tipo_vuelo primary key (id_tipo_vuelo));
	create table destino_vuelos (id_destino_vuelo serial not null,destino_vuelo character varying(20) not null, constraint pkey_destino_vuelos_id_destino_vuelo primary key (id_destino_vuelo));
		create table demoras 
			(id_movilizacion integer not null, 
				id_demora serial not null, 
				id_aeropuerto integer not null, 
				fecha_demora timestamp not null, 
				id_tipo_vuelo integer not null,
				id_destino_vuelo integer not null,
				cant_demora integer not null,
				obs_demora text not null, 
				fecha_creacion timestamp default now() not null, 
				id_usuario integer, 
				fecha_modificacion timestamp, 
				constraint pkey_demoras_id_demora primary key (id_demora),
				fky_movilizaciones_demoras_id_movilizacion foreign key (id_movilizacion) references movilizaciones (id_movilizacion) on delete restrict)
			fky_aeropuertos_demoras_id_aeropuerto foreign key (id_aeropuerto) references aeropuertos (id_aeropuerto) on delete restrict,
			fky_tipo_vuelos_demoras_id_tipo_vuelo foreign key (id_tipo_vuelo) references tipo_vuelos (id_tipo_vuelo) on delete restrict,
			fky_destino_vuelos_demoras_id_destino_vuelo foreign key (id_destino_vuelo) references destino_vuelos (id_destino_vuelo) on delete restrict)
with (oids=true);



CREATE TABLE movilizaciones
(
	id_movilizacion serial NOT NULL,
	fecha_reporte timestamp NOT NULL,
	id_aeropuerto integer NOT NULL,
	fecha_creacion timestamp NOT NULL DEFAULT now(),
	id_usuario integer,
	fecha_modificacion timestamp(6) without time zone DEFAULT NULL::timestamp without time zone,
	CONSTRAINT pkey_movilizaciones_id_movilizacion PRIMARY KEY (id_movilizacion),
	CONSTRAINT fky_aeropuertos_movilizaciones_id_movilizacion FOREIGN KEY (id_movilizacion)
	REFERENCES aeropuertos (id_aeropuerto) MATCH SIMPLE
	ON UPDATE NO ACTION ON DELETE RESTRICT
)	