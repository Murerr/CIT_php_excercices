CREATE DATABASE IF NOT EXISTS metro_vision;

CREATE TABLE IF NOT EXISTS customers
(
id 		INT AUTO_INCREMENT PRIMARY KEY,
fname 	VARCHAR(25) NOT NULL,
sname 	VARCHAR(30) NOT NULL,
tel 	VARCHAR(10),
dob		YEAR
);

INSERT INTO customers (fname, sname, tel, dob)
VALUES 	("John", "Smith", "0871234567",1990),
		("John", "Smith", "0871834567",1991),
	("Ted", "Murphy", "0871335667",1999),
	("John", "Smith", "0831244467",1990),
	("John", "Smith", "0871234567",1996),
	("Mike", "Collins", "0874523457",1996),
	("John", "Smith", "0835634567",2002),
	("Alan", "Smith", "0867374567",1980),
	("Dan", "Murphy", "0871299967",1990),
	("John", "Smith", "0871434567",1990),
	("Mary", "Smith", "0861564567",1990),
	("John", "O Connor", "0874573497",1990),
	("Marco", "DeRey", "0871234567",1998),
	("Sinead", "Smith", "0831234567",1980),
	("Peter", "Smyth", "0872222567",1960),
	("John", "Baker", "0831555567",1970),
	("Pavel", "Murphy", "0894444567",1990),
	("Tom", "Allen", "0871234567",2001),
	("Ursala", "Adams", "0871234567",1999),
	("Tim", "Bently", "0871234567",1982),
	("Sean", "Collins", "0871234567",1998),
	("Rob", "Dylan", "0871234567",1983),
	("Quinn", "Everet", "0871234567",1997),
	("Phil", "Fogarty", "0871234567",1984),
	("Oscar", "Glenn", "0871234567",1996),
	("Noel", "Henry", "0871234567",1985),
	("Marco", "Ignacio", "0871234567",1995),
	("Lee", "Jones", "0871234567",1986),
	("Ken", "Kelly", "0871234567",1940),
	("John", "Lyons", "0871234567",1987),
	("Ingo", "Manning", "0871234567",1993),
	("Henry", "Nolan", "0871234567",2000),
	("Glenn", "O Connor", "0871234567",1992),
	("Fred", "Peterson", "0871234567",2000),
	("Elana", "Simonsdottir", "0871234567",1991);
	
	
					
					

CREATE TABLE IF NOT EXISTS movies
(
id 		INT AUTO_INCREMENT PRIMARY KEY,
title 	VARCHAR(50) NOT NULL UNIQUE,
released YEAR,
rating	ENUM ("G", "PG", "12A", "15A", "16", "18") DEFAULT "18"
);



INSERT INTO movies (title, released, rating)
VALUES 		("Titanic", 1997, "12A"),
			("Men in Black", 1997, "PG"),
			("Star Wars", 1977, "12A"),
			("ET", 1982, "PG"),		
			("His Girl Friday", 1940, "PG"),
			("Mr. Smith Goes to Washington", 1939, "PG"),
			("50 Shades of Grey", 2015, "18"),
			("Siege of Jadotville", 2016, "15A"),
			("Superbad", 2007, "12A"),
			("Flashdance", 1983, "PG"),
			("Dirty Dancing", 1987, "12A"),
			("The BFG", 2016, "G"),
			("Buffalo Soldiers", 2001, "12A"),
			("Valerian and the City of a Thousand Planets", 2017, "G"),
			("Fame", 1980, "12A"),	
			("Dallas Buyers Club", 2013, "18"),	
			("American Hustle", 2013, "18"),
			("Nebraska", 2013, "18"),	
			("The Wolf of Wall Street", 2013, "12A"),	
			("The Revenant", 2015, "15A"),
			("Trumbo", 2015, "12A"),
			("Steve Jobs", 2015, "PG"),
			("The Danish Girl", 2015, "12A"),	
			("Bridge of Spies", 2015, "12A"),	
			("The Big Short", 2015, "12A"),	
			("Footloose", 1984, "PG"),
			("12 Years a Slave", 2013, "12A"),	
			("Philomena", 2013, "12A"),	
			("Frozen", 2013, "G"),	
			("Foxcatcher", 2014, "18"),	
			("American Sniper", 2014, "18"),	
			("The Imitation Game", 2014, "18"),	
			("Boyhood", 2014, "18"),	
			("Two Days, One Night", 2014, "18"),	
			("Big Hero 6", 2014, "G"),	
			("How to Train Your Dragon 2", 2014, "G"),
			("Ghost", 1980, "12A"),
			("The Martian", 2015, "12A"),
			("Mute", 2018, "15A"),
			("Bright", 2015, "12A"),
			("The Circle", 2017, "12A"),
			("Buffalo '66", 1998, "12A"),
			("Room", 2015, "12A"),	
			("Brooklyn", 2015, "12A"),	
			("The Hateful Eight", 2015, "12A"),	
			("Boy and the World", 2015, "PG"),	
			("Shaun the Sheep Movie", 2015, "PG"),
			("Three Billboards outside Ebbing, Missouri", 2017, "16"),
			("The Shape of Water", 2017, "PG"),
			("Manchester by the Sea", 2016, "12A"),
			("Hacksaw Ridge", 2016, "12A"),
			("La La Land", 2016, "G"),
			("Captain Fantastic", 2016, "PG"),
			("Lion", 2016, "12A"),
			("Loving", 2016, "16"),
			("Moana", 2016, "G");
	
	
	
	
CREATE TABLE IF NOT EXISTS dvds
(
disc_id 		INT AUTO_INCREMENT PRIMARY KEY,
movie_id 		INT NOT NULL,
FOREIGN KEY (movie_id)
      REFERENCES movies(id)
      ON UPDATE CASCADE ON DELETE RESTRICT
);


INSERT INTO dvds (disc_id, movie_id)
VALUES	(1,1);

INSERT INTO dvds (movie_id)
VALUE (5);



INSERT INTO dvds (disc_id, movie_id)
	VALUES	(5,2),
		(6,3),
		(7,4),
		(8,5),
		(9,6),
		(10,7),
		(11,8),
		(12,9),
		(13,10),
		(14,11),
		(15,12),
		(16,13),
		(17,14),
		(18,15),
		(19,16),
	(20,17),
	(31,18),
	(32,19),
	(33,20),
	(34,21),
	(35,22),
	(36,23),
	(37,24),
	(38,25),
	(39,26),
	(40,27),
	(45,28),
	(46,29),
	(47,30),
	(48,31),
	(49,32),
	(50,32),
	(51,32),
	(52,33),
	(53,34),
	(54,35),
	(55,36),
	(56,37),
	(57,38),
	(58,39),
	(59,40),
	(60,41),
	(70,42),
	(71,43),
	(72,44),
	(73,45),
	(74,46),
	(75,47),
	(76,48),
	(77,49),
	(101,50),
	(102,51),
	(103,52),
	(104,53),
	(105,54),
	(106,55),
	(107,56),
	(108,56),
	(110,32),
	(111,32),
	(112,33),
	(113,34),
	(114,35),
	(115,36),
	(116,37),
	(117,38),
	(118,39),
	(119,40),
	(120,41),
	(121,43),
	(122,44),
	(123,45),
	(124,46);


INSERT INTO dvds (movie_id)
	VALUES	(2),(10),(10),(10),(10);





CREATE TABLE IF NOT EXISTS rentals
(
id 		INT AUTO_INCREMENT PRIMARY KEY,
cust 	INT NOT NULL,
disc 	INT NOT NULL,
rental_date DATETIME,
return_date DATETIME
);

INSERT INTO rentals (cust, disc, rental_date, return_date)
VALUES	(2, 4, "2017-12-24 12:25:02", "2017-12-27 12:25:02"),
		(1, 2, "2017-10-24 03:50:30", "2017-10-26 13:50:30"),
		(2, 5, "2017-12-14 15:12:02", "2017-12-19 15:12:02"),
		(4, 9, "2017-04-24 12:19:50", "2017-04-26 16:19:50"),
		(2, 10, "2018-02-04 01:45:02", "2018-02-05 12:45:02"),
		(3, 19, "2018-01-24 12:30:20", "2018-01-26 16:30:20"),
		(3, 22, "2018-01-14 10:19:02", "2018-01-15 10:19:02"),
		(3, 16, "2018-03-03 12:20:02", "2018-03-13 16:20:02");


INSERT INTO rentals (cust, disc, rental_date)
VALUES	(2, 14, "2017-12-30 12:25:02"),
		(1, 12, "2018-03-24 03:50:30"),
		(2, 15, "2018-01-14 15:12:02"),
		(4, 19, "2018-04-24 12:19:50"),
		(2, 10, "2018-04-04 01:45:02"),
		(3, 9, "2018-01-24 12:30:20"),
		(3, 2, "2018-02-14 10:19:02"),
		(3, 6, "2018-03-03 12:20:02");
		
		
INSERT INTO rentals (cust, disc, rental_date, return_date)
VALUES	(3, 14, "2017-12-26 12:25:02", "2017-12-28 12:30:02"),
		(1, 12, "2018-10-26 03:50:30", "2018-10-28 13:50:30"),
		(2, 15, "2017-12-15 15:12:02", "2017-12-19 15:12:02");

