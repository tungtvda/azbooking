-- thêm menu
INSERT INTO `azbk_az`.`menu` (`id`, `img`, `name`, `title`, `keyword`, `description`) VALUES ('16', '/view/admin/Themes/kcfinder/upload/images/danhmuc_tour/848166.jpg', 'Đặt tour', 'Đặt tour', 'Đặt tour', 'Đặt tour');

-- them truong số chỗ
ALTER TABLE `tour` ADD `so_cho` VARCHAR(10) NULL AFTER `price_6`;
-- them name giá
ALTER TABLE `tour` ADD `name_price` VARCHAR(255) NULL AFTER `price_6`, ADD `name_price_2` VARCHAR(255) NULL AFTER `name_price`, ADD `name_price_3` VARCHAR(255) NULL AFTER `name_price_2`, ADD `name_price_4` VARCHAR(255) NULL AFTER `name_price_3`, ADD `name_price_5` VARCHAR(255) NULL AFTER `name_price_4`, ADD `name_price_6` VARCHAR(255) NULL AFTER `name_price_5`;

-- thêm bảng giá theo người
ALTER TABLE `tour` ADD `price_number` VARCHAR(255) NULL AFTER `price_6`, ADD `price_number_2` VARCHAR(255) NULL AFTER `price_number`, ADD `price_number_3` VARCHAR(255) NULL AFTER `price_number_2`, ADD `price_number_4` VARCHAR(255) NULL AFTER `price_number_3`, ADD `price_number_5` VARCHAR(255) NULL AFTER `price_number_4`, ADD `price_number_6` VARCHAR(255) NULL AFTER `price_number_5`;

-- thêm trường code bôking
ALTER TABLE `booking_tour` ADD `code_booking` VARCHAR(100) NULL AFTER `id`;


-- thêm bảng điều khoản

-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 21 Mars 2017 à 10:34
-- Version du serveur :  10.1.9-MariaDB
-- Version de PHP :  5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `azbooking`
--

-- --------------------------------------------------------

--
-- Structure de la table `dieu_khoan`
--

CREATE TABLE `dieu_khoan` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `dieu_khoan`
--

INSERT INTO `dieu_khoan` (`id`, `name`, `content`) VALUES
(1, 'Điều khoản booking online', '<p>\r\n	&nbsp;</p>\r\n<p>\r\n	D&Agrave;NH CHO KH&Aacute;CH H&Agrave;NG ĐĂNG K&Yacute; TR&Ecirc;N TRANG www.azbooking.vn THANH TO&Aacute;N TRỰC TUYẾN:</p>\r\n<p>\r\n	Kh&aacute;ch h&agrave;ng hủy V&eacute; du lịch trong thời điểm ng&agrave;y Thường v&agrave; Lễ Tết theo đ&uacute;ng những qui định tr&ecirc;n, trong trường hợp kh&aacute;ch thanh to&aacute;n trực tuyến, nếu hủy V&eacute; du lịch kh&aacute;ch h&agrave;ng sẽ chịu to&agrave;n bộ ph&iacute; ng&acirc;n h&agrave;ng cho việc thanh to&aacute;n tiền V&eacute; du lịch.</p>\r\n<p>\r\n	Việc ho&agrave;n trả tiền cho kh&aacute;ch sẽ được Azbooking thực hiện ngay sau khi ng&acirc;n h&agrave;ng th&ocirc;ng b&aacute;o tiền đ&atilde; v&agrave;o t&agrave;i khoản của Azbooking .</p>\r\n<p>\r\n	3.&nbsp;&nbsp; Trường hợp bất khả kh&aacute;ng:</p>\r\n<p>\r\n	Nếu chương tr&igrave;nh du lịch bị hủy bỏ hoặc thay đổi bởi một trong hai b&ecirc;n v&igrave; một l&yacute; do bất khả kh&aacute;ng (hỏa hoạn, thời tiết, tai nạn, thi&ecirc;n tai, chiến tranh, ho&atilde;n v&agrave; hủy chuyến của c&aacute;c phương tiện vận chuyển c&ocirc;ng cộng&hellip;), th&igrave; hai b&ecirc;n sẽ kh&ocirc;ng chịu bất kỳ nghĩa vụ bồi ho&agrave;n c&aacute;c tổn thất đ&atilde; xảy ra v&agrave; kh&ocirc;ng chịu bất kỳ tr&aacute;ch nhiệm ph&aacute;p l&yacute; n&agrave;o. Tuy nhi&ecirc;n mỗi b&ecirc;n c&oacute; tr&aacute;ch nhiệm cố gắng tối đa để gi&uacute;p đỡ b&ecirc;n bị thiệt hại nhằm giảm thiểu c&aacute;c tổn thất g&acirc;y ra v&igrave; l&yacute; do bất khả kh&aacute;ng.</p>\r\n<p>\r\n	IV.&nbsp; GI&Aacute; D&Agrave;NH CHO TRẺ EM</p>\r\n<p>\r\n	-&nbsp;&nbsp;&nbsp;&nbsp; Trẻ em dưới 5 tuổi: được miễn ph&iacute; v&eacute; dịch vụ (ăn chung, ngủ chung với cha mẹ). Hai người lớn chỉ được k&egrave;m 1 trẻ em dưới 5 tuổi, em thứ hai trở l&ecirc;n phải mua &frac12; v&eacute;.</p>\r\n<p>\r\n	-&nbsp;&nbsp;&nbsp;&nbsp; Trẻ em từ 5 đến dưới 11 tuổi: mua 50% v&eacute; dịch vụ (ăn ri&ecirc;ng, ngủ chung với người lớn). Hai người lớn chỉ được k&egrave;m 1 trẻ em từ 5 đến dưới 11 tuổi, em thứ hai trở l&ecirc;n sẽ phải mua 01 xuất giường đơn.</p>\r\n<p>\r\n	-&nbsp;&nbsp;&nbsp;&nbsp; Trẻ em từ 11 tuổi trở l&ecirc;n: mua một v&eacute; như người lớn.</p>\r\n<p>\r\n	-&nbsp;&nbsp;&nbsp;&nbsp; V&eacute; m&aacute;y bay, xe lửa, phương tiện vận chuyển c&ocirc;ng cộng: mua v&eacute; theo quy định của của c&aacute;c đơn vị vận chuyển n&agrave;y.</p>\r\n<p>\r\n	V.&nbsp;&nbsp; NHỮNG Y&Ecirc;U CẦU ĐẶC BIỆT TRONG CHUYẾN DU LỊCH</p>\r\n<p>\r\n	C&aacute;c y&ecirc;u cầu đặc biệt của Qu&yacute; kh&aacute;ch phải được b&aacute;o trước cho Azbooking ngay tại thời điểm đăng k&yacute;. Azbooking sẽ cố gắng đ&aacute;p ứng những y&ecirc;u cầu n&agrave;y trong khả năng của m&igrave;nh song sẽ kh&ocirc;ng chịu tr&aacute;ch nhiệm về bất kỳ sự từ chối cung cấp dịch vụ từ ph&iacute;a c&aacute;c nh&agrave; vận chuyển, kh&aacute;ch sạn, nh&agrave; h&agrave;ng v&agrave; c&aacute;c nh&agrave; cung cấp dịch vụ độc lập kh&aacute;c.</p>\r\n<p>\r\n	VI.&nbsp; KH&Aacute;CH SẠN</p>\r\n<p>\r\n	Kh&aacute;ch sạn được cung cấp tr&ecirc;n cơ sở những ph&ograve;ng c&oacute; hai giường đơn (TWN) hoặc một giường đ&ocirc;i (DBL) t&ugrave;y theo cơ cấu ph&ograve;ng của c&aacute;c kh&aacute;ch sạn. Kh&aacute;ch sạn do Azbooking đặt cho c&aacute;c chương tr&igrave;nh tham quan c&oacute; ti&ecirc;u chuẩn tương ứng với c&aacute;c mức gi&aacute; v&eacute; m&agrave; kh&aacute;ch chọn khi đăng k&yacute; đi du lịch. Nếu cần thiết thay đổi về bất kỳ l&yacute; do n&agrave;o, kh&aacute;ch sạn thay thế sẽ tương đương với ti&ecirc;u chuẩn của kh&aacute;ch sạn ban đầu v&agrave; sẽ được b&aacute;o cho du kh&aacute;ch trước khi khởi h&agrave;nh. Những y&ecirc;u cầu đặc biệt của kh&aacute;ch h&agrave;ng nếu th&ocirc;ng b&aacute;o trước cho Azbooking sẽ được đ&aacute;p ứng t&ugrave;y theo khả năng cung cấp của kh&aacute;ch sạn v&agrave; kh&aacute;ch h&agrave;ng phải trả th&ecirc;m tiền đối với c&aacute;c y&ecirc;u cầu n&agrave;y (nếu c&oacute;). Azbookingc&oacute; quyền kh&ocirc;ng đ&aacute;p ứng những y&ecirc;u cầu n&agrave;y nếu kh&aacute;ch sạn từ chối cung cấp dịch vụ.</p>\r\n<p>\r\n	Giờ nhận ph&ograve;ng tại c&aacute;c kh&aacute;ch sạn l&agrave; sau 14:00 v&agrave; phải trả ph&ograve;ng theo quy định của kh&aacute;ch sạn l&agrave; trước 12:00.</p>\r\n<p>\r\n	Đối với c&aacute;c trường hợp kh&aacute;ch lưu tr&uacute; tại hệ thống kh&aacute;ch sạn 5 sao (Vinpearl Nha Trang, Vinpearl Ph&uacute; Quốc, Grand Ho Tram Strip&hellip;) tu&acirc;n thủ theo điều kiện hủy phạt của kh&aacute;ch sạn cho từng thời điểm.</p>\r\n<p>\r\n	VII. VẬN CHUYỂN</p>\r\n<p>\r\n	Phương tiện vận chuyển t&ugrave;y thuộc theo từng chương tr&igrave;nh du lịch.</p>\r\n<p>\r\n	Với chương tr&igrave;nh đi bằng xe: xe m&aacute;y lạnh (4, 7, 15, 25, 35, 45 chỗ) sẽ được Azbooking sắp xếp t&ugrave;y theo số lượng kh&aacute;ch từng đo&agrave;n, phục vụ suốt chương tr&igrave;nh tham quan.</p>\r\n<p>\r\n	Với chương tr&igrave;nh đi bằng xe lửa &ndash; m&aacute;y bay &ndash; t&agrave;u c&aacute;nh ngầm (phương tiện vận chuyển c&ocirc;ng cộng), trong một số chương tr&igrave;nh c&aacute;c nh&agrave; cung cấp dịch vụ c&oacute; thể thay đổi giờ khởi h&agrave;nh m&agrave; kh&ocirc;ng b&aacute;o trước, việc thay đổi n&agrave;y sẽ được Azbooking th&ocirc;ng b&aacute;o cho kh&aacute;ch h&agrave;ng nếu thời gian cho ph&eacute;p.</p>\r\n<p>\r\n	Azbooking kh&ocirc;ng chịu tr&aacute;ch nhiệm bồi ho&agrave;n v&agrave; tr&aacute;ch nhiệm ph&aacute;p l&yacute; với những thiệt hại về vật chất lẫn tinh thần do việc chậm trễ giờ giấc khởi h&agrave;nh của c&aacute;c phương tiện vận chuyển c&ocirc;ng cộng hoặc sự chậm trễ do ch&iacute;nh h&agrave;nh kh&aacute;ch g&acirc;y ra. Azbooking chỉ thực hiện h&agrave;nh vi gi&uacute;p đỡ để giảm bớt tổn thất cho h&agrave;nh kh&aacute;ch.</p>\r\n<p>\r\n	VIII.H&Agrave;NH L&Yacute;</p>\r\n<p>\r\n	H&agrave;nh l&yacute; gọn nhẹ, với c&aacute;c chương tr&igrave;nh sử dụng dịch vụ h&agrave;ng kh&ocirc;ng, h&agrave;nh l&yacute; miễn cước sẽ do c&aacute;c h&atilde;ng h&agrave;ng kh&ocirc;ng qui định.</p>\r\n<p>\r\n	Azbooking kh&ocirc;ng chịu tr&aacute;ch nhiệm về sự thất lạc, hư hỏng h&agrave;nh l&yacute; hoặc bất kỳ vật dụng g&igrave; của du kh&aacute;ch trong suốt chuyến đi, du kh&aacute;ch tự bảo quản h&agrave;nh l&yacute; của m&igrave;nh. Nếu kh&aacute;ch h&agrave;ng bị mất hay thất lạc h&agrave;nh l&yacute; th&igrave; Azbooking sẽ gi&uacute;p h&agrave;nh kh&aacute;ch li&ecirc;n lạc v&agrave; khai b&aacute;o với c&aacute;c bộ phận li&ecirc;n quan truy t&igrave;m h&agrave;nh l&yacute; bị mất hay thất lạc. Việc bồi thường h&agrave;nh l&yacute; bị mất hay thất lạc sẽ theo qui định của c&aacute;c đơn vị cung cấp dịch vụ hoặc c&aacute;c đơn vị bảo hiểm (nếu c&oacute;).</p>\r\n<p>\r\n	IX.&nbsp; BẢO HIỂM DU LỊCH</p>\r\n<p>\r\n	Gi&aacute; dịch vụ du lịch trọn g&oacute;i đ&atilde; bao gồm bảo hiểm với mức đền b&ugrave; cao nhất l&agrave; 60.000.000đ/kh&aacute;ch Việt Nam (đi du lịch trong nước).</p>\r\n<p>\r\n	Việc bồi thường (nếu c&oacute;) sẽ do đơn vị bảo hiểm thực hiện theo đ&uacute;ng quy định &ndash; qui tắc bảo hiểm d&agrave;nh cho kh&aacute;ch đi du lịch trong nước.</p>\r\n<p>\r\n	X.&nbsp;&nbsp; TIẾP NHẬN TH&Ocirc;NG TIN VỀ CHƯƠNG TR&Igrave;NH DU LỊCH</p>\r\n<p>\r\n	Trước khi đăng k&yacute;, kh&aacute;ch h&agrave;ng vui l&ograve;ng đọc kỹ chương tr&igrave;nh, gi&aacute; v&eacute; du lịch, c&aacute;c khoản bao gồm cũng như kh&ocirc;ng bao gồm trong chương tr&igrave;nh. Kh&aacute;ch h&agrave;ng c&oacute; thể trực tiếp hoặc nhờ người đại diện đến đăng k&yacute; đi du lịch v&agrave; thanh to&aacute;n tiền v&eacute; tại c&aacute;c văn ph&ograve;ng, chi nh&aacute;nh của c&ocirc;ng ty Azbooking. Azbookingchỉ c&oacute; tr&aacute;ch nhiệm cung cấp th&ocirc;ng tin của chuyến đi cho kh&aacute;ch h&agrave;ng đến đăng k&yacute; trực tiếp hoặc cho người đại diện. Azbookingkh&ocirc;ng chịu bất cứ tr&aacute;ch nhiệm n&agrave;o trong trường hợp người đại diện kh&ocirc;ng cung cấp lại hoặc cung cấp kh&ocirc;ng ch&iacute;nh x&aacute;c c&aacute;c th&ocirc;ng tin của chuyến đi cho kh&aacute;ch h&agrave;ng.</p>\r\n<p>\r\n	XI.&nbsp; TR&Aacute;CH NHIỆM V&Agrave; C&Aacute;C CAM KẾT KH&Aacute;C</p>\r\n<p>\r\n	1.&nbsp;&nbsp;&nbsp; Về ph&iacute;a c&ocirc;ng ty Azbooking:</p>\r\n<p>\r\n	-&nbsp;&nbsp;&nbsp;&nbsp; Đảm bảo đầy đủ mọi dịch vụ theo đ&uacute;ng như chương tr&igrave;nh.</p>\r\n<p>\r\n	-&nbsp;&nbsp;&nbsp;&nbsp; Phổ biến đầy đủ c&aacute;c th&ocirc;ng tin cần biết, c&aacute;c qui định khi đi du lịch trong v&agrave; ngo&agrave;i nước trước ng&agrave;y khởi h&agrave;nh.</p>\r\n<p>\r\n	-&nbsp;&nbsp;&nbsp;&nbsp; Trường hợp c&aacute;c dịch vụ (nh&agrave; h&agrave;ng, kh&aacute;ch sạn, phương tiện vận chuyển&hellip;) kh&ocirc;ng bảo đảm c&aacute;c ti&ecirc;u chuẩn như đ&atilde; thoả thuận cung cấp ban đầu v&agrave; được x&aacute;c định l&agrave; do lỗi của Azbooking, Azbooking sẽ chịu tr&aacute;ch nhiệm bồi thường cho kh&aacute;ch h&agrave;ng 10% gi&aacute; trị của mỗi dịch vụ kh&ocirc;ng đ&uacute;ng ti&ecirc;u chuẩn đ&oacute;.</p>\r\n<p>\r\n	-&nbsp;&nbsp;&nbsp;&nbsp; C&ocirc;ng ty xuất h&oacute;a đơn cho Qu&yacute; kh&aacute;ch c&oacute; nhu cầu (Hạn ch&oacute;t: sau 07 ng&agrave;y kết th&uacute;c chuyến du lịch).</p>\r\n<p>\r\n	2.&nbsp;&nbsp;&nbsp; Về ph&iacute;a kh&aacute;ch h&agrave;ng:</p>\r\n<p>\r\n	-&nbsp;&nbsp;&nbsp;&nbsp; Thanh to&aacute;n đầy đủ đ&uacute;ng hạn.</p>\r\n<p>\r\n	-&nbsp;&nbsp;&nbsp;&nbsp; Trong thời gian đi du lịch, kh&aacute;ch h&agrave;ng phải tu&acirc;n thủ theo chương tr&igrave;nh, kh&ocirc;ng được tự &yacute; t&aacute;ch đo&agrave;n. Nếu c&oacute; y&ecirc;u cầu thay đổi phải th&ocirc;ng b&aacute;o cho hướng dẫn vi&ecirc;n hoặc đại diện của Azbooking .</p>\r\n<p>\r\n	-&nbsp;&nbsp;&nbsp;&nbsp; Mang theo đầy đủ c&aacute;c giấy tờ t&ugrave;y th&acirc;n khi đi du lịch như Chứng Minh Thư, Hộ Chiếu, Giấy Khai Sinh (đối với trẻ em), Giấy H&ocirc;n Th&uacute; (đối với kh&aacute;ch h&agrave;ng chỉ mua dịch vụ kh&aacute;ch sạn). Ri&ecirc;ng đối với kh&aacute;ch Việt kiều khi sử dụng Hộ chiếu hoặc Thẻ Xanh, phải đem theo đầy đủ Visa v&agrave; Giấy t&aacute;i xuất nhập Việt Nam.</p>\r\n<p>\r\n	-&nbsp;&nbsp;&nbsp;&nbsp; Trong trường hợp kh&aacute;ch h&agrave;ng dẫn theo trẻ em dưới 15 tuổi (kh&ocirc;ng phải con ruột) đi c&ugrave;ng trong chương tr&igrave;nh, phải mang theo Giấy Ủy Quyền của cha mẹ, c&oacute; x&aacute;c nhận của ch&iacute;nh quyền địa phương.</p>\r\n<p>\r\n	3.&nbsp;&nbsp;&nbsp; T&ugrave;y theo t&igrave;nh h&igrave;nh thực tế, Azbooking&nbsp;giữ quyền thay đổi lộ tr&igrave;nh, sắp xếp lại thứ tự c&aacute;c điểm tham quan hoặc hủy bỏ chuyến đi du lịch bất cứ l&uacute;c n&agrave;o m&agrave; Azbooking&nbsp;thấy cần thiết v&igrave; sự thuận tiện hoặc an to&agrave;n cho kh&aacute;ch h&agrave;ng.</p>\r\n<p>\r\n	4.&nbsp;&nbsp;&nbsp; Trong qu&aacute; tr&igrave;nh thực hiện, nếu xảy ra tranh chấp sẽ được giải quyết tr&ecirc;n cơ sở thương lượng giữa hai b&ecirc;n. Nếu việc thương lượng kh&ocirc;ng đạt được kết quả, vụ việc sẽ được đưa ra t&ograve;a &aacute;n theo đ&uacute;ng qui định của ph&aacute;p luật hiện h&agrave;nh. Mọi chi ph&iacute; li&ecirc;n quan sẽ do b&ecirc;n thua kiện chịu.</p>\r\n');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `dieu_khoan`
--
ALTER TABLE `dieu_khoan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `dieu_khoan`
--
ALTER TABLE `dieu_khoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
