-- Création de la table USER
CREATE TABLE `user` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `user_name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Création de la table LIST
CREATE TABLE `list` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `author` VARCHAR(255) NOT NULL,
    `type` VARCHAR(255) NOT NULL,
    `description` VARCHAR(1000) NOT NULL,
    `user_id` INT NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`user_id`) REFERENCES `user`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Création de la table ITEM
CREATE TABLE `item` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `link` VARCHAR(255) NOT NULL,
    `price` DECIMAL(10,2) NOT NULL,
    `infos` VARCHAR(500),
    `illustration_link` VARCHAR(255),
    `list_id` INT NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`list_id`) REFERENCES `list`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Création de la table COMMENT
CREATE TABLE `comment` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `content` VARCHAR(1000) NOT NULL,
    `created_at` DATE NOT NULL,
    `author` INT NOT NULL,
    `list_id` INT NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`author`) REFERENCES `user`(`id`) ON DELETE CASCADE
    FOREIGN KEY (`list_id`) REFERENCES `list`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
