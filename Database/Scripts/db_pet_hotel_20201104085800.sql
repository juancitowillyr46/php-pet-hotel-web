-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-11-2020 a las 14:58:47
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
  `uuid` varchar(45) DEFAULT NULL,
  `kennel_id` int(11) NOT NULL,
  `state` varchar(45) DEFAULT NULL,
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

INSERT INTO `booking` (`id`, `uuid`, `kennel_id`, `state`, `pet_id`, `customer_id`, `date_to`, `date_from`, `cancellation_date`, `cancellation_note`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `active`) VALUES
(2, '123', 1, '1', 2, 3, '2020-10-29', '2020-10-31', NULL, NULL, '2020-10-29 13:28:00', 'ADMIN', NULL, NULL, NULL, NULL, b'1');

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
(3, '0bd8324c-1979-11eb-a399-50e549398ade', 'Juan Wilfredo', 'Rodas', '94873360', 'Avenida 123', 'dirección', 'ninguno', 'asdasdas', 36, '2020-10-28 18:55:24', 'ADMIN', NULL, '', NULL, NULL, b'1');

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
(1, '79c6966a-19ef-11eb-a9c2-50e549398ade', 2, 'TABLE_DEMO1', 'datos', 'dasdas', '2020-10-29 09:03:09', 'ADMIN', '2020-10-29 09:30:04', 'ADMIN', NULL, NULL, b'1'),
(2, '176d7072-19f1-11eb-a86b-50e549398ade', 1, 'TABLE_DEMO1', 'datos', 'dasdas', '2020-10-29 09:14:43', 'ADMIN', '2020-10-29 09:30:58', 'ADMIN', NULL, '', b'1'),
(3, '176d7072-19f1-11eb-a86b-50e549398ade1', 1, 'TABLE_PAYMENT_METHOD', 'Transferencia Bancaria', 'Transferencia Bancaria', '2020-10-29 09:14:43', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(4, '176d7072-19f1-11eb-a86b-50e549398ade2', 2, 'TABLE_PAYMENT_METHOD', 'Plin o Lukita', 'Plin o Lukita', '2020-10-29 09:14:43', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(5, '176d7072-19f1-11eb-a86b-50e549398ade3', 3, 'TABLE_PAYMENT_METHOD', 'Yape', 'Yape', '2020-10-29 09:14:43', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(6, '176d7072-19f1-11eb-a86b-50e549398ade4', 4, 'TABLE_PAYMENT_METHOD', 'POS', 'Contraentrega', '2020-10-29 09:14:43', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(7, '1cca03ea-07dc-11eb-ab06-50e549398ade', 1, 'TABLE_STATE_AUDIT', 'SI', 'Registro activo', '2020-10-29 09:14:43', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(8, '48687626-07dc-11eb-b7ad-50e549398ade', 2, 'TABLE_STATE_AUDIT', 'NO', 'Registro no activo', '2020-10-29 09:14:43', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(11, '1cca03ea-07dc-11eb-ab06-50e549398ade1', 1, 'TABLE_BLOCKED_USER', 'SI', 'No bloqueado', '2020-10-29 09:14:43', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(12, '1cca03ea-07dc-11eb-ab06-50e549398ade2', 2, 'TABLE_BLOCKED_USER', 'NO', 'bloqueado', '2020-10-29 09:14:43', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(14, '1cca03ea-07dc-11eb-ab06-50e549398ade3', 1, 'TABLE_IS_BOOKED', 'SI', 'Disponible', '2020-10-29 09:14:43', 'ADMIN', NULL, NULL, NULL, NULL, b'1'),
(15, '1cca03ea-07dc-11eb-ab06-50e549398ade4', 2, 'TABLE_IS_BOOKED', 'NO', 'No Disponible', '2020-10-29 09:14:43', 'ADMIN', NULL, NULL, NULL, NULL, b'1');

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
  `is_booked` varchar(45) DEFAULT NULL,
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
(1, '9afe3e82-19a9-11eb-8ed2-50e549398ade', '1', 'Canil 2', '', '0', '2020-10-29 00:43:00', 'ADMIN', '2020-11-04 08:55:58', 'ADMIN', NULL, '', b'1'),
(2, '823d7de2-1ea2-11eb-a2d1-e86a64228de9', '1', 'Canil 1', '', '0', '2020-11-04 08:34:47', 'ADMIN', '2020-11-04 08:44:00', 'ADMIN', NULL, NULL, b'1'),
(3, '821f72ea-1ea5-11eb-8730-e86a64228de9', 'Canil 3', 'Canil 3', '', '0', '2020-11-04 08:56:16', 'ADMIN', NULL, '', NULL, NULL, b'1');

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
(1, 'df46cb7c-3ceb-46c3-b106-898db4fe24c6', '/modules/datamaster/', 'bx-cog', 'Configuración', 0, b'1', b'0', 0, '2020-09-30 12:01:00', '', NULL, NULL, NULL, NULL, b'1'),
(2, 'f1e67313-3c25-448a-94f4-a7a614982d97', 'maintainer', NULL, 'Gestión data maestra', 1, b'0', b'1', 1, '2020-09-30 12:01:00', '', NULL, NULL, NULL, NULL, b'1'),
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
(21, '76cd343e-09cb-11eb-aa41-50e549398ade', 'maintainerx', 'dd dsds', 'Rolesx', 9, b'0', b'1', 0, '2020-10-08 20:05:03', 'ADMIN', '2020-10-08 20:12:36', 'ADMIN', '2020-10-08 20:13:17', 'ADMIN', b'1');

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
(2, 16, b'1', b'1', b'1', b'1', b'1', '2020-10-30 19:59:46', 'ADMIN', NULL, NULL, NULL, NULL, b'0');

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
(3, 'c9baf2cc-1a14-11eb-ac22-50e549398ade', 1, 1, 'asdasdas', 1, '2020-10-29 10:55:00', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '1', 'asdasd', '15000.00', 2, 3, '2020-10-29 13:30:14', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(4, '931253a6-1a4a-11eb-a0b6-50e549398ade', 1, 1, 'asdasdas', 1, '2020-10-29 10:55:00', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '23', 'asdasd', '15000.00', 2, 3, '2020-10-29 19:55:14', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(5, '0f85b630-1a4b-11eb-824e-50e549398ade', 1, 1, 'asdasdas', 1, '2020-10-29 10:55:00', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '3', 'asdasd', '15000.00', 2, 3, '2020-10-29 19:58:44', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(6, '25af4804-1a4b-11eb-888f-50e549398ade', 1, 1, 'asdasdas', 1, '2020-10-29 10:55:00', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '3', 'asdasd', '15000.00', 2, 3, '2020-10-29 19:59:22', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(7, '43cdb438-1a4b-11eb-811f-50e549398ade', 1, 1, 'asdasdas', 1, '2020-10-29 10:55:00', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '3', 'asdasd', '15000.00', 2, 3, '2020-10-29 20:00:12', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(8, '56e09a4a-1a4b-11eb-b2e1-50e549398ade', 1, 1, 'asdasdas', 1, '2020-10-29 10:55:00', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '3', 'asdasd', '15000.00', 2, 3, '2020-10-29 20:00:44', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(9, '96ead506-1a4b-11eb-9513-50e549398ade', 1, 1, 'asdasdas', 1, '2020-10-29 10:55:00', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '3', 'asdasd', '15000.00', 2, 3, '2020-10-29 20:02:32', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(10, 'af068fd6-1a4b-11eb-84c3-50e549398ade', 1, 1, 'asdasdas', 1, '2020-10-29 10:55:00', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '3', 'asdasd', '15000.00', 2, 3, '2020-10-29 20:03:12', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(11, 'baa12c34-1a4b-11eb-b0ba-50e549398ade', 1, 1, 'asdasdas', 1, '2020-10-29 10:55:00', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '4', 'asdasd', '15000.00', 2, 3, '2020-10-29 20:03:31', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(12, 'db98a9c6-1a4b-11eb-abeb-50e549398ade', 1, 1, 'asdasdas', 1, '2020-10-29 10:55:00', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '5', 'asdasd', '15000.00', 2, 3, '2020-10-29 20:04:27', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(13, 'ee908a08-1a4b-11eb-97ff-50e549398ade', 1, 1, 'asdasdas', 1, '2020-10-29 10:55:00', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '5', 'asdasd', '15000.00', 2, 3, '2020-10-29 20:04:59', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(14, '024dd6a4-1a4c-11eb-9d56-50e549398ade', 1, 1, 'asdasdas', 1, '2020-10-29 10:55:00', 'Juan', 'Rodas', '445556666', 'jrodas@analytics.pe', '995699999', 'asdasd', '15000.00', 2, 3, '2020-10-29 20:05:32', 'ADMIN', '2020-10-29 21:09:27', 'ADMIN', NULL, NULL, b'1');

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
(5, '0437cd3a-1a4c-11eb-a2c3-50e549398ade', 14, 1, 1, '1500.00', '300.00', '2020-10-29 20:05:35', 'ADMIN', NULL, '', NULL, NULL, b'1');

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
(6, '653a5f04-19a6-11eb-a645-50e549398ade', 3, 'Perro', '6años', 'MACHO', 'dirección', './assets/img/member-img/contact-2.jpg', '123', '1234', '-', '-', '-', '-', '-', '1', 'n/a', 'asdasda', 'asdasdasdas', '2020-10-29 00:20:01', 'ADMIN', NULL, '', NULL, NULL, b'1');

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
(1, '1fdcf8ea-199c-11eb-aed1-50e549398ade', 'Servicio 11', '94873360', '', b'0', 2, '150.00', '2020-10-28 23:06:30', 'ADMIN', '2020-11-04 08:47:34', 'ADMIN', NULL, NULL, b'1'),
(2, '669a0cf0-199c-11eb-9201-50e549398ade', 'Servicio 2', '94873360', 'asdasdas', b'1', 2, '160.00', '2020-10-28 23:08:29', 'ADMIN', NULL, '', '2020-10-28 23:09:28', 'ADMIN', b'0'),
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
(36, '3c7957b0-1978-11eb-890b-50e549398ade', 'jrodas@pethole.pe3', 'jrodas@pethole.pe3', '$2y$10$Igt3L.eCXshZ.spTnmK1L.GR.Ko.VWe6HbbCbemmKDwV6vfXAY/wW', '1', 1, '2020-10-28 18:49:36', 'ADMIN', '2020-11-04 08:54:07', 'ADMIN', NULL, NULL, b'1');

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
  ADD KEY `FK_BANK_PAYMENT_idx` (`bank_id`),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `data_master`
--
ALTER TABLE `data_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `kennel`
--
ALTER TABLE `kennel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `payment_order`
--
ALTER TABLE `payment_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pet`
--
ALTER TABLE `pet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

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
  ADD CONSTRAINT `FK_BANK_PAYMENT` FOREIGN KEY (`bank_id`) REFERENCES `data_master` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
