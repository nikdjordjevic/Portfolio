--Napraviti bazu podataka videoteka
CREATE DATABASE videoteka;


CREATE TABLE filmovi(
id INT PRIMARY KEY,
naslov VARCHAR(255) NOT NULL,
reziser VARCHAR(255) NOT NULL,
god_izdavanja YEAR NOT NULL,
zanr VARCHAR(255) NOT NULL,
ocena DECIMAL(4,2)
);


INSERT INTO filmovi(id, naslov, reziser, god_izdavanja, zanr, ocena)
VALUES(1, 'Dancer In The Dark', 'Lars von Trier', 2000, 'drama', 8.00);


INSERT INTO filmovi
VALUES
(2, 'Dogville', 'Lars von Trier', 2003, 'drama', 8.00),
(3, 'Ace In The Hole', 'Billy Wilder', 1951, 'drama', 8.10),
(4, 'The Apartment', 'Billy Wilder', 1960, 'comedy', 8.30),
(5, 'After Hours', 'Martin Scorsese',1985, 'comedy', 7.70),
(6, 'Shutter Island', 'Martin Scorsese', 2010, 'mistery', 8.20),
(7, 'Come and See ', 'Elem Klimov', 1985, 'tragedy', 8.30),
(8, 'Bicycle Thieves', 'Vittorio De Sica', 1948, 'drama', 8.30),
(9,  'The Zero Theorem', 'Terry Gilliam', 2013, 'fantasy', 6.10),
(10, 'Surf Nazis Must Die', 'Peter George', 1987, 'comedy', 3.80),
(11, 'The Fall', 'Tarsem Singh', 2006, 'fantasy', 7.90),
(12, 'Fail Safe', 'Sidney Lumet', 1964, 'war', 8.00),
(13, 'Rear Window', 'Alfred Hitchcock', 1954, 'mystery', 8.40),
(14, 'Reservoir Dogs', 'Quentin Tarantino', 1992, 'crime', 8.30),
(15, 'Plan 9 from Outer Space', 'Edward D. Wood Jr.', 1957, 'horror', 4.00),
(16, 'Upstream Color', 'Shane Carruth', 2013, 'drama', 6.70);


--Selektovati sve upite koja je žanr tragedija, komedija ili drama.

SELECT *
FROM `filmovi`
WHERE `zanr` = 'tragedy' OR `zanr` = 'comedy' OR `zanr` = 'drama';

--Selektovati sve filmove kojima je ocena između 5 i 10.
SELECT `naslov` 
FROM `filmovi` 
WHERE `ocena` BETWEEN 5 AND 10;

--Selektovati režisere (bez ponavljanja) koji su režirali filmove izdate 2003. godine i
-- poređati ih abecednim redom. 
SELECT DISTINCT `reziser` 
FROM `filmovi` 
WHERE `god_izdavanja` = 2013
ORDER BY `reziser` ASC;

--Selektovati sve filmove tako da im zanr nije komedija.
SELECT `naslov` 
FROM `filmovi` 
WHERE NOT `zanr`='comedy';

--Prikazati sve informacije o najbojle rangiranom filmu
SELECT *
FROM `filmovi` 
ORDER BY `ocena` DESC
LIMIT 1;

--Prikazati sve informacije o najbolje rangiranoj drami.
SELECT * 
FROM `filmovi`
WHERE `zanr` = 'drama'
ORDER BY `ocena` DESC
LIMIT 1;

--Selektovati trojicu rezisera ciji filmovi imaju najbolje ocene.
SELECT DISTINCT `reziser` 
FROM `filmovi` 
ORDER BY `ocena` DESC
LIMIT 3;

--Selektovati sve žanrove filmova, bez ponavljanja.
SELECT DISTINCT `zanr` 
FROM `filmovi` ;

--Selektovati sve filmove u obliku naslov (režiser).
SELECT CONCAT(`naslov` , ' (' , `reziser` , ')') AS "Naslov (reziser)"
FROM `filmovi`;

--Selektovati sve filmove u obliku naslov (režiser) – godina izdanja. 
--Selektovane filmove sortirati rastuće prema godini izdanja.
SELECT CONCAT(`naslov` , ' (' , `reziser` , ')' , '- ' , `god_izdavanja` ) AS "Naslov (reziser) - godina izdanja"
FROM `filmovi`
ORDER BY `god_izdavanja` ASC;






