SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


CREATE TABLE IF NOT EXISTS `users` (
  `User_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` text CHARACTER SET utf8 NOT NULL,
  `User_Email` text CHARACTER SET utf8 NOT NULL,
  `User_Password` text CHARACTER SET utf8 NOT NULL,
  `User_RegDate` date NOT NULL,
  `User_Status` int(11) NOT NULL DEFAULT '0',
  `User_Activation` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`User_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

INSERT INTO `users` (`User_ID`, `Username`, `User_Email`, `User_Password`, `User_RegDate`, `User_Status`, `User_Activation`) VALUES
(15, 'user1', 'user1@ma.il', '4b8eed9166c0b57d42edf493fa9ccb94', '2018-10-08', 1, ''),
(16, 'ABGEO', 'takalandzet@gmail.com', '99cf892727d7fabadf0ddc101385bd37', '2018-10-09', 1, 'd16c9176b3ca8da9a2a445c5fbbfdcde'),
(17, 'ggagosha', 'fobasa@gmail.com', '18bace69e4196eb1c82725a9f15aca5e', '2018-10-13', 0, 'da4e5109b526b345d02975d89ac0feef'),
(18, 'gagosha', 'g.gagoshidze@cu.edu.ge', '18bace69e4196eb1c82725a9f15aca5e', '2018-10-13', 0, '677b6cff2b859a7366b77d9d8f7253f0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
