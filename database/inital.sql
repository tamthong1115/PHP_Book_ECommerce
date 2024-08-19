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
  `deleted_at` timestamp
);
CREATE TABLE `addresses` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `user_id` integer,
  `address_line_1` varchar(255),
  `address_line_2` varchar(255),
  `city` varchar(255),
  `created_at` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `deleted_at` timestamp
);
CREATE TABLE `categories` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(100),
  `description` varchar(255),
  `parent_id` integer,
  `created_at` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `deleted_at` timestamp
);
CREATE TABLE `book_categories` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `book_id` integer NOT NULL,
  `category_id` integer NOT NULL,
  `created_at` timestamp DEFAULT (CURRENT_TIMESTAMP)
);
CREATE TABLE `books` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  `summary` varchar(255),
  `price` decimal(10, 2) NOT NULL,
  `stock` integer NOT NULL,
  `author` varchar(100) NOT NULL,
  `publisher` varchar(100),
  `supplier` varchar(100),
  `weight` decimal(10, 2),
  `language` varchar(50) NOT NULL,
  `publication_year` integer NOT NULL,
  `format` varchar(50) NOT NULL,
  `pages` integer NOT NULL,
  `created_at` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `deleted_at` timestamp
);
CREATE TABLE `book_images` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `book_id` integer,
  `image_url` varchar(255),
  `created_at` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `deleted_at` timestamp
);
CREATE TABLE `wishlist` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `user_id` integer,
  `book_id` integer,
  `created_at` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `deleted_at` timestamp
);
CREATE TABLE `cart` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `user_id` integer UNIQUE,
  `total` decimal(10, 2),
  `created_at` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `updated_at` timestamp
);
CREATE TABLE `cart_item` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `cart_id` integer,
  `book_id` integer,
  `quantity` integer,
  `created_at` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `updated_at` timestamp
);
CREATE TABLE `order_details` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `user_id` integer,
  `payment_id` integer,
  `total` decimal(10, 2),
  `status` varchar(50) NOT NULL,
  `order_subtotal` decimal(10, 2) NOT NULL,
  `discounts_total` decimal(10, 2) DEFAULT 0,
  `created_at` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `updated_at` timestamp,
  `deleted_at` timestamp
);
CREATE TABLE `order_item` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `order_id` integer,
  `book_id` integer,
  `quantity` integer,
  `price` decimal(10, 2) NOT NULL,
  `created_at` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `updated_at` timestamp
);
CREATE TABLE `payment_details` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `order_id` integer,
  `amount` decimal(10, 2),
  `provider` varchar(255),
  `status` varchar(255),
  `created_at` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `updated_at` timestamp
);
CREATE TABLE `reviews` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `user_id` integer,
  `book_id` integer,
  `rating` integer NOT NULL,
  `comment` text,
  `created_at` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `deleted_at` timestamp
);
CREATE TABLE `discounts` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `order_id` integer,
  `discount_amount` decimal(10, 2) NOT NULL,
  `description` varchar(255),
  `expires_at` timestamp,
  `created_at` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `deleted_at` timestamp
);
CREATE TABLE `discount_books` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `discount_id` integer NOT NULL,
  `book_id` integer NOT NULL,
  `created_at` timestamp DEFAULT (CURRENT_TIMESTAMP),
  FOREIGN KEY (`discount_id`) REFERENCES `discounts` (`id`),
  FOREIGN KEY (`book_id`) REFERENCES `books` (`id`)
);
ALTER TABLE `addresses`
ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
ALTER TABLE `book_categories`
ADD FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);
ALTER TABLE `book_categories`
ADD FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
ALTER TABLE `book_images`
ADD FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);
ALTER TABLE `wishlist`
ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
ALTER TABLE `wishlist`
ADD FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);
ALTER TABLE `cart`
ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
ALTER TABLE `cart_item`
ADD FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`);
ALTER TABLE `cart_item`
ADD FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);
ALTER TABLE `order_details`
ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
ALTER TABLE `order_details`
ADD FOREIGN KEY (`payment_id`) REFERENCES `payment_details` (`id`);
ALTER TABLE `order_item`
ADD FOREIGN KEY (`order_id`) REFERENCES `order_details` (`id`);
ALTER TABLE `order_item`
ADD FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);
ALTER TABLE `payment_details`
ADD FOREIGN KEY (`order_id`) REFERENCES `order_details` (`id`);
ALTER TABLE `reviews`
ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
ALTER TABLE `reviews`
ADD FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);
ALTER TABLE `discounts`
ADD FOREIGN KEY (`order_id`) REFERENCES `order_details` (`id`);
ALTER TABLE cart_item ADD UNIQUE KEY unique_cart_book (cart_id, book_id);