-- Drop the existing DB, if it exists
DROP DATABASE IF EXISTS ITECH3224_30305675;

-- Create a new DB for storing Grades
CREATE DATABASE ITECH3224_30305675 CHARACTER SET utf8 COLLATE utf8_general_ci;

-- Switch to it
USE ITECH3224_30305675;

-- Create a user
GRANT SELECT, INSERT, UPDATE, DELETE
	ON ITECH3224_30305675.*
	TO 'ITECH3224_30305675'@'localhost'
	IDENTIFIED BY 'AxBkAJwMYCFj3RaGypHG'; -- this is a nice hard-to-guess password

-- DDL to create the tables
CREATE TABLE User (
	id VARCHAR (8) PRIMARY KEY,
	name VARCHAR (50),
	email VARCHAR (50),
	password VARCHAR (255)
);

CREATE TABLE SourdoughLink (
	id INT PRIMARY KEY AUTO_INCREMENT,
	user_id VARCHAR (8),
	datetime TIMESTAMP,
	link_url VARCHAR (100),
	title VARCHAR (60),
	FOREIGN KEY (user_id)
		REFERENCES User(id)
);

CREATE TABLE Comment (
	id INT PRIMARY KEY AUTO_INCREMENT,
	user_id VARCHAR (8),
	sourdoughlink_id INT,
	comment_text VARCHAR (255),
	FOREIGN KEY (user_id)
		REFERENCES User(id),
	FOREIGN KEY (sourdoughlink_id)
		REFERENCES SourdoughLink(id)
);

CREATE TABLE Block (
	user_id VARCHAR (8),
	blocked_user_id VARCHAR (8),
	PRIMARY KEY (user_id, blocked_user_id),
	FOREIGN KEY (user_id)
		REFERENCES User(id),
	FOREIGN KEY (blocked_user_id)
		REFERENCES User(id)
);

-- User
INSERT INTO User 
	(id, name, email, password)
VALUES
	('30305675', 'Denny Amiruddin', 'dennyamiruddin@federation.students.edu.au', '$2y$10$/T7QhmFd4K0JwieFfm7GSO/9hdBZXjbX8vj0gIGDMsUVMdzbIsTdu'), -- root
	('30300001', 'tutor', 'tutor@federation.students.edu.au', '$2y$10$/T7QhmFd4K0JwieFfm7GSOxE9Gr3wQlnudzgNoDFwbT213kMFbB.O'), -- guest
	('30300002', 'Han Solo', 'hansolo@federation.students.edu.au', '$2y$10$/T7QhmFd4K0JwieFfm7GSOS6to4Q.Uoi.ejefu0FcWApDXwGjciMq'), -- chewbacca
	('30300003', 'Dr Strange', 'toostrange@federation.students.edu.au', '$2y$10$/T7QhmFd4K0JwieFfm7GSOQFEtXwwHIWB1WJ0CktGk5X57qdQWtqa'), -- watch
	('30300004', 'Bruce Wayne', 'wayne@federation.students.edu.au', '$2y$10$/T7QhmFd4K0JwieFfm7GSObtmKKxxN.3.JgQuARyRvx.MYlKxIEsq'); -- batman




-- SourdoughLink
INSERT INTO SourdoughLink
	(user_id, link_url, title)
VALUES
	('30305675', 'helloworld.com', 'Hello World'),
	('30305675', 'whatissourdough.com', 'This is sourdough'),
	('30305675', 'wikipediaisnotgood.com', 'Wikipedia'),
	('30300001', 'mysite.com', 'Website'),
	('30300002', 'hanbacca.com', 'Hi I am Han'),
	('30300003', 'lol.com', 'Time for sourdough'),
	('30300004', 'hahahahajoker.com', 'Batmandough'),
	('30300003', 'stopitdrstrange.com', 'Doughtime');


-- Comment
INSERT INTO Comment
	(user_id, sourdoughlink_id, comment_text)
VALUES
	('30305675', 1, 'nice page'),
	('30305675', 2, 'amazing'),
	('30305675', 3, 'well hi there'),
	('30305675', 4, 'good post'),
	('30305675', 5, 'nice job');
