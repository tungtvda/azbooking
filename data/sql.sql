-- thêm menu
INSERT INTO `azbk_az`.`menu` (`id`, `img`, `name`, `title`, `keyword`, `description`) VALUES ('16', '/view/admin/Themes/kcfinder/upload/images/danhmuc_tour/848166.jpg', 'Đặt tour', 'Đặt tour', 'Đặt tour', 'Đặt tour');

-- them truong số chỗ
ALTER TABLE `tour` ADD `so_cho` VARCHAR(10) NULL AFTER `price_6`;
-- them name giá
ALTER TABLE `tour` ADD `name_price` VARCHAR(255) NULL AFTER `price_6`, ADD `name_price_2` VARCHAR(255) NULL AFTER `name_price`, ADD `name_price_3` VARCHAR(255) NULL AFTER `name_price_2`, ADD `name_price_4` VARCHAR(255) NULL AFTER `name_price_3`, ADD `name_price_5` VARCHAR(255) NULL AFTER `name_price_4`, ADD `name_price_6` VARCHAR(255) NULL AFTER `name_price_5`;

-- thêm bảng giá theo người
ALTER TABLE `tour` ADD `price_number` VARCHAR(255) NULL AFTER `price_6`, ADD `price_number_2` VARCHAR(255) NULL AFTER `price_number`, ADD `price_number_3` VARCHAR(255) NULL AFTER `price_number_2`, ADD `price_number_4` VARCHAR(255) NULL AFTER `price_number_3`, ADD `price_number_5` VARCHAR(255) NULL AFTER `price_number_4`, ADD `price_number_6` VARCHAR(255) NULL AFTER `price_number_5`;