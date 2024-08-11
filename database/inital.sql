CREATE TABLE `users` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `avatar` varchar(255),
  `first_name` varchar(255),
  `last_name` varchar(255),
  `username` varchar(255) UNIQUE NOT NULL,
  `email` varchar(255) UNIQUE,
  `password` varchar(255) NOT NULL,
  `birth_of_date` date,
  `phone_number` varchar(15),
  `address` varchar(255),
  `isAdmin` boolean DEFAULT false,
  `created_at` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `deleted_at` timestamp NULL DEFAULT NULL
);

CREATE TABLE `addresses` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `user_id` integer,
  `address_line_1` varchar(255),
  `address_line_2` varchar(255),
  `city` varchar(255),
  `created_at` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `deleted_at` timestamp NULL DEFAULT NULL
);

CREATE TABLE `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `author` varchar(100) NOT NULL,
  `publisher` varchar(100) DEFAULT NULL,
  `language` varchar(50) NOT NULL,
  `publication_year` int(11) NOT NULL,
  `format` varchar(50) NOT NULL,
  `pages` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `weight` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `categories` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(100),
  `description` varchar(255),
  `created_at` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `deleted_at` timestamp NULL DEFAULT NULL
);

CREATE TABLE `book_categories` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `category_id` integer NOT NULL,
  `created_at` timestamp DEFAULT (CURRENT_TIMESTAMP),
  FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
);

CREATE TABLE `book_images` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `book_id` integer,
  `image_url` varchar(255),
  `created_at` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `deleted_at` timestamp NULL DEFAULT NULL
);

CREATE TABLE `wishlist` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `user_id` integer,
  `book_id` integer,
  `created_at` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `deleted_at` timestamp NULL DEFAULT NULL
);

CREATE TABLE `cart` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `user_id` integer UNIQUE,
  `total` decimal(10,2),
  `created_at` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `updated_at` timestamp NULL DEFAULT NULL
);

CREATE TABLE `cart_item` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `cart_id` integer,
  `book_id` integer,
  `quantity` integer,
  `created_at` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `updated_at` timestamp NULL DEFAULT NULL
);

CREATE TABLE `order_details` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `user_id` integer,
  `payment_id` integer,
  `total` decimal(10,2),
  `status` varchar(50) NOT NULL,
  `order_subtotal` decimal(10,2) NOT NULL,
  `discounts_total` decimal(10,2) DEFAULT 0,
  `created_at` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
);

CREATE TABLE `order_item` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `order_id` integer,
  `book_id` integer,
  `quantity` integer,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `updated_at` timestamp NULL DEFAULT NULL
);

CREATE TABLE `payment_details` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `order_id` integer,
  `amount` decimal(10,2),
  `provider` varchar(255),
  `status` varchar(255),
  `created_at` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `updated_at` timestamp NULL DEFAULT NULL
);

CREATE TABLE `reviews` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `user_id` integer,
  `book_id` integer,
  `rating` integer NOT NULL,
  `comment` text,
  `created_at` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `deleted_at` timestamp NULL DEFAULT NULL
);

CREATE TABLE `discounts` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `order_id` integer,
  `discount_amount` decimal(10,2) NOT NULL,
  `description` varchar(255),
  `created_at` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `deleted_at` timestamp NULL DEFAULT NULL
);

ALTER TABLE `addresses` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

ALTER TABLE `book_categories` ADD FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);

ALTER TABLE `book_categories` ADD FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

ALTER TABLE `book_images` ADD FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);

ALTER TABLE `wishlist` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

ALTER TABLE `wishlist` ADD FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);

ALTER TABLE `cart` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

ALTER TABLE `cart_item` ADD FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`);

ALTER TABLE `cart_item` ADD FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);

ALTER TABLE `order_details` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

ALTER TABLE `order_details` ADD FOREIGN KEY (`payment_id`) REFERENCES `payment_details` (`id`);

ALTER TABLE `order_item` ADD FOREIGN KEY (`order_id`) REFERENCES `order_details` (`id`);

ALTER TABLE `order_item` ADD FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);

ALTER TABLE `payment_details` ADD FOREIGN KEY (`order_id`) REFERENCES `order_details` (`id`);

ALTER TABLE `reviews` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

ALTER TABLE `reviews` ADD FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);

ALTER TABLE `discounts` ADD FOREIGN KEY (`order_id`) REFERENCES `order_details` (`id`);