--
-- PostgreSQL database dump
--

-- Dumped from database version 9.5.12
-- Dumped by pg_dump version 9.5.12

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = true;

--
-- Name: aeropuertos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.aeropuertos (
    id_aeropuerto integer NOT NULL,
    id_tipo integer NOT NULL,
    cod_iata character varying(4) DEFAULT NULL::character varying NOT NULL,
    cod_oaci character varying(4) DEFAULT NULL::character varying NOT NULL,
    aeropuerto character varying(100) DEFAULT NULL::character varying NOT NULL,
    denominacion character varying(50) DEFAULT NULL::character varying NOT NULL,
    id_estado integer NOT NULL,
    administrado boolean DEFAULT false NOT NULL,
    fecha_creacion timestamp(6) without time zone DEFAULT now(),
    id_usuario integer,
    fecha_modificacion timestamp(6) without time zone DEFAULT NULL::timestamp without time zone
);


ALTER TABLE public.aeropuertos OWNER TO postgres;

--
-- Name: aeropuertos_id_aeropuerto_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.aeropuertos_id_aeropuerto_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.aeropuertos_id_aeropuerto_seq OWNER TO postgres;

--
-- Name: aeropuertos_id_aeropuerto_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.aeropuertos_id_aeropuerto_seq OWNED BY public.aeropuertos.id_aeropuerto;


--
-- Name: bomberiles; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.bomberiles (
    id_bomberil integer NOT NULL,
    fecha_reporte timestamp(6) without time zone DEFAULT NULL::timestamp without time zone NOT NULL,
    id_aeropuerto integer NOT NULL,
    bl_contra_incendios boolean DEFAULT false NOT NULL,
    bl_ambulancias boolean DEFAULT false,
    bl_personal_requerido boolean DEFAULT false,
    bl_extintores boolean DEFAULT false,
    bl_herramientas_rescate boolean DEFAULT false,
    bl_proteccion_personal boolean DEFAULT false,
    bl_aeronave boolean DEFAULT false,
    tx_aeronave text,
    bl_vehiculo boolean DEFAULT false,
    tx_vehiculo text,
    bl_maleza boolean DEFAULT false,
    tx_maleza text,
    bl_infraestructura boolean DEFAULT false,
    tx_infraestructura text,
    bl_otros boolean DEFAULT false,
    tx_otros text,
    fecha_creacion timestamp(6) without time zone DEFAULT now(),
    id_usuario integer,
    fecha_modificacion timestamp(6) without time zone DEFAULT NULL::timestamp without time zone
);


ALTER TABLE public.bomberiles OWNER TO postgres;

--
-- Name: bomberiles_id_bomberil_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.bomberiles_id_bomberil_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.bomberiles_id_bomberil_seq OWNER TO postgres;

--
-- Name: bomberiles_id_bomberil_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.bomberiles_id_bomberil_seq OWNED BY public.bomberiles.id_bomberil;


--
-- Name: estados; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.estados (
    id_estado integer NOT NULL,
    estado character varying(250) DEFAULT NULL::character varying NOT NULL
);


ALTER TABLE public.estados OWNER TO postgres;

--
-- Name: movilizaciones; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.movilizaciones (
    id_movilizacion integer NOT NULL,
    fecha_reporte timestamp(6) without time zone DEFAULT NULL::timestamp without time zone NOT NULL,
    id_aeropuerto integer NOT NULL,
    embnacgen integer DEFAULT 0 NOT NULL,
    embnaccom integer DEFAULT 0 NOT NULL,
    embintgen integer DEFAULT 0 NOT NULL,
    embintcom integer DEFAULT 0 NOT NULL,
    desnacgen integer DEFAULT 0 NOT NULL,
    desnaccom integer DEFAULT 0 NOT NULL,
    desintgen integer DEFAULT 0 NOT NULL,
    desintcom integer DEFAULT 0 NOT NULL,
    dpgnacgen integer DEFAULT 0 NOT NULL,
    dpgnaccom integer DEFAULT 0 NOT NULL,
    dpgintgen integer DEFAULT 0 NOT NULL,
    dpgintcom integer DEFAULT 0 NOT NULL,
    atenacgen integer DEFAULT 0 NOT NULL,
    atenaccom integer DEFAULT 0 NOT NULL,
    ateintgen integer DEFAULT 0 NOT NULL,
    ateintcom integer DEFAULT 0 NOT NULL,
    intdemembnacgen integer DEFAULT 0 NOT NULL,
    txtdemembnacgen text DEFAULT 0 NOT NULL,
    intdemembnaccom integer DEFAULT 0 NOT NULL,
    txtdemembnaccom text DEFAULT 0 NOT NULL,
    intdemembintgen integer DEFAULT 0 NOT NULL,
    txtdemembintgen text DEFAULT 0 NOT NULL,
    intdemembintcom integer DEFAULT 0 NOT NULL,
    txtdemembintcom text DEFAULT 0 NOT NULL,
    intdemdesnacgen integer DEFAULT 0 NOT NULL,
    txtdemdesnacgen text DEFAULT 0 NOT NULL,
    intdemdesnaccom integer DEFAULT 0 NOT NULL,
    txtdemdesnaccom text DEFAULT 0 NOT NULL,
    intdemdesintgen integer DEFAULT 0 NOT NULL,
    txtdemdesintgen text DEFAULT 0 NOT NULL,
    intdemdesintcom integer DEFAULT 0 NOT NULL,
    txtdemdesintcom text DEFAULT 0 NOT NULL,
    fecha_creacion timestamp(6) without time zone DEFAULT now(),
    id_usuario integer,
    fecha_modificacion timestamp(6) without time zone DEFAULT NULL::timestamp without time zone
);


ALTER TABLE public.movilizaciones OWNER TO postgres;

--
-- Name: movilizaciones_id_movilizacion_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.movilizaciones_id_movilizacion_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.movilizaciones_id_movilizacion_seq OWNER TO postgres;

--
-- Name: movilizaciones_id_movilizacion_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.movilizaciones_id_movilizacion_seq OWNED BY public.movilizaciones.id_movilizacion;


--
-- Name: operaciones; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.operaciones (
    id_operacion integer NOT NULL,
    fecha_reporte timestamp(6) without time zone DEFAULT NULL::timestamp without time zone NOT NULL,
    id_aeropuerto integer NOT NULL,
    bl_vehiculos_inspeccion boolean DEFAULT false NOT NULL,
    bl_personal_guardia boolean DEFAULT false,
    bl_equipos_operaciones boolean DEFAULT false,
    bl_notam boolean DEFAULT false,
    tx_notam text,
    bl_movimiento boolean DEFAULT false,
    bl_torre_torre boolean DEFAULT false,
    bl_aeronave boolean DEFAULT false,
    tx_aeronave text,
    bl_luces_aproximacion boolean DEFAULT false,
    tx_vehiculo text,
    bl_detector_metales boolean DEFAULT false,
    bl_rayosx boolean DEFAULT false,
    tx_rayosx text,
    bl_pista boolean DEFAULT false,
    tx_pista text,
    bl_manga boolean DEFAULT false,
    tx_manga text,
    bl_papi boolean DEFAULT false,
    tx_papi text,
    bl_cerca boolean DEFAULT false,
    tx_cerca text,
    bl_electricidad boolean DEFAULT false,
    tx_electricidad text,
    bl_agua boolean DEFAULT false,
    tx_agua text,
    bl_cantv boolean DEFAULT false,
    tx_cantv text,
    bl_celular boolean DEFAULT false,
    tx_celular text,
    bl_internet boolean DEFAULT false,
    tx_internet text,
    bl_otros boolean DEFAULT false,
    tx_otros text,
    bl_senaleros boolean DEFAULT false,
    tx_senaleros text,
    bl_demoras boolean DEFAULT false,
    tx_demoras text,
    bl_alumbrado boolean DEFAULT false,
    tx_alumbrado text,
    bl_aire boolean DEFAULT false,
    tx_aire text,
    bl_planta boolean DEFAULT false,
    tx_planta text,
    bl_comunicacion boolean DEFAULT false,
    tx_comunicacion text,
    bl_presurizacion boolean DEFAULT false,
    tx_presurizacion text,
    bl_incidentes boolean DEFAULT false,
    tx_incidentes text,
    fecha_creacion timestamp(6) without time zone DEFAULT now(),
    id_usuario integer,
    fecha_modificacion timestamp(6) without time zone DEFAULT NULL::timestamp without time zone
);


ALTER TABLE public.operaciones OWNER TO postgres;

--
-- Name: operaciones_id_operacion_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.operaciones_id_operacion_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.operaciones_id_operacion_seq OWNER TO postgres;

--
-- Name: operaciones_id_operacion_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.operaciones_id_operacion_seq OWNED BY public.operaciones.id_operacion;


--
-- Name: tipo_aeropuertos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tipo_aeropuertos (
    id_tipo_aeropuerto integer NOT NULL,
    tipo_aeropuerto character varying(20) DEFAULT NULL::character varying NOT NULL,
    fecha_creacion timestamp(6) without time zone DEFAULT now() NOT NULL,
    id_usuario integer,
    fecha_modificacion timestamp(6) without time zone DEFAULT NULL::timestamp without time zone
);


ALTER TABLE public.tipo_aeropuertos OWNER TO postgres;

--
-- Name: tipo_aeropuertos_id_tipo_aeropuerto_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tipo_aeropuertos_id_tipo_aeropuerto_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tipo_aeropuertos_id_tipo_aeropuerto_seq OWNER TO postgres;

--
-- Name: tipo_aeropuertos_id_tipo_aeropuerto_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tipo_aeropuertos_id_tipo_aeropuerto_seq OWNED BY public.tipo_aeropuertos.id_tipo_aeropuerto;


SET default_with_oids = false;

--
-- Name: usuarios; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.usuarios (
    id_usuario bigint NOT NULL,
    ci_usuario bigint NOT NULL,
    nombre_usuario character varying(60) DEFAULT NULL::character varying NOT NULL,
    login_usuario character varying(60) DEFAULT NULL::character varying NOT NULL,
    clave_usuario character varying(32) DEFAULT NULL::character varying NOT NULL,
    id_grupo bigint NOT NULL,
    activo boolean,
    fecha_creacion timestamp(6) without time zone DEFAULT now() NOT NULL
);


ALTER TABLE public.usuarios OWNER TO postgres;

--
-- Name: usuarios_id_usuario_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.usuarios_id_usuario_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuarios_id_usuario_seq OWNER TO postgres;

--
-- Name: usuarios_id_usuario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.usuarios_id_usuario_seq OWNED BY public.usuarios.id_usuario;


--
-- Name: id_aeropuerto; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.aeropuertos ALTER COLUMN id_aeropuerto SET DEFAULT nextval('public.aeropuertos_id_aeropuerto_seq'::regclass);


--
-- Name: id_bomberil; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bomberiles ALTER COLUMN id_bomberil SET DEFAULT nextval('public.bomberiles_id_bomberil_seq'::regclass);


--
-- Name: id_movilizacion; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.movilizaciones ALTER COLUMN id_movilizacion SET DEFAULT nextval('public.movilizaciones_id_movilizacion_seq'::regclass);


--
-- Name: id_operacion; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.operaciones ALTER COLUMN id_operacion SET DEFAULT nextval('public.operaciones_id_operacion_seq'::regclass);


--
-- Name: id_tipo_aeropuerto; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tipo_aeropuertos ALTER COLUMN id_tipo_aeropuerto SET DEFAULT nextval('public.tipo_aeropuertos_id_tipo_aeropuerto_seq'::regclass);


--
-- Name: id_usuario; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuarios ALTER COLUMN id_usuario SET DEFAULT nextval('public.usuarios_id_usuario_seq'::regclass);


--
-- Data for Name: aeropuertos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.aeropuertos (id_aeropuerto, id_tipo, cod_iata, cod_oaci, aeropuerto, denominacion, id_estado, administrado, fecha_creacion, id_usuario, fecha_modificacion) FROM stdin;
1	2	N/D	SVMD	ALBERTO CARNEVALLI	N/D	12	t	2019-04-01 08:59:15.628306	\N	\N
2	2	N/D	SVAN	ANACO	N/D	2	t	2019-04-01 08:59:15.628306	\N	\N
3	2	N/D	SVPA	CACIQUE ARAMARE	N/D	22	t	2019-04-01 08:59:15.628306	\N	\N
4	2	N/D	SVCL	CALABOZO	N/D	10	t	2019-04-01 08:59:15.628306	\N	\N
5	2	N/D	SVST	DON EDMUNDO BARRIOS	N/D	2	t	2019-04-01 08:59:15.628306	\N	\N
6	2	N/D	SVLF	FRANCISCO GARCÍA DE HEVIA	N/D	18	t	2019-04-01 08:59:15.628306	\N	\N
7	2	N/D	SVBC	GENERAL DE DIVISIÓN JOSÉ ANTONIO ANZOÁTEGUI	N/D	2	t	2019-04-01 08:59:15.628306	\N	\N
8	2	N/D	SVMG	GENERAL EN JEFE SANTIAGO MARIÑO	N/D	15	t	2019-04-01 08:59:15.628306	\N	\N
9	2	N/D	SVSA	GENERAL JUAN VICENTE GÓMEZ	N/D	18	t	2019-04-01 08:59:15.628306	\N	\N
10	2	N/D	SVHG	HIGUEROTE	N/D	13	t	2019-04-01 08:59:15.628306	\N	\N
11	2	N/D	SVMD	JUAN PABLO PÉREZ ALFONZO	N/D	12	t	2019-04-01 08:59:15.628306	\N	\N
12	2	N/D	SVIT	LA TORTUGA	N/D	9	t	2019-04-01 08:59:15.628306	\N	\N
13	2	N/D	SVSO	MAYOR BUENAVENTURA VIVAS GUERRERO	N/D	18	t	2019-04-01 08:59:15.628306	\N	\N
14	2	N/D	SVCS	OSCAR MACHAD OZULOAGA	N/D	13	t	2019-04-01 08:59:15.628306	\N	\N
15	2	N/D	SVPM	PARAMILLO	N/D	18	t	2019-04-01 08:59:15.628306	\N	\N
16	2	N/D	SVSE	SANTA ELENA DE UAIRÉN	N/D	6	t	2019-04-01 08:59:15.628306	\N	\N
17	2	N/D	SVSP	STTE. NÉSTOR ARIAS	N/D	20	t	2019-04-01 08:59:15.628306	\N	\N
18	2	N/D	SVIE	TCNEL. ANDRÉS SALAZAR MARCANO	N/D	15	t	2019-04-01 08:59:15.628306	\N	\N
19	2	N/D	SVGD	VARA DE MARÍA	N/D	3	t	2019-04-01 08:59:15.628306	\N	\N
20	4	N/D	N/D	AERÓDROMO TRINIDAD DE ARICHUNA	N/D	5	f	2019-04-01 08:59:15.628306	\N	\N
21	3	N/D	N/D	AEROPUERTO BARINAS	N/D	4	f	2019-04-01 08:59:15.628306	\N	\N
22	2	N/D	N/D	AEROPUERTO DE ARAGUA TACARIGUA	N/D	23	f	2019-04-01 08:59:15.628306	\N	\N
23	2	N/D	SVTC	AEROPUERTO DE TUCUPITA	N/D	23	f	2019-04-01 08:59:15.628306	\N	\N
24	2	N/D	SVEZ	AEROPUERTO ELORZA	N/D	3	f	2019-04-01 08:59:15.628306	\N	\N
25	2	N/D	SVPC	AEROPUERTO GENERAL BARTOLOMÉ SALOM	N/D	7	f	2019-04-01 08:59:15.628306	\N	\N
26	2	N/D	SVAC	AEROPUERTO GRAL.BGDA. OSWALDO GUEVARA MUJICA	N/D	16	f	2019-04-01 08:59:15.628306	\N	\N
27	1	N/D	SVCU	AEROPUERTO INTERNACIONAL ANTONIO JOSÉ DE SUCRE	N/D	17	f	2019-04-01 08:59:15.628306	\N	\N
28	1	N/D	SVVA	AEROPUERTO INTERNACIONAL ARTURO MICHELE	N/D	7	f	2019-04-01 08:59:15.628306	\N	\N
29	1	N/D	SVMC	AEROPUERTO INTERNACIONAL DE LA CHINITA	N/D	21	f	2019-04-01 08:59:15.628306	\N	\N
30	1	N/D	SVMI	AEROPUERTO INTERNACIONAL DE MAIQUETÍA SIMÓN BOLÍVAR	N/D	24	f	2019-04-01 08:59:15.628306	\N	\N
31	1	N/D	SVBM	AEROPUERTO INTERNACIONAL JACINTO LARA	N/D	11	f	2019-04-01 08:59:15.628306	\N	\N
32	1	N/D	SVMT	AEROPUERTO INTERNACIONAL JOSÉ TADEO MONAGAS	N/D	14	f	2019-04-01 08:59:15.628306	\N	\N
33	1	N/D	SVJC	AEROPUERTO INTERNACIONAL JOSEFA CAMEJO	N/D	9	f	2019-04-01 08:59:15.628306	\N	\N
34	1	N/D	SVPR	AEROPUERTO INTERNACIONAL MANUEL CARLOS PIAR	N/D	6	f	2019-04-01 08:59:15.628306	\N	\N
35	2	N/D	SVSR	AEROPUERTO LAS FLECHERAS	N/D	3	f	2019-04-01 08:59:15.628306	\N	\N
36	2	N/D	SVLR	AEROPUERTO LOS ROQUES	N/D	9	f	2019-04-01 08:59:15.628306	\N	\N
37	2	N/D	SVBS	AEROPUERTO LOS TACARIGUAS	N/D	4	f	2019-04-01 08:59:15.628306	\N	\N
38	2	N/D	SVBI	AEROPUERTO LUISA CÁCERES DE ARISMENDI	N/D	5	f	2019-04-01 08:59:15.628306	\N	\N
39	2	N/D	SVSZ	AEROPUERTO MIGUEL URDANETA FERNÁNDEZ	N/D	21	f	2019-04-01 08:59:15.628306	\N	\N
\.


--
-- Name: aeropuertos_id_aeropuerto_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.aeropuertos_id_aeropuerto_seq', 1, false);


--
-- Data for Name: bomberiles; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.bomberiles (id_bomberil, fecha_reporte, id_aeropuerto, bl_contra_incendios, bl_ambulancias, bl_personal_requerido, bl_extintores, bl_herramientas_rescate, bl_proteccion_personal, bl_aeronave, tx_aeronave, bl_vehiculo, tx_vehiculo, bl_maleza, tx_maleza, bl_infraestructura, tx_infraestructura, bl_otros, tx_otros, fecha_creacion, id_usuario, fecha_modificacion) FROM stdin;
\.


--
-- Name: bomberiles_id_bomberil_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.bomberiles_id_bomberil_seq', 1, false);


--
-- Data for Name: estados; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.estados (id_estado, estado) FROM stdin;
1	DTTO. CAPITAL
2	EDO. ANZOATEGUI
3	EDO. APURE
4	EDO. ARAGUA
5	EDO. BARINAS
6	EDO. BOLIVAR
7	EDO. CARABOBO
8	EDO. COJEDES
9	EDO. FALCON
10	EDO. GUARICO
11	EDO. LARA
12	EDO. MERIDA
13	EDO. MIRANDA
14	EDO. MONAGAS
15	EDO. NUEVA ESPARTA
16	EDO. PORTUGUESA
17	EDO. SUCRE
18	EDO. TACHIRA
19	EDO. TRUJILLO
20	EDO. YARACUY
21	EDO. ZULIA
22	EDO. AMAZONAS
23	EDO. DELTA AMAC
24	EDO. VARGAS
\.


--
-- Data for Name: movilizaciones; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.movilizaciones (id_movilizacion, fecha_reporte, id_aeropuerto, embnacgen, embnaccom, embintgen, embintcom, desnacgen, desnaccom, desintgen, desintcom, dpgnacgen, dpgnaccom, dpgintgen, dpgintcom, atenacgen, atenaccom, ateintgen, ateintcom, intdemembnacgen, txtdemembnacgen, intdemembnaccom, txtdemembnaccom, intdemembintgen, txtdemembintgen, intdemembintcom, txtdemembintcom, intdemdesnacgen, txtdemdesnacgen, intdemdesnaccom, txtdemdesnaccom, intdemdesintgen, txtdemdesintgen, intdemdesintcom, txtdemdesintcom, fecha_creacion, id_usuario, fecha_modificacion) FROM stdin;
\.


--
-- Name: movilizaciones_id_movilizacion_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.movilizaciones_id_movilizacion_seq', 1, false);


--
-- Data for Name: operaciones; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.operaciones (id_operacion, fecha_reporte, id_aeropuerto, bl_vehiculos_inspeccion, bl_personal_guardia, bl_equipos_operaciones, bl_notam, tx_notam, bl_movimiento, bl_torre_torre, bl_aeronave, tx_aeronave, bl_luces_aproximacion, tx_vehiculo, bl_detector_metales, bl_rayosx, tx_rayosx, bl_pista, tx_pista, bl_manga, tx_manga, bl_papi, tx_papi, bl_cerca, tx_cerca, bl_electricidad, tx_electricidad, bl_agua, tx_agua, bl_cantv, tx_cantv, bl_celular, tx_celular, bl_internet, tx_internet, bl_otros, tx_otros, bl_senaleros, tx_senaleros, bl_demoras, tx_demoras, bl_alumbrado, tx_alumbrado, bl_aire, tx_aire, bl_planta, tx_planta, bl_comunicacion, tx_comunicacion, bl_presurizacion, tx_presurizacion, bl_incidentes, tx_incidentes, fecha_creacion, id_usuario, fecha_modificacion) FROM stdin;
\.


--
-- Name: operaciones_id_operacion_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.operaciones_id_operacion_seq', 1, false);


--
-- Data for Name: tipo_aeropuertos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tipo_aeropuertos (id_tipo_aeropuerto, tipo_aeropuerto, fecha_creacion, id_usuario, fecha_modificacion) FROM stdin;
1	INTERNACIONAL	2019-04-01 08:32:18.268837	\N	\N
2	NACIONAL	2019-04-01 08:32:24.788867	\N	\N
3	AERÓDROMO	2019-04-01 08:32:33.676819	\N	\N
4	PISTA	2019-04-01 08:32:40.052623	\N	\N
\.


--
-- Name: tipo_aeropuertos_id_tipo_aeropuerto_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tipo_aeropuertos_id_tipo_aeropuerto_seq', 1, false);


--
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.usuarios (id_usuario, ci_usuario, nombre_usuario, login_usuario, clave_usuario, id_grupo, activo, fecha_creacion) FROM stdin;
1	7920566	CARLOS RAFAEL MARRERO MUÑOZ	cmarrero	e10adc3949ba59abbe56e057f20f883e	1	t	2018-03-05 05:20:39.726682
4	15314290	SIUL HELLER CARVAJAL ESCALANTE	scarvajal	e10adc3949ba59abbe56e057f20f883e	2	t	2018-03-28 12:07:42.609
6	21379885	GLAUVYMAR BEATRIZ CASTILLO FIGUEROA	gcastillo	e10adc3949ba59abbe56e057f20f883e	3	t	2018-03-28 12:08:49.353
\.


--
-- Name: usuarios_id_usuario_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.usuarios_id_usuario_seq', 7, true);


--
-- Name: estados_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.estados
    ADD CONSTRAINT estados_pkey PRIMARY KEY (id_estado);


--
-- Name: pkey_aeropuertos_id_aeropuerto; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.aeropuertos
    ADD CONSTRAINT pkey_aeropuertos_id_aeropuerto PRIMARY KEY (id_aeropuerto);


--
-- Name: pkey_bomberiles_id_bomberil; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bomberiles
    ADD CONSTRAINT pkey_bomberiles_id_bomberil PRIMARY KEY (id_bomberil);


--
-- Name: pkey_movilizaciones_id_movilizacion; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.movilizaciones
    ADD CONSTRAINT pkey_movilizaciones_id_movilizacion PRIMARY KEY (id_movilizacion);


--
-- Name: pkey_operaciones_id_operacion; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.operaciones
    ADD CONSTRAINT pkey_operaciones_id_operacion PRIMARY KEY (id_operacion);


--
-- Name: pkey_tipo_aeropuertos_id_tipo_aeropuerto; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tipo_aeropuertos
    ADD CONSTRAINT pkey_tipo_aeropuertos_id_tipo_aeropuerto PRIMARY KEY (id_tipo_aeropuerto);


--
-- Name: usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (id_usuario, ci_usuario, login_usuario, clave_usuario);


--
-- Name: fky_aeropuertos_bomberiles_id_aeropuerto; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bomberiles
    ADD CONSTRAINT fky_aeropuertos_bomberiles_id_aeropuerto FOREIGN KEY (id_aeropuerto) REFERENCES public.aeropuertos(id_aeropuerto) ON DELETE RESTRICT;


--
-- Name: fky_aeropuertos_movilizaciones_id_movilizacion; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.movilizaciones
    ADD CONSTRAINT fky_aeropuertos_movilizaciones_id_movilizacion FOREIGN KEY (id_movilizacion) REFERENCES public.aeropuertos(id_aeropuerto) ON DELETE RESTRICT;


--
-- Name: fky_aeropuertos_operaciones_id_aeropuerto; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.operaciones
    ADD CONSTRAINT fky_aeropuertos_operaciones_id_aeropuerto FOREIGN KEY (id_aeropuerto) REFERENCES public.aeropuertos(id_aeropuerto) ON DELETE RESTRICT;


--
-- Name: fky_estado; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.aeropuertos
    ADD CONSTRAINT fky_estado FOREIGN KEY (id_estado) REFERENCES public.estados(id_estado) ON DELETE RESTRICT;


--
-- Name: fky_tipo_aeropuerto; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.aeropuertos
    ADD CONSTRAINT fky_tipo_aeropuerto FOREIGN KEY (id_tipo) REFERENCES public.tipo_aeropuertos(id_tipo_aeropuerto) ON DELETE RESTRICT;


--
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

