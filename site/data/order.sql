USE `geek_brains_shop`;

CREATE TABLE `order_status`
(
  `id`     int(11)      NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `status` varchar(255) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

INSERT INTO `order_status` (`status`)
VALUES ('Заказ оформлен');
INSERT INTO `order_status` (`status`)
VALUES ('Заказ собирается');
INSERT INTO `order_status` (`status`)
VALUES ('Заказ готов');
INSERT INTO `order_status` (`status`)
VALUES ('Заказ завершен');
INSERT INTO `order_status` (`status`)
VALUES ('Заказ отменен');

CREATE TABLE `order`
(
  `id`          int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `status_id`   int(11) NOT NULL,
  `user_id`     int(11) NOT NULL,
  `deleted`     tinyint NOT NULL DEFAULT 0,
  `create_data` DATETIME DEFAULT NOW(),
  `change_data` DATETIME DEFAULT NOW()
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

ALTER TABLE `order`
  ADD CONSTRAINT `order_user_id` FOREIGN KEY (`user_id`)
    REFERENCES `users` (`id`)
    ON UPDATE CASCADE
    ON DELETE RESTRICT;

ALTER TABLE `order`
  ADD CONSTRAINT `order_status_id` FOREIGN KEY (`status_id`)
    REFERENCES `order_status` (`id`)
    ON UPDATE CASCADE
    ON DELETE RESTRICT;

CREATE TABLE `order_product`
(
  `id`          int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `order_id`    int(11) NOT NULL,
  `product_id`  int(11) NOT NULL,
  `quantity`    int(11) NOT NULL,
  `fixed_price` double(15, 2) DEFAULT 0,
  `deleted`     tinyint NOT NULL DEFAULT 0,
  `create_data` DATETIME      DEFAULT NOW(),
  `change_data` DATETIME      DEFAULT NOW()
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_order_id` FOREIGN KEY (`order_id`)
    REFERENCES `order` (`id`)
    ON UPDATE CASCADE
    ON DELETE RESTRICT;

ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_product_id` FOREIGN KEY (`product_id`)
    REFERENCES `products` (`id`)
    ON UPDATE CASCADE
    ON DELETE RESTRICT;

DROP TABLE `cart_product`;
DROP TABLE `cart`;