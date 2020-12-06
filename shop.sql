
CREATE TABLE `address` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `idUser` int(11) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `wards` varchar(255) DEFAULT NULL,
  `detail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `address` (`idUser`, `fullname`, `phone`, `city`, `district`, `wards`, `detail`) VALUES
( 1, 'Kỳ Nguyễn', '+84344281263', 'Tỉnh Bắc Ninh ', 'Huyện Quế Võ ', 'Xã Việt Thống ', 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Điện Thoại');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `idUser` int(11) DEFAULT NULL,
  `listProduct` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`listProduct`)),
  `idAddress` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `totalPrice` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `describe` varchar(255) DEFAULT NULL,
  `warehouse` int(11) DEFAULT NULL,
  `categoryId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `price`, `describe`, `warehouse`, `categoryId`) VALUES
(1, 'Samsung A71', 'https://didongmogi.com/wp-content/uploads/2020/06/galaxy-a71-trang-didongviet_1_1_1-510x510.jpg', 2900000, 'Một sản phẩm thực sự đột phá, Samsung Galaxy A71 là tổng hòa của những công nghệ cao cấp nhất hiện nay với bộ 4 camera sau 64MP, màn hình 6,7 inch Full HD+ mãn nhãn và thời lượng pin trên cả tuyệt vời.', 4, 1),
(2, 'iPhone 11 Pro Max 64GB', 'https://cdn1.viettelstore.vn/Images/Product/ProductImage/1760267593.jpeg', 26490000, 'Được cho là mẫu điện thoại smartphone cao cấp nhất và tốt nhất ra mắt trong thời điểm này, iPhone 11 Pro Max là smartphone nhiều camera nhất và màn hình lớn nhất tính đến thời điểm hiện tại. Nhờ sở hữu nhiều ưu điểm nổi bật trong thiết kế, màn hình, hệ th', 50, 1),
(3, 'Samsung Galaxy Note20 Ultra 5G', 'https://cdn1.viettelstore.vn/Images/Product/ProductImage/1760267593.jpeg', 29990000, 'Galaxy Note 20 Ultra 5G là chiếc smartphone mạnh mẽ nhất trong bộ ba Galaxy Note 20 Series ra mắt năm nay khi ở phiên bản này, cấu hình cũng như tính năng được nâng cấp rất đặc biệt.', 3, 1),
(4, 'Samsung Galaxy M51', 'https://cdn.tgdd.vn/Products/Images/42/217536/samsung-galaxy-m51-white-400x400-400x400.png', 9490000, 'Samsung lại tiếp tục cho ra mắt chiếc smartphone mới thuộc thế hệ Galaxy M với tên gọi là Samsung Galaxy M51. Thiết kế mới này tuy nằm trong phân khúc tầm trung nhưng được Samsung nâng cấp và cải tiến với camera góc siêu rộng, dung lượng pin siêu khủng cù', 99, 1),
(5, 'iPhone 7 128GB', 'https://cdn.tgdd.vn/Products/Images/42/87837/iphone-7-128gb-4-400x460.png', 8990000, 'iPhone 7 là chiếc smartphone có thiết kế kim loại nguyên khối cuối cùng của Apple, nhưng đồng thời lại sở hữu “hàng tá” tính năng mới xuất hiện lần đầu như: nút home cảm ứng lực, khả năng kháng bụi nước, âm thanh stereo 2 kênh. Và đặc biệt, hiệu năng từ c', 99, 1),
(6, 'Xiaomi Mi Note 10 Lite', 'https://cdn.tgdd.vn/Products/Images/42/220851/xiaomi-mi-note-10-lite-fix-chitiet-400x460.png', 9490000, 'Xiaomi Mi Note 10 Lite là điện thoại thông minh thế hệ Mi Note tiếp theo vừa được Xiaomi chính thức ra mắt vào tháng 5/2020. Máy sở hữu nhiều trang bị hấp dẫn với bộ 4 camera lên đến 64 MP, thiết kế thời trang cùng màn hình AMOLED cong 3D quyến rũ.', 99, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `role` int(11) DEFAULT 0,
  `isAuthenticity` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `phone`, `role`, `isAuthenticity`) VALUES
(1, 'caoky', 'caoky', '0344281263', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
