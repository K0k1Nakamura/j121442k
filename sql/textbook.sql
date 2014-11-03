DROP TABLE textbook;

CREATE TABLE textbook (
	id			serial,
	name   		varchar NOT NULL,
	author		varchar,
	price		int NOT NULL,
	comment		varchar,
	pic 		varchar,
	class		varchar,
	university	varchar,
	faculty		varchar,
	department	varchar,
	delivery_method	varchar,
	seller		int,
	PRIMARY KEY	(id)
);

INSERT INTO textbook(
	name,author,price,comment,
	pic,class,university,faculty,department,
	delivery_method,seller
	)VALUES(
	'ネットワークのすべて', '中村晃貴',2000,'折り目あり。しょうてすとのこたえつき',
	'pic.png','ネットワーク工学','慶應義塾大学','理工学部','情報工学科',
	'手渡しのみ',1);

INSERT INTO textbook(
	name,author,price,comment,
	pic,class,university,faculty,department,
	delivery_method,seller
	)VALUES(
	'フーリエ変換', '中村晃貴',20000,'名著。',
	'pic.png','数学','慶應義塾大学','理工学部','',
	'手渡しのみ',1);
INSERT INTO textbook(
	name,author,price,comment,
	pic,class,university,faculty,department,
	delivery_method,seller
	)VALUES(
	'商いについて','中村晃貴',200,'名著。',
	'pic.png','商学','慶應義塾大学','商学部','',
	'手渡しのみ',1);