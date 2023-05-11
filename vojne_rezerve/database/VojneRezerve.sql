CREATE DATABASE `VOJNE_REZERVE` CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE `VOJNE_REZERVE`.`REZERVISTA`
(
    IdRezerviste  int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ImeRezerviste   varchar(30) NOT NULL,
    PrezimeRezerviste   varchar(30) NOT NULL,
    DatumRodjenja   date NOT NULL,   
    EmailRezerviste   varchar(40) NOT NULL,
    Pol     varchar(6) NOT NULL,
    Adresa  varchar(40) NOT NULL,
    Mesto   varchar(40) NOT NULL,
    IdKasarne int NOT NULL
);

CREATE TABLE `VOJNE_REZERVE`.`KASARNA`
(
    IdKasarne int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ImeKasarne varchar(40) NOT NULL
);

CREATE TABLE `VOJNE_REZERVE`.`KORISNIK`
(
    IdKorisnika     int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ImeKorisnika    varchar(40) NOT NULL,
    PrezimeKorisnika    varchar(40) NOT NULL,
    EmailKorisnika  varchar(40) NOT NULL,
    KorisnickoIme   varchar(30) NOT NULL,
    Sifra   varchar(60) NOT NULL,
    Uloga   varchar(30) NOT NULL
);

ALTER TABLE `VOJNE_REZERVE`.`REZERVISTA` ADD CONSTRAINT FK_KASARNA FOREIGN KEY (IdKasarne) 
REFERENCES `VOJNE_REZERVE`.`KASARNA` (IdKasarne) ON DELETE RESTRICT ON UPDATE CASCADE;

INSERT INTO `VOJNE_REZERVE`.`KASARNA` (ImeKasarne) VALUES ('dr. Rudolf Arčibald Rajs');
INSERT INTO `VOJNE_REZERVE`.`KASARNA` (ImeKasarne) VALUES ('Španskih boraca');
INSERT INTO `VOJNE_REZERVE`.`KASARNA` (ImeKasarne) VALUES ('Majevica');

INSERT INTO `VOJNE_REZERVE`.`REZERVISTA` (ImeRezerviste, PrezimeRezerviste, DatumRodjenja, EmailRezerviste, Pol, Adresa, Mesto, IdKasarne) VALUES ('Marko', 'Marković', '2001-06-27','marko@gmail.com','Muško','Koste Racina 26','Novi Sad', '1');
INSERT INTO `VOJNE_REZERVE`.`REZERVISTA` (ImeRezerviste, PrezimeRezerviste, DatumRodjenja, EmailRezerviste, Pol, Adresa, Mesto, IdKasarne) VALUES ('Luka', 'Petrović', '1998-01-15','luka@gmail.com','Muško','Janka Čmelnika 16','Novi Sad', '2');
INSERT INTO `VOJNE_REZERVE`.`REZERVISTA` (ImeRezerviste, PrezimeRezerviste, DatumRodjenja, EmailRezerviste, Pol, Adresa, Mesto, IdKasarne) VALUES ('Nikola', 'Rađenović', '1992-04-11','nikola@gmail.com','Muško','Cara Dušana 10','Beograd', '3');
INSERT INTO `VOJNE_REZERVE`.`REZERVISTA` (ImeRezerviste, PrezimeRezerviste, DatumRodjenja, EmailRezerviste, Pol, Adresa, Mesto, IdKasarne) VALUES ('Marina', 'Todorović', '1996-06-13','marina@gmail.com','Žensko','Pap Pavla 3','Subotica', '2');

INSERT INTO `VOJNE_REZERVE`.`KORISNIK` (ImeKorisnika, PrezimeKorisnika, EmailKorisnika, KorisnickoIme, Sifra, Uloga) VALUES ('Srđan', 'Levnaić', 'srdjan@gmail.com', 'sLevnaic', '54a2bf8c09ace67d3513aaa1aa7aa0f3', 'admin');
INSERT INTO `VOJNE_REZERVE`.`KORISNIK` (ImeKorisnika, PrezimeKorisnika, EmailKorisnika, KorisnickoIme, Sifra, Uloga) VALUES ('Petar', 'Petrović', 'petar@gmail.com', 'pPetrovic', 'c483f6ce851c9ecd9fb835ff7551737c', 'korisnik');