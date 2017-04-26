DROP TABLE IF EXISTS Watched_movie;
DROP TABLE IF EXISTS Watched_show;
DROP TABLE IF EXISTS similar_movies;
DROP TABLE IF EXISTS starin_movie;
DROP TABLE IF EXISTS starin_tv;
DROP TABLE IF EXISTS Fan_Of;


DROP TABLE IF EXISTS TVShows;
CREATE TABLE TVShows ( 
    Title VARCHAR(255),  
    Seasons INT, 
    Genre VARCHAR(255), 
    Rating DOUBLE, 
    TVID INT primary key
	);
INSERT INTO TVShows
VALUES 
	('The Office', 9, 'Comedy', 4.3, 2000), 
	('Parks and Recreation', 7, 'Comedy', 4.3, 2001), 
	('Saturday Night Live', 42, 'Comedy', 4.0, 2002), 
	('The Walking Dead', 7, 'Horror', 3.8, 2003),
	('Prison Break', 5, 'Action', 3.4, 2004), 
	('The Flash', 3, 'Action', 4.2, 2005), 
	('Daredevil', 2, 'Action', 4.8, 2006), 
	('Agents of SHIELD', 4, 'Action', 3.5, 2007), 
	('Suits', 6, 'Drama', 4.2, 2008), 
	('Sherlock', 4, 'Drama', 4.4, 2009), 
	('Stranger Things', 1, 'Sci-Fi/Fantasy', 4.9, 2010), 
	('Star Trek', 6, 'Sci-Fi/Fantasy', 4.5, 2011);
	
DROP TABLE IF EXISTS Movies;
create table Movies ( 
	title varchar(50), 
	movie_id int primary key,
	rating int, genre varchar(50), 
	director varchar(30), 
	release_date date
	);
insert into Movies
VALUES
('This Is The End', 1000, 4, 'Comedy', 'Evan Goldberg', '2013-06-12'),
('The 40-Year-Old Virgin', 1001, 3, 'Comedy', 'Judd Apatow', '2005-08-19'),
('Step Brothers',1002 , 5, 'Comedy', 'Adam McKay', '2008-07-25'),
('Anchorman', 1003, 5, 'Comedy', 'Adam McKay', '2004-07-09'),
('Inside Out', 1004, 5, 'Comedy', 'Pete Doctor', '2015-07-19'),
('Sisters', 1005, 3, 'Comedy', 'Jason Moore', '2015-12-18'),
('Mordecai', 1006, 2, 'Comedy', 'David Koepp', '2015-01-23'),
('Sweeney Todd', 1007, 5, 'Horror', 'Tim Burton', '2007-12-21'),
('Sharknado', 1008, 1, 'Horror', 'Anthony Ferrante', '2013-07-11'),
('The Wicker Man', 1009, 5, 'Horror', 'Robin Hardy', '1975-06-05'),
('The Shining', 1010, 5, 'Horror', 'Stanley Kubrick', '1980-06-13'),
('The Bourne Identity', 1011, 4, 'Action', 'Doug Liman', '2002-06-14'),
('The Great Wall', 1012, 2, 'Action', 'Yimou Zhang', '2017-02-17'),
('Taken', 1013, 4, 'Action', 'Pierre Model', '2009-01-09'),
('Batman Begins', 1014, 4, 'Action', 'Christopher Nolan', '2005-06-15'),
('Mission: Impossible', 1015, 4, 'Action', 'Brian De Palma', '2005-06-15'),
('Top Gun', 1016, 3, 'Action', 'Tony Scott', '1986-05-16'),
('Fast & Furious 6', 1017, 3, 'Action', 'Justin Lin', '2013-05-24'),
('Skyfall', 1018, 5, 'Action', 'Sam Mendes', '2012-11-09'),
('Casino Royal', 1019, 5, 'Action', 'Martin Campbell', '2006-11-17'),
('Deadpool', 1020, 5, 'Action', 'Tim Miller', '2016-02-12'),
('Green Lantern', 1021, 2, 'Action', 'Martin Campbell', '2011-06-17'),
('American Gangster', 1022, 4, 'Drama', 'Ridley Scott', '2007-11-02'),
('Training Day', 1023, 4, 'Drama', 'Antoine Fuqua', '2001-10-05'),
('Edward Scissorhands', 1024, 5, 'Drama', 'Tim Burton', '1990-12-14'),
('Doubt', 1025, 4, 'Drama', 'John Patrick Shanley', '2008-12-25'),
('Good Will Hunting', 1026, 5, 'Drama', 'Gus Van Sant', '1998-01-09'),
('Star Trek', 1027, 4, 'Sci-Fi', 'J.J. Abrams', '2009-05-08'),
('Star Wars: Episode I -Phantom Menace', 1028, 3, 'Sci-Fi', 'George Lucas', '1999-05-19'),
('Thor', 1029, 4, 'Sci-Fi', 'Kenneth Branagh', '2011-05-06'),
('The Avengers', 1030, 5, 'Sci-Fi', 'Joss Whedon', '2012-05-04'),
('Iron Man', 1031, 5, 'Sci-Fi', 'Jon Favreau', '2008-05-02'),
('Fantastic Four', 1032, 3, 'Sci-Fi', 'Tim Story', '2005-07-08'),
('Harry Potter and the Chamber of Secrets', 1033, 5, 'Sci-Fi', 'Chris Columbus', '2002-11-15');	
	
DROP TABLE IF EXISTS Users;
CREATE TABLE Users ( 
	username VARCHAR(255) primary key NOT NULL , 
	first_name VARCHAR(150) NOT NULL, 
	last_name VARCHAR(250) NOT NULL, 
	email VARCHAR(300) NOT NULL, 
	password VARCHAR(500) NOT NULL,
	fav_genre varCHAR(150) NOT NULL
	);

INSERT INTO Users VALUES 
('ughcel','Celine','Gil','celinegil@email.com','cg2020','Comedy'),
('pia.mutia','Pia','Mutia','piamutia@email.com','pm2020','Comedy'), 
('anyaa_dabic','Anya','Dabic','anyadabic@email.com','ad2018','Comedy'), 
('youngzazzera','Andrew','Zazzera','andrewzazzera@email.com','az2020','Horror'),
('emmaaazing','Emma','Kopf','emmakopf@email.com','ek2018','Horror'),
('garrettnekic','Garrett','Nekic','garrettnekic@email.com','gn2017','Horror'),
('jvramirez13','John','Ramirez','johnramirez@email.com','jr2020','Action'), 
('doremira','Mira','Lee','miralee@email.com','ml2020','Action'), 
('lanikai17','Lani','Allen','laniallen@email.com','la2018','Action'),
('jack_perales','Jack','Perales','jackperales@email.com','jp2018','Drama'),
('angelychristine','Angel','Jomuad','angeljomuad@email.com','aj2018','Drama'),
('sarahrose1624','Sarah','Rose','sarahrose@email.com','sr2018','Drama'),
('wushiroll','Richard','Wu','richardwu@email.com','rw2019','Sci-Fi/Fantasy'),
('aaron_aguhob','Aaron','Aguhob','aaronaguhob@email.com','aa2018','Sci-Fi/Fantasy'),
('kevthumim','Kevin','Thumim','kevinthumim@email.com','kt2018', 'Sci-Fi/Fantasy');

DROP TABLE IF EXISTS Actors;
CREATE TABLE Actors (
   Actor_ID char(5) primary key not null,
   first_name char(30),
   last_name char(30) not null
 );
 INSERT INTO Actors VALUES 
 ('SC100', 'Steve', 'Carell'),
 ('AP101', 'Amy', 'Poehler'),
 ('AA102', 'Aziz', 'Ansari'),
 ('AS103', 'Andy', 'Samberg'),
 ('SR104', 'Seth', 'Rogen'),
 ('WF105', 'Will', 'Ferrell'),
 ('KW106', 'Kristen', 'Wiig'),
 ('JD107', 'Johnny', 'Depp'),
 ('NR108', 'Norman', 'Reedus'),
 ('AL109', 'Andrew', 'Lincoln'),
 ('SY110', 'Steven', 'Yeun'),
 ('MM111', 'Melissa', 'MCBride'),
 ('IZ112', 'Ian', 'Ziering'),
 ('CL113', 'Christopher', 'Lee'),
 ('JN114', 'Jack', 'Nicholson'),
 ('WM115', 'Wentworth', 'Miller'),
 ('CC116', 'Charlie', 'Cox'),
 ('CG117', 'Clark', 'Gregg'),
 ('MD118', 'Matt', 'Damon'),
 ('LN119', 'Liam', 'Neeson'),
 ('TC120', 'Tom', 'Cruise'),
 ('DJ121', 'Dwayne', 'Johnson'),
 ('DC122', 'Daniel', 'Craig'),
 ('RR123', 'Ryan', 'Reynolds'),
 ('MM124', 'Meghan', 'Markle'),
 ('GM125', 'Gabriel', 'Macht'),
 ('PA126', 'Patrick J.', 'Adams'),
 ('BC127', 'Benedict', 'Cumberbatch'),
 ('DW128', 'Denzel', 'Washington'),
 ('MS129', 'Meryl', 'Streep'),
 ('RW130', 'Robin', 'Williams'),
 ('GT131', 'George', 'Takei'),
 ('LN132', 'Leonard', 'Nimoy'),
 ('WS133', 'William', 'Shatner'),
 ('WR134', 'Winona', 'Ryder'),
 ('MB135', 'Millie Bobby', 'Brown'),
 ('CP136', 'Chris', 'Pines'),
 ('CH137', 'Chris',	'Hemsworth'),
 ('RD138', 'Robert', 'Downey Jr'),
 ('CE139', 'Chris', 'Evans'),
 ('DR140', 'Daniel', 'Radcliffe');
 

create table starin_movie (Actor_ID char(5), movie_id int);
insert into
starin_movie
VALUES
('SR104', 1000),
('SC100', 1001),
('WF100', 1002),
('WF100', 1003),
('AP101', 1004),
('AP101', 1005),
('JD107', 1006),
('JD107', 1007),
('JD107', 1024),
('IZ112', 1008),
('CL113', 1028),
('JN114', 1010),
('CG117', 1030),
('MD118', 1026),
('MD118', 1011),
('MD118', 1012),
('LN119', 1013),
('LN119', 1028),
('TC120', 1015),
('TC120', 1016),
('DJ121', 1017),
('DC122', 1018),
('DC122', 1019),
('RR123', 1020),
('RR123', 1021),
('DW128', 1022),
('DW128', 1023),
('RW130', 1026),
('MS129', 1025),
('GW131', 1027),
('LN132', 1027),
('WS133', 1027),
('CP136', 1027),
('CH137', 1029),
('CH137', 1030),
('RD138', 1030),
('RD138', 1031),
('CE139', 1032),
('DR140', 1033);


CREATE TABLE starin_tv (
	TVID INT not null,
	Actor_ID char(5) not null
 );
INSERT INTO starin_tv VALUES
(2000, 'SC100'),
(2001, 'AP101'),
(2001, 'AA102'),
(2002, 'AP101'),
(2002, 'WF105'),
(2002, 'AS103'),
(2002, 'KW106'),
(2003, 'NR108'),
(2003, 'AL109'),
(2003, 'SY110'),
(2003, 'MM111'),
(2004, 'WM115'),
(2005, 'WM115'),
(2006, 'CC116'),
(2007, 'CG117'),
(2008, 'MM124'),
(2008, 'GM125'),
(2008, 'PA126'),
(2009, 'BC127'),
(2010, 'WR134'),
(2010, 'MB135'),
(2011, 'GT131'),
(2011, 'LN132'),
(2011, 'WS133');


CREATE TABLE Fan_Of (
	Username VARCHAR(255) not null ,
	Actor_ID char(5) not null
 );
INSERT INTO Fan_Of VALUES
('ughcel', 'SC100'),
('ughcel', 'SR104'),
('ughcel', 'AA102'),
('pia.mutia', 'AP101'),
('pia.mutia', 'AS103'),
('pia.mutia', 'WF105'),
('anyaa_dabic', 'KW106'),
('anyaa_dabic', 'AA102'),
('anyaa_dabic', 'SR104'),
('youngzazzera', 'IZ112'),
('youngzazzera', 'CL113'),
('youngzazzera', 'JN114'),
('emmaaazing', 'NR108'),
('emmaaazing', 'AL109'),
('emmaaazing', 'JD107'),
('garrettnekic', 'JD107'),
('garrettnekic', 'JN114'),
('garrettnekic', 'CL113'),
('jvramirez13', 'MD118'),
('jvramirez13', 'LN119'),
('jvramirez13', 'DJ121'),
('doremira', 'TC120'),
('doremira', 'DC122'),
('doremira', 'RR123'),
('lanikai17', 'WM115'),
('lanikai17', 'CC116'),
('lanikai17', 'CG117'),
('jack_perales' , 'MM124'),
('jack_perales' , 'GM125'),
('jack_perales' , 'DW128'),
('angelychristine', 'BC127'),
('angelychristine', 'JD107'),
('angelychristine', 'CE139'),
('sarahrose1624', 'MS129'),
('sarahrose1624', 'RW130'),
('sarahrose1624', 'MD118'),
('wushiroll', 'LN132'),
('wushiroll', 'WS133'),
('wushiroll', 'GT131'),
('aaron_aguhob', 'CP136'),
('aaron_aguhob', 'WR134'),
('aaron_aguhob', 'MB135'),
('kevthumim', 'CH137'),
('kevthumim', 'RD138'),
('kevthumim', 'DR140');


create table similar_movies (movie_id int, similar_to_movie_id int);
insert into similar_movies VALUES
(1000, 1001),
(1000, 1002),
(1000, 1003),
(1001, 1002),
(1001, 1005),
(1002, 1003),
(1002, 1004),
(1003, 1006),
(1003, 1001),
(1004, 1005),
(1004, 1006),
(1005, 1006),
(1006, 1007),
(1007, 1009),
(1008, 1006),
(1009, 1010),
(1010, 1013),
(1011, 1012),
(1011, 1013),
(1011, 1015),
(1012, 1015),
(1012, 1016),
(1013, 1014),
(1013, 1018),
(1014, 1020),
(1014, 1021),
(1015, 1016),
(1015, 1017),
(1016, 1017),
(1016, 1018),
(1017, 1020),
(1018, 1019),
(1019, 1020),
(1019, 1021),
(1020, 1021),
(1022, 1023),
(1022, 1026),
(1022, 1024),
(1023, 1024),
(1023, 1026),
(1024, 1025),
(1025, 1026),
(1027, 1028),
(1027, 1030),
(1027, 1031),
(1028, 1029),
(1028, 1032),
(1029, 1030),
(1029, 1033),
(1030, 1031),
(1030, 1020),
(1030, 1021),
(1031, 1032),
(1032, 1020),
(1032, 1021),
(1033, 1030),
(1033, 1020);


CREATE TABLE Watched_show (
	Username VARCHAR(255) not null,
	TVID int not null
 );
 

CREATE TABLE Watched_movie (
	Username VARCHAR(255) not null,
	movie_id int not null
 );