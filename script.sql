/*drop database wiki;*/

create database wiki;
use wiki;


-- Création de la table Role 
CREATE TABLE Role (
    id INT PRIMARY KEY,
    role_type ENUM('Author', 'Admin') NOT NULL
);

-- Création de la table User 
CREATE TABLE User (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role_id INT,
    FOREIGN KEY (role_id)
        REFERENCES Role (id)
);


-- Création de la table Categorie
CREATE TABLE Categorie (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) UNIQUE NOT NULL,
    user_id INT,
    FOREIGN KEY (user_id)
        REFERENCES User (id)
);



-- Création de la table Tag
CREATE TABLE Tag (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) UNIQUE NOT NULL,
    user_id INT,
    FOREIGN KEY (user_id)
        REFERENCES User (id)
);


-- Création de la table Wiki
CREATE TABLE Wiki (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title  VARCHAR(50) UNIQUE NOT NULL,
    description  VARCHAR(100)  NOT NULL,
    content longtext,
   date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	status enum("Pending","Approved","Rejected"),
        user_id INT,
         categorie_id INT,
    FOREIGN KEY (user_id)
        REFERENCES User (id),
          FOREIGN KEY (categorie_id)
        REFERENCES Categorie (id)
);


create table wiki_tag (
   id INT PRIMARY KEY AUTO_INCREMENT,
   id_wiki int,
   id_tag int,
       FOREIGN KEY (id_wiki)
        REFERENCES wiki (id),
          FOREIGN KEY (id_tag)
        REFERENCES tag (id)

);


-- Insertion des Role
INSERT INTO Role (id, role_type)
VALUES 
    (1, 'Author'),
    (2, 'Admin');







