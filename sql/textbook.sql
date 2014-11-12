DROP TABLE textbook;

CREATE TABLE textbook (
	id			int,
	name   		varchar NOT NULL,
	author		varchar,
	price		int NOT NULL,
	comment		varchar,
	pic 		varchar,
	class		varchar,
	university	varchar,
	faculty		varchar,
	department	varchar,
	grade		int,
	delivery_method	varchar,
	seller		varchar,
	stock		int,
	PRIMARY KEY	(id)
);

INSERT INTO textbook(
	id,name,author,price,comment,
	pic,class,university,faculty,department,
	delivery_method,stock,grade
	)VALUES(
	0,'ネットワークのすべて', '中村晃貴',2000,'折り目あり。しょうてすとのこたえつき',
	'pic.png','ネットワーク工学','慶應義塾大学','理工学部','情報工学科',
	'手渡しのみ',1,1);

INSERT INTO textbook(
	id,name,author,price,comment,
	pic,class,university,faculty,department,
	delivery_method,stock,grade
	)VALUES(
	1,'ネットワークのすべて2', '中村晃貴',2000,'折り目あり。しょうてすとのこたえつき',
	'pic.png','ネットワーク工学','慶應義塾大学','理工学部','情報工学科',
	'手渡しのみ',1,1);

INSERT INTO textbook(
	id,name,author,price,comment,
	pic,class,university,faculty,department,
	delivery_method,stock,grade
	)VALUES(
	2,'フーリエ変換', '中村晃貴',20000,'名著。',
	'pic.png','数学','慶應義塾大学','理工学部','',
	'手渡しのみ',1,1);
INSERT INTO textbook(
	id,name,author,price,comment,
	pic,class,university,faculty,department,
	delivery_method,stock,grade
	)VALUES(
	3,'商いについて','中村晃貴',200,'名著。',
	'pic.png','商学','慶應義塾大学','商学部','',
	'手渡しのみ',1,1);