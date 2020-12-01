-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-11-2020 a las 03:56:47
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
(47, 'b948d850-2220-11eb-aad4-e86a64228de9', 2, 1, 9, 8, '2020-12-01', '2020-12-02', NULL, NULL, '2020-11-08 19:15:50', 'ADMIN', '2020-11-09 20:58:07', 'ADMIN', NULL, NULL, b'1');

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
(62, 'b9c73182-2220-11eb-aa6c-e86a64228de9', 1, 1, 'asdasdas', 1, '2020-11-08 19:11:51', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '995699999', 'asdasd', '90.00', 47, 8, '2020-11-08 19:15:51', 'ADMIN', '2020-11-09 18:42:05', 'ADMIN', NULL, NULL, b'1');

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
  `image` longtext DEFAULT NULL,
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
(5, 'ff932f3c-19a5-11eb-a43d-50e549398ade', 8, 'Boby2', '4años', 'MACHO', 'dirección', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJMAAACTCAIAAAAFh7xCAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyZpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMTM4IDc5LjE1OTgyNCwgMjAxNi8wOS8xNC0wMTowOTowMSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTcgKFdpbmRvd3MpIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOkY1NUE3MjQ1MERDNzExRUI5QkZEQjgwRkRDNjU3ODE2IiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOkY1NUE3MjQ2MERDNzExRUI5QkZEQjgwRkRDNjU3ODE2Ij4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6RjU1QTcyNDMwREM3MTFFQjlCRkRCODBGREM2NTc4MTYiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6RjU1QTcyNDQwREM3MTFFQjlCRkRCODBGREM2NTc4MTYiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz7DLJ9NAACGEklEQVR42ly9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', '123', '1234', 'sdasd', 'Juan Perez', '948569336', 'dasdas', '2020-10-28', '1', 'n/a', 'asdasda', 'asdasdasdas', '2020-10-29 00:17:11', 'ADMIN', '2020-11-10 21:18:20', 'ADMIN', NULL, NULL, b'1'),
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
(40, 'bbc7d61a-214b-11eb-904f-e86a64228de9', 'prueba2@gmail.com', 'prueba2@gmail.com', '$2y$10$.ZKne2Ortps4FZqeuR5KIO5f0aShF7jNGoO7pwvdgNp0oRdksy6bi', '0', 1, '2020-11-07 17:51:12', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(41, '56bf2980-2303-11eb-95d5-e86a64228de9', 'prueba4@gmail.com', 'prueba4@gmail.com', '$2y$10$oKjwddG3quUokMdKN0uBXunZLQqnrkvE5q9.Aej2bvhwwriXDcT0m', '0', 1, '2020-11-09 22:18:00', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(42, 'f5bd413e-2303-11eb-9088-e86a64228de9', 'prueba5@gmail.com', 'prueba5@gmail.com', '$2y$10$XuxvLsBMopBQuaNTVuRkve/c.z5ujGVNQ1W9sXw5sfw/wWS3EUyzG', '0', 1, '2020-11-09 22:22:27', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(43, '3e5b7028-2304-11eb-9be4-e86a64228de9', 'prueba6@gmail.com', 'prueba6@gmail.com', '$2y$10$aZzu2MocK25.Gdgv1/6ine.51dSfCLhXDqF3o5UceTx8Fhj7EGS0C', '0', 1, '2020-11-09 22:24:29', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(44, '5a8d3e34-2309-11eb-ba4b-e86a64228de9', 'prueba8@gmail.com', 'prueba8@gmail.com', '$2y$10$DYp4KaBeW0HWDVKsmqouRefTbTzWZ26Bw4rLGgn4cYIecz23pt4Te', '0', 1, '2020-11-09 23:01:04', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(45, 'c99c6dc2-2309-11eb-845c-e86a64228de9', 'prueba9@gmail.com', 'prueba9@gmail.com', '$2y$10$R6HqQS7CdJLRGqzbq0BRfuXKW2vnjEofVhRZxUd00PcbxDyiTs8Ye', '0', 1, '2020-11-09 23:04:10', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(46, '637d0d16-230a-11eb-815a-e86a64228de9', 'prueba10@gmail.com', 'prueba10@gmail.com', '$2y$10$VYYrUZBSN4zNS73HHZXbiuRYpXRYvy6Bz0R0Ao5uxkSzm/ozoh5PS', '0', 1, '2020-11-09 23:08:28', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(47, '1d81371e-230b-11eb-bc04-e86a64228de9', 'prueba11@gmail.com', 'prueba11@gmail.com', '$2y$10$S6sE6wL1fkmsK5AenTEvK.WxnvL9FjURydI1xN3dXqPopSUlYIf8S', '0', 1, '2020-11-09 23:13:40', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(48, '4fbd2e9a-230b-11eb-8b0f-e86a64228de9', 'prueba12@gmail.com', 'prueba12@gmail.com', '$2y$10$U6KcU7iVIFdhNUXl6x8JTOR1iATRaOaEi9SU/uiTl7pZJvueQ2mlO', '0', 1, '2020-11-09 23:15:05', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(49, 'a6212aca-230b-11eb-81b2-e86a64228de9', 'prueba13@gmail.com', 'prueba13@gmail.com', '$2y$10$G7V1OIOHaXeCnMWWSdmvY.DRgLnEugJFihBR5oLA8V8Dp8MJR4pN.', '0', 1, '2020-11-09 23:17:30', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(50, 'edb9d59e-230b-11eb-82ae-e86a64228de9', 'prueba14@gmail.com', 'prueba14@gmail.com', '$2y$10$TKK1HAvE71ehyDHB/Tvc8.6fNxLuqxtvoBg3s2.6oKJM6H7p.47Fe', '0', 1, '2020-11-09 23:19:30', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(51, '81e06bc8-237c-11eb-b08f-e86a64228de9', 'prueba15@gmail.com', 'prueba15@gmail.com', '$2y$10$1ZSXc.reDt4/dAsmhzvt7.tJV8xIblK/DEuSd3x0DXhUN6dXWK1R.', '0', 1, '2020-11-10 12:45:21', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(52, '1a99abbc-237e-11eb-b76e-e86a64228de9', 'jrodas@analytics.pe', 'jrodas@analytics.pe', '$2y$10$Ty5jjgAISPHBlVckX0sZfeQQFlXvSK.WEdpURqeGS1LzVR7Mtyxei', '0', 1, '2020-11-10 12:56:48', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(53, '865b2b0a-2383-11eb-9093-e86a64228de9', 'prueba16@gmail.com', 'prueba16@gmail.com', '$2y$10$sOLjGsji92njWTFhze2FSew8F.4AAW.5YvNx48PEXrTS74nvSlbNi', '0', 1, '2020-11-10 13:35:36', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(54, '37ef5cce-2384-11eb-a58f-e86a64228de9', 'prueba17@gmail.com', 'prueba17@gmail.com', '$2y$10$RhL.m/Yj9cs00K/Flm0opuqjp5d141SVRtAPB/7JD0hsVoOYLB73K', '0', 1, '2020-11-10 13:40:34', 'ADMIN', NULL, '', NULL, NULL, b'1');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

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
