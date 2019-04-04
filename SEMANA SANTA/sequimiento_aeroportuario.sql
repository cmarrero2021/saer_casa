

CREATE TABLE "public"."aeropuertos" (
"id_aeropuerto" serial NOT NULL ,
"id_tipo" int4 NOT NULL DEFAULT NULL,
"cod_iata" varchar(4) COLLATE "default" NOT NULL DEFAULT NULL,
"cod_oaci" varchar(4) COLLATE "default" NOT NULL DEFAULT NULL,
"aeropuerto" varchar(100) COLLATE "default" NOT NULL DEFAULT NULL,
"denominacion" varchar(50) COLLATE "default" NOT NULL DEFAULT NULL,
"id_estado" int4 NOT NULL DEFAULT NULL,
"administrado" bool NOT NULL DEFAULT false,
"fecha_creacion" timestamp(6) DEFAULT now(),
"id_usuario" int4 DEFAULT NULL,
"fecha_modificacion" timestamp(6) DEFAULT NULL,
CONSTRAINT "pkey_aeropuertos_id_aeropuerto" PRIMARY KEY ("id_aeropuerto") 
)
WITH OIDS;

ALTER TABLE "public"."aeropuertos" OWNER TO "postgres";

CREATE TABLE "public"."bomberiles" (
"id_bomberil" serial NOT NULL,
"fecha_reporte" timestamp(6) NOT NULL DEFAULT NULL,
"id_aeropuerto" int4 NOT NULL DEFAULT NULL,
"bl_contra_incendios" bool NOT NULL DEFAULT false,
"bl_ambulancias" bool DEFAULT false,
"bl_personal_requerido" bool DEFAULT false,
"bl_extintores" bool DEFAULT false,
"bl_herramientas_rescate" bool DEFAULT false,
"bl_proteccion_personal" bool DEFAULT false,
"bl_aeronave" bool DEFAULT false,
"tx_aeronave" text COLLATE "default" DEFAULT NULL,
"bl_vehiculo" bool DEFAULT false,
"tx_vehiculo" text COLLATE "default" DEFAULT NULL,
"bl_maleza" bool DEFAULT false,
"tx_maleza" text COLLATE "default" DEFAULT NULL,
"bl_infraestructura" bool DEFAULT false,
"tx_infraestructura" text COLLATE "default" DEFAULT NULL,
"bl_otros" bool DEFAULT false,
"tx_otros" text COLLATE "default" DEFAULT NULL,
"fecha_creacion" timestamp(6) DEFAULT now(),
"id_usuario" int4 DEFAULT NULL,
"fecha_modificacion" timestamp(6) DEFAULT NULL,
CONSTRAINT "pkey_bomberiles_id_bomberil" PRIMARY KEY ("id_bomberil") 
)
WITH OIDS;

ALTER TABLE "public"."bomberiles" OWNER TO "postgres";

CREATE TABLE "public"."estados" (
"id_estado" int4 NOT NULL DEFAULT NULL,
"estado" varchar(250) COLLATE "default" NOT NULL DEFAULT NULL::character varying,
"iso_3166-2" varchar(4) COLLATE "default" NOT NULL DEFAULT NULL::character varying,
CONSTRAINT "estados_pkey" PRIMARY KEY ("id_estado") 
)
WITH OIDS;

ALTER TABLE "public"."estados" OWNER TO "postgres";

CREATE TABLE "public"."movilizaciones" (
"id_movilizacion" serial NOT NULL,
"fecha_reporte" timestamp(6) NOT NULL DEFAULT NULL,
"id_aeropuerto" int4 NOT NULL DEFAULT NULL,
"embnacgen" int4 NOT NULL DEFAULT 0,
"embnaccom" int4 NOT NULL DEFAULT 0,
"embintgen" int4 NOT NULL DEFAULT 0,
"embintcom" int4 NOT NULL DEFAULT 0,
"desnacgen" int4 NOT NULL DEFAULT 0,
"desnaccom" int4 NOT NULL DEFAULT 0,
"desintgen" int4 NOT NULL DEFAULT 0,
"desintcom" int4 NOT NULL DEFAULT 0,
"dpgnacgen" int4 NOT NULL DEFAULT 0,
"dpgnaccom" int4 NOT NULL DEFAULT 0,
"dpgintgen" int4 NOT NULL DEFAULT 0,
"dpgintcom" int4 NOT NULL DEFAULT 0,
"atenacgen" int4 NOT NULL DEFAULT 0,
"atenaccom" int4 NOT NULL DEFAULT 0,
"ateintgen" int4 NOT NULL DEFAULT 0,
"ateintcom" int4 NOT NULL DEFAULT 0,
"intdemembnacgen" int4 NOT NULL DEFAULT 0,
"txtdemembnacgen" text COLLATE "default" NOT NULL DEFAULT 0,
"intdemembnaccom" int4 NOT NULL DEFAULT 0,
"txtdemembnaccom" text COLLATE "default" NOT NULL DEFAULT 0,
"intdemembintgen" int4 NOT NULL DEFAULT 0,
"txtdemembintgen" text COLLATE "default" NOT NULL DEFAULT 0,
"intdemembintcom" int4 NOT NULL DEFAULT 0,
"txtdemembintcom" text COLLATE "default" NOT NULL DEFAULT 0,
"intdemdesnacgen" int4 NOT NULL DEFAULT 0,
"txtdemdesnacgen" text COLLATE "default" NOT NULL DEFAULT 0,
"intdemdesnaccom" int4 NOT NULL DEFAULT 0,
"txtdemdesnaccom" text COLLATE "default" NOT NULL DEFAULT 0,
"intdemdesintgen" int4 NOT NULL DEFAULT 0,
"txtdemdesintgen" text COLLATE "default" NOT NULL DEFAULT 0,
"intdemdesintcom" int4 NOT NULL DEFAULT 0,
"txtdemdesintcom" text COLLATE "default" NOT NULL DEFAULT 0,
"fecha_creacion" timestamp(6) DEFAULT now(),
"id_usuario" int4 DEFAULT NULL,
"fecha_modificacion" timestamp(6) DEFAULT NULL,
CONSTRAINT "pkey_movilizaciones_id_movilizacion" PRIMARY KEY ("id_movilizacion") 
)
WITH OIDS;

ALTER TABLE "public"."movilizaciones" OWNER TO "postgres";

CREATE TABLE "public"."operaciones" (
"id_operacion" serial NOT NULL,
"fecha_reporte" timestamp(6) NOT NULL DEFAULT NULL,
"id_aeropuerto" int4 NOT NULL DEFAULT NULL,
"bl_vehiculos_inspeccion" bool NOT NULL DEFAULT false,
"bl_personal_guardia" bool DEFAULT false,
"bl_equipos_operaciones" bool DEFAULT false,
"bl_notam" bool DEFAULT false,
"tx_notam" text COLLATE "default" DEFAULT NULL,
"bl_movimiento" bool DEFAULT false,
"bl_torre_torre" bool DEFAULT false,
"bl_aeronave" bool DEFAULT false,
"tx_aeronave" text COLLATE "default" DEFAULT NULL,
"bl_luces_aproximacion" bool DEFAULT false,
"tx_vehiculo" text COLLATE "default" DEFAULT NULL,
"bl_detector_metales" bool DEFAULT false,
"bl_rayosx" bool DEFAULT false,
"tx_rayosx" text COLLATE "default" DEFAULT NULL,
"bl_pista" bool DEFAULT false,
"tx_pista" text COLLATE "default" DEFAULT NULL,
"bl_manga" bool DEFAULT false,
"tx_manga" text COLLATE "default" DEFAULT NULL,
"bl_papi" bool DEFAULT false,
"tx_papi" text COLLATE "default" DEFAULT NULL,
"bl_cerca" bool DEFAULT false,
"tx_cerca" text COLLATE "default" DEFAULT NULL,
"bl_electricidad" bool DEFAULT false,
"tx_electricidad" text COLLATE "default" DEFAULT NULL,
"bl_agua" bool DEFAULT false,
"tx_agua" text COLLATE "default" DEFAULT NULL,
"bl_cantv" bool DEFAULT false,
"tx_cantv" text COLLATE "default" DEFAULT NULL,
"bl_celular" bool DEFAULT false,
"tx_celular" text COLLATE "default" DEFAULT NULL,
"bl_internet" bool DEFAULT false,
"tx_internet" text COLLATE "default" DEFAULT NULL,
"bl_otros" bool DEFAULT false,
"tx_otros" text COLLATE "default" DEFAULT NULL,
"bl_senaleros" bool DEFAULT false,
"tx_senaleros" text COLLATE "default" DEFAULT NULL,
"bl_demoras" bool DEFAULT false,
"tx_demoras" text COLLATE "default" DEFAULT NULL,
"bl_alumbrado" bool DEFAULT false,
"tx_alumbrado" text COLLATE "default" DEFAULT NULL,
"bl_aire" bool DEFAULT false,
"tx_aire" text COLLATE "default" DEFAULT NULL,
"bl_planta" bool DEFAULT false,
"tx_planta" text COLLATE "default" DEFAULT NULL,
"bl_comunicacion" bool DEFAULT false,
"tx_comunicacion" text COLLATE "default" DEFAULT NULL,
"bl_presurizacion" bool DEFAULT false,
"tx_presurizacion" text COLLATE "default" DEFAULT NULL,
"bl_incidentes" bool DEFAULT false,
"tx_incidentes" text COLLATE "default" DEFAULT NULL,
"fecha_creacion" timestamp(6) DEFAULT now(),
"id_usuario" int4 DEFAULT NULL,
"fecha_modificacion" timestamp(6) DEFAULT NULL,
CONSTRAINT "pkey_operaciones_id_operacion" PRIMARY KEY ("id_operacion") 
)
WITH OIDS;

ALTER TABLE "public"."operaciones" OWNER TO "postgres";

CREATE TABLE "public"."tipo_aeropuertos" (
"id_tipo_aeropuerto" serial NOT NULL,
"tipo_aeropuerto" varchar(20) COLLATE "default" NOT NULL DEFAULT NULL,
"fecha_creacion" timestamp(6) NOT NULL DEFAULT now(),
"id_usuario" int4 DEFAULT NULL,
"fecha_modificacion" timestamp(6) DEFAULT NULL,
CONSTRAINT "pkey_tipo_aeropuertos_id_tipo_aeropuerto" PRIMARY KEY ("id_tipo_aeropuerto") 
)
WITH OIDS;

ALTER TABLE "public"."tipo_aeropuertos" OWNER TO "postgres";


ALTER TABLE "public"."aeropuertos" ADD CONSTRAINT "fky_estado" FOREIGN KEY ("id_estado") REFERENCES "public"."estados" ("id_estado") ON DELETE RESTRICT ON UPDATE NO ACTION;
ALTER TABLE "public"."aeropuertos" ADD CONSTRAINT "fky_tipo_aeropuerto" FOREIGN KEY ("id_tipo") REFERENCES "public"."tipo_aeropuertos" ("id_tipo_aeropuerto") ON DELETE RESTRICT ON UPDATE NO ACTION;
ALTER TABLE "public"."bomberiles" ADD CONSTRAINT "fky_aeropuertos_bomberiles_id_aeropuerto" FOREIGN KEY ("id_aeropuerto") REFERENCES "public"."aeropuertos" ("id_aeropuerto") ON DELETE RESTRICT ON UPDATE NO ACTION;
ALTER TABLE "public"."movilizaciones" ADD CONSTRAINT "fky_aeropuertos_movilizaciones_id_movilizacion" FOREIGN KEY ("id_movilizacion") REFERENCES "public"."aeropuertos" ("id_aeropuerto") ON DELETE RESTRICT ON UPDATE NO ACTION;
ALTER TABLE "public"."operaciones" ADD CONSTRAINT "fky_aeropuertos_operaciones_id_aeropuerto" FOREIGN KEY ("id_aeropuerto") REFERENCES "public"."aeropuertos" ("id_aeropuerto") ON DELETE RESTRICT ON UPDATE NO ACTION;

