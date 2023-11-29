CREATE TABLE t_auteur(
   id_auteur INT AUTO_INCREMENT,
   autNomAuteur VARCHAR(50),
   autPrenomAuteur VARCHAR(50),
   PRIMARY KEY(id_auteur)
);

CREATE TABLE t_categorie(
   id_categorie INT,
   catNomCategorie VARCHAR(50),
   PRIMARY KEY(id_categorie)
);

CREATE TABLE t_utilisateur(
   id_utilisateur INT,
   utiPseudo VARCHAR(50),
   utiDateEntree INT,
   utiNombreOuvrages INT,
   utiNombreAppreciations INT,
   PRIMARY KEY(id_utilisateur)
);

CREATE TABLE t_ouvrage(
   id_ouvrage INT,
   ouvTitre VARCHAR(50),
   ouvNombrePages INT,
   ouvExtrait VARCHAR(50),
   ouvResume VARCHAR(50),
   ouvAnneeEdition INT,
   ouvCheminImage VARCHAR(200),
   ouvNomEditeur VARCHAR(50),
   fkUtilisateur INT NOT NULL,
   fkAuteur INT NOT NULL,
   fkCategorie INT NOT NULL,
   PRIMARY KEY(id_ouvrage),
   FOREIGN KEY(fkUtilisateur) REFERENCES t_utilisateur(id_utilisateur),
   FOREIGN KEY(fkAuteur) REFERENCES t_auteur(id_auteur),
   FOREIGN KEY(fkCategorie) REFERENCES t_categorie(id_categorie)
);

CREATE TABLE t_evaluer(
   fkOuvrage INT,
   fkUtilisateur INT,
   note TINYINT,
   PRIMARY KEY(fkOuvrage, fkUtilisateur),
   FOREIGN KEY(fkOuvrage) REFERENCES t_ouvrage(id_ouvrage),
   FOREIGN KEY(fkUtilisateur) REFERENCES t_utilisateur(id_utilisateur)
);
