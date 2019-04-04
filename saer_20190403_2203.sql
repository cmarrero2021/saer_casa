--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;

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
-- Name: aeropuertos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
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
-- Name: aterrizajes; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.aterrizajes (
    id_movilizacion integer NOT NULL,
    id_aterrizaje integer NOT NULL,
    id_aeropuerto integer NOT NULL,
    fecha_despegue timestamp without time zone NOT NULL,
    atenacgen integer,
    atenaccom integer,
    ateintgen integer,
    ateintcom integer NOT NULL,
    fecha_creacion timestamp without time zone DEFAULT now() NOT NULL,
    id_usuario integer,
    fecha_modificacion timestamp without time zone
);


ALTER TABLE public.aterrizajes OWNER TO postgres;

--
-- Name: aterrizajes_id_aterrizaje_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.aterrizajes_id_aterrizaje_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.aterrizajes_id_aterrizaje_seq OWNER TO postgres;

--
-- Name: aterrizajes_id_aterrizaje_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.aterrizajes_id_aterrizaje_seq OWNED BY public.aterrizajes.id_aterrizaje;


--
-- Name: bomberiles; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
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
-- Name: demoras; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.demoras (
    id_movilizacion integer NOT NULL,
    id_demora integer NOT NULL,
    id_aeropuerto integer NOT NULL,
    fecha_demora timestamp without time zone NOT NULL,
    id_tipo_vuelo integer NOT NULL,
    id_destino_vuelo integer NOT NULL,
    cant_demora integer NOT NULL,
    obs_demora text NOT NULL,
    fecha_creacion timestamp without time zone DEFAULT now() NOT NULL,
    id_usuario integer,
    fecha_modificacion timestamp without time zone
);


ALTER TABLE public.demoras OWNER TO postgres;

--
-- Name: demoras_id_demora_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.demoras_id_demora_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.demoras_id_demora_seq OWNER TO postgres;

--
-- Name: demoras_id_demora_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.demoras_id_demora_seq OWNED BY public.demoras.id_demora;


--
-- Name: desembarques; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.desembarques (
    id_movilizacion integer NOT NULL,
    id_desembarque integer NOT NULL,
    id_aeropuerto integer NOT NULL,
    fecha_desembarque timestamp without time zone NOT NULL,
    dsbnacgen integer,
    dsbnaccom integer,
    dsbintgen integer,
    dsbintcom integer NOT NULL,
    fecha_creacion timestamp without time zone DEFAULT now() NOT NULL,
    id_usuario integer,
    fecha_modificacion timestamp without time zone
);


ALTER TABLE public.desembarques OWNER TO postgres;

--
-- Name: desembarques_id_desembarque_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.desembarques_id_desembarque_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.desembarques_id_desembarque_seq OWNER TO postgres;

--
-- Name: desembarques_id_desembarque_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.desembarques_id_desembarque_seq OWNED BY public.desembarques.id_desembarque;


--
-- Name: despegues; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.despegues (
    id_movilizacion integer NOT NULL,
    id_despegue integer NOT NULL,
    id_aeropuerto integer NOT NULL,
    fecha_despegue timestamp without time zone NOT NULL,
    dspnacgen integer,
    dspnaccom integer,
    dspintgen integer,
    dspintcom integer NOT NULL,
    fecha_creacion timestamp without time zone DEFAULT now() NOT NULL,
    id_usuario integer,
    fecha_modificacion timestamp without time zone
);


ALTER TABLE public.despegues OWNER TO postgres;

--
-- Name: despegues_id_despegue_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.despegues_id_despegue_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.despegues_id_despegue_seq OWNER TO postgres;

--
-- Name: despegues_id_despegue_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.despegues_id_despegue_seq OWNED BY public.despegues.id_despegue;


SET default_with_oids = false;

--
-- Name: destino_vuelos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.destino_vuelos (
    id_destino_vuelo integer NOT NULL,
    destino_vuelo character varying(20) NOT NULL
);


ALTER TABLE public.destino_vuelos OWNER TO postgres;

--
-- Name: destino_vuelos_id_destino_vuelo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.destino_vuelos_id_destino_vuelo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.destino_vuelos_id_destino_vuelo_seq OWNER TO postgres;

--
-- Name: destino_vuelos_id_destino_vuelo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.destino_vuelos_id_destino_vuelo_seq OWNED BY public.destino_vuelos.id_destino_vuelo;


SET default_with_oids = true;

--
-- Name: embarques; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.embarques (
    id_movilizacion integer NOT NULL,
    id_embarque integer NOT NULL,
    id_aeropuerto integer NOT NULL,
    fecha_embarque timestamp without time zone NOT NULL,
    embnacgen integer,
    embnaccom integer,
    embintgen integer,
    embintcom integer NOT NULL,
    fecha_creacion timestamp without time zone DEFAULT now() NOT NULL,
    id_usuario integer,
    fecha_modificacion timestamp without time zone
);


ALTER TABLE public.embarques OWNER TO postgres;

--
-- Name: embarques_id_embarque_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.embarques_id_embarque_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.embarques_id_embarque_seq OWNER TO postgres;

--
-- Name: embarques_id_embarque_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.embarques_id_embarque_seq OWNED BY public.embarques.id_embarque;


--
-- Name: estados; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.estados (
    id_estado integer NOT NULL,
    estado character varying(250) DEFAULT NULL::character varying NOT NULL
);


ALTER TABLE public.estados OWNER TO postgres;

SET default_with_oids = false;

--
-- Name: movilizaciones; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.movilizaciones (
    id_movilizacion integer NOT NULL,
    fecha_reporte timestamp without time zone NOT NULL,
    id_aeropuerto integer NOT NULL,
    fecha_creacion timestamp without time zone DEFAULT now() NOT NULL,
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


SET default_with_oids = true;

--
-- Name: operaciones; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
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
-- Name: tipo_aeropuertos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
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
-- Name: tipo_vuelos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.tipo_vuelos (
    id_tipo_vuelo integer NOT NULL,
    tipo_vuelo character varying(20) NOT NULL
);


ALTER TABLE public.tipo_vuelos OWNER TO postgres;

--
-- Name: tipo_vuelos_id_tipo_vuelo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tipo_vuelos_id_tipo_vuelo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tipo_vuelos_id_tipo_vuelo_seq OWNER TO postgres;

--
-- Name: tipo_vuelos_id_tipo_vuelo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tipo_vuelos_id_tipo_vuelo_seq OWNED BY public.tipo_vuelos.id_tipo_vuelo;


--
-- Name: usuarios; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
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
-- Name: id_aterrizaje; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.aterrizajes ALTER COLUMN id_aterrizaje SET DEFAULT nextval('public.aterrizajes_id_aterrizaje_seq'::regclass);


--
-- Name: id_bomberil; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bomberiles ALTER COLUMN id_bomberil SET DEFAULT nextval('public.bomberiles_id_bomberil_seq'::regclass);


--
-- Name: id_demora; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.demoras ALTER COLUMN id_demora SET DEFAULT nextval('public.demoras_id_demora_seq'::regclass);


--
-- Name: id_desembarque; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.desembarques ALTER COLUMN id_desembarque SET DEFAULT nextval('public.desembarques_id_desembarque_seq'::regclass);


--
-- Name: id_despegue; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.despegues ALTER COLUMN id_despegue SET DEFAULT nextval('public.despegues_id_despegue_seq'::regclass);


--
-- Name: id_destino_vuelo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.destino_vuelos ALTER COLUMN id_destino_vuelo SET DEFAULT nextval('public.destino_vuelos_id_destino_vuelo_seq'::regclass);


--
-- Name: id_embarque; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.embarques ALTER COLUMN id_embarque SET DEFAULT nextval('public.embarques_id_embarque_seq'::regclass);


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
-- Name: id_tipo_vuelo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tipo_vuelos ALTER COLUMN id_tipo_vuelo SET DEFAULT nextval('public.tipo_vuelos_id_tipo_vuelo_seq'::regclass);


--
-- Name: id_usuario; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuarios ALTER COLUMN id_usuario SET DEFAULT nextval('public.usuarios_id_usuario_seq'::regclass);


--
-- Data for Name: aeropuertos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.aeropuertos (id_aeropuerto, id_tipo, cod_iata, cod_oaci, aeropuerto, denominacion, id_estado, administrado, fecha_creacion, id_usuario, fecha_modificacion) FROM stdin;
2	2	MRD	SVMD	ALBERTO CARNEVALLI	N/D	12	t	2019-04-01 08:59:15.628306	\N	\N
3	2	MRD	SVMD	ALBERTO CARNEVALLI	N/D	12	t	2019-04-01 08:59:15.628306	\N	\N
4	2	MRD	SVMD	ALBERTO CARNEVALLI	N/D	12	t	2019-04-01 08:59:15.628306	\N	\N
5	2	MRD	SVMD	ALBERTO CARNEVALLI	N/D	12	t	2019-04-01 08:59:15.628306	\N	\N
6	2	MRD	SVMD	ALBERTO CARNEVALLI	N/D	12	t	2019-04-01 08:59:15.628306	\N	\N
7	2	MRD	SVMD	ALBERTO CARNEVALLI	N/D	12	t	2019-04-01 08:59:15.628306	\N	\N
8	2	MRD	SVMD	ALBERTO CARNEVALLI	N/D	12	t	2019-04-01 08:59:15.628306	\N	\N
9	2	MRD	SVMD	ALBERTO CARNEVALLI	N/D	12	t	2019-04-01 08:59:15.628306	\N	\N
10	2	MRD	SVMD	ALBERTO CARNEVALLI	N/D	12	t	2019-04-01 08:59:15.628306	\N	\N
11	2	MRD	SVMD	ALBERTO CARNEVALLI	N/D	12	t	2019-04-01 08:59:15.628306	\N	\N
12	2	MRD	SVMD	ALBERTO CARNEVALLI	N/D	12	t	2019-04-01 08:59:15.628306	\N	\N
13	2	MRD	SVMD	ALBERTO CARNEVALLI	N/D	12	t	2019-04-01 08:59:15.628306	\N	\N
14	2	MRD	SVMD	ALBERTO CARNEVALLI	N/D	12	t	2019-04-01 08:59:15.628306	\N	\N
15	2	MRD	SVMD	ALBERTO CARNEVALLI	N/D	12	t	2019-04-01 08:59:15.628306	\N	\N
16	2	MRD	SVMD	ALBERTO CARNEVALLI	N/D	12	t	2019-04-01 08:59:15.628306	\N	\N
17	2	MRD	SVMD	ALBERTO CARNEVALLI	N/D	12	t	2019-04-01 08:59:15.628306	\N	\N
18	2	MRD	SVMD	ALBERTO CARNEVALLI	N/D	12	t	2019-04-01 08:59:15.628306	\N	\N
19	2	MRD	SVMD	ALBERTO CARNEVALLI	N/D	12	t	2019-04-01 08:59:15.628306	\N	\N
20	2	MRD	SVMD	ALBERTO CARNEVALLI	N/D	12	t	2019-04-01 08:59:15.628306	\N	\N
21	2	MRD	SVMD	ALBERTO CARNEVALLI	N/D	12	t	2019-04-01 08:59:15.628306	\N	\N
22	2	MRD	SVMD	ALBERTO CARNEVALLI	N/D	12	t	2019-04-01 08:59:15.628306	\N	\N
23	2	MRD	SVMD	ALBERTO CARNEVALLI	N/D	12	t	2019-04-01 08:59:15.628306	\N	\N
24	2	MRD	SVMD	ALBERTO CARNEVALLI	N/D	12	t	2019-04-01 08:59:15.628306	\N	\N
25	2	MRD	SVMD	ALBERTO CARNEVALLI	N/D	12	t	2019-04-01 08:59:15.628306	\N	\N
26	2	MRD	SVMD	ALBERTO CARNEVALLI	N/D	12	t	2019-04-01 08:59:15.628306	\N	\N
27	2	MRD	SVMD	ALBERTO CARNEVALLI	N/D	12	t	2019-04-01 08:59:15.628306	\N	\N
28	2	MRD	SVMD	ALBERTO CARNEVALLI	N/D	12	t	2019-04-01 08:59:15.628306	\N	\N
29	2	MRD	SVMD	ALBERTO CARNEVALLI	N/D	12	t	2019-04-01 08:59:15.628306	\N	\N
30	2	MRD	SVMD	ALBERTO CARNEVALLI	N/D	12	t	2019-04-01 08:59:15.628306	\N	\N
31	2	MRD	SVMD	ALBERTO CARNEVALLI	N/D	12	t	2019-04-01 08:59:15.628306	\N	\N
32	2	MRD	SVMD	ALBERTO CARNEVALLI	N/D	12	t	2019-04-01 08:59:15.628306	\N	\N
33	2	MRD	SVMD	ALBERTO CARNEVALLI	N/D	12	t	2019-04-01 08:59:15.628306	\N	\N
34	2	MRD	SVMD	ALBERTO CARNEVALLI	N/D	12	t	2019-04-01 08:59:15.628306	\N	\N
35	2	MRD	SVMD	ALBERTO CARNEVALLI	N/D	12	t	2019-04-01 08:59:15.628306	\N	\N
36	2	MRD	SVMD	ALBERTO CARNEVALLI	N/D	12	t	2019-04-01 08:59:15.628306	\N	\N
37	2	MRD	SVMD	ALBERTO CARNEVALLI	N/D	12	t	2019-04-01 08:59:15.628306	\N	\N
38	2	MRD	SVMD	ALBERTO CARNEVALLI	N/D	12	t	2019-04-01 08:59:15.628306	\N	\N
39	2	MRD	SVMD	ALBERTO CARNEVALLI	N/D	12	t	2019-04-01 08:59:15.628306	\N	\N
1	4	MRDS	SVMD	ALBERTO CARNEVALLI	MÉRIDA	12	t	2019-04-01 08:59:15.628306	\N	\N
\.


--
-- Name: aeropuertos_id_aeropuerto_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.aeropuertos_id_aeropuerto_seq', 1, false);


--
-- Data for Name: aterrizajes; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.aterrizajes (id_movilizacion, id_aterrizaje, id_aeropuerto, fecha_despegue, atenacgen, atenaccom, ateintgen, ateintcom, fecha_creacion, id_usuario, fecha_modificacion) FROM stdin;
\.


--
-- Name: aterrizajes_id_aterrizaje_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.aterrizajes_id_aterrizaje_seq', 1, false);


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
-- Data for Name: demoras; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.demoras (id_movilizacion, id_demora, id_aeropuerto, fecha_demora, id_tipo_vuelo, id_destino_vuelo, cant_demora, obs_demora, fecha_creacion, id_usuario, fecha_modificacion) FROM stdin;
\.


--
-- Name: demoras_id_demora_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.demoras_id_demora_seq', 1, false);


--
-- Data for Name: desembarques; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.desembarques (id_movilizacion, id_desembarque, id_aeropuerto, fecha_desembarque, dsbnacgen, dsbnaccom, dsbintgen, dsbintcom, fecha_creacion, id_usuario, fecha_modificacion) FROM stdin;
\.


--
-- Name: desembarques_id_desembarque_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.desembarques_id_desembarque_seq', 1, false);


--
-- Data for Name: despegues; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.despegues (id_movilizacion, id_despegue, id_aeropuerto, fecha_despegue, dspnacgen, dspnaccom, dspintgen, dspintcom, fecha_creacion, id_usuario, fecha_modificacion) FROM stdin;
\.


--
-- Name: despegues_id_despegue_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.despegues_id_despegue_seq', 1, false);


--
-- Data for Name: destino_vuelos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.destino_vuelos (id_destino_vuelo, destino_vuelo) FROM stdin;
1	NACIONAL
2	INTERNACIONAL
\.


--
-- Name: destino_vuelos_id_destino_vuelo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.destino_vuelos_id_destino_vuelo_seq', 2, true);


--
-- Data for Name: embarques; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.embarques (id_movilizacion, id_embarque, id_aeropuerto, fecha_embarque, embnacgen, embnaccom, embintgen, embintcom, fecha_creacion, id_usuario, fecha_modificacion) FROM stdin;
\.


--
-- Name: embarques_id_embarque_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.embarques_id_embarque_seq', 1, false);


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

COPY public.movilizaciones (id_movilizacion, fecha_reporte, id_aeropuerto, fecha_creacion, id_usuario, fecha_modificacion) FROM stdin;
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

SELECT pg_catalog.setval('public.tipo_aeropuertos_id_tipo_aeropuerto_seq', 5, false);


--
-- Data for Name: tipo_vuelos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tipo_vuelos (id_tipo_vuelo, tipo_vuelo) FROM stdin;
1	GENERAL
2	COMERCIAL
\.


--
-- Name: tipo_vuelos_id_tipo_vuelo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tipo_vuelos_id_tipo_vuelo_seq', 2, true);


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
-- Name: estados_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.estados
    ADD CONSTRAINT estados_pkey PRIMARY KEY (id_estado);


--
-- Name: pkey_aeropuertos_id_aeropuerto; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.aeropuertos
    ADD CONSTRAINT pkey_aeropuertos_id_aeropuerto PRIMARY KEY (id_aeropuerto);


--
-- Name: pkey_aterrizajes_id_aterrizaje; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.aterrizajes
    ADD CONSTRAINT pkey_aterrizajes_id_aterrizaje PRIMARY KEY (id_aterrizaje);


--
-- Name: pkey_bomberiles_id_bomberil; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.bomberiles
    ADD CONSTRAINT pkey_bomberiles_id_bomberil PRIMARY KEY (id_bomberil);


--
-- Name: pkey_demoras_id_demora; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.demoras
    ADD CONSTRAINT pkey_demoras_id_demora PRIMARY KEY (id_demora);


--
-- Name: pkey_desembarques_id_desembarque; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.desembarques
    ADD CONSTRAINT pkey_desembarques_id_desembarque PRIMARY KEY (id_desembarque);


--
-- Name: pkey_despegues_id_despegue; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.despegues
    ADD CONSTRAINT pkey_despegues_id_despegue PRIMARY KEY (id_despegue);


--
-- Name: pkey_destino_vuelos_id_destino_vuelo; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.destino_vuelos
    ADD CONSTRAINT pkey_destino_vuelos_id_destino_vuelo PRIMARY KEY (id_destino_vuelo);


--
-- Name: pkey_embarques_id_embarque; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.embarques
    ADD CONSTRAINT pkey_embarques_id_embarque PRIMARY KEY (id_embarque);


--
-- Name: pkey_movilizaciones_id_movilizacion; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.movilizaciones
    ADD CONSTRAINT pkey_movilizaciones_id_movilizacion PRIMARY KEY (id_movilizacion);


--
-- Name: pkey_operaciones_id_operacion; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.operaciones
    ADD CONSTRAINT pkey_operaciones_id_operacion PRIMARY KEY (id_operacion);


--
-- Name: pkey_tipo_aeropuertos_id_tipo_aeropuerto; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.tipo_aeropuertos
    ADD CONSTRAINT pkey_tipo_aeropuertos_id_tipo_aeropuerto PRIMARY KEY (id_tipo_aeropuerto);


--
-- Name: pkey_tipo_vuelos_id_tipo_vuelo; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.tipo_vuelos
    ADD CONSTRAINT pkey_tipo_vuelos_id_tipo_vuelo PRIMARY KEY (id_tipo_vuelo);


--
-- Name: usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (id_usuario, ci_usuario, login_usuario, clave_usuario);


--
-- Name: fky_aeropuertos_bomberiles_id_aeropuerto; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bomberiles
    ADD CONSTRAINT fky_aeropuertos_bomberiles_id_aeropuerto FOREIGN KEY (id_aeropuerto) REFERENCES public.aeropuertos(id_aeropuerto) ON DELETE RESTRICT;


--
-- Name: fky_aeropuertos_demoras_id_aeropuerto; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.demoras
    ADD CONSTRAINT fky_aeropuertos_demoras_id_aeropuerto FOREIGN KEY (id_aeropuerto) REFERENCES public.aeropuertos(id_aeropuerto) ON DELETE RESTRICT;


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
-- Name: fky_destino_vuelos_demoras_id_destino_vuelo; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.demoras
    ADD CONSTRAINT fky_destino_vuelos_demoras_id_destino_vuelo FOREIGN KEY (id_destino_vuelo) REFERENCES public.destino_vuelos(id_destino_vuelo) ON DELETE RESTRICT;


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
-- Name: fky_tipo_vuelos_demoras_id_tipo_vuelo; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.demoras
    ADD CONSTRAINT fky_tipo_vuelos_demoras_id_tipo_vuelo FOREIGN KEY (id_tipo_vuelo) REFERENCES public.tipo_vuelos(id_tipo_vuelo) ON DELETE RESTRICT;


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

