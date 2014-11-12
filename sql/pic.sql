DROP TABLE pic;

CREATE TABLE pic (
	id			int,
	name   		varchar NOT NULL,
	textbook	int NOT NULL,
	PRIMARY KEY (id)
);

INSERT INTO pic(id,name,textbook)VALUES(0,'sample',-1);
