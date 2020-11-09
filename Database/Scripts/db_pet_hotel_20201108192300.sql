-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2020 a las 01:22:39
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_pet_hotel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `uuid` varchar(150) DEFAULT NULL,
  `kennel_id` int(11) NOT NULL,
  `state_id` int(11) DEFAULT NULL,
  `pet_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `date_to` varchar(45) DEFAULT NULL,
  `date_from` varchar(45) DEFAULT NULL,
  `cancellation_date` datetime DEFAULT NULL,
  `cancellation_note` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(45) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `booking`
--

INSERT INTO `booking` (`id`, `uuid`, `kennel_id`, `state_id`, `pet_id`, `customer_id`, `date_to`, `date_from`, `cancellation_date`, `cancellation_note`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `active`) VALUES
(2, '0f4214e4-bb7c-4740-beae-77c06019166d', 1, 2, 2, 3, '2020-10-29', '2020-10-31', NULL, NULL, '2020-10-29 13:28:00', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(3, 'd6edc65a-20bc-11eb-974c-e86a64228de9', 1, 2, 6, 3, '2020-11-07', '2020-11-08', NULL, NULL, '2020-11-07 00:48:24', 'ADMIN', '2020-11-07 17:07:10', 'ADMIN', NULL, NULL, b'1'),
(4, '27b07402-20bd-11eb-bdb6-e86a64228de9', 1, 1, 6, 3, '2020-11-07', '2020-11-08', NULL, NULL, '2020-11-07 00:50:35', 'ADMIN', '2020-11-07 00:54:54', 'ADMIN', '2020-11-07 01:01:25', 'ADMIN', b'0'),
(8, 'ceb423f6-2177-11eb-bda9-e86a64228de9', 3, 1, 8, 8, '2020-11-07', '2020-11-08', NULL, NULL, '2020-11-07 23:06:41', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(9, 'd3be6fd2-2177-11eb-919c-e86a64228de9', 2, 1, 9, 8, '2020-11-07', '2020-11-08', NULL, NULL, '2020-11-07 23:06:50', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(10, '18a80062-2179-11eb-974f-e86a64228de9', 3, 1, 8, 8, '2020-11-07', '2020-11-08', NULL, NULL, '2020-11-07 23:15:55', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(11, '18be8c10-2179-11eb-96eb-e86a64228de9', 2, 1, 9, 8, '2020-11-07', '2020-11-08', NULL, NULL, '2020-11-07 23:15:55', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(12, 'b132b214-2179-11eb-a81f-e86a64228de9', 3, 1, 8, 8, '2020-11-07', '2020-11-08', NULL, NULL, '2020-11-07 23:20:11', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(13, 'b149533e-2179-11eb-8152-e86a64228de9', 2, 1, 9, 8, '2020-11-07', '2020-11-08', NULL, NULL, '2020-11-07 23:20:11', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(14, 'bbb4662e-2179-11eb-a8f1-e86a64228de9', 3, 1, 8, 8, '2020-11-07', '2020-11-08', NULL, NULL, '2020-11-07 23:20:28', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(15, 'bbcce992-2179-11eb-b2d0-e86a64228de9', 2, 1, 9, 8, '2020-11-07', '2020-11-08', NULL, NULL, '2020-11-07 23:20:29', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(16, 'd4fa4c20-2179-11eb-b424-e86a64228de9', 3, 1, 8, 8, '2020-11-07', '2020-11-08', NULL, NULL, '2020-11-07 23:21:11', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(17, 'db7b319a-2179-11eb-be1b-e86a64228de9', 2, 1, 9, 8, '2020-11-07', '2020-11-08', NULL, NULL, '2020-11-07 23:21:22', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(18, '00442d42-217a-11eb-ac00-e86a64228de9', 3, 1, 8, 8, '2020-11-07', '2020-11-08', NULL, NULL, '2020-11-07 23:22:23', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(19, '463ecc26-217a-11eb-9552-e86a64228de9', 3, 1, 8, 8, '2020-11-07', '2020-11-08', NULL, NULL, '2020-11-07 23:24:21', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(20, '84b42cfc-217b-11eb-9571-e86a64228de9', 3, 1, 8, 8, '2020-11-07', '2020-11-08', NULL, NULL, '2020-11-07 23:33:15', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(21, '88cc9ef4-217c-11eb-b669-e86a64228de9', 3, 1, 8, 8, '2020-11-07', '2020-11-08', NULL, NULL, '2020-11-07 23:40:32', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(22, '8a966e5e-217c-11eb-add4-e86a64228de9', 2, 1, 9, 8, '2020-11-07', '2020-11-08', NULL, NULL, '2020-11-07 23:40:34', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(23, '86995a00-21db-11eb-802a-e86a64228de9', 3, 1, 8, 8, '2020-11-07', '2020-11-08', NULL, NULL, '2020-11-08 11:00:30', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(24, 'aee925da-21db-11eb-89d7-e86a64228de9', 3, 1, 8, 8, '2020-11-07', '2020-11-08', NULL, NULL, '2020-11-08 11:01:38', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(25, 'c7559b44-21db-11eb-83d3-e86a64228de9', 3, 1, 8, 8, '2020-11-07', '2020-11-08', NULL, NULL, '2020-11-08 11:02:19', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(26, 'fb121e5c-21dc-11eb-97c0-e86a64228de9', 3, 1, 8, 8, '2020-11-07', '2020-11-08', NULL, NULL, '2020-11-08 11:10:55', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(27, '11af31fe-21dd-11eb-a723-e86a64228de9', 3, 1, 9, 8, '2020-11-07', '2020-11-08', NULL, NULL, '2020-11-08 11:11:33', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(28, '8298fd40-21de-11eb-98e1-e86a64228de9', 3, 1, 8, 8, '2020-11-07', '2020-11-08', NULL, NULL, '2020-11-08 11:21:52', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(29, '82c1bcc6-21de-11eb-9c2d-e86a64228de9', 3, 1, 9, 8, '2020-11-07', '2020-11-08', NULL, NULL, '2020-11-08 11:21:52', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(30, 'aa48967a-21de-11eb-986c-e86a64228de9', 3, 1, 8, 8, '2020-11-08', '2020-11-10', NULL, NULL, '2020-11-08 11:22:58', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(31, 'aa6b73f2-21de-11eb-a775-e86a64228de9', 3, 1, 9, 8, '2020-11-08', '2020-11-10', NULL, NULL, '2020-11-08 11:22:59', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(32, 'bf9b986a-21de-11eb-9cfc-e86a64228de9', 2, 1, 8, 8, '2020-12-01', '2020-12-02', NULL, NULL, '2020-11-08 11:23:34', 'ADMIN', NULL, '', '2020-11-08 16:45:01', 'ADMIN', b'0'),
(33, 'bfc31980-21de-11eb-b3ab-e86a64228de9', 3, 1, 9, 8, '2020-12-01', '2020-12-02', NULL, NULL, '2020-11-08 11:23:34', 'ADMIN', NULL, '', '2020-11-08 16:45:01', 'ADMIN', b'0'),
(34, 'a73fee42-220b-11eb-b996-e86a64228de9', 1, 1, 8, 8, '2020-12-01', '2020-12-02', NULL, NULL, '2020-11-08 16:45:01', 'ADMIN', NULL, '', '2020-11-08 16:45:01', 'ADMIN', b'0'),
(35, 'f589107a-220f-11eb-a997-e86a64228de9', 1, 2, 8, 8, '2020-12-01', '2020-12-02', NULL, NULL, '2020-11-08 17:15:50', 'ADMIN', NULL, '', '2020-11-08 16:45:01', 'ADMIN', b'0'),
(36, 'fd1ae6e2-220f-11eb-92e2-e86a64228de9', 2, 2, 9, 8, '2020-12-01', '2020-12-02', NULL, NULL, '2020-11-08 17:16:03', 'ADMIN', NULL, '', '2020-11-08 16:45:01', 'ADMIN', b'0'),
(37, '5030920e-2211-11eb-8a0e-e86a64228de9', 1, 2, 8, 8, '2020-12-01', '2020-12-02', NULL, NULL, '2020-11-08 17:25:32', 'ADMIN', NULL, '', '2020-11-08 16:45:01', 'ADMIN', b'0'),
(38, '5050b4da-2211-11eb-a228-e86a64228de9', 1, 2, 9, 8, '2020-12-01', '2020-12-02', NULL, NULL, '2020-11-08 17:25:32', 'ADMIN', NULL, '', '2020-11-08 16:45:01', 'ADMIN', b'0'),
(39, 'be9129de-2211-11eb-be54-e86a64228de9', 1, 2, 8, 8, '2020-12-01', '2020-12-02', NULL, NULL, '2020-11-08 17:28:37', 'ADMIN', NULL, '', '2020-11-08 16:45:01', 'ADMIN', b'0'),
(40, 'beb44cf2-2211-11eb-80a7-e86a64228de9', 1, 2, 9, 8, '2020-12-01', '2020-12-02', NULL, NULL, '2020-11-08 17:28:37', 'ADMIN', NULL, '', '2020-11-08 16:45:01', 'ADMIN', b'0'),
(41, '5e5523e0-2216-11eb-96eb-e86a64228de9', 1, 2, 8, 8, '2020-12-01', '2020-12-02', NULL, NULL, '2020-11-08 18:01:43', 'ADMIN', NULL, '', '2020-11-08 16:45:01', 'ADMIN', b'0'),
(42, '6c57fc92-2216-11eb-b3bf-e86a64228de9', 2, 2, 9, 8, '2020-12-01', '2020-12-02', NULL, NULL, '2020-11-08 18:02:06', 'ADMIN', NULL, '', '2020-11-08 16:45:01', 'ADMIN', b'0'),
(43, '1b661704-221d-11eb-b484-e86a64228de9', 1, 2, 8, 8, '2020-12-01', '2020-12-02', NULL, NULL, '2020-11-08 18:49:57', 'ADMIN', NULL, '', '2020-11-08 16:45:01', 'ADMIN', b'0'),
(44, '23f808dc-221d-11eb-87b2-e86a64228de9', 2, 2, 9, 8, '2020-12-01', '2020-12-02', NULL, NULL, '2020-11-08 18:50:11', 'ADMIN', NULL, '', '2020-11-08 16:45:01', 'ADMIN', b'0'),
(45, '8b548192-2220-11eb-b2fc-e86a64228de9', 1, 2, 8, 8, '2020-12-01', '2020-12-02', NULL, NULL, '2020-11-08 19:14:33', 'ADMIN', NULL, '', '2020-11-08 16:45:01', 'ADMIN', b'0'),
(46, 'b776db9e-2220-11eb-9704-e86a64228de9', 1, 2, 8, 8, '2020-12-01', '2020-12-02', NULL, NULL, '2020-11-08 19:15:47', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(47, 'b948d850-2220-11eb-aad4-e86a64228de9', 2, 2, 9, 8, '2020-12-01', '2020-12-02', NULL, NULL, '2020-11-08 19:15:50', 'ADMIN', NULL, '', NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `uuid` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `message` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(45) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `uuid` varchar(150) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `address_optional` varchar(45) DEFAULT NULL,
  `comments` varchar(45) DEFAULT NULL,
  `image` varchar(45) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(45) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `customer`
--

INSERT INTO `customer` (`id`, `uuid`, `first_name`, `last_name`, `phone`, `address`, `address_optional`, `comments`, `image`, `user_id`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `active`) VALUES
(3, '0bd8324c-1979-11eb-a399-50e549398ade', 'Juan Wilfredo Web', 'Rodas Web', '94873360', 'f8507d60-1d69-4b08-affd-bfb01f3a6772', 'dirección', '', '', 1, '2020-10-28 18:55:24', 'ADMIN', '2020-11-07 19:06:27', 'ADMIN', NULL, NULL, b'1'),
(5, 'cae7677c-2156-11eb-94d7-e86a64228de9', 'Juan Wilfredo Web', 'Rodas Web', '94873360', 'f8507d60-1d69-4b08-affd-bfb01f3a6772', 'dirección', 'juanrodas@hotmail.com', 'asdasdas', 36, '2020-11-07 19:10:21', 'ADMIN', '2020-11-07 19:34:48', 'ADMIN', NULL, NULL, b'1'),
(8, 'deea3002-215a-11eb-844d-e86a64228de9', 'Juan Wilfredo Web', 'Rodas Web', '94873360', 'f8507d60-1d69-4b08-affd-bfb01f3a6772', 'dirección', 'juanrodas@hotmail.com', 'asdasdas', 40, '2020-11-07 19:39:33', 'ADMIN', '2020-11-08 19:16:30', 'ADMIN', NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `data_master`
--

CREATE TABLE `data_master` (
  `id` int(11) NOT NULL,
  `uuid` varchar(150) DEFAULT NULL,
  `id_row` int(11) NOT NULL,
  `type` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(45) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `data_master`
--

INSERT INTO `data_master` (`id`, `uuid`, `id_row`, `type`, `name`, `description`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `active`) VALUES
(1, '9e3e0581-e0fd-4af9-8699-f7ea3521f1ae', 2, 'TABLE_STATE_BOOKING', 'PENDIENTE', 'Reserva Pendiente', '2020-10-29 09:03:09', 'ADMIN', '2020-10-29 09:30:04', 'ADMIN', NULL, NULL, b'1'),
(2, 'ca836d50-eb2a-4155-a0d2-c9b01b7f7fcd', 1, 'TABLE_STATE_BOOKING', 'CONFIRMADO', 'Reserva Confirmado', '2020-10-29 09:14:43', 'ADMIN', '2020-10-29 09:30:58', 'ADMIN', NULL, '', b'1'),
(3, '176d7072-19f1-11eb-a86b-50e549398ade1', 1, 'TABLE_PAYMENT_METHOD', 'Transferencia Bancaria', 'Transferencia Bancaria', '2020-10-29 09:14:43', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(4, '176d7072-19f1-11eb-a86b-50e549398ade2', 2, 'TABLE_PAYMENT_METHOD', 'Plin o Lukita', 'Plin o Lukita', '2020-10-29 09:14:43', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(5, '176d7072-19f1-11eb-a86b-50e549398ade3', 3, 'TABLE_PAYMENT_METHOD', 'Yape', 'Yape', '2020-10-29 09:14:43', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(6, '176d7072-19f1-11eb-a86b-50e549398ade4', 4, 'TABLE_PAYMENT_METHOD', 'POS', 'Contraentrega', '2020-10-29 09:14:43', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(7, '1cca03ea-07dc-11eb-ab06-50e549398ade', 1, 'TABLE_STATE_AUDIT', 'SI', 'Registro activo', '2020-10-29 09:14:43', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(8, '48687626-07dc-11eb-b7ad-50e549398ade', 2, 'TABLE_STATE_AUDIT', 'NO', 'Registro no activo', '2020-10-29 09:14:43', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(11, '1cca03ea-07dc-11eb-ab06-50e549398ade1', 1, 'TABLE_BLOCKED_USER', 'SI', 'No bloqueado', '2020-10-29 09:14:43', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(12, '1cca03ea-07dc-11eb-ab06-50e549398ade2', 2, 'TABLE_BLOCKED_USER', 'NO', 'bloqueado', '2020-10-29 09:14:43', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(14, '1cca03ea-07dc-11eb-ab06-50e549398ade3', 1, 'TABLE_IS_BOOKED', 'SI', 'Disponible', '2020-10-29 09:14:43', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(15, '1cca03ea-07dc-11eb-ab06-50e549398ade4', 2, 'TABLE_IS_BOOKED', 'NO', 'No Disponible', '2020-10-29 09:14:43', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(17, '1cca03ea-07dc-11eb-ab06-50e549398ade5', 1, 'TABLE_PAYMENT_STATE', 'CONFIRMADO', 'Pago realizado', '2020-10-29 09:14:43', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(18, '1cca03ea-07dc-11eb-ab06-50e549398ade6', 2, 'TABLE_PAYMENT_STATE', 'PENDIENTE', 'Pago pendiente', '2020-10-29 09:14:43', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(19, '1cca03ea-07dc-11eb-ab06-50e549398ade7', 1, 'TABLE_BANKS', 'BCP', 'BANCO DE CRÉDITO', '2020-10-29 09:14:43', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(21, '1cca03ea-07dc-11eb-ab06-50e549398ade8', 2, 'TABLE_BANKS', 'BBVA', 'BANCO CONTINENTAL', '2020-10-29 09:14:43', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(22, '1cca03ea-07dc-11eb-ab06-50e549398a111', 3, 'TABLE_BANKS', 'INTERBANK', 'BANCO INTERBANK', '2020-10-29 09:14:43', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(23, '1cca03ea-07dc-11eb-ab06-50e549398a222', 4, 'TABLE_BANKS', 'SCOTIABANK', 'BANCO SCOTIABANK', '2020-10-29 09:14:43', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(24, '3ede5d2d-debf-4379-a4dc-73ddcde6be25', 3, 'TABLE_STATE_BOOKING', 'CANCELADA', 'Reserva Cancelada', '2020-10-29 09:14:43', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(25, 'ca90dd2b-8d29-4021-93fa-f6f1e35eeb14', 4, 'TABLE_STATE_BOOKING', 'TERMINADA', 'Reserva Terminada', '2020-10-29 09:14:43', 'ADMIN', NULL, NULL, NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kennel`
--

CREATE TABLE `kennel` (
  `id` int(11) NOT NULL,
  `uuid` varchar(150) DEFAULT NULL,
  `num` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `is_booked` bit(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(45) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `kennel`
--

INSERT INTO `kennel` (`id`, `uuid`, `num`, `name`, `description`, `is_booked`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `active`) VALUES
(1, '9afe3e82-19a9-11eb-8ed2-50e549398ade', '1', 'Canil 2', '', b'1', '2020-10-29 00:43:00', 'ADMIN', '2020-11-04 08:55:58', 'ADMIN', NULL, '', b'1'),
(2, '823d7de2-1ea2-11eb-a2d1-e86a64228de9', '1', 'Canil 1', '', b'1', '2020-11-04 08:34:47', 'ADMIN', '2020-11-04 08:44:00', 'ADMIN', NULL, NULL, b'1'),
(3, '821f72ea-1ea5-11eb-8730-e86a64228de9', 'Canil 3', 'Canil 3', '', b'0', '2020-11-04 08:56:16', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(4, '6a0357d0-220b-11eb-9ec3-e86a64228de9', 'Canil 4', 'CANIL 4', '', b'0', '2020-11-08 16:43:18', 'ADMIN', NULL, '', NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `uuid` varchar(150) DEFAULT NULL,
  `slug` varchar(45) DEFAULT NULL,
  `icon` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `is_parent` bit(1) DEFAULT NULL,
  `is_children` bit(1) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(45) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `module`
--

INSERT INTO `module` (`id`, `uuid`, `slug`, `icon`, `name`, `parent_id`, `is_parent`, `is_children`, `order`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `active`) VALUES
(1, 'df46cb7c-3ceb-46c3-b106-898db4fe24c6', '/modules/datamaster/', 'bx-cog', 'Configuración', 0, b'1', b'0', 0, '2020-09-30 12:01:00', '', NULL, NULL, '2020-10-12 00:00:00', 'ADMIN', b'1'),
(2, 'f1e67313-3c25-448a-94f4-a7a614982d97', 'maintainer', NULL, 'Gestión data maestra', 1, b'0', b'1', 1, '2020-09-30 12:01:00', '', NULL, NULL, '2020-10-12 00:00:00', 'ADMIN', b'1'),
(3, '8fce0c01-9147-460a-9390-b68c1e4637e4', '/modules/customers/', 'bx-group', 'Clientes', 0, b'1', b'0', 2, '2020-09-30 12:01:00', '', NULL, NULL, NULL, NULL, b'1'),
(4, 'c476a1d5-2db9-45ef-8d1c-d41bbec7a447', 'maintainer', NULL, 'Gestionar clientes', 3, b'0', b'1', 3, '2020-09-30 12:01:00', '', NULL, NULL, NULL, NULL, b'1'),
(5, '614214a1-4809-484e-a944-f3d60f9b580f', '/modules/services/', 'bxs-widget', 'Servicios', 0, b'1', b'0', 4, '2020-09-30 12:01:00', '', NULL, NULL, NULL, NULL, b'1'),
(6, 'dcd67374-d91a-481b-8571-7147ee72bf20', 'maintainer', '', 'Gestionar servicios', 5, b'0', b'1', 5, '2020-09-30 12:01:00', '', NULL, NULL, NULL, NULL, b'1'),
(7, '1754ae9b-3b73-4653-a047-4ef0406eafc5', 'maintainer', '', 'Productos', 5, b'0', b'1', 6, '2020-09-30 12:01:00', '', NULL, NULL, '2020-10-12 00:00:00', 'ADMIN', b'1'),
(8, 'ef60e4ac-d114-4e5f-b866-35f9ee810db7', '/modules/pets/', 'bxl-baidu', 'Perros', 0, b'1', b'0', 7, '2020-09-30 12:01:00', '', NULL, NULL, '2020-10-29 09:30:04', 'ADMIN', b'1'),
(9, '95c11512-71f6-4220-b9ce-c7c4532269d9', '/modules/users/', 'bx-user', 'Usuarios', 0, b'1', b'0', 8, '2020-09-30 12:01:00', '', NULL, NULL, NULL, NULL, b'1'),
(10, '568cd6a2-a41e-43bb-a049-3307c39fe09f', 'maintainer', '', 'Gestionar usuarios', 9, b'0', b'1', 9, '2020-09-30 12:01:00', '', NULL, NULL, NULL, NULL, b'1'),
(11, '568922d3-c6e4-43c7-81d2-07a5f3fb0e2c', '/modules/payments/', 'bx-cart', 'Pagos', 0, b'1', b'0', 10, '2020-09-30 12:01:00', '', NULL, NULL, NULL, NULL, b'1'),
(12, 'df977bdf-4519-45a9-973b-596bc17f2a73', 'maintainer', '', 'Gestionar Pagos', 11, b'0', b'1', 11, '2020-09-30 12:01:00', '', NULL, NULL, NULL, NULL, b'1'),
(13, '21f1c9a8-d9f5-41a5-bda1-f73aa650472d', 'legal-representative', '', 'Representantes', 11, b'0', b'1', 12, '2020-09-30 12:01:00', '', NULL, NULL, '2020-10-12 00:00:00', 'ADMIN', b'1'),
(14, '21f1c9a8-d9f5-41a5-bda1-f73aa6504721', 'maintainer', NULL, 'Gestionar perros', 8, b'0', b'1', 13, '2020-09-30 12:01:00', '', NULL, NULL, '2020-10-29 09:30:04', 'ADMIN', b'1'),
(15, '47dbc06e-09c6-11eb-a369-50e549398ade', '/modules/kennels/', 'bx-home', 'Caniles', 0, b'1', b'0', 0, '2020-10-08 19:27:57', 'ADMIN', NULL, '', NULL, '', b'1'),
(16, '3e75090a-09ca-11eb-8a86-50e549398ade', 'maintainer', '', 'Gestionar Caniles', 15, b'0', b'1', 0, '2020-10-08 19:56:19', 'ADMIN', NULL, '', NULL, '', b'1'),
(17, '61f4cc80-09ca-11eb-9486-50e549398ade', 'maintainerx', '', 'Rolesx', 9, b'0', b'1', 0, '2020-10-08 19:57:19', 'ADMIN', NULL, '', '2020-10-12 00:00:00', 'ADMIN', b'1'),
(18, '70c49b64-09ca-11eb-8e56-50e549398ade', 'maintainerx', 'dd dsds', 'Rolesx', 9, b'0', b'1', 0, '2020-10-08 19:57:44', 'ADMIN', NULL, '', '2020-10-12 00:00:00', 'ADMIN', b'1'),
(19, '55a8a586-09cb-11eb-a48d-50e549398ade', 'maintainerx', 'dd dsds', 'Rolesx', 0, b'0', b'1', 0, '2020-10-08 20:04:08', 'ADMIN', NULL, '', '2020-10-12 00:00:00', 'ADMIN', b'1'),
(20, '63e08b64-09cb-11eb-9161-50e549398ade', 'maintainerx', 'dd dsds', 'Rolesx', 9, b'0', b'1', 0, '2020-10-08 20:04:32', 'ADMIN', NULL, '', '2020-10-12 00:00:00', 'ADMIN', b'1'),
(21, '76cd343e-09cb-11eb-aa41-50e549398ade', 'maintainerx', 'dd dsds', 'Rolesx', 9, b'0', b'1', 0, '2020-10-08 20:05:03', 'ADMIN', '2020-10-08 20:12:36', 'ADMIN', '2020-10-08 20:13:17', 'ADMIN', b'1'),
(22, '003872e9-1fab-4b25-bc96-d1c2c2bc1f95', '/modules/bookings/', 'bxs-hotel', 'Reservas', 0, b'1', b'1', 1, '2020-10-08 20:05:03', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(23, '3ca5fb6b-e220-42a0-9a74-e34dc6f5fc48', 'maintainer', NULL, 'Gestión de reservas', 22, b'0', b'1', 1, '2020-10-08 20:05:03', 'ADMIN', NULL, NULL, NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `module_role`
--

CREATE TABLE `module_role` (
  `role_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `add` bit(1) NOT NULL,
  `edit` bit(1) NOT NULL,
  `remove` bit(1) NOT NULL,
  `read` bit(1) NOT NULL,
  `all` bit(1) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(45) DEFAULT NULL,
  `active` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `module_role`
--

INSERT INTO `module_role` (`role_id`, `module_id`, `add`, `edit`, `remove`, `read`, `all`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `active`) VALUES
(1, 1, b'1', b'1', b'1', b'1', b'1', '2020-10-28 00:22:00', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(1, 2, b'1', b'1', b'1', b'1', b'1', '2020-10-28 00:22:00', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(1, 3, b'1', b'1', b'1', b'1', b'1', '2020-10-28 00:22:00', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(1, 4, b'1', b'1', b'1', b'1', b'1', '2020-10-28 00:22:00', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(1, 5, b'1', b'1', b'1', b'1', b'1', '2020-10-28 00:22:00', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(1, 6, b'1', b'1', b'1', b'1', b'1', '2020-10-28 00:22:00', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(1, 7, b'1', b'1', b'1', b'1', b'1', '2020-10-28 00:22:00', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(1, 8, b'1', b'1', b'1', b'1', b'1', '2020-10-28 00:22:00', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(1, 9, b'1', b'1', b'1', b'1', b'1', '2020-10-28 00:22:00', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(1, 10, b'1', b'1', b'1', b'1', b'1', '2020-10-28 00:22:00', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(1, 11, b'1', b'1', b'1', b'1', b'1', '2020-10-28 00:22:00', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(1, 12, b'1', b'1', b'1', b'1', b'1', '2020-10-28 00:22:00', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(1, 13, b'1', b'1', b'1', b'1', b'1', '2020-10-28 00:22:00', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(1, 14, b'1', b'1', b'1', b'1', b'1', '2020-10-28 00:22:00', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(1, 15, b'1', b'1', b'1', b'1', b'1', '2020-10-28 00:22:00', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(2, 1, b'1', b'1', b'1', b'1', b'1', '2020-10-28 00:22:00', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(2, 2, b'1', b'1', b'1', b'1', b'1', '2020-10-28 00:22:00', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(2, 3, b'1', b'1', b'1', b'1', b'1', '2020-10-28 00:22:00', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(2, 4, b'1', b'1', b'1', b'1', b'1', '2020-10-28 00:22:00', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(2, 5, b'1', b'1', b'1', b'1', b'1', '2020-10-28 00:22:00', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(2, 6, b'1', b'1', b'1', b'1', b'1', '2020-10-28 00:22:00', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(2, 7, b'1', b'1', b'1', b'1', b'1', '2020-10-28 00:22:00', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(2, 8, b'1', b'1', b'1', b'1', b'1', '2020-10-28 00:22:00', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(2, 9, b'1', b'1', b'1', b'1', b'1', '2020-10-28 00:22:00', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(2, 10, b'1', b'1', b'1', b'1', b'1', '2020-10-28 00:22:00', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(2, 11, b'1', b'1', b'1', b'1', b'1', '2020-10-28 00:22:00', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(2, 12, b'1', b'1', b'1', b'1', b'1', '2020-10-28 00:22:00', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(2, 13, b'1', b'1', b'1', b'1', b'1', '2020-10-28 00:22:00', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(2, 14, b'1', b'1', b'1', b'1', b'1', '2020-10-28 00:22:00', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(2, 15, b'1', b'1', b'1', b'1', b'1', '2020-10-28 00:22:00', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(2, 16, b'1', b'1', b'1', b'1', b'1', '2020-10-30 19:59:46', 'ADMIN', NULL, NULL, NULL, NULL, b'0'),
(2, 22, b'1', b'1', b'1', b'1', b'1', '2020-11-07 12:53:49', 'ADMIN', NULL, NULL, NULL, NULL, b'0'),
(2, 23, b'1', b'1', b'1', b'1', b'1', '2020-11-07 12:55:52', 'ADMIN', NULL, NULL, NULL, NULL, b'0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `uuid` varchar(150) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `payment_method_id` int(11) NOT NULL,
  `screen_voucher` varchar(45) DEFAULT NULL,
  `state_id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `billing_first_name` varchar(45) DEFAULT NULL,
  `billing_last_name` varchar(45) DEFAULT NULL,
  `billing_dni` varchar(45) DEFAULT NULL,
  `billing_email` varchar(45) DEFAULT NULL,
  `billing_phone` varchar(45) DEFAULT NULL,
  `billing_address` varchar(45) DEFAULT NULL,
  `total` decimal(13,2) DEFAULT NULL,
  `booking_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(45) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `payment`
--

INSERT INTO `payment` (`id`, `uuid`, `bank_id`, `payment_method_id`, `screen_voucher`, `state_id`, `date`, `billing_first_name`, `billing_last_name`, `billing_dni`, `billing_email`, `billing_phone`, `billing_address`, `total`, `booking_id`, `customer_id`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `active`) VALUES
(3, 'c9baf2cc-1a14-11eb-ac22-50e549398ade', 0, 1, 'asdasdas', 2, '2020-10-29 10:55:00', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '1', 'asdasd', '350.00', 2, 3, '2020-10-29 13:30:14', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(4, '931253a6-1a4a-11eb-a0b6-50e549398ade', 1, 3, 'asdasdas', 2, '2020-10-29 10:55:00', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '23', 'asdasd', '500.00', 2, 3, '2020-10-29 19:55:14', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(5, '0f85b630-1a4b-11eb-824e-50e549398ade', 1, 2, 'asdasdas', 1, '2020-10-29 10:55:00', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '3', 'asdasd', '800.00', 2, 3, '2020-10-29 19:58:44', 'ADMIN', '2020-11-04 22:44:31', 'ADMIN', NULL, NULL, b'1'),
(6, '25af4804-1a4b-11eb-888f-50e549398ade', 0, 1, 'asdasdas', 2, '2020-10-29 10:55:00', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '3', 'asdasd', '850.00', 2, 3, '2020-10-29 19:59:22', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(7, '43cdb438-1a4b-11eb-811f-50e549398ade', 0, 1, 'asdasdas', 2, '2020-10-29 10:55:00', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '3', 'asdasd', '950.00', 2, 3, '2020-10-29 20:00:12', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(8, '56e09a4a-1a4b-11eb-b2e1-50e549398ade', 0, 1, 'asdasdas', 2, '2020-10-29 10:55:00', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '3', 'asdasd', '15000.00', 2, 3, '2020-10-29 20:00:44', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(9, '96ead506-1a4b-11eb-9513-50e549398ade', 0, 1, 'asdasdas', 2, '2020-10-29 10:55:00', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '3', 'asdasd', '15000.00', 2, 3, '2020-10-29 20:02:32', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(10, 'af068fd6-1a4b-11eb-84c3-50e549398ade', 0, 1, 'asdasdas', 2, '2020-10-29 10:55:00', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '3', 'asdasd', '15000.00', 2, 3, '2020-10-29 20:03:12', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(11, 'baa12c34-1a4b-11eb-b0ba-50e549398ade', 0, 1, 'asdasdas', 2, '2020-10-29 10:55:00', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '4', 'asdasd', '15000.00', 2, 3, '2020-10-29 20:03:31', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(12, 'db98a9c6-1a4b-11eb-abeb-50e549398ade', 0, 1, 'asdasdas', 1, '2020-10-29 10:55:00', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '5', 'asdasd', '15000.00', 2, 3, '2020-10-29 20:04:27', 'ADMIN', '2020-11-04 21:41:15', 'ADMIN', NULL, NULL, b'1'),
(13, 'ee908a08-1a4b-11eb-97ff-50e549398ade', 0, 1, 'asdasdas', 2, '2020-10-29 10:55:00', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '5', 'asdasd', '15000.00', 2, 3, '2020-10-29 20:04:59', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(14, '024dd6a4-1a4c-11eb-9d56-50e549398ade', 2, 1, 'asdasdas', 1, '2020-10-29 10:55:00', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '995699999', 'asdasd', '15000.00', 2, 3, '2020-10-29 20:05:32', 'ADMIN', '2020-11-04 22:43:58', 'ADMIN', NULL, NULL, b'1'),
(17, 'd3a98bec-216a-11eb-82e6-e86a64228de9', 0, 1, 'asdasdas', 2, '0000-00-00 00:00:00', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '995699999', 'asdasd', '180.00', 2, 8, '2020-11-07 21:33:46', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(18, 'e7babd90-216a-11eb-a73e-e86a64228de9', 0, 1, 'asdasdas', 2, '0000-00-00 00:00:00', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '995699999', 'asdasd', '180.00', 2, 8, '2020-11-07 21:34:20', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(19, '62d14238-216b-11eb-8d19-e86a64228de9', 0, 1, 'asdasdas', 2, '0000-00-00 00:00:00', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '995699999', 'asdasd', '180.00', 2, 8, '2020-11-07 21:37:46', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(20, '7ede513c-216b-11eb-8e34-e86a64228de9', 0, 1, 'asdasdas', 2, '0000-00-00 00:00:00', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '995699999', 'asdasd', '180.00', 2, 8, '2020-11-07 21:38:33', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(21, '9f936e58-216b-11eb-924e-e86a64228de9', 0, 1, 'asdasdas', 2, '0000-00-00 00:00:00', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '995699999', 'asdasd', '180.00', 2, 8, '2020-11-07 21:39:28', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(22, 'c380f628-216b-11eb-9e58-e86a64228de9', 0, 1, 'asdasdas', 2, '0000-00-00 00:00:00', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '995699999', 'asdasd', '180.00', 2, 8, '2020-11-07 21:40:28', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(23, 'd9528e26-216b-11eb-8ca5-e86a64228de9', 0, 1, 'asdasdas', 2, '0000-00-00 00:00:00', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '995699999', 'asdasd', '180.00', 2, 8, '2020-11-07 21:41:05', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(24, 'c9e53ba4-216c-11eb-a8c7-e86a64228de9', 0, 1, 'asdasdas', 2, '2020-11-07 21:11:30', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '995699999', 'asdasd', '180.00', 2, 8, '2020-11-07 21:47:49', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(25, 'ae6fa848-2174-11eb-b8fa-e86a64228de9', 0, 1, 'asdasdas', 2, '2020-11-07 22:11:19', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '995699999', 'asdasd', '90.00', 2, 8, '2020-11-07 22:44:19', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(26, 'b172ab58-2174-11eb-85b5-e86a64228de9', 0, 1, 'asdasdas', 2, '2020-11-07 22:11:24', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '995699999', 'asdasd', '90.00', 2, 8, '2020-11-07 22:44:24', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(27, 'd221c4f8-2177-11eb-affa-e86a64228de9', 0, 1, 'asdasdas', 2, '2020-11-07 23:11:47', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '995699999', 'asdasd', '90.00', 2, 8, '2020-11-07 23:06:47', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(28, 'd43c5df2-2177-11eb-bc00-e86a64228de9', 0, 1, 'asdasdas', 2, '2020-11-07 23:11:50', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '995699999', 'asdasd', '90.00', 2, 8, '2020-11-07 23:06:51', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(29, '18b4ab96-2179-11eb-9032-e86a64228de9', 0, 1, 'asdasdas', 2, '2020-11-07 23:11:55', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '995699999', 'asdasd', '90.00', 2, 8, '2020-11-07 23:15:55', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(30, '18c9adb6-2179-11eb-bcc2-e86a64228de9', 0, 1, 'asdasdas', 2, '2020-11-07 23:11:55', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '995699999', 'asdasd', '90.00', 2, 8, '2020-11-07 23:15:55', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(31, 'b13e683e-2179-11eb-8d73-e86a64228de9', 0, 1, 'asdasdas', 2, '2020-11-07 23:11:11', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '995699999', 'asdasd', '90.00', 2, 8, '2020-11-07 23:20:11', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(32, 'b15404c8-2179-11eb-9ec4-e86a64228de9', 0, 1, 'asdasdas', 2, '2020-11-07 23:11:11', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '995699999', 'asdasd', '90.00', 2, 8, '2020-11-07 23:20:11', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(33, 'bbc13002-2179-11eb-8648-e86a64228de9', 0, 1, 'asdasdas', 2, '2020-11-07 23:11:28', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '995699999', 'asdasd', '90.00', 2, 8, '2020-11-07 23:20:28', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(34, 'bbd7e3ba-2179-11eb-b3bf-e86a64228de9', 0, 1, 'asdasdas', 2, '2020-11-07 23:11:29', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '995699999', 'asdasd', '90.00', 2, 8, '2020-11-07 23:20:29', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(35, 'db6da2aa-2179-11eb-bf86-e86a64228de9', 0, 1, 'asdasdas', 2, '2020-11-07 23:11:11', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '995699999', 'asdasd', '180.00', 2, 8, '2020-11-07 23:21:22', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(36, 'debeac42-2179-11eb-91ff-e86a64228de9', 0, 1, 'asdasdas', 2, '2020-11-07 23:11:22', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '995699999', 'asdasd', '180.00', 2, 8, '2020-11-07 23:21:27', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(37, '060c0a74-217a-11eb-a9c3-e86a64228de9', 0, 1, 'asdasdas', 2, '2020-11-07 23:11:23', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '995699999', 'asdasd', '150.00', 2, 8, '2020-11-07 23:22:33', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(38, '464ea2c2-217a-11eb-9009-e86a64228de9', 0, 1, 'asdasdas', 2, '2020-11-07 23:11:21', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '995699999', 'asdasd', '150.00', 2, 8, '2020-11-07 23:24:21', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(39, 'bfda5248-217b-11eb-bff1-e86a64228de9', 0, 1, 'asdasdas', 2, '2020-11-07 23:11:15', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '995699999', 'asdasd', '150.00', 20, 8, '2020-11-07 23:34:54', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(40, '88e09ec2-217c-11eb-99d5-e86a64228de9', 0, 1, 'asdasdas', 2, '2020-11-07 23:11:32', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '995699999', 'asdasd', '150.00', 21, 8, '2020-11-07 23:40:32', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(41, '8aa59a96-217c-11eb-8ece-e86a64228de9', 0, 1, 'asdasdas', 2, '2020-11-07 23:11:35', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '995699999', 'asdasd', '150.00', 22, 8, '2020-11-07 23:40:35', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(42, '01621e38-21dd-11eb-b280-e86a64228de9', 0, 1, 'asdasdas', 2, '2020-11-08 11:11:55', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '995699999', 'asdasd', '90.00', 26, 8, '2020-11-08 11:11:05', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(43, '19e90aca-21dd-11eb-b369-e86a64228de9', 0, 1, 'asdasdas', 2, '2020-11-08 11:11:35', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '995699999', 'asdasd', '90.00', 27, 8, '2020-11-08 11:11:47', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(44, '82abd2b2-21de-11eb-91ac-e86a64228de9', 0, 1, 'asdasdas', 2, '2020-11-08 11:11:52', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '995699999', 'asdasd', '90.00', 28, 8, '2020-11-08 11:21:52', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(45, '82d11f40-21de-11eb-88fd-e86a64228de9', 0, 1, 'asdasdas', 2, '2020-11-08 11:11:52', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '995699999', 'asdasd', '90.00', 29, 8, '2020-11-08 11:21:52', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(46, 'aa577fc8-21de-11eb-bcdb-e86a64228de9', 0, 1, 'asdasdas', 2, '2020-11-08 11:11:58', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '995699999', 'asdasd', '150.00', 30, 8, '2020-11-08 11:22:58', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(47, 'aa79018e-21de-11eb-bfed-e86a64228de9', 0, 1, 'asdasdas', 2, '2020-11-08 11:11:59', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '995699999', 'asdasd', '150.00', 31, 8, '2020-11-08 11:22:59', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(48, 'bfae76ba-21de-11eb-996f-e86a64228de9', 0, 1, 'asdasdas', 2, '2020-11-08 11:11:34', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '995699999', 'asdasd', '210.00', 32, 8, '2020-11-08 11:23:34', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(49, 'bfcfee76-21de-11eb-83fa-e86a64228de9', 0, 1, 'asdasdas', 2, '2020-11-08 11:11:34', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '995699999', 'asdasd', '210.00', 33, 8, '2020-11-08 11:23:34', 'ADMIN', NULL, '', '2020-11-08 11:22:59', 'ADMIN', b'1'),
(50, 'a7ec877e-220b-11eb-8046-e86a64228de9', 0, 1, 'asdasdas', 2, '2020-11-08 16:11:02', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '995699999', 'asdasd', '90.00', 34, 8, '2020-11-08 16:45:02', 'ADMIN', NULL, '', '2020-11-08 11:22:59', 'ADMIN', b'1'),
(51, 'fc6a19de-220f-11eb-a705-e86a64228de9', 0, 1, 'asdasdas', 2, '2020-11-08 17:11:01', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '995699999', 'asdasd', '90.00', 35, 8, '2020-11-08 17:16:01', 'ADMIN', NULL, '', '2020-11-08 11:22:59', 'ADMIN', b'1'),
(52, '00017ef2-2210-11eb-a2d6-e86a64228de9', 0, 1, 'asdasdas', 2, '2020-11-08 17:11:07', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '995699999', 'asdasd', '90.00', 36, 8, '2020-11-08 17:16:07', 'ADMIN', NULL, '', '2020-11-08 11:22:59', 'ADMIN', b'1'),
(53, '50406b48-2211-11eb-9013-e86a64228de9', 0, 1, 'asdasdas', 2, '2020-11-08 17:11:32', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '995699999', 'asdasd', '90.00', 37, 8, '2020-11-08 17:25:32', 'ADMIN', NULL, '', '2020-11-08 11:22:59', 'ADMIN', b'1'),
(54, '505dd084-2211-11eb-b9ed-e86a64228de9', 0, 1, 'asdasdas', 2, '2020-11-08 17:11:32', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '995699999', 'asdasd', '90.00', 38, 8, '2020-11-08 17:25:32', 'ADMIN', NULL, '', '2020-11-08 11:22:59', 'ADMIN', b'1'),
(55, 'bea0639a-2211-11eb-9be5-e86a64228de9', 0, 1, 'asdasdas', 2, '2020-11-08 17:11:37', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '995699999', 'asdasd', '90.00', 39, 8, '2020-11-08 17:28:37', 'ADMIN', NULL, '', '2020-11-08 11:22:59', 'ADMIN', b'1'),
(56, 'bec33aa0-2211-11eb-8c8f-e86a64228de9', 0, 1, 'asdasdas', 2, '2020-11-08 17:11:37', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '995699999', 'asdasd', '90.00', 40, 8, '2020-11-08 17:28:37', 'ADMIN', NULL, '', '2020-11-08 11:22:59', 'ADMIN', b'1'),
(57, '6b5ecf78-2216-11eb-b857-e86a64228de9', 0, 1, 'asdasdas', 2, '2020-11-08 18:11:05', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '995699999', 'asdasd', '90.00', 41, 8, '2020-11-08 18:02:05', 'ADMIN', NULL, '', '2020-11-08 18:49:57', 'ADMIN', b'1'),
(58, '74cf4952-2216-11eb-ba91-e86a64228de9', 0, 1, 'asdasdas', 2, '2020-11-08 18:11:20', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '995699999', 'asdasd', '90.00', 42, 8, '2020-11-08 18:02:20', 'ADMIN', NULL, '', '2020-11-08 18:49:57', 'ADMIN', b'1'),
(59, '22f2d4bc-221d-11eb-8477-e86a64228de9', 0, 1, 'asdasdas', 2, '2020-11-08 18:11:09', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '995699999', 'asdasd', '90.00', 43, 8, '2020-11-08 18:50:10', 'ADMIN', NULL, '', '2020-11-08 18:49:57', 'ADMIN', b'1'),
(60, '247bf58e-221d-11eb-ba55-e86a64228de9', 0, 1, 'asdasdas', 2, '2020-11-08 18:11:12', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '995699999', 'asdasd', '90.00', 44, 8, '2020-11-08 18:50:12', 'ADMIN', NULL, '', '2020-11-08 18:49:57', 'ADMIN', b'1'),
(61, 'b8576344-2220-11eb-b590-e86a64228de9', 0, 1, 'asdasdas', 2, '2020-11-08 19:11:49', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '995699999', 'asdasd', '90.00', 46, 8, '2020-11-08 19:15:49', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(62, 'b9c73182-2220-11eb-aa6c-e86a64228de9', 0, 1, 'asdasdas', 2, '2020-11-08 19:11:51', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '995699999', 'asdasd', '90.00', 47, 8, '2020-11-08 19:15:51', 'ADMIN', NULL, '', NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment_order`
--

CREATE TABLE `payment_order` (
  `id` int(11) NOT NULL,
  `uuid` varchar(150) DEFAULT NULL,
  `payment_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(13,2) NOT NULL,
  `subtotal` decimal(13,2) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(45) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `payment_order`
--

INSERT INTO `payment_order` (`id`, `uuid`, `payment_id`, `service_id`, `quantity`, `price`, `subtotal`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `active`) VALUES
(4, '042abac8-1a4c-11eb-b972-50e549398ade', 14, 1, 1, '1500.00', '300.00', '2020-10-29 20:05:35', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(5, '0437cd3a-1a4c-11eb-a2c3-50e549398ade', 14, 1, 1, '1500.00', '300.00', '2020-10-29 20:05:35', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(6, 'eafa65e6-216a-11eb-887e-e86a64228de9', 18, 1, 0, '60.00', '0.00', '2020-11-07 21:34:25', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(7, 'ec550428-216a-11eb-bcd9-e86a64228de9', 18, 1, 0, '30.00', '0.00', '2020-11-07 21:34:28', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(8, 'dd245a34-216b-11eb-9228-e86a64228de9', 23, 1, 2, '60.00', '120.00', '2020-11-07 21:41:12', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(9, 'ddeba440-216b-11eb-8a62-e86a64228de9', 23, 1, 2, '30.00', '60.00', '2020-11-07 21:41:13', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(10, 'cc28f374-216c-11eb-9366-e86a64228de9', 24, 1, 2, '60.00', '120.00', '2020-11-07 21:47:53', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(11, 'cd7a3b84-216c-11eb-a0e5-e86a64228de9', 24, 1, 2, '30.00', '60.00', '2020-11-07 21:47:55', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(12, 'ae74fafa-2174-11eb-9a47-e86a64228de9', 25, 1, 2, '60.00', '120.00', '2020-11-07 22:44:19', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(13, 'ae79116c-2174-11eb-8789-e86a64228de9', 25, 1, 2, '30.00', '60.00', '2020-11-07 22:44:19', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(14, 'b17b0604-2174-11eb-a319-e86a64228de9', 26, 1, 2, '60.00', '120.00', '2020-11-07 22:44:24', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(15, 'b17f1a50-2174-11eb-9a44-e86a64228de9', 26, 1, 2, '30.00', '60.00', '2020-11-07 22:44:24', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(16, 'd22d071e-2177-11eb-bbb8-e86a64228de9', 27, 1, 2, '60.00', '120.00', '2020-11-07 23:06:47', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(17, 'd232624a-2177-11eb-8fdf-e86a64228de9', 27, 1, 2, '30.00', '60.00', '2020-11-07 23:06:47', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(18, 'd445e462-2177-11eb-a326-e86a64228de9', 28, 1, 2, '60.00', '120.00', '2020-11-07 23:06:51', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(19, 'd44a736a-2177-11eb-92a5-e86a64228de9', 28, 1, 2, '30.00', '60.00', '2020-11-07 23:06:51', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(20, '18b94796-2179-11eb-bf39-e86a64228de9', 29, 1, 1, '60.00', '60.00', '2020-11-07 23:15:55', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(21, '18bd189e-2179-11eb-95c0-e86a64228de9', 29, 1, 1, '30.00', '30.00', '2020-11-07 23:15:55', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(22, '18d46bb6-2179-11eb-8656-e86a64228de9', 30, 1, 1, '60.00', '60.00', '2020-11-07 23:15:55', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(23, '18d94726-2179-11eb-ad10-e86a64228de9', 30, 1, 1, '30.00', '30.00', '2020-11-07 23:15:55', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(24, 'b142f0d4-2179-11eb-8d75-e86a64228de9', 31, 1, 1, '60.00', '60.00', '2020-11-07 23:20:11', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(25, 'b147db62-2179-11eb-bed3-e86a64228de9', 31, 1, 1, '30.00', '30.00', '2020-11-07 23:20:11', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(26, 'b158317e-2179-11eb-88f1-e86a64228de9', 32, 1, 1, '60.00', '60.00', '2020-11-07 23:20:11', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(27, 'b15d11a8-2179-11eb-a9c6-e86a64228de9', 32, 1, 1, '30.00', '30.00', '2020-11-07 23:20:11', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(28, 'bbc770b6-2179-11eb-a23e-e86a64228de9', 33, 1, 1, '60.00', '60.00', '2020-11-07 23:20:29', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(29, 'bbcb5ef6-2179-11eb-907f-e86a64228de9', 33, 1, 1, '30.00', '30.00', '2020-11-07 23:20:29', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(30, 'bbdc6a7a-2179-11eb-84d1-e86a64228de9', 34, 1, 1, '60.00', '60.00', '2020-11-07 23:20:29', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(31, 'bbe18d34-2179-11eb-8356-e86a64228de9', 34, 1, 1, '30.00', '30.00', '2020-11-07 23:20:29', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(32, 'db74d57a-2179-11eb-bb97-e86a64228de9', 35, 1, 2, '60.00', '120.00', '2020-11-07 23:21:22', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(33, 'db799f56-2179-11eb-b4ca-e86a64228de9', 35, 1, 2, '30.00', '60.00', '2020-11-07 23:21:22', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(34, 'dec69204-2179-11eb-b133-e86a64228de9', 36, 1, 2, '60.00', '120.00', '2020-11-07 23:21:27', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(35, 'decbf078-2179-11eb-8057-e86a64228de9', 36, 1, 2, '30.00', '60.00', '2020-11-07 23:21:27', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(36, '0613531a-217a-11eb-a9e8-e86a64228de9', 37, 1, 2, '60.00', '120.00', '2020-11-07 23:22:33', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(38, '497261c8-217a-11eb-8fa3-e86a64228de9', 38, 1, 2, '60.00', '120.00', '2020-11-07 23:24:26', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(40, 'ccd10834-217b-11eb-a0d1-e86a64228de9', 39, 1, 2, '60.00', '120.00', '2020-11-07 23:35:16', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(42, '8a3190ba-217c-11eb-abaf-e86a64228de9', 40, 1, 2, '60.00', '120.00', '2020-11-07 23:40:34', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(43, '8a8efe3a-217c-11eb-a181-e86a64228de9', 40, 2, 1, '30.00', '30.00', '2020-11-07 23:40:34', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(44, '8b20b79e-217c-11eb-b6b7-e86a64228de9', 41, 1, 2, '60.00', '120.00', '2020-11-07 23:40:35', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(45, '8b85dafc-217c-11eb-9449-e86a64228de9', 41, 2, 1, '30.00', '30.00', '2020-11-07 23:40:36', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(46, '09566efa-21dd-11eb-8f7a-e86a64228de9', 42, 1, 1, '60.00', '60.00', '2020-11-08 11:11:19', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(47, '0a441b5a-21dd-11eb-b00d-e86a64228de9', 42, 2, 1, '30.00', '30.00', '2020-11-08 11:11:20', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(48, '22b5ee02-21dd-11eb-a350-e86a64228de9', 43, 1, 1, '60.00', '60.00', '2020-11-08 11:12:01', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(49, '22bd818a-21dd-11eb-87fd-e86a64228de9', 43, 2, 1, '30.00', '30.00', '2020-11-08 11:12:01', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(50, '82ba0b3e-21de-11eb-9cc6-e86a64228de9', 44, 1, 1, '60.00', '60.00', '2020-11-08 11:21:52', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(51, '82bfd5f0-21de-11eb-acc3-e86a64228de9', 44, 2, 1, '30.00', '30.00', '2020-11-08 11:21:52', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(52, '82dda27e-21de-11eb-8a5a-e86a64228de9', 45, 1, 1, '60.00', '60.00', '2020-11-08 11:21:52', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(53, '82e3302c-21de-11eb-9fd0-e86a64228de9', 45, 2, 1, '30.00', '30.00', '2020-11-08 11:21:52', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(54, 'aa63c74c-21de-11eb-a3dc-e86a64228de9', 46, 1, 2, '60.00', '120.00', '2020-11-08 11:22:59', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(55, 'aa695ab8-21de-11eb-bcc1-e86a64228de9', 46, 2, 1, '30.00', '30.00', '2020-11-08 11:22:59', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(56, 'aa86b7d4-21de-11eb-868f-e86a64228de9', 47, 1, 2, '60.00', '120.00', '2020-11-08 11:22:59', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(57, 'aa909416-21de-11eb-8df3-e86a64228de9', 47, 2, 1, '30.00', '30.00', '2020-11-08 11:22:59', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(58, 'bfbcf8c0-21de-11eb-9fa4-e86a64228de9', 48, 1, 3, '60.00', '180.00', '2020-11-08 11:23:34', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(59, 'bfc19420-21de-11eb-a658-e86a64228de9', 48, 2, 1, '30.00', '30.00', '2020-11-08 11:23:34', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(60, 'bfdf0910-21de-11eb-8b2d-e86a64228de9', 49, 1, 3, '60.00', '180.00', '2020-11-08 11:23:35', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(61, 'bfe9fe1a-21de-11eb-a94f-e86a64228de9', 49, 2, 1, '30.00', '30.00', '2020-11-08 11:23:35', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(62, 'a7f400bc-220b-11eb-ba3a-e86a64228de9', 50, 1, 1, '60.00', '60.00', '2020-11-08 16:45:02', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(63, 'a7fa4daa-220b-11eb-b279-e86a64228de9', 50, 2, 1, '30.00', '30.00', '2020-11-08 16:45:02', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(64, 'fc71fed8-220f-11eb-a766-e86a64228de9', 51, 1, 1, '60.00', '60.00', '2020-11-08 17:16:02', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(65, 'fc793324-220f-11eb-9253-e86a64228de9', 51, 2, 1, '30.00', '30.00', '2020-11-08 17:16:02', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(66, '000d04e8-2210-11eb-b472-e86a64228de9', 52, 1, 1, '60.00', '60.00', '2020-11-08 17:16:08', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(67, '00125d80-2210-11eb-ab05-e86a64228de9', 52, 2, 1, '30.00', '30.00', '2020-11-08 17:16:08', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(68, '50476222-2211-11eb-a598-e86a64228de9', 53, 1, 1, '60.00', '60.00', '2020-11-08 17:25:32', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(69, '504c465c-2211-11eb-8f75-e86a64228de9', 53, 2, 1, '30.00', '30.00', '2020-11-08 17:25:32', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(70, '506ca12c-2211-11eb-8151-e86a64228de9', 54, 1, 1, '60.00', '60.00', '2020-11-08 17:25:32', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(71, '50720b6c-2211-11eb-a064-e86a64228de9', 54, 2, 1, '30.00', '30.00', '2020-11-08 17:25:32', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(72, 'bea9665c-2211-11eb-9866-e86a64228de9', 55, 1, 1, '60.00', '60.00', '2020-11-08 17:28:37', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(73, 'beaf8744-2211-11eb-b044-e86a64228de9', 55, 2, 1, '30.00', '30.00', '2020-11-08 17:28:37', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(74, 'bec9f304-2211-11eb-bb7a-e86a64228de9', 56, 1, 1, '60.00', '60.00', '2020-11-08 17:28:37', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(75, 'becf0d62-2211-11eb-9d13-e86a64228de9', 56, 2, 1, '30.00', '30.00', '2020-11-08 17:28:37', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(76, '6b678532-2216-11eb-8b7f-e86a64228de9', 57, 1, 1, '60.00', '60.00', '2020-11-08 18:02:05', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(77, '6b6fa460-2216-11eb-9eb4-e86a64228de9', 57, 2, 1, '30.00', '30.00', '2020-11-08 18:02:05', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(78, '74df17ba-2216-11eb-8ef0-e86a64228de9', 58, 1, 1, '60.00', '60.00', '2020-11-08 18:02:21', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(79, '74ec6a46-2216-11eb-84b2-e86a64228de9', 58, 2, 1, '30.00', '30.00', '2020-11-08 18:02:21', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(80, '22fb5754-221d-11eb-8de0-e86a64228de9', 59, 1, 1, '60.00', '60.00', '2020-11-08 18:50:10', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(81, '23026f9e-221d-11eb-b985-e86a64228de9', 59, 2, 1, '30.00', '30.00', '2020-11-08 18:50:10', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(82, '2483ff36-221d-11eb-82b0-e86a64228de9', 60, 1, 1, '60.00', '60.00', '2020-11-08 18:50:12', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(83, '248b0b46-221d-11eb-bbc9-e86a64228de9', 60, 2, 1, '30.00', '30.00', '2020-11-08 18:50:12', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(84, 'b8640d6a-2220-11eb-81aa-e86a64228de9', 61, 1, 1, '60.00', '60.00', '2020-11-08 19:15:49', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(85, 'b869c12e-2220-11eb-bd8e-e86a64228de9', 61, 2, 1, '30.00', '30.00', '2020-11-08 19:15:49', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(86, 'b9d25242-2220-11eb-a711-e86a64228de9', 62, 1, 1, '60.00', '60.00', '2020-11-08 19:15:51', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(87, 'b9d83e32-2220-11eb-a4c4-e86a64228de9', 62, 2, 1, '30.00', '30.00', '2020-11-08 19:15:51', 'ADMIN', NULL, '', NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission`
--

CREATE TABLE `permission` (
  `id` int(11) NOT NULL,
  `uuid` varchar(150) DEFAULT NULL,
  `create` bit(1) DEFAULT NULL,
  `update` bit(1) DEFAULT NULL,
  `delete` bit(1) DEFAULT NULL,
  `read` bit(1) DEFAULT NULL,
  `read_all` bit(1) DEFAULT NULL,
  `module_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(45) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pet`
--

CREATE TABLE `pet` (
  `id` int(11) NOT NULL,
  `uuid` varchar(150) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `age` varchar(45) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `race` varchar(45) DEFAULT NULL,
  `image` varchar(45) DEFAULT NULL,
  `weight` varchar(10) DEFAULT NULL,
  `size` varchar(10) DEFAULT NULL,
  `diseases` varchar(100) DEFAULT NULL,
  `veterinary` varchar(45) DEFAULT NULL,
  `veterinary_phone` varchar(45) DEFAULT NULL,
  `treatments` text DEFAULT NULL,
  `last_vaccine` varchar(45) DEFAULT NULL,
  `is_agressive` varchar(45) DEFAULT NULL,
  `observation` text DEFAULT NULL,
  `last_zeal` varchar(45) DEFAULT NULL,
  `other` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(45) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pet`
--

INSERT INTO `pet` (`id`, `uuid`, `customer_id`, `name`, `age`, `gender`, `race`, `image`, `weight`, `size`, `diseases`, `veterinary`, `veterinary_phone`, `treatments`, `last_vaccine`, `is_agressive`, `observation`, `last_zeal`, `other`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `active`) VALUES
(1, '8401be74-197d-11eb-94da-50e549398ade', 3, 'Perro1', '1mes', 'MACHO', 'dirección', './assets/img/member-img/contact-2.jpg', '1', '21', '123', '123', '231', '3123', '2020-10-28', '1', '2132', '2020-10-28', 'asda', '2020-10-28 19:27:24', 'ADMIN', '2020-10-28 19:28:44', 'ADMIN', '2020-10-28 19:29:22', 'ADMIN', b'0'),
(2, 'bb18fa6c-197d-11eb-b3b1-50e549398ade', 3, 'Perro1', '8años', 'MACHO', 'dirección', './assets/img/member-img/contact-2.jpg', '2', '21', '12132', '1231', '2312', '312', '2020-10-28', '1', '2', '2020-10-28', 'sdasd', '2020-10-28 19:28:56', 'ADMIN', '2020-10-28 19:31:33', 'ADMIN', NULL, NULL, b'1'),
(3, 'de7062b6-19a5-11eb-a82b-50e549398ade', 3, 'Perro', '1año', 'MACHO', 'dirección', './assets/img/member-img/contact-2.jpg', '123', '1234', 'sdasd', 'Juan Perez', '948569336', 'dasdas', '2020-10-28', '0', 'n/a', 'asdasda', 'asdasdasdas', '2020-10-29 00:16:15', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(4, 'ed300fea-19a5-11eb-8170-50e549398ade', 3, 'Perro', '2años', 'MACHO', 'dirección', './assets/img/member-img/contact-2.jpg', '123', '1234', 'sdasd', 'Juan Perez', '948569336', 'dasdas', '2020-10-28', '1', 'n/a', 'asdasda', 'asdasdasdas', '2020-10-29 00:16:40', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(5, 'ff932f3c-19a5-11eb-a43d-50e549398ade', 3, 'Perro', '4años', 'MACHO', 'dirección', './assets/img/member-img/contact-2.jpg', '123', '1234', 'sdasd', 'Juan Perez', '948569336', 'dasdas', '2020-10-28', '1', 'n/a', 'asdasda', 'asdasdasdas', '2020-10-29 00:17:11', 'ADMIN', '2020-10-29 00:17:42', 'ADMIN', NULL, NULL, b'1'),
(6, '653a5f04-19a6-11eb-a645-50e549398ade', 3, 'Perro', '6años', 'MACHO', 'dirección', './assets/img/member-img/contact-2.jpg', '123', '1234', '-', '-', '-', '-', '-', '1', 'n/a', 'asdasda', 'asdasdasdas', '2020-10-29 00:20:01', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(8, '48373706-215d-11eb-8263-e86a64228de9', 8, 'Perro', '94873360', 'Macho', 'dirección', 'asdasdas', '123', '1234', '', '', '', '', '', '1', 'n/a', 'asdasda', 'asdasdasdas', '2020-11-07 19:56:49', 'ADMIN', '2020-11-08 19:16:30', 'ADMIN', NULL, NULL, b'1'),
(9, '4a97a81e-215d-11eb-b2d0-e86a64228de9', 8, 'Perro', '94873360', 'Macho', 'dirección', 'asdasdas', '123', '1234', '', '', '', '', '', '1', 'n/a', 'asdasda', 'asdasdasdas', '2020-11-07 19:56:53', 'ADMIN', '2020-11-08 19:16:30', 'ADMIN', NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `uuid` varchar(150) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(45) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `role`
--

INSERT INTO `role` (`id`, `uuid`, `name`, `description`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `active`) VALUES
(1, 'd2a466ae-d711-496c-9808-ad51abf76175', 'USUARIO CLIENTE', 'Usuario Web', '2020-10-27 21:14:00', 'ADMIN', '2020-10-27 21:14:00', 'ADMIN', NULL, '', b'1'),
(2, '692acd43-45c8-43c4-ae74-0fd58e179925', 'SUPER ADMIN', 'Desarrollador', '2020-10-27 21:14:00', 'ADMIN', '2020-10-27 21:14:00', 'ADMIN', NULL, NULL, b'1'),
(3, 'b6b6e5c2-34a2-49dc-8885-c04c93d0d116', 'ADMIN', 'Administradores', '2020-10-27 21:14:00', 'ADMIN', '2020-10-27 21:14:00', 'ADMIN', NULL, NULL, b'1'),
(4, '3268cc80-1af2-11eb-bf75-50e549398ade', 'role1', 'description', '2020-10-30 15:55:09', 'ADMIN', '2020-10-30 15:55:44', 'ADMIN', '2020-10-30 15:56:12', 'ADMIN', b'0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `uuid` varchar(150) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `image` varchar(45) DEFAULT NULL,
  `main` bit(1) DEFAULT NULL,
  `service_type_id` int(11) NOT NULL,
  `price` decimal(13,2) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(45) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `service`
--

INSERT INTO `service` (`id`, `uuid`, `name`, `description`, `image`, `main`, `service_type_id`, `price`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `active`) VALUES
(1, '1fdcf8ea-199c-11eb-aed1-50e549398ade', 'HOSPEDAJE', '94873360', '', b'0', 1, '150.00', '2020-10-28 23:06:30', 'ADMIN', '2020-11-04 08:47:34', 'ADMIN', NULL, NULL, b'1'),
(2, '669a0cf0-199c-11eb-9201-50e549398ade', 'BAÑO', '94873360', 'asdasdas', b'1', 1, '160.00', '2020-10-28 23:08:29', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(4, '5484c9cc-1e6c-11eb-b1df-e86a64228de9', 'adsdax', 'sdasdasx', '', b'0', 1, '123.00', '2020-11-04 02:06:58', 'ADMIN', '2020-11-04 02:11:24', 'ADMIN', NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `service_type`
--

CREATE TABLE `service_type` (
  `id` int(11) NOT NULL,
  `uuid` varchar(150) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(45) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `service_type`
--

INSERT INTO `service_type` (`id`, `uuid`, `name`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `active`) VALUES
(1, 'e6e3974c-04f2-4761-bff9-9ea0f48ed604', 'SERVICIO', '2020-10-28 20:01:00', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(2, '7afa5547-3043-43de-8299-c9491ede9019', 'PAQUETE', '2020-10-28 20:01:00', 'ADMIN', NULL, NULL, NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `uuid` varchar(150) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `blocked` varchar(45) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(45) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `uuid`, `username`, `email`, `password`, `blocked`, `role_id`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `active`) VALUES
(1, '27850658-2af4-43c3-8633-aea63a6c8d56', 'jrodas@pethotel.pe', 'jrodas@pethotel.pe', '$2y$10$e2WlBWfXI1xg76WSC5ikNuw7dFQc54ccxPySJvaWjS21RqSuGLMxC', '0', 2, '2020-10-27 21:20:00', 'ADMIN', '2020-10-27 21:20:00', 'ADMIN', NULL, '', b'1'),
(33, '7e1573d2-1920-11eb-946d-50e549398ade', 'jrodas@pethole.pe1', 'jrodas@pethole.pe1', '$2y$10$OZc4TvvDEDmlaj4NljcKseWis9b0vMpfzT9eEgL4MCiIFSTGn2/C2', '1', 1, '2020-10-28 08:21:30', 'ADMIN', NULL, '', '2020-10-28 08:56:16', 'ADMIN', b'0'),
(34, '8d376f96-1920-11eb-ab89-50e549398ade', 'jrodas@pethole.pe2', 'jrodas@pethole.pe2', '$2y$10$E9y6xFhtTwsFoULETMPu2.S2OfTOFmGRF.TowDhjRtZpUC4nCNUe.', '1', 1, '2020-10-28 08:21:56', 'ADMIN', '2020-10-28 08:42:17', 'ADMIN', '2020-10-28 08:53:26', 'ADMIN', b'0'),
(35, '0c7e6554-192e-11eb-8291-50e549398ade', 'jrodas@pethole.pe2', 'jrodas@pethole.pe2', '$2y$10$NcrFQK7eIYIo9tVXb/OlOeHDHIY63y0K.L/Tl4OsuZHvmoMLabyOO', '1', 1, '2020-10-28 09:58:32', 'ADMIN', '2020-11-04 08:54:15', 'ADMIN', NULL, NULL, b'1'),
(36, '3c7957b0-1978-11eb-890b-50e549398ade', 'jrodas@pethole.pe3', 'jrodas@pethole.pe3', '$2y$10$Igt3L.eCXshZ.spTnmK1L.GR.Ko.VWe6HbbCbemmKDwV6vfXAY/wW', '1', 1, '2020-10-28 18:49:36', 'ADMIN', '2020-11-04 08:54:07', 'ADMIN', NULL, NULL, b'1'),
(37, 'b0a6d2c8-214a-11eb-a052-e86a64228de9', 'jrodas@analytics.pe3', 'jrodas@analytics.pe3', '$2y$10$TTkmIPJ9uDdJ9QWQ2dH1vOtPprL9BznkZAmTloSAvOjOoJj14za6e', '0', 1, '2020-11-07 17:43:43', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(38, '0595fbd8-214b-11eb-a382-e86a64228de9', 'prueba@gmail.com', 'prueba@gmail.com', '$2y$10$zmbngslgTDw1vwiY6b3e4OpA50lDblqDVmOWszJtngHR8kSu.mewm', '0', 1, '2020-11-07 17:46:06', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(39, '97f28834-214b-11eb-bc09-e86a64228de9', 'prueba1@gmail.com', 'prueba1@gmail.com', '$2y$10$G6JJmFkarxQotNhMLei1n.DRdHMenxcE5sRXSe/MOh81s53Iq19Kq', '0', 1, '2020-11-07 17:50:11', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(40, 'bbc7d61a-214b-11eb-904f-e86a64228de9', 'prueba2@gmail.com', 'prueba2@gmail.com', '$2y$10$.ZKne2Ortps4FZqeuR5KIO5f0aShF7jNGoO7pwvdgNp0oRdksy6bi', '0', 1, '2020-11-07 17:51:12', 'ADMIN', NULL, '', NULL, NULL, b'1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_BOOKING_KENNEL_idx` (`kennel_id`),
  ADD KEY `FK_BOOOKING_PET_idx` (`pet_id`),
  ADD KEY `FK_BOOKING_CUSTOMER_idx` (`customer_id`);

--
-- Indices de la tabla `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_USER_CUSTOMER_idx` (`user_id`);

--
-- Indices de la tabla `data_master`
--
ALTER TABLE `data_master`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `kennel`
--
ALTER TABLE `kennel`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `module_role`
--
ALTER TABLE `module_role`
  ADD KEY `FK_MODULE_ROLE_MODULE_idx` (`module_id`),
  ADD KEY `FK_ROLE_MODULE_idx` (`role_id`);

--
-- Indices de la tabla `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_CUSTOMER_PAYMENT_idx` (`customer_id`),
  ADD KEY `FK_BOOKING_PAYMENT_idx` (`booking_id`),
  ADD KEY `FK_PAYMENT_METHOD_PAYMENT_idx` (`payment_method_id`),
  ADD KEY `FK_STATE_PAYMENT_idx` (`state_id`);

--
-- Indices de la tabla `payment_order`
--
ALTER TABLE `payment_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_PAYMENT_PAYMENT_ORDER_idx` (`payment_id`),
  ADD KEY `FK_SERVICE_idx` (`service_id`);

--
-- Indices de la tabla `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_PERMISSION_MODULE_idx` (`module_id`);

--
-- Indices de la tabla `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_PET_CUSTOMER_idx` (`customer_id`);

--
-- Indices de la tabla `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_SERVICE_TYPE_idx` (`service_type_id`);

--
-- Indices de la tabla `service_type`
--
ALTER TABLE `service_type`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ROLE_USER_idx` (`role_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `data_master`
--
ALTER TABLE `data_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `kennel`
--
ALTER TABLE `kennel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `payment_order`
--
ALTER TABLE `payment_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT de la tabla `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pet`
--
ALTER TABLE `pet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `service_type`
--
ALTER TABLE `service_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `FK_BOOKING_CUSTOMER` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_BOOKING_KENNEL` FOREIGN KEY (`kennel_id`) REFERENCES `kennel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_BOOOKING_PET` FOREIGN KEY (`pet_id`) REFERENCES `pet` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `FK_USER_CUSTOMER` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `module_role`
--
ALTER TABLE `module_role`
  ADD CONSTRAINT `FK_MODULE_ROLE_MODULE` FOREIGN KEY (`module_id`) REFERENCES `module` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_ROLE_MODULE` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `FK_BOOKING_PAYMENT` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_CUSTOMER_PAYMENT` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_PAYMENT_METHOD_PAYMENT` FOREIGN KEY (`payment_method_id`) REFERENCES `data_master` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_STATE_PAYMENT` FOREIGN KEY (`state_id`) REFERENCES `data_master` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `payment_order`
--
ALTER TABLE `payment_order`
  ADD CONSTRAINT `FK_PAYMENT_PAYMENT_ORDER` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_SERVICE` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `permission`
--
ALTER TABLE `permission`
  ADD CONSTRAINT `FK_PERMISSION_MODULE` FOREIGN KEY (`module_id`) REFERENCES `module` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pet`
--
ALTER TABLE `pet`
  ADD CONSTRAINT `FK_PET_CUSTOMER` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `FK_SERVICE_TYPE` FOREIGN KEY (`service_type_id`) REFERENCES `service_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_ROLE_USER` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
