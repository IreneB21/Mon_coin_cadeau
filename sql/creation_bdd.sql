-- Création de la BDD
CREATE DATABASE IF NOT EXISTS `liste_envies`;
USE `liste_envies`;

-- Création de la table users
CREATE TABLE IF NOT EXISTS `users` (
    `user_id` int(11) NOT NULL AUTO_INCREMENT,
    `full_name` varchar(64) NOT NULL,
    `email` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    PRIMARY KEY (`user_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Création de la table liste
CREATE TABLE IF NOT EXISTS `liste` (
    `liste_id` int(11) NOT NULL AUTO_INCREMENT,
    `title` varchar(128) NOT NULL,
    `link` TEXT NOT NULL,
    `author` varchar(255) NOT NULL,
    PRIMARY KEY (`recipe_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


delete from `users`;
insert into `users` (`email`, `full_name`, `password`, `user_id`) values ('mickael.andrieu@exemple.com', 'Mickaël Andrieu', 'devine', 1);
insert into `users` (`email`, `full_name`, `password`, `user_id`) values ('mathieu.nebra@exemple.com', 'Mathieu Nebra', 'MiamMiam', 2);
insert into `users` (`email`, `full_name`, `password`, `user_id`) values ('laurene.castor@exemple.com', 'Laurène Castor', 'laCasto28', 3);

delete from `liste`;
insert into `liste` (`author`, `link`, `liste_id`, `title`) values ('mickael.andrieu@exemple.com', 1, "https://www.cadeauxfolies.fr/lampe-led-personnalisee-coeur-avec-mains-et-noms", 1, 'Lampe LED personnalisée');
insert into `liste` (`author`, `link`, `liste_id`, `title`) values ('mickael.andrieu@exemple.com', 0, "https://www.cadeauxfolies.fr/chaussettes-magnetiques-main-dans-la-main", 2, 'Chaussettes magnétiques');
insert into `liste` (`author`, `link`, `liste_id`, `title`) values ('laurene.castor@exemple.com', 0, "https://www.cadeauxfolies.fr/aspirateur-de-table-chat", 4, 'Aspirateur de table chat');
insert into `liste` (`author`, `link`, `liste_id`, `title`) values ('mathieu.nebra@exemple.com', 1, "https://www.cadeauxfolies.fr/porte-rasoir-mr-razor", 3, 'Porte-rasoir');