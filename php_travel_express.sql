-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2021 at 04:23 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_travel_express`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `trip_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `persons` int(11) NOT NULL DEFAULT 1,
  `mobile` bigint(20) NOT NULL,
  `price` bigint(20) NOT NULL,
  `journey_date` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `trip_id` int(11) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `trip_name`, `persons`, `mobile`, `price`, `journey_date`, `status`, `trip_id`, `package_id`, `user_id`) VALUES
(1, 'United Kingdom', 1, 9876543210, 200000, '2021-04-15', 'cancelled', 0, 2, 1),
(2, 'New Delhi', 3, 9876543210, 7500, '2021-04-23', 'pending', 1, 0, 1),
(3, 'Tamil Nadu', 2, 9876543210, 36000, '2021-04-14', 'pending', 3, 0, 2),
(4, 'Australia', 2, 987546215, 300000, '2021-04-15', 'pending', 0, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `p_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `places_covered` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint(20) NOT NULL DEFAULT 0,
  `image` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`p_id`, `name`, `description`, `places_covered`, `price`, `image`) VALUES
(1, 'Bali', 'Bali appeals through its sheer natural beauty of looming volcanoes and lush terraced rice fields that exude peace and serenity. Bali enchants with its dramatic dances and colorful ceremonies, its arts and crafts, to its luxurious beach resorts and exciting nightlife.', 'Pura Tanah Lot, Mount Batur, Uluwatu Temple, Ubud Monkey Forest, Ubud Art & Culture, Tegallalang and Jatiluwih Rice Terraces in Bali', 180000, 'img-1.jpg'),
(2, 'United Kingdom', 'The United Kingdom made up of England, Scotland, Wales, and Northern Ireland is an island nation in northwestern Europe. England – the birthplace of Shakespeare and The Beatles – is home to the capital, London, a globally influential center of finance and culture.', 'London, Edinburgh, Roman-era Bath, Ancient Stonehenge and Medieval Salisbury, Wonderful Windsor, Idyllic England, Liverpool and Manchester', 200000, 'img-2.jpg'),
(3, 'Australia', 'Australia is a land of dreams. From the sacred legends of the aboriginal Dreamtime, when the great spirits conjured the coral reefs, rainforests, and scorched red deserts, to armchair travelers who describe Australia as their dream destination, the Land Down Under deserves all the hype.', 'Sydney Opera House, Great Barrier Reef Marine Park, Uluru-Kata Tjuta National Park, Sydney Harbour Bridge,  Blue Mountains National Park', 150000, 'img-3.jpg'),
(4, 'Singapore', 'Singapore is a wealthy city-state in south-east Asia. Once a British colonial trading post, today it is a thriving global financial hub and described as one of Asia economic tigers. It is also renowned for its conservatism and strict local laws and the country prides itself on its stability and security', 'Singapore Flyer, Night Safari Nocturnal Wildlife Park, Marina Bay, Sentosa Island, River Safari Singapore, Sentosa Merlion Tower, China Town', 230000, 'img-4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE `tours` (
  `t_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `places_covered` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint(20) NOT NULL DEFAULT 0,
  `image` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`t_id`, `name`, `description`, `places_covered`, `price`, `image`) VALUES
(1, 'New Delhi', 'New Delhi, the national capital of India. It is situated in the north-central part of the country on the west bank of the Yamuna River, adjacent to and just south of Delhi city (Old Delhi) and within the Delhi national capital territory.', 'India Gate, Humayun Tomb, Hauz Khas, Qutab Minar, Red Fort, Akshardham Temple, Connaught Place\r\n\r\n', 2500, 'img-1.jpg'),
(2, 'Kerala', 'Kerala, a state in Southern India is known as a tropical paradise of waving palms and wide sandy beaches. It is a narrow strip of coastal territory that slopes down the Western Ghats in a cascade of lush green vegetation and reaches the Arabian sea.', 'Alleppey, Cochin, Munnar, Kovalam, Thrissur, TATA Tea Museum, Anamudi, Chinnar Wildlife Sanctuary, Santa Cruz Basilica, ', 20000, 'img-2.jpg'),
(3, 'Tamil Nadu', 'Tamil Nadu, a South Indian state, is famed for its Dravidian-style Hindu temples. In Madurai, Meenakshi Amman Temple has high ‘gopuram’ towers ornamented with colorful figures. ', 'Chennai, Ooty, Pondicherry, Kodaikanal, Mahabalipuram, Coonoor, Kanyakumari, Nilgiris, Vedanthangal Bird Sanctuary ', 18000, 'img-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `alternate_mobile` bigint(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(20) NOT NULL,
  `pincode` int(10) NOT NULL,
  `role_as` varchar(10) NOT NULL DEFAULT 'user',
  `image` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `name`, `gender`, `mobile`, `alternate_mobile`, `email`, `address`, `city`, `pincode`, `role_as`, `image`, `password`) VALUES
(1, 'admin', 'one', 'admin', 'male', 9876643205, 9875463210, 'admin@adminmail.com', 'Temple Street Near Bank', 'Eluru', 584662, 'admin', 'admin-img.png', '12345678'),
(2, 'user', 'one', 'User One', 'male', 9876543215, 9985647210, 'user@usermail.com', 'Bank Street, Ashok Nagar', 'Hyderabad', 547896, 'user', 'admin-image.jpg', '12345678'),
(3, 'Tuta Sri Sai', 'Kailash', 'Kailash Tuta', '', 0, 0, 'kailashtuta2000@gmail.com', '', '', 0, 'admin', '', '12345678'),
(4, 'User', 'Two', 'User Two', '', 0, 0, 'user2@usermail.com', '', '', 0, 'user', '', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `p_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
  MODIFY `t_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
