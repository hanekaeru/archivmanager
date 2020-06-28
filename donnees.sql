-- =================
-- Gérard Kyllian
-- Cano Axel
-- Quentin Alexandre
-- =================

-- ==================================================================
-- Suppression des tables s'il existent déjà
-- ==================================================================
DROP TABLE IF EXISTS table_par_default; 
DROP TABLE IF EXISTS Article; 
DROP TABLE IF EXISTS Personne; 
DROP TABLE IF EXISTS Cliché; 
DROP TABLE IF EXISTS Iconographie; 
DROP TABLE IF EXISTS Villes_communes_loiret; 
DROP TABLE IF EXISTS SItuationGéographique; 
DROP TABLE IF EXISTS DateFormat; 
DROP TABLE IF EXISTS Informations; 

-- ==================================================================
-- Création de la table par défaut
-- ==================================================================
CREATE TABLE table_par_default (
    ReferenceCindoc TEXT NULL,
    Serie TEXT NULL,
    Article TEXT NULL,
    Discriminant TEXT NULL,
    Ville TEXT NULL,
    Sujet TEXT NULL,
    Description TEXT NULL,
    Date TEXT NULL,
    NotesBasDePage TEXT NULL,
    IndexPersonne TEXT NULL,
	FichierNumerique TEXT NULL,
    IndexIconographique TEXT NULL,
    NbCliches TEXT NULL,
    Taille TEXT NULL,
    NegatifOuInversible TEXT NULL,
    CouleurOuNB TEXT NULL,
    Remarques TEXT NULL
);

-- ==================================================================
-- Copie des données du CSV jusqu'à la base : path_to_csv est à changer
-- ==================================================================
COPY table_par_default(ReferenceCindoc,
					   Serie,
					   Article,
					   Discriminant,
					   Ville,
					   Sujet,
					   Description,
					   Date,
					   NotesBasDePage,
					   IndexPersonne,
					   FichierNumerique,
					   IndexIconographique,
					   NbCliches,
					   Taille,
					   NegatifOuInversible,
					   CouleurOuNB,
					   Remarques) 
FROM 'path_to_csv' DELIMITER '	' CSV HEADER;

-- ==================================================================
-- Création des tables de notre schéma
-- ==================================================================
CREATE TABLE Informations (
  IndexInformations SERIAL NOT NULL, 
  Description       text, -- A FAIRE (text)
  Remarques         text, -- A FAIRE (text)
  FichierNumérique  text, -- A FAIRE (text)
  NotesBasDePage    text, -- A FAIRE (text)
  PRIMARY KEY (IndexInformations));
  
CREATE TABLE Cliché (
  IndexCliché         SERIAL NOT NULL, 
  Nombre              varchar(50),  -- A FAIRE (number)
  CouleurOuNb         varchar(255), -- A FAIRE (select avec des options : couleur ou nb)
  NégatifOuInversible varchar(255), -- A FAIRE (select avec des options : negatif ou inversible)
  Taille              varchar(255), -- A FAIRE (text)
  PRIMARY KEY (IndexCliché));

CREATE TABLE Personne (
  IndexPersonne SERIAL NOT NULL, 
  Nom           text, -- A FAIRE (text)
  PRIMARY KEY (IndexPersonne));

CREATE TABLE Iconographie (
  IndexIco    SERIAL NOT NULL, 
  Description text, -- A FAIRE (text)
  PRIMARY KEY (IndexIco));

CREATE TABLE Villes_communes_loiret (
  Code_commune_INSEE int NOT NULL, 
  Nom_commune       varchar(255) NOT NULL, 
  Code_postal       int NOT NULL, 
  Libelle_acheminement          varchar(255) NOT NULL, 
  Ligne_5            varchar(255), 
  coordonnees_gps   varchar(255) NOT NULL);

-- ==================================================================
-- Importation des données du CSV ville path_to_csv_ville est à changer
-- ==================================================================
COPY Villes_communes_loiret(Code_commune_INSEE,
						   Nom_commune,
						   Code_postal,
						   Libelle_acheminement,
						   Ligne_5,
						   coordonnees_gps) 
FROM 'path_to_csv_ville' DELIMITER ';' CSV HEADER;


CREATE TABLE SItuationGéographique (
  IndexLieu    SERIAL NOT NULL, 
  Discriminant varchar(30), -- A FAIRE (text)
  Ville        text,        -- A FAIRE (text)
  PRIMARY KEY (IndexLieu));

CREATE TABLE DateFormat (
  IndexDate SERIAL NOT NULL, 
  Jour      int,         -- A FAIRE (number)
  Mois      varchar(20), -- A FAIRE (number)
  Année     int,         -- A FAIRE (number)
  datetxt   text,        -- A FAIRE (text)
  PRIMARY KEY (IndexDate));

CREATE TABLE Article (
  idArticle             SERIAL NOT NULL, 
  RefCindoc             text,                -- A FAIRE (text)
  Serie                 varchar(5) NOT NULL, -- A FAIRE (text)
  Sujet                 text,                -- A FAIRE (text)
  Date                  SERIAL, 
  SituationGéographique SERIAL, 
  Informations          SERIAL, 
  Cliché                SERIAL, 
  Personne              SERIAL, 
  Iconographie          SERIAL, 
  PRIMARY KEY (idArticle));

-- ==================================================================
-- Création des index
-- ==================================================================
CREATE UNIQUE INDEX Informations_IndexInformations 
  ON Informations (IndexInformations);
  CREATE UNIQUE INDEX Cliché_IndexCliché 
  ON Cliché (IndexCliché);
CREATE UNIQUE INDEX Personne_IndexPersonne 
  ON Personne (IndexPersonne);
CREATE UNIQUE INDEX Iconographie_IndexIco 
  ON Iconographie (IndexIco);
CREATE UNIQUE INDEX SItuationGéographique_IndexLieu 
  ON SItuationGéographique (IndexLieu);
CREATE UNIQUE INDEX DateFormat_IndexDate 
  ON DateFormat (IndexDate);

-- ==================================================================
-- Ajout des contraintes
-- ==================================================================
ALTER TABLE Article ADD CONSTRAINT Contient FOREIGN KEY (Informations) REFERENCES Informations (IndexInformations);
ALTER TABLE Article ADD CONSTRAINT Formate FOREIGN KEY ("Date") REFERENCES DateFormat (IndexDate);
ALTER TABLE Article ADD CONSTRAINT Décrit FOREIGN KEY (Cliché) REFERENCES Cliché (IndexCliché);
ALTER TABLE Article ADD CONSTRAINT Représente FOREIGN KEY (Personne) REFERENCES Personne (IndexPersonne);
ALTER TABLE Article ADD CONSTRAINT ReprésenteIco FOREIGN KEY (Iconographie) REFERENCES Iconographie (IndexIco);
ALTER TABLE Article ADD CONSTRAINT Situe FOREIGN KEY (SituationGéographique) REFERENCES SItuationGéographique (IndexLieu);

-- ==================================================================
-- Remplissage des tables avec les données de la table par défaut
-- ==================================================================
-- Compléter la table Informations
INSERT INTO Informations (
    Description,
    Remarques,
    FichierNumérique,
    NotesBasDePage
)
SELECT Description, Remarques, FichierNumerique, NotesBasDePage
FROM table_par_default;

-- Compléter la table Cliché
INSERT INTO Cliché (
    Nombre,
    CouleurOuNb,
    NégatifOuInversible,
    Taille
)
SELECT CAST( NbCliches AS varchar ), CAST(CouleurOuNb as VARCHAR), CAST(NegatifOuInversible as varchar), CAST(Taille as varchar)
FROM table_par_default;

-- Compléter la table Personne
INSERT INTO Personne (
    Nom
)
SELECT IndexPersonne
FROM table_par_default;

-- Compléter la table Iconographique
INSERT INTO Iconographie (
    Description
)
SELECT CAST(IndexIconographique as varchar)
FROM table_par_default;

-- Compléter la SituationGéographique
INSERT INTO SituationGéographique (
    Discriminant,
    Ville
)
SELECT Discriminant, Ville
FROM table_par_default;

-- Compléter la Date
INSERT INTO DateFormat (
    datetxt
)
SELECT Date
FROM table_par_default;

-- Compléter table Article
INSERT INTO Article (
    RefCindoc,
    Serie,
    Sujet
)
SELECT def.referencecindoc, def.Serie, def.Sujet
FROM table_par_default def;



