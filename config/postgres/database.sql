-- Adminer 4.8.1 PostgreSQL 16.1 (Debian 16.1-1.pgdg120+1) dump

DROP TABLE IF EXISTS "admin";
CREATE TABLE "public"."admin" (
    "id_admin" integer GENERATED ALWAYS AS IDENTITY,
    "username" character varying(32) NOT NULL,
    "email" character varying(128) NOT NULL,
    "password" character(64) NOT NULL,
    "first_name" character varying(128) NOT NULL,
    "last_name" character varying(128) NOT NULL,
    "access_level" smallint NOT NULL,
    CONSTRAINT "admin_pkey" PRIMARY KEY ("id_admin")
) WITH (oids = false);


DROP TABLE IF EXISTS "cart";
CREATE TABLE "public"."cart" (
    "id_cart" integer GENERATED ALWAYS AS IDENTITY,
    "id_customer" integer NOT NULL,
    "id_product" integer NOT NULL,
    CONSTRAINT "cart_pkey" PRIMARY KEY ("id_cart")
) WITH (oids = false);


DROP TABLE IF EXISTS "customer";
CREATE TABLE "public"."customer" (
    "id_customer" integer GENERATED ALWAYS AS IDENTITY,
    "username" character varying(32) NOT NULL,
    "email" character varying(128) NOT NULL,
    "password" character(64) NOT NULL,
    "first_name" character varying(128) NOT NULL,
    "last_name" character varying(128) NOT NULL,
    "date_of_birth" date,
    "address" character varying(256),
    CONSTRAINT "customer_pkey" PRIMARY KEY ("id_customer")
) WITH (oids = false);


DROP TABLE IF EXISTS "product";
CREATE TABLE "public"."product" (
    "id_product" integer GENERATED ALWAYS AS IDENTITY,
    "name" character varying(128) NOT NULL,
    "price" integer NOT NULL,
    "available_quantity" integer NOT NULL,
    CONSTRAINT "product_pkey" PRIMARY KEY ("id_product")
) WITH (oids = false);


DROP TABLE IF EXISTS "receipt";
CREATE TABLE "public"."receipt" (
    "id_receipt" integer GENERATED ALWAYS AS IDENTITY,
    "id_cart" integer NOT NULL,
    "time_of_purchase" timestamptz NOT NULL,
    CONSTRAINT "receipt_pkey" PRIMARY KEY ("id_receipt")
) WITH (oids = false);


-- 2023-12-15 21:00:30.043295+00
