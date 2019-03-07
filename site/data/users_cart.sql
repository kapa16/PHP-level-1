USE `geek_brains_shop`;

CREATE TABLE `users`
(
  `id`    int(11)      NOT NULL,
  `login`   varchar(255) NOT NULL,
  `password` varchar(255)  NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `session_id` varchar(255),
  `create_date` datetime NOT NULL DEFAULT NOW(),
  `change_date` datetime NOT NULL DEFAULT NOW()
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

ALTER TABLE `users`
  ADD UNIQUE INDEX `login` (`login`);

CREATE TABLE `cart`
(
  `id`    int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user_id`   int(11) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

ALTER TABLE `cart`
  ADD CONSTRAINT `cart_user_id` FOREIGN KEY (`user_id`)
    REFERENCES `users` (`id`)
    ON UPDATE CASCADE
    ON DELETE RESTRICT;

CREATE TABLE `cart_product`
(
  `id`    int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `cart_id`   int(11) NOT NULL,
  `product_id`   int(11) NOT NULL,
  `quantity`   int(11) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

ALTER TABLE `cart_product`
  ADD CONSTRAINT `cart_product_id` FOREIGN KEY (`cart_id`)
    REFERENCES `cart` (`id`)
    ON UPDATE CASCADE
    ON DELETE RESTRICT;