CREATE DATABASE saulLazaroExamen;

CREATE TABLE ranking (
    ranking_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nIntentos INT NOT NULL,
    nAdivinado INT NOT NULL
) ENGINE=INNODB, CHARSET=utf8;


CREATE DATABASE tunombreExamen;

USE tunombreExamen;

CREATE TABLE ranking (
    ranking_id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nIntentos INTEGER NOT NULL,
    nAdivinado INTEGER NOT NULL
) ENGINE=INNODB CHARSET=utf8;
