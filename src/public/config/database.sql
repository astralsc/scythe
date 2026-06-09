CREATE TABLE accounts (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(20) NOT NULL UNIQUE,
  displayname VARCHAR(20) NOT NULL UNIQUE,
  email TEXT NOT NULL,
  password VARCHAR(255) NOT NULL,
  dateofbirth DATE NULL DEFAULT NULL,
  gender ENUM('Female','Male') NOT NULL DEFAULT 'Female',
  theme ENUM('Light','Dark') NOT NULL DEFAULT 'Light',
  robux INT UNSIGNED NOT NULL DEFAULT 0,
  tickets INT UNSIGNED NOT NULL DEFAULT 0,
  roblosecurity VARCHAR(1000) NOT NULL UNIQUE,
  isbanned tinyint NOT NULL DEFAULT 0,
  isadmin tinyint NOT NULL DEFAULT 0,
  membershiptype ENUM('None','BuildersClub','TurboBuildersClub','OutrageousBuildersClub','Premium') NOT NULL DEFAULT 'None',
  description TEXT NOT NULL,
  status TEXT NOT NULL,
  userabove13 tinyint NOT NULL DEFAULT 0,
  groups TEXT NOT NULL DEFAULT '',
  inventory TEXT NOT NULL DEFAULT '',
  avatar TEXT NOT NULL DEFAULT '',
  games TEXT NOT NULL DEFAULT '',
  created_at DATETIME NOT NULL,
  updated_at DATETIME NOT NULL
);

CREATE TABLE games (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL UNIQUE,
  description text COLLATE utf8mb4_unicode_ci,
  ip varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  port int(11) DEFAULT NULL,
  owner varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  ownerid int(10) UNSIGNED DEFAULT NULL,
  created_at DATETIME NOT NULL,
  updated_at DATETIME NOT NULL
);