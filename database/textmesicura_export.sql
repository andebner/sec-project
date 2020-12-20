-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 20. Dez 2020 um 19:51
-- Server-Version: 10.4.11-MariaDB
-- PHP-Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `textmesicura`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `comments`
--

CREATE TABLE `comments` (
  `cid` bigint(20) NOT NULL,
  `mid` bigint(20) NOT NULL,
  `user` text NOT NULL,
  `comment` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `comments`
--

INSERT INTO `comments` (`cid`, `mid`, `user`, `comment`) VALUES
(1, 1, 'lagu', 'A chi non piace la pizza? :)'),
(2, 2, 'luro', 'I am doing good, thank you! Merry Chirstmas to all!'),
(3, 1, 'hevi', 'A me piace!'),
(4, 2, 'hevi', '&lt;script&gt;alert(&quot;it does not work!&quot;)&lt;/script&gt;');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `messages`
--

CREATE TABLE `messages` (
  `mid` bigint(20) NOT NULL,
  `user` text NOT NULL,
  `message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `messages`
--

INSERT INTO `messages` (`mid`, `user`, `message`) VALUES
(1, 'luro', 'Ciao, sono Luigi e mi piace la pizza!'),
(2, 'lagu', 'Hi, I am Laura! I hope you are all doing well!'),
(4, 'hevi', 'Ciao, sono Helena e mi piace leggere!'),
(5, 'hevi', '&lt;script&gt;alert(&quot;XSS attack gets saved as message but not executed!&quot;)&lt;/script&gt;');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `uid` bigint(20) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `password` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`uid`, `firstname`, `lastname`, `username`, `email`, `password`) VALUES
(1, 'Luigi', 'Rossi', 'luro', 'luro@gmail.com', '$2y$10$D8k4bf7zNxirPSUdi/TXQuQSKuyw/ah8kYznu2NTtTcvuxZOuPZYm'),
(2, 'Lara', 'Gufler', 'lagu', 'lagu@gmail.com', '$2y$10$Md.8n7bwwAa.dWmz4yKxk.uP6cVaY9c4yhhbaFYXsVct06Fe6V2ie'),
(3, 'Helena', 'Vinci', 'hevi', 'hevi@gmail.com', '$2y$10$842ksConw8XSs9twUu9gMO.OAAvpV.hdormPxBJvhAHZX04dttpje');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`cid`);

--
-- Indizes für die Tabelle `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`mid`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `comments`
--
ALTER TABLE `comments`
  MODIFY `cid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `messages`
--
ALTER TABLE `messages`
  MODIFY `mid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `uid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
