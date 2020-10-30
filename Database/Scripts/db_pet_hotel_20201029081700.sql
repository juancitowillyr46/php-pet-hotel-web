-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-10-2020 a las 14:16:58
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

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
  `created_at` varchar(45) DEFAULT NULL,
  `date_to` varchar(45) DEFAULT NULL,
  `date_from` varchar(45) DEFAULT NULL,
  `cancellation_date` datetime DEFAULT NULL,
  `cancellation_note` varchar(45) DEFAULT NULL,
  `created_at_copy1` datetime DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(45) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(3, '0bd8324c-1979-11eb-a399-50e549398ade', 'Juan Wilfredo', 'Rodas', '94873360', 'f8507d60-1d69-4b08-affd-bfb01f3a6772', 'dirección', 'juanrodas@hotmail.com', 'asdasdas', 36, '2020-10-28 18:55:24', 'ADMIN', NULL, '', NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `data_master`
--

CREATE TABLE `data_master` (
  `id` int(11) NOT NULL,
  `uuid` varchar(150) DEFAULT NULL,
  `id_register` int(11) DEFAULT NULL,
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
(1, '9afe3e82-19a9-11eb-8ed2-50e549398ade', '1', 'Canil 1', 'ddsdsds', '1', '2020-10-29 00:43:00', 'ADMIN', '2020-10-29 00:43:40', 'ADMIN', '2020-10-29 00:45:03', 'ADMIN', b'0');

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
(1, 'df46cb7c-3ceb-46c3-b106-898db4fe24c6', '/modules/configuration/', 'bx-cog', 'Configuración', 0, b'1', b'1', 0, '2020-09-30 12:01:00', '', NULL, NULL, NULL, NULL, b'1'),
(2, 'f1e67313-3c25-448a-94f4-a7a614982d97', 'maintainer', NULL, 'Data Maestra', 1, b'1', b'1', 1, '2020-09-30 12:01:00', '', NULL, NULL, NULL, NULL, b'1'),
(3, '8fce0c01-9147-460a-9390-b68c1e4637e4', '/modules/customers/', 'bx-group', 'Clientes', 0, b'1', b'1', 2, '2020-09-30 12:01:00', '', NULL, NULL, NULL, NULL, b'1'),
(4, 'c476a1d5-2db9-45ef-8d1c-d41bbec7a447', 'maintainer', NULL, 'Gestionar clientes', 3, b'1', b'1', 3, '2020-09-30 12:01:00', '', NULL, NULL, NULL, NULL, b'1'),
(5, '614214a1-4809-484e-a944-f3d60f9b580f', '/modules/services/', 'bxl-dropbox', 'Servicios', 0, b'1', b'1', 4, '2020-09-30 12:01:00', '', NULL, NULL, NULL, NULL, b'1'),
(6, 'dcd67374-d91a-481b-8571-7147ee72bf20', 'categories', '', 'Categorias', 5, b'1', b'1', 5, '2020-09-30 12:01:00', '', NULL, NULL, NULL, NULL, b'1'),
(7, '1754ae9b-3b73-4653-a047-4ef0406eafc5', 'maintainer', '', 'Productos', 5, b'1', b'1', 6, '2020-09-30 12:01:00', '', NULL, NULL, NULL, NULL, b'1'),
(8, 'ef60e4ac-d114-4e5f-b866-35f9ee810db7', '/modules/pets/', 'bx-cart-alt', 'Compras', 0, b'1', b'1', 7, '2020-09-30 12:01:00', '', NULL, NULL, NULL, NULL, b'1'),
(9, '95c11512-71f6-4220-b9ce-c7c4532269d9', '/modules/users/', 'bx-user', 'Usuarios', 0, b'1', b'1', 8, '2020-09-30 12:01:00', '', NULL, NULL, NULL, NULL, b'1'),
(10, '568cd6a2-a41e-43bb-a049-3307c39fe09f', 'maintainer', '', 'Gestionar usuarios', 9, b'1', b'1', 9, '2020-09-30 12:01:00', '', NULL, NULL, NULL, NULL, b'1'),
(11, '568922d3-c6e4-43c7-81d2-07a5f3fb0e2c', '/modules/providers/', 'bxs-truck', 'Proveedores', 0, b'1', b'1', 10, '2020-09-30 12:01:00', '', NULL, NULL, NULL, NULL, b'1'),
(12, 'df977bdf-4519-45a9-973b-596bc17f2a73', 'maintainer', '', 'Proveedores', 11, b'1', b'1', 11, '2020-09-30 12:01:00', '', NULL, NULL, NULL, NULL, b'1'),
(13, '21f1c9a8-d9f5-41a5-bda1-f73aa650472d', 'legal-representative', '', 'Representantes', 11, b'1', b'1', 12, '2020-09-30 12:01:00', '', NULL, NULL, '2020-10-12 00:00:00', 'ADMIN', b'1'),
(14, '21f1c9a8-d9f5-41a5-bda1-f73aa6504721', 'maintainer', NULL, 'Gestionar compras', 8, b'1', b'1', 13, '2020-09-30 12:01:00', '', NULL, NULL, NULL, NULL, b'1'),
(15, '47dbc06e-09c6-11eb-a369-50e549398ade', NULL, NULL, 'Roles', NULL, NULL, NULL, NULL, '2020-10-08 19:27:57', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(16, '3e75090a-09ca-11eb-8a86-50e549398ade', NULL, '', 'Rolesx', 9, b'1', b'1', 0, '2020-10-08 19:56:19', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(17, '61f4cc80-09ca-11eb-9486-50e549398ade', 'maintainerx', '', 'Rolesx', 9, b'1', b'1', 0, '2020-10-08 19:57:19', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(18, '70c49b64-09ca-11eb-8e56-50e549398ade', 'maintainerx', 'dd dsds', 'Rolesx', 9, b'1', b'1', 0, '2020-10-08 19:57:44', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(19, '55a8a586-09cb-11eb-a48d-50e549398ade', 'maintainerx', 'dd dsds', 'Rolesx', 0, b'1', b'1', 0, '2020-10-08 20:04:08', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(20, '63e08b64-09cb-11eb-9161-50e549398ade', 'maintainerx', 'dd dsds', 'Rolesx', 9, b'1', b'1', 0, '2020-10-08 20:04:32', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(21, '76cd343e-09cb-11eb-aa41-50e549398ade', 'maintainerx', 'dd dsds', 'Rolesx', 9, b'1', b'1', 0, '2020-10-08 20:05:03', 'ADMIN', '2020-10-08 20:12:36', 'ADMIN', '2020-10-08 20:13:17', NULL, b'1');

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
(2, 15, b'1', b'1', b'1', b'1', b'1', '2020-10-28 00:22:00', 'ADMIN', NULL, NULL, NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `uuid` varchar(150) DEFAULT NULL,
  `banking_entity_id` int(11) DEFAULT NULL,
  `ticket` varchar(45) DEFAULT NULL,
  `payment_method_id` int(11) NOT NULL,
  `screen_voucher` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `date` varchar(45) DEFAULT NULL,
  `billing_first_name` varchar(45) DEFAULT NULL,
  `billing_last_name` varchar(45) DEFAULT NULL,
  `billing_dni` varchar(45) DEFAULT NULL,
  `billing_email` varchar(45) DEFAULT NULL,
  `billing_phone` varchar(45) DEFAULT NULL,
  `billing_address` varchar(45) DEFAULT NULL,
  `total` varchar(45) DEFAULT NULL,
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment_order`
--

CREATE TABLE `payment_order` (
  `id` int(11) NOT NULL,
  `uuid` varchar(150) DEFAULT NULL,
  `payment_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `subtotal` varchar(45) DEFAULT NULL,
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
(1, '8401be74-197d-11eb-94da-50e549398ade', 3, 'Perro1', 'macho', 'f8507d60-1d69-4b08-affd-bfb01f3a6772', 'dirección', 'asdasdas', '1', '21', '123', '123', '231', '3123', '2020-10-28', '1', '2132', '2020-10-28', 'asda', '2020-10-28 19:27:24', 'ADMIN', '2020-10-28 19:28:44', 'ADMIN', '2020-10-28 19:29:22', 'ADMIN', b'0'),
(2, 'bb18fa6c-197d-11eb-b3b1-50e549398ade', 3, 'Perro1', '12', 'macho', 'dirección', 'asdasdas', '2', '21', '12132', '1231', '2312', '312', '2020-10-28', '1', '2', '2020-10-28', 'sdasd', '2020-10-28 19:28:56', 'ADMIN', '2020-10-28 19:31:33', 'ADMIN', NULL, NULL, b'1'),
(3, 'de7062b6-19a5-11eb-a82b-50e549398ade', 3, 'Perro', '94873360', 'f8507d60-1d69-4b08-affd-bfb01f3a6772', 'dirección', 'asdasdas', '123', '1234', 'sdasd', 'Juan Perez', '948569336', 'dasdas', '2020-10-28', '0', 'n/a', 'asdasda', 'asdasdasdas', '2020-10-29 00:16:15', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(4, 'ed300fea-19a5-11eb-8170-50e549398ade', 3, 'Perro', '94873360', 'f8507d60-1d69-4b08-affd-bfb01f3a6772', 'dirección', 'asdasdas', '123', '1234', 'sdasd', 'Juan Perez', '948569336', 'dasdas', '2020-10-28', '1', 'n/a', 'asdasda', 'asdasdasdas', '2020-10-29 00:16:40', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(5, 'ff932f3c-19a5-11eb-a43d-50e549398ade', 3, 'Perro', '94873360', 'Macho', 'dirección', 'asdasdas', '123', '1234', 'sdasd', 'Juan Perez', '948569336', 'dasdas', '2020-10-28', '1', 'n/a', 'asdasda', 'asdasdasdas', '2020-10-29 00:17:11', 'ADMIN', '2020-10-29 00:17:42', 'ADMIN', NULL, NULL, b'1'),
(6, '653a5f04-19a6-11eb-a645-50e549398ade', 3, 'Perro', '94873360', 'Macho', 'dirección', 'asdasdas', '123', '1234', '', '', '', '', '', '1', 'n/a', 'asdasda', 'asdasdasdas', '2020-10-29 00:20:01', 'ADMIN', NULL, '', NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role`
--

CREATE TABLE `role` (
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
-- Volcado de datos para la tabla `role`
--

INSERT INTO `role` (`id`, `uuid`, `name`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `active`) VALUES
(1, 'd2a466ae-d711-496c-9808-ad51abf76175', 'USUARIO', '2020-10-27 21:14:00', 'ADMIN', '2020-10-27 21:14:00', 'ADMIN', NULL, '', b'1'),
(2, '692acd43-45c8-43c4-ae74-0fd58e179925', 'SUPER ADMIN', '2020-10-27 21:14:00', 'ADMIN', '2020-10-27 21:14:00', 'ADMIN', NULL, NULL, b'1'),
(3, 'b6b6e5c2-34a2-49dc-8885-c04c93d0d116', 'ADMIN', '2020-10-27 21:14:00', 'ADMIN', '2020-10-27 21:14:00', 'ADMIN', NULL, NULL, b'1');

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

INSERT INTO `service` (`id`, `uuid`, `name`, `description`, `image`, `main`, `service_type_id`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `active`) VALUES
(1, '1fdcf8ea-199c-11eb-aed1-50e549398ade', 'Servicio 11', '94873360', 'asdasdas', b'1', 1, '2020-10-28 23:06:30', 'ADMIN', '2020-10-28 23:08:13', 'ADMIN', NULL, NULL, b'1'),
(2, '669a0cf0-199c-11eb-9201-50e549398ade', 'Servicio 2', '94873360', 'asdasdas', b'1', 1, '2020-10-28 23:08:29', 'ADMIN', NULL, '', '2020-10-28 23:09:28', 'ADMIN', b'0');

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
(1, '27850658-2af4-43c3-8633-aea63a6c8d56', 'jrodas@analytics.pe', 'jrodas@analytics.pe', '$2y$10$e2WlBWfXI1xg76WSC5ikNuw7dFQc54ccxPySJvaWjS21RqSuGLMxC', '0', 2, '2020-10-27 21:20:00', 'ADMIN', '2020-10-27 21:20:00', 'ADMIN', NULL, '', b'1'),
(33, '7e1573d2-1920-11eb-946d-50e549398ade', 'jrodas@analytics.pe1', 'jrodas@analytics.pe1', '$2y$10$OZc4TvvDEDmlaj4NljcKseWis9b0vMpfzT9eEgL4MCiIFSTGn2/C2', '1', 1, '2020-10-28 08:21:30', 'ADMIN', NULL, '', '2020-10-28 08:56:16', 'ADMIN', b'0'),
(34, '8d376f96-1920-11eb-ab89-50e549398ade', 'jrodas@analytics.pe2', 'jrodas@analytics.pe2', '$2y$10$E9y6xFhtTwsFoULETMPu2.S2OfTOFmGRF.TowDhjRtZpUC4nCNUe.', '1', 1, '2020-10-28 08:21:56', 'ADMIN', '2020-10-28 08:42:17', 'ADMIN', '2020-10-28 08:53:26', 'ADMIN', b'0'),
(35, '0c7e6554-192e-11eb-8291-50e549398ade', 'jrodas@analytics.pe2', 'jrodas@analytics.pe2', '$2y$10$NcrFQK7eIYIo9tVXb/OlOeHDHIY63y0K.L/Tl4OsuZHvmoMLabyOO', '0', 1, '2020-10-28 09:58:32', 'ADMIN', NULL, '', NULL, NULL, b'1'),
(36, '3c7957b0-1978-11eb-890b-50e549398ade', 'jrodas@analytics.pe3', 'jrodas@analytics.pe3', '$2y$10$Js0zqH.EBIwNH9G8ULeJQ.1irTtUO6ue6RzuRi8tiptMKOdcAwhnK', '0', 1, '2020-10-28 18:49:36', 'ADMIN', NULL, '', NULL, NULL, b'1');

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
  ADD KEY `FK_BANK_PAYMENT_idx` (`banking_entity_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `data_master`
--
ALTER TABLE `data_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `kennel`
--
ALTER TABLE `kennel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `payment_order`
--
ALTER TABLE `payment_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  ADD CONSTRAINT `FK_BANK_PAYMENT` FOREIGN KEY (`banking_entity_id`) REFERENCES `data_master` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_BOOKING_PAYMENT` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_CUSTOMER_PAYMENT` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_PAYMENT_METHOD_PAYMENT` FOREIGN KEY (`payment_method_id`) REFERENCES `data_master` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
