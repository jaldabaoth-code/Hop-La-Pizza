--
-- Table structure for table `category`
--
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
    `id` int NOT NULL AUTO_INCREMENT,
    `name` varchar(255) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `category` WRITE;
INSERT INTO `category` VALUES (1,'pizza'),(2,'boisson'),(3,'dessert');
UNLOCK TABLES;

--
-- Table structure for table `dish`
--
DROP TABLE IF EXISTS `dish`;
CREATE TABLE `dish` (
    `id` int NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `description` varchar(45) DEFAULT NULL,
    `price` float NOT NULL,
    `image` varchar(255) NOT NULL,
    `category_id` int NOT NULL,
    PRIMARY KEY (`id`),
    KEY `fk_dish_1_idx` (`category_id`),
    CONSTRAINT `fk_dish_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
