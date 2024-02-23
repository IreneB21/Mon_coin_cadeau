-- Création de la BDD
CREATE DATABASE IF NOT EXISTS `liste_envies`;
USE `liste_envies`;

-- Création de la table users
CREATE TABLE IF NOT EXISTS `users` (
    `user_id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(250) NOT NULL,
    `email` varchar(500) NOT NULL,
    `password` varchar(255) NOT NULL,
    PRIMARY KEY (`user_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Création de la table listes
CREATE TABLE IF NOT EXISTS `listes` (
    `liste_id` int(11) NOT NULL AUTO_INCREMENT,
    `title` varchar(200) NOT NULL,
    `author` varchar(250) NOT NULL,
    PRIMARY KEY (`recipe_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


delete from `users`;
insert into `users` (`email`, `name`, `password`, `user_id`) values ('john.lebon@exemple.com', 'John Lebon', 'devine', 1);
insert into `users` (`email`, `name`, `password`, `user_id`) values ('myriamb22@exemple.com', 'Myriam', 'MiamMiam', 2);
insert into `users` (`email`, `name`, `password`, `user_id`) values ('laurene.diaz@exemple.com', 'Laurène Diaz', 'laCasto28', 3);

delete from `listes`;
insert into `listes` (`author`, `liste_id`, `title`) values ('John Lebon', 1, 'Anniv Cédric');
insert into `listes` (`author`, `liste_id`, `title`) values ('Laurène Diaz', 2, 'Communion Lisa');
insert into `listes` (`author`, `liste_id`, `title`) values ('Myriam', 3, 'Voyage Chloé');