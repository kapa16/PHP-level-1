USE `geek_brains_shop`;

CREATE TABLE `users`
(
  `id`          int(11)      NOT NULL,
  `login`       varchar(255) NOT NULL,
  `password`    varchar(255) NOT NULL,
  `name`        varchar(255) NOT NULL,
  `lastname`    varchar(255) NOT NULL,
  `email`       varchar(255) NOT NULL,
  `session_id`  varchar(255),
  `create_date` datetime     NOT NULL DEFAULT NOW(),
  `change_date` datetime     NOT NULL DEFAULT NOW()
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

ALTER TABLE `users`
  ADD UNIQUE INDEX `login` (`login`);

ALTER TABLE `users`
  ADD COLUMN `role` tinyint;


