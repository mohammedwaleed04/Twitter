SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `users` (
  `user_id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT=21,
  `username` varchar(40) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `screenName` varchar(40) NOT NULL,
  `profileImage` varchar(255) NOT NULL,
  `profileCover` varchar(255) NOT NULL,
  `following` int(11) NOT NULL,
  `followers` int(11) NOT NULL,
  `bio` varchar(140) NOT NULL,
  `country` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `securityQuestion` varchar(100) NOT NULL,
  `created_at` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `tweets` (
  `tweetID` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT=7,
  `status` varchar(1000) NOT NULL,
  `tweetBy` int(11) NOT NULL,
  `retweetID` int(11) NOT NULL,
  `retweetBy` int(11) NOT NULL,
  `tweetImage` varchar(255) NOT NULL,
  `likesCount` int(11) NOT NULL,
  `retweetCount` int(11) NOT NULL,
  `postedOn` datetime NOT NULL,
  `retweetMsg` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `comments` (
  `commentID` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT=3,
  `comment` varchar(140) NOT NULL,
  `commentOn` int(11) NOT NULL,
  `commentBy` int(11) NOT NULL,
  `commentAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `follow` (
  `followID` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT=7,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `followOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `likes` (
  `likeID` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT=2,
  `likeBy` int(11) NOT NULL,
  `likeOn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `messages` (
  `messageID` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT=5,
  `message` text NOT NULL,
  `messageTo` int(11) NOT NULL,
  `messageFrom` int(11) NOT NULL,
  `messageOn` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `notification` (
  `ID` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT=10,
  `notificationFor` int(11) NOT NULL,
  `notificationFrom` int(11) NOT NULL,
  `target` int(11) NOT NULL,
  `type` enum('follow','retweet','like','mention') NOT NULL,
  `time` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `trends` (
  `trendID` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT=17,
  `hashtag` varchar(140) NOT NULL,
  `createdOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;