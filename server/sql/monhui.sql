-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 07, 2021 at 06:50 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monhui`
--

-- --------------------------------------------------------

--
-- Table structure for table `mountain`
--

CREATE TABLE `mountain` (
  `id` int(11) NOT NULL,
  `name` varchar(140) NOT NULL,
  `height` int(4) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mountain`
--

INSERT INTO `mountain` (`id`, `name`, `height`, `location`, `description`, `image`) VALUES
(1, 'Torrecilla', 1918, 'Serranía de Ronda', 'La ruta de ascensión más utilizada, empieza en el Área Recreativa de los Quejigales a aproximadamente 1.285 metros sobre el nivel del mar y continúa por la Cañada del Cuerno hasta el Puerto de los Pilones. Desde allí, se hace una pequeña travesía hacia el pozo de las nieves y hasta el Pilar de Tolox, justo a los pies del pico. Desde el Pilar de Tolox hay un fuerte desnivel final para el ataque al pico.', 'https://www.aristasur.com/sites/as/styles/large/public/users/3/teaser/torrecilla-cumbre2.jpg?itok=-kDn8GKz'),
(2, 'Jabalcuza', 656, 'Alhaurín de la Torre', 'Una ruta fácil, pero con un buen desnivel durante toda la ruta.', 'https://static.malaga.es/malaga/subidas/imagenes/9/5/arc_242759_g.jpg'),
(5, 'Sierra Prieta', 1518, 'Alozaina / Casarabonela', 'Se encuentra al noroeste del parque natural de la Sierra de las Nieves. No forma parte del mismo, pero sí de la reserva de la biosfera de la Sierra de las Nieves y las ZEPA y ZEC a ella asociada.', 'https://upload.wikimedia.org/wikipedia/commons/4/47/07._S_Prieta.jpg'),
(6, 'Maroma', 2069, 'Alhama de Granada / Canillas de Aceiutno', 'Es el pico más alto de la sierra de Tejeda, dentro del parque natural de las Sierras de Tejeda, Almijara y Alhama. Es el punto más alto de la comarca de la Axarquía y de toda la provincia de Málaga, en España, formando parte de las 8 Cimas de Andalucía. ', 'https://cdn.visitacostadelsol.com/visitacostadelsol/subidas/imagenes/2/8/arc_3682_g.jpg'),
(7, 'Sierra Cabrilla', 1507, 'Yunquera, El Burgo y Casarabonela', 'También es conocida como sierra Blanquilla debido a que su máxima cumbre se llama cerro de la Blanquilla o pico Blanquilla. ', 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/37/056.SIERRA_CABRILLA_%2816026327023%29.jpg/275px-056.SIERRA_CABRILLA_%2816026327023%29.jpg'),
(8, 'Lucero', 1774, 'Sierra Almijara', 'Para acceder a la ruta hay que ir hasta Competa.', 'https://alborde.org/wp-content/uploads/2016/10/DSCF4535.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mountain`
--
ALTER TABLE `mountain`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mountain`
--
ALTER TABLE `mountain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
