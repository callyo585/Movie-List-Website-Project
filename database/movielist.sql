CREATE TABLE movielist (
movieId INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(50) NOT NULL,
yearShow INT(30) NOT NULL,
genre VARCHAR(15) NOT NULL,
cover VARCHAR(50) NOT NULL,
synopsis VARCHAR(100) NOT NULL
);

INSERT INTO movielist (title, yearShow, genre, cover, synopsis) VALUES ('The Avengers', '2012', 'ACTION', '/../AAA/cover/avengers.jpg', 'Loki strikes.');
INSERT INTO movielist (title, yearShow, genre, cover, synopsis) VALUES ('The Avengers: Age of Ultron', '2012', 'ACTION', '/../AAA/cover/avengers2.jpg', 'Ultron strikes.');
INSERT INTO movielist (title, yearShow, genre, cover, synopsis) VALUES ('Iron Man', '2008', 'ACTION', '/../AAA/cover/ironman.jpg', 'Iron Man emerges.');
INSERT INTO movielist (title, yearShow, genre, cover, synopsis) VALUES ('Iron Man 2', '2010', 'ACTION', '/../AAA/cover/ironman2.jpg', 'Electric whip man strikes.');
INSERT INTO movielist (title, yearShow, genre, cover, synopsis) VALUES ('Iron Man 3', '2013', 'ACTION', '/../AAA/cover/ironman3.jpg', 'Many Iron Man emerges.');
INSERT INTO movielist (title, yearShow, genre, cover, synopsis) VALUES ('Captain America: The First Avenger', '2011', 'ACTION', '/../AAA/cover/captainamerica.jpg', 'Captain America emerges.');
INSERT INTO movielist (title, yearShow, genre, cover, synopsis) VALUES ('Captain America: The Winter Soldier', '2014', 'ACTION', '/../AAA/cover/captainamerica2.jpg', 'Hydra strikes.');
INSERT INTO movielist (title, yearShow, genre, cover, synopsis) VALUES ('Captain America: Civil War', '2016', 'ACTION', '/../AAA/cover/captainamerica3.jpg', 'Iron Man strikes.');
INSERT INTO movielist (title, yearShow, genre, cover, synopsis) VALUES ('Thor', '2011', 'ACTION', '/../AAA/cover/thor.jpg', 'Thor emerges.');
INSERT INTO movielist (title, yearShow, genre, cover, synopsis) VALUES ('Thor: The Dark World', '2013', 'ACTION', '/../AAA/cover/thor2.jpg', 'Aether strikes.');
INSERT INTO movielist (title, yearShow, genre, cover, synopsis) VALUES ('Thor: Ragnarok', '2017', 'ACTION', '/../AAA/cover/thor3.jpg', 'Hella strikes.');
INSERT INTO movielist (title, yearShow, genre, cover, synopsis) VALUES ('Guardians of the Galaxy', '2014', 'ACTION', '/../AAA/cover/guardians.jpg', 'Guardians emerge.');
INSERT INTO movielist (title, yearShow, genre, cover, synopsis) VALUES ('Guardians of the Galaxy Vol. 2', '2017', 'ACTION', '/../AAA/cover/guardians2.jpg', 'Guardians emerge again.');
INSERT INTO movielist (title, yearShow, genre, cover, synopsis) VALUES ('Spider-Man Homecoming', '2017', 'ACTION', '/../AAA/cover/spiderman.jpg', 'Spider-Man emerges.');
INSERT INTO movielist (title, yearShow, genre, cover, synopsis) VALUES ('Ant Man', '2015', 'ACTION', '/../AAA/cover/antman.jpg', 'Ant Man emerges.');
INSERT INTO movielist (title, yearShow, genre, cover, synopsis) VALUES ('Black Panther', '2018', 'ACTION', '/../AAA/cover/blackpanther.jpg', 'Black Panther emerges.');
INSERT INTO movielist (title, yearShow, genre, cover, synopsis) VALUES ('Doctor Strange', '2016', 'ACTION', '/../AAA/cover/drstrange.jpg', 'Doctor Strange emerges.');
INSERT INTO movielist (title, yearShow, genre, cover, synopsis) VALUES ('21st Jump Street', '2012', 'COMEDY', '/../AAA/cover/21jump.jpg', 'The Duo kills it.');
INSERT INTO movielist (title, yearShow, genre, cover, synopsis) VALUES ('Titanic', '1997', 'ROMANCE', '/../AAA/cover/titanic.jpg', 'Titanic sinks.');
