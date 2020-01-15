CREATE DATABASE finalproject;
USE finalproject;

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL
);


CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `image` text
);

INSERT INTO `products` (`id`, `name`, `type`, `price`, `image`) VALUES
(1, 'Pikachu', 'ice', 6, 'images/img-pro-01.jpg'),
(2, 'ghost', 'ice', 5.5, 'images/img-pro-02.jpg'),
(3, 'Strawberry smoothie', 'ice', 6.5, 'images/img-pro-03.jpg'),
(4, 'sparkling', 'ice', 8.5, 'images/img-pro-04.jpg'),
(5, 'Macaron', 'Cake', 4.3, 'images/macaron.jpg'),
(6, 'Fushigibana', 'coffee', 8.1, 'images/fushigibana.jpg'),
(7, 'Eevee Capuchino', 'coffee', 9, 'images/eevee.jpg');


CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `users` (`id`, `fullName`, `username`, `pass`, `type`) VALUES
(1, 'Mai Thi Nga', 'admin', 'admin', 'admin');

CREATE TABLE `cart` (
  id int(11) NOT NULL,
  idPro int(11) DEFAULT NULL,
  quantity int(11) DEFAULT NULL,
  idUser int(11) DEFAULT NULL,
  FOREIGN KEY (`idPro`) REFERENCES `products` (`id`),
  FOREIGN KEY (`idUser`) REFERENCES `users` (`id`)

);
