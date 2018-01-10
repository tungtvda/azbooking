ALTER TABLE `booking_tour` CHANGE `adults` `num_nguoi_lon` INT(11) NOT NULL;
ALTER TABLE `booking_tour` CHANGE `children_5_10` `num_tre_em_m1` INT(11) NOT NULL;
ALTER TABLE `booking_tour` CHANGE `children_5` `num_tre_em_m2` INT(11) NOT NULL;
ALTER TABLE `booking_tour` ADD `num_tre_em_m3` INT NOT NULL AFTER `num_tre_em_m2`;
ALTER TABLE `booking_tour` CHANGE `price_children` `price_2` VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL;
ALTER TABLE `booking_tour` CHANGE `price_children_under_5` `price_3` VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL;
ALTER TABLE `booking_tour` ADD `price_4` VARCHAR(20) NULL AFTER `price_3`;