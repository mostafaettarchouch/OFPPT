-- Active: 1741436590995@@127.0.0.1@3306@db_ofppt
-- Active: 1741436590995@@127.0.0.1@3306@mysql
CREATE DATABASE db_ofppt;
use db_ofppt;
CREATE TABLE Baccalaureat(
    id_bac int PRIMARY key AUTO_INCREMENT,
    bac_nom VARCHAR(150) NOT NULL
);
CREATE TABLE Specialite(
    id_Specialite int PRIMARY KEY AUTO_INCREMENT,
    Specialite_nom VARCHAR(150) NOT NULL
);
create table stagiaire(
    id int primary key AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) not null,
    email VARCHAR(150) not null,
    img VARCHAR(300) not null,
    id_bac int,
    id_Specialite int,
    pas VARCHAR(300) NOT NULL ,
    FOREIGN KEY(id_bac) REFERENCES Baccalaureat(id_bac),
    FOREIGN KEY(id_Specialite) REFERENCES Specialite(id_Specialite)
);
INSERT INTO Baccalaureat (bac_nom) VALUES
('Sciences Mathématiques A'),
('Sciences Mathématiques B'),
('Sciences Physiques'),
('Sciences de la Vie et de la Terre'),
('Sciences Agronomiques'),
('Sciences Économiques'),
('Sciences de Gestion Comptable'),
('Lettres Modernes'),
('Lettres et Sciences Humaines'),
('Sciences et Technologies Électriques'),
('Sciences et Technologies Mécaniques'),
('Sciences Islamiques'),
('Langue Arabe'),
('Arts Appliqués');
INSERT INTO Specialite (Specialite_nom) VALUES
('Développement Informatique'),
('Réseaux Informatiques'),
('Gestion des Entreprises'),
('Finance et Comptabilité'),
('Commerce'),
('Génie Civil'),
('ÉSA'),
('Infographie'),
('Mécatronique'),
('Logistique');
INSERT INTO stagiaire (nom, prenom, email, img, id_bac, id_Specialite, pas) VALUES
('Dupont', 'Jean', 'jean.dupont@example.com', 'jean.jpg', 1, 1, 'pass123'),
('Martin', 'Claire', 'claire.martin@example.com', 'claire.jpg', 2, 2, 'pass456'),
('Bernard', 'Luc', 'luc.bernard@example.com', 'luc.jpg', 3, 3, 'pass789'),
('Robert', 'Sophie', 'sophie.robert@example.com', 'sophie.jpg', 4, 4, 'pass321'),
('Richard', 'Paul', 'paul.richard@example.com', 'paul.jpg', 5, 5, 'pass654'),
('Petit', 'Emma', 'emma.petit@example.com', 'emma.jpg', 6, 6, 'pass987'),
('Durand', 'Louis', 'louis.durand@example.com', 'louis.jpg', 7, 7, 'pass147'),
('Leroy', 'Julie', 'julie.leroy@example.com', 'julie.jpg', 8, 8, 'pass258'),
('Moreau', 'Hugo', 'hugo.moreau@example.com', 'hugo.jpg', 9, 9, 'pass369'),
('Simon', 'Laura', 'laura.simon@example.com', 'laura.jpg', 10, 10, 'pass159'),
('Laurent', 'Antoine', 'antoine.laurent@example.com', 'antoine.jpg', 11, 2, 'pass753'),
('Lefebvre', 'Camille', 'camille.lefebvre@example.com', 'camille.jpg', 12, 8, 'pass852'),
('Michel', 'Thomas', 'thomas.michel@example.com', 'thomas.jpg', 13, 2, 'pass951'),
('Garcia', 'Chloé', 'chloe.garcia@example.com', 'chloe.jpg', 14, 7, 'pass357'),
('David', 'Lucas', 'lucas.david@example.com', 'lucas.jpg', 1, 8, 'pass456'),
('Bertrand', 'Manon', 'manon.bertrand@example.com', 'manon.jpg', 2, 4, 'pass654'),
('Roux', 'Nathan', 'nathan.roux@example.com', 'nathan.jpg', 3, 9, 'pass789'),
('Vincent', 'Léa', 'lea.vincent@example.com', 'lea.jpg', 4, 8, 'pass123'),
('Fournier', 'Enzo', 'enzo.fournier@example.com', 'enzo.jpg', 5, 5, 'pass321'),
('Morel', 'Anna', 'anna.morel@example.com', 'anna.jpg', 6, 10, 'pass987');

SELECT s.*,b.bac_nom as bacname ,r.Specialite_nom as Specialitenom  FROM stagiaire s JOIN baccalaureat b ON s.id_bac = b.id_bac 
JOIN Specialite r ON s.id_Specialite = r.id_Specialite WHERE email = 'anna.morel@example.com' AND pas = 'pass987';
UPDATE stagiaire SET nom = 'test', prenom = 'test' WHERE id = 20;
select * from stagiaire;



