-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 02. Mai 2017 um 20:38
-- Server-Version: 10.1.13-MariaDB
-- PHP-Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `film`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tblfavoriten`
--

CREATE TABLE `tblfavoriten` (
  `filmfk` int(11) NOT NULL,
  `userfk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `tblfavoriten`
--

INSERT INTO `tblfavoriten` (`filmfk`, `userfk`) VALUES
(3, 6),
(3, 9),
(3, 10),
(5, 7),
(5, 9),
(5, 10);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tblfilm`
--

CREATE TABLE `tblfilm` (
  `film_id` int(11) NOT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `userfk` int(11) DEFAULT NULL,
  `title` varchar(32) DEFAULT NULL,
  `beschreibung` text,
  `dauer` time DEFAULT NULL,
  `filmname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `tblfilm`
--

INSERT INTO `tblfilm` (`film_id`, `genre`, `userfk`, `title`, `beschreibung`, `dauer`, `filmname`) VALUES
(0, '', 10, '', '', '00:00:00', NULL),
(3, 'Action', 6, 'MMO', 'Action MMO RPG', '00:05:00', '001'),
(4, 'Adwanture', 7, 'Adwenture Maps', 'Maps die dich interesiren', '00:14:20', 'maps'),
(5, 'Horror', 9, 'IN THE WOODS', 'Extremer Horror film auf Deutsch. Ein Spass für die Ganze Familie', '07:37:17', 'woods');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbluser`
--

CREATE TABLE `tbluser` (
  `user_id` int(11) NOT NULL,
  `benutzername` varchar(255) NOT NULL,
  `passwort` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `tbluser`
--

INSERT INTO `tbluser` (`user_id`, `benutzername`, `passwort`, `email`) VALUES
(6, 'patrick', '$2y$10$ngZMZBThaDiZO8hG4puj1.Ejl09R8G78MUfoo5TPydnprVEYwx/uu', 'gartenmannpatick@gmx.ch'),
(7, 'kurt', '$2y$10$BX7m6/fqDOm4fBWEhwoWsOgrcoNuop3.rjWIgGtrHVfjdhwYK3hQC', 'kurt@new.ch'),
(9, 'Bloodwork', '$2y$10$Ilw1cQa1C39LlV9xpMU8AOlmv31qPw40Y/BgpRKx6RWjG4sWuL/3O', 'kristijan3506@gmail.com'),
(10, 'test', '$2y$10$1jtYedDPzX/iIUdhvj.7QutxB6R3G9nY.Bl2JpjEGkbIFvqd3L6Si', 'test@test.ch');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `tblfavoriten`
--
ALTER TABLE `tblfavoriten`
  ADD PRIMARY KEY (`filmfk`,`userfk`);

--
-- Indizes für die Tabelle `tblfilm`
--
ALTER TABLE `tblfilm`
  ADD PRIMARY KEY (`film_id`),
  ADD KEY `genrefk` (`genre`);

--
-- Indizes für die Tabelle `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `id` (`user_id`),
  ADD UNIQUE KEY `passwort` (`passwort`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
