-- phpMyAdmin SQL Dump
-- version 4.0.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 29, 2016 at 04:38 PM
-- Server version: 5.5.47
-- PHP Version: 5.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cl10-stockdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE IF NOT EXISTS `stocks` (
  `stock_name` varchar(30) NOT NULL,
  `img_link` varchar(300) NOT NULL,
  `stock_abbr` varchar(20) NOT NULL,
  PRIMARY KEY (`stock_name`),
  KEY `stock_name` (`stock_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`stock_name`, `img_link`, `stock_abbr`) VALUES
('Amazon', 'http://logok.org/wp-content/uploads/2015/01/Amazon-logo.png', 'AMAZON'),
('Apple Inc', 'http://vignette2.wikia.nocookie.net/logopedia/images/2/26/Apple_2003_logo.png/revision/latest?cb=20121102224024', 'AAPL'),
('Expedia', 'http://logok.org/wp-content/uploads/2014/10/Expedia-logo-and-wordmark.png', 'EXPE'),
('Facebook', 'http://beach-aruba.com/wordpress/wp-content/uploads/2010/12/facebook-logo.png\r\n\r\n', 'FB'),
('Google', 'http://www.designbolts.com/wp-content/uploads/2013/09/Free-Google-Font-Logo-Catull-BQ-Download.jpg', 'GOOG'),
('HPE', 'https://www.hpe.com/etc/designs/hpeweb/logo.jpg', 'HPE'),
('IBM', 'http://www.7men.nl/wp-content/uploads/2015/12/IBM-banner.jpg', 'IBM'),
('Intel', 'http://www.clustervision.com/sites/default/files/images/intel-logo.preview.jpg', 'INTC'),
('Juniper Networks', 'https://upload.wikimedia.org/wikipedia/commons/4/4c/Logo_of_Juniper_Networks.svg', 'JNPR'),
('Red Hat', 'http://www.v3.co.uk/IMG/471/165471/redhat-logo.jpg', 'RHT');

-- --------------------------------------------------------

--
-- Table structure for table `trans_table`
--

CREATE TABLE IF NOT EXISTS `trans_table` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(20) NOT NULL,
  `tot_price` float NOT NULL,
  `quantity` int(3) NOT NULL,
  `stock_name` varchar(30) NOT NULL,
  `trans_type` varchar(10) NOT NULL,
  PRIMARY KEY (`trans_id`),
  KEY `uname` (`uname`),
  KEY `uname_2` (`uname`),
  KEY `uname_3` (`uname`),
  KEY `stock_name` (`stock_name`),
  KEY `uname_4` (`uname`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `trans_table`
--

INSERT INTO `trans_table` (`trans_id`, `uname`, `tot_price`, `quantity`, `stock_name`, `trans_type`) VALUES
(6, 'seev', 223, 2, 'Intel', 'bought'),
(7, 'seev', 195.64, 2, 'Apple Inc', 'bought'),
(8, 'seev', 195.64, 2, 'Apple Inc', 'bought'),
(9, 'seev', 195.64, 2, 'Apple Inc', 'bought'),
(10, 'seev', 189.66, 2, 'Apple Inc', 'bought'),
(11, 'seev', 93.64, 4, 'Juniper Networks', 'bought'),
(12, 'seev', 294.14, 2, 'IBM', 'bought'),
(13, 'seev', 294.14, 2, 'IBM', 'bought'),
(14, 'seev', 51.09, 3, 'HPE', 'bought'),
(15, 'seev', 189.66, 2, 'Apple Inc', 'bought'),
(16, 'keerthibs', 213.98, 2, 'Expedia', 'bought'),
(17, 'seev', 189.66, 2, 'Apple Inc', 'bought');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `uname` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `type` tinyint(1) NOT NULL,
  `email` text NOT NULL,
  `useramt` float NOT NULL,
  PRIMARY KEY (`uname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`fname`, `lname`, `uname`, `password`, `type`, `email`, `useramt`) VALUES
('Admin', 'Share', 'admin', '3c06de9a3b902c43471e9465f931d120', 2, 'admin@gmail.com', 1000),
('Astha', 'D', 'astha', '80391cf0e4452365eb63b9155366a39f', 1, 'astha@gmail.com', 1000),
('Keerthi', 'bs', 'keerthibs', '9fa76cb9c2f9cdcd7843a96cfd2471bd', 1, 'keerthibs@yahoo.com', 987),
('Keerthi', 'BS', 'kvbs', 'c692c575bf8e819f97a5bd381aaaa56e', 1, 'keerthi@gmail.com', 1000),
('ram', 'Kumar', 'ramkum', '6a43b945b73514d964537efaee952386', 1, 'ram@gmail.com', 1000),
('Seevagan', 'CS', 'seev', '120716b1da37557514ec9cab8b4e28e4', 1, 'seevagancs@gmail.com', 5000),
('Test', 'TestN', 'utest', 'pwd', 0, 'keerthi@gmail.com', 0),
('Vijay', 'Kumar', 'vj', 'f0bcfcb0b5c750a9c7a3cabf5f1d9f5b', 1, 'vijay@gmail.com', 1000);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `trans_table`
--
ALTER TABLE `trans_table`
  ADD CONSTRAINT `trans_table_ibfk_2` FOREIGN KEY (`stock_name`) REFERENCES `stocks` (`stock_name`),
  ADD CONSTRAINT `trans_table_ibfk_1` FOREIGN KEY (`uname`) REFERENCES `users` (`uname`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
