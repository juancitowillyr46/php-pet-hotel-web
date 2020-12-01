ALTER TABLE `db_pet_hotel`.`pet` 
CHANGE COLUMN `is_agressive` `is_agressive` INT(11) NULL DEFAULT NULL ;

ALTER TABLE `db_pet_hotel`.`customer` 
ADD COLUMN `email` VARCHAR(45) NULL DEFAULT NULL AFTER `phone`,
CHANGE COLUMN `address` `address` TEXT NULL DEFAULT NULL ,
CHANGE COLUMN `address_optional` `address_optional` TEXT NULL DEFAULT NULL ,
CHANGE COLUMN `comments` `comments` TEXT NULL DEFAULT NULL ;

ALTER TABLE `db_pet_hotel`.`payment` 
CHANGE COLUMN `screen_voucher` `screen_voucher` LONGTEXT NULL DEFAULT NULL ;

ALTER TABLE `db_pet_hotel`.`kennel` 
CHANGE COLUMN `description` `description` TEXT NULL DEFAULT NULL ;

ALTER TABLE `db_pet_hotel`.`service` 
ADD COLUMN `visible_id` INT(11) NULL DEFAULT NULL AFTER `main`,
ADD COLUMN `plan_id` INT(11) NULL DEFAULT NULL AFTER `visible_id`;

ALTER TABLE `db_pet_hotel`.`kennel` 
CHANGE COLUMN `is_booked` `is_booked` INT(11) NULL DEFAULT NULL ;

ALTER TABLE `db_pet_hotel`.`user` 
CHANGE COLUMN `blocked` `blocked` INT(11) NULL DEFAULT NULL ;


UPDATE db_pet_hotel.user SET blocked = 2;

UPDATE `pet` SET is_agressive = 2;