DROP TABLE member;

CREATE TABLE member (
	id			serial,
	login_name	varchar UNIQUE,
	pwd			varchar NOT NULL,
	PRIMARY KEY	(id)
);

INSERT INTO member(login_name,pwd)VALUES('suzuki', 'psuzuki');