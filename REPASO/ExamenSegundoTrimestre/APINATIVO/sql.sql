CREATE TABLE averias (
    	id integer not null AUTO_INCREMENT PRIMARY KEY,
    	categoria VARCHAR(255) NOT NULL,
    	situacion VARCHAR(255) NOT NULL,
        	titulo VARCHAR(255) NOT NULL,
    		descripcion text NOT NULL,
        	fecha VARCHAR(255) NOT NULL,		
        	hora VARCHAR(255) NOT NULL) ENGINE=INNODB, charset=utf8;