
-- phpMyAdmin SQL Dump
-- Database: `sarawak_connect`
-- --------------------------------------------------------

CREATE TABLE `users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `articles` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `content` TEXT NOT NULL,
  `category` VARCHAR(50) NOT NULL,
  `image` VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `reading_history` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) NOT NULL,
  `article_id` INT(11) NOT NULL,
  `progress` INT(11) DEFAULT 0,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`article_id`) REFERENCES `articles`(`id`) ON DELETE CASCADE
);

CREATE TABLE `quiz_questions` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `article_id` INT(11) NOT NULL,
  `question` TEXT NOT NULL,
  `correct_answer` VARCHAR(255) NOT NULL,
  `option1` VARCHAR(255) NOT NULL,
  `option2` VARCHAR(255) NOT NULL,
  `option3` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`article_id`) REFERENCES `articles`(`id`) ON DELETE CASCADE
);

-- Insert some example users
INSERT INTO `users` (`username`, `email`, `password`) VALUES
('admin', 'admin@example.com', '$2y$10$examplehashedpassword');

-- Insert some example articles
INSERT INTO `articles` (`title`, `content`, `category`, `image`) VALUES
('The Rich Traditions of the Iban People', 'Content about Iban people...', 'Culture', 'sarawak1.jpg'),
('Gawai Dayak: The Harvest Festival', 'Content about Gawai Festival...', 'Culture', 'sarawak2.jpg'),
('Rainforest World Music Festival', 'Content about the music festival...', 'Events', 'sarawak3.jpg'),
('New Initiatives for Rural Development', 'Content about rural projects...', 'News', 'sarawak4.jpg');

-- Insert some example quizzes
INSERT INTO `quiz_questions` (`article_id`, `question`, `correct_answer`, `option1`, `option2`, `option3`) VALUES
(1, 'Who are the Iban people?', 'An indigenous group in Sarawak', 'A festival', 'A food dish', 'A language'),
(2, 'What is celebrated during Gawai Dayak?', 'Harvest', 'New Year', 'Christmas', 'Wedding'),
(3, 'Where does the Rainforest Music Festival happen?', 'Sarawak', 'Kuala Lumpur', 'Singapore', 'Thailand'),
(4, 'What are rural initiatives focused on?', 'Development', 'Importing cars', 'Fashion', 'Video games');
