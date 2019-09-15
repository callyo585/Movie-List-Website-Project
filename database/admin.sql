CREATE TABLE adminlist (
adminId INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
loginId VARCHAR(30) NOT NULL,
password VARCHAR(255) NOT NULL,
name VARCHAR(50) NOT NULL
);

INSERT INTO adminlist (loginId, password, name) VALUES ('admin', '81dc9bdb52d04dc20036dbd8313ed055', 'Calvin Leong');
