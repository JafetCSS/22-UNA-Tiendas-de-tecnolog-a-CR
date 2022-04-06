-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-04-2022 a las 19:38:16
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbtiendatecnologiacr`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbaccount`
--

CREATE TABLE `tbaccount` (
  `id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `state` int(1) NOT NULL,
  `typeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbaccount`
--

INSERT INTO `tbaccount` (`id`, `username`, `password`, `type`, `state`, `typeid`) VALUES
(1, 'admin', 'admin', 'admin', 1, 1),
(2, 'TeamCodeCR', 'tc1234', 'store', 0, 1),
(3, 'JafetLara', 'jafetlara', 'client', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbstore`
--

CREATE TABLE `tbstore` (
  `storeid` int(11) NOT NULL,
  `storeprofileimageurl` varchar(100) NOT NULL,
  `storelegalcertificate` int(11) NOT NULL,
  `storeschedule` varchar(500) NOT NULL,
  `storename` varchar(100) NOT NULL,
  `storedescription` varchar(500) NOT NULL,
  `storeqrurl` varchar(100) NOT NULL,
  `storeemail` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbstore`
--

INSERT INTO `tbstore` (`storeid`, `storeprofileimageurl`, `storelegalcertificate`, `storeschedule`, `storename`, `storedescription`, `storeqrurl`, `storeemail`) VALUES
(1, '../resources/images/imageStoreProfile/TeamCodeCR-Profile-Image.png', 1234567890, 'Lunes a sabado de 9 am a 6 pm', 'TeamCodeCR', 'Tienda de tecnología especializada en celulares', '../resources/images/imageStoreQR/TeamCodeCR-QR-Image.png', 'TeamCodeCR@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbstoreaddress`
--

CREATE TABLE `tbstoreaddress` (
  `storeaddressid` int(11) NOT NULL,
  `storeaddressmapurl` varchar(500) NOT NULL,
  `storeaddressprovince` varchar(50) NOT NULL,
  `storeaddresscanton` varchar(100) NOT NULL,
  `storeaddressdistrict` varchar(100) NOT NULL,
  `storeaddressstoreid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbstoreaddress`
--

INSERT INTO `tbstoreaddress` (`storeaddressid`, `storeaddressmapurl`, `storeaddressprovince`, `storeaddresscanton`, `storeaddressdistrict`, `storeaddressstoreid`) VALUES
(1, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d245.41551593199097!2d-83.7416317732761!3d10.209192972365983!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa0b7e78f3ef2ab%3A0x6690a363c72a87e9!2sComputec%20Jimenez!5e0!3m2!1ses-419!2scr!4v1649262348725!5m2!1ses-419!2scr', 'Limon', 'Guapiles', 'Jimenez', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbstorecontact`
--

CREATE TABLE `tbstorecontact` (
  `storecontactid` int(11) NOT NULL,
  `storecontactmodality` varchar(100) NOT NULL,
  `storecontactbody` varchar(150) NOT NULL,
  `storecontactstoreid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbstorecontact`
--

INSERT INTO `tbstorecontact` (`storecontactid`, `storecontactmodality`, `storecontactbody`, `storecontactstoreid`) VALUES
(1, 'Gmail', 'TeamCodeCRAtenciónAlCliente@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbstorerequest`
--

CREATE TABLE `tbstorerequest` (
  `storerequestid` int(11) NOT NULL,
  `storerequeststoreid` int(11) NOT NULL,
  `storerequeststatus` varchar(50) NOT NULL,
  `storerequestdate` date NOT NULL,
  `storerequestadminid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbstorerequest`
--

INSERT INTO `tbstorerequest` (`storerequestid`, `storerequeststoreid`, `storerequeststatus`, `storerequestdate`, `storerequestadminid`) VALUES
(1, 1, '', '0000-00-00', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbaccount`
--
ALTER TABLE `tbaccount`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbaccount`
--
ALTER TABLE `tbaccount`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
