DROP TABLE member;
DROP TABLE textbook;

CREATE TABLE member (
	id			serial,
	login_name	varchar UNIQUE,
	pwd			varchar NOT NULL,
	PRIMARY KEY	(id)
);

INSERT INTO member(login_name,pwd)VALUES('suzuki', 'psuzuki');

CREATE TABLE textbook (
	id			serial,
	name   		varchar NOT NULL,
	price		int NOT NULL,
	PRIMARY KEY	(id)
);

INSERT INTO textbook(name, price)VALUES('ネットワーク工学','2000');
INSERT INTO textbook(name, price)VALUES('ネットワーク工学','2000');
INSERT INTO textbook(name, price)VALUES('ネットワーク工学','2000');
INSERT INTO textbook(name, price)VALUES('ネットワーク工学','2000');
INSERT INTO textbook(name, price)VALUES('ネットワーク工学','2000');
INSERT INTO textbook(name, price)VALUES('ネットワーク工学','2000');
INSERT INTO textbook(name, price)VALUES('ネットワーク工学','2000');
INSERT INTO textbook(name, price)VALUES('ネットワーク工学','2000');
INSERT INTO textbook(name, price)VALUES('ネットワーク工学','2000');
INSERT INTO textbook(name, price)VALUES('ネットワーク工学','2000');
INSERT INTO textbook(name, price)VALUES('ネットワーク工学','2000');
INSERT INTO textbook(name, price)VALUES('ネットワーク工学','2000');
INSERT INTO textbook(name, price)VALUES('ネットワーク工学','2000');
INSERT INTO textbook(name, price)VALUES('ネットワーク工学','2000');
INSERT INTO textbook(name, price)VALUES('ネットワーク工学','2000');
INSERT INTO textbook(name, price)VALUES('ネットワーク工学','2000');
INSERT INTO textbook(name, price)VALUES('ネットワーク工学','2000');
INSERT INTO textbook(name, price)VALUES('ネットワーク工学','2000');
INSERT INTO textbook(name, price)VALUES('ネットワーク工学','2000');
INSERT INTO textbook(name, price)VALUES('ネットワーク工学','2000');
INSERT INTO textbook(name, price)VALUES('ネットワーク工学','2000');
INSERT INTO textbook(name, price)VALUES('ネットワーク工学','2000');
INSERT INTO textbook(name, price)VALUES('ネットワーク工学','2000');
INSERT INTO textbook(name, price)VALUES('ネットワーク工学','2000');
INSERT INTO textbook(name, price)VALUES('ネットワーク工学','2000');
INSERT INTO textbook(name, price)VALUES('ネットワーク工学','2000');
