<?php
  require_once "connection.php";

  $q= "CREATE TABLE IF NOT EXISTS `mreza`.`users` (
      `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
      `username` VARCHAR(50) NOT NULL,
      `pass` VARCHAR(255) NOT NULL,
      PRIMARY KEY (`id`),
      UNIQUE INDEX `username_UNIQUE` (`username` ASC) )
    ENGINE = InnoDB;";

  $q .= "CREATE TABLE IF NOT EXISTS `mreza`.`profiles` (
      `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
      `name` VARCHAR(50) NOT NULL,
      `surname` VARCHAR(50) NOT NULL,
      `gender` CHAR(1) NULL,
      `dob` DATE NULL,
      `users_id` INT UNSIGNED NOT NULL,
      PRIMARY KEY (`id`, `users_id`),
      INDEX `fk_profiles_users_idx` (`users_id` ASC) ,
      CONSTRAINT `fk_profiles_users`
        FOREIGN KEY (`users_id`)
        REFERENCES `mreza`.`users` (`id`)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION)
    ENGINE = InnoDB;";

  $q .= "CREATE TABLE IF NOT EXISTS `mreza`.`followers` (
      `id` INT NOT NULL AUTO_INCREMENT,
      `sender_id` INT UNSIGNED NOT NULL,
      `receiver_id` INT UNSIGNED NOT NULL,
      PRIMARY KEY (`id`, `sender_id`, `receiver_id`),
      INDEX `fk_followers_users1_idx` (`sender_id` ASC) ,
      INDEX `fk_followers_users2_idx` (`receiver_id` ASC) ,
      CONSTRAINT `fk_followers_users1`
        FOREIGN KEY (`sender_id`)
        REFERENCES `mreza`.`users` (`id`)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION,
      CONSTRAINT `fk_followers_users2`
        FOREIGN KEY (`receiver_id`)
        REFERENCES `mreza`.`users` (`id`)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION)     
    ENGINE = InnoDB;";

  if($conn->multi_query($q)) {
      echo "<p>Uspesno izvrsen niz upita</p>";
  }
  else {
      echo "<p>Greska prilikom izvrsenja niza upita: "
              . $conn->error . "</p>";
  }

?>