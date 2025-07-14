--data test

--MEMBRES

INSERT INTO final_membre (nom, date_de_naissance, genre, email, ville, mdp, image_profil)
VALUES 
('Jean Dupont', '1990-05-15', 'M', 'jean.dupont@email.com', 'Paris', 'password123', 'jean.jpg'),
('Marie Martin', '1985-08-22', 'F', 'marie.martin@email.com', 'Lyon', 'securepass', 'marie.jpg'),
('Pierre Lambert', '1992-11-30', 'M', 'pierre.lambert@email.com', 'Marseille', 'pierrepass', 'pierre.jpg'),
('Sophie Bernard', '1988-03-17', 'F', 'sophie.bernard@email.com', 'Toulouse', 'sophie123', 'sophie.jpg');


--CATEGORIES

INSERT INTO final_categorie_objet (nom_categorie)
VALUES 
('Esthetique'),
('Bricolage'),
('Mecanique'),
('Cuisine');


--OBJETS


INSERT INTO final_objet (nom_objet, id_categorie, id_membre)
VALUES
-- Esthetique (id_categorie = 1)
('Seche-cheveux professionnel', 1, 1),
('Kit de maquillage complet', 1, 1),
-- Bricolage (id_categorie = 2)
('Perceuse a percussion', 2, 1),
('Scie circulaire', 2, 1),
('Tournevis electrique', 2, 1),
-- Mecanique (id_categorie = 3)
('Cric hydraulique', 3, 1),
('Valise a outils complete', 3, 1),
-- Cuisine (id_categorie = 4)
('Robot multifonction', 4, 1),
('Machine a pain', 4, 1),
('Set de couteaux professionnels', 4, 1);



INSERT INTO final_objet (nom_objet, id_categorie, id_membre)
VALUES
-- Esthetique
('Lisseur cheveux', 1, 2),
('Lampe UV pour ongles', 1, 2),
('Appareil de microdermabrasion', 1, 2),
-- Bricolage
('Ponceuse orbitale', 2, 2),
('Niveau laser', 2, 2),
-- Mecanique
("Compresseur d'air", 3, 2),
('Demonte-pneus', 3, 2),
-- Cuisine
('Machine a cafe expresso', 4, 2),
('Blender haute puissance', 4, 2),
('Crêpiere electrique', 4, 2);



INSERT INTO final_objet (nom_objet, id_categorie, id_membre)
VALUES
-- Esthetique
('Epilateur electrique', 1, 3),
-- Bricolage
("Meuleuse d'angle", 2, 3),
('Pistoler a peinture', 2, 3),
('Scie sauteuse', 2, 3),
('Ponceuse a bande', 2, 3),
-- Mecanique
('Outil de diagnostic voiture', 3, 3),
('Caisse a outils', 3, 3),
('Chandelles de garage', 3, 3),
-- Cuisine
('Friteuse sans huile', 4, 3),
('Moule a gâteau silicone', 4, 3);



INSERT INTO final_objet (nom_objet, id_categorie, id_membre)
VALUES
-- Esthetique
('Appareil de massage facial', 1, 4),
('Brosse nettoyante visage', 1, 4),
-- Bricolage
('Visseuse sans fil', 2, 4),
('Cle a chocs', 2, 4),
-- Mecanique
('Chargeur de batterie', 3, 4),
('Trousse de reparation velo', 3, 4),
('Jack de levage', 3, 4),
-- Cuisine
('Autocuiseur electrique', 4, 4),
('Machine a glaçons', 4, 4),
('Grille-pain professionnel', 4, 4);


--EMPRUNTS

-- Emprunt 1: Jean emprunte un objet de Marie (Machine à café)
INSERT INTO final_images_objet (id_image, id_objet, id_membre, date_emprunt, date_retour)
VALUES (1, 18, 1, '2023-05-10', '2023-05-17');

-- Emprunt 2: Marie emprunte un objet de Pierre (Friteuse sans huile)
INSERT INTO final_images_objet (id_image, id_objet, id_membre, date_emprunt, date_retour)
VALUES (2, 28, 2, '2023-06-15', '2023-06-22');

-- Emprunt 3: Pierre emprunte un objet de Sophie (Grille-pain professionnel)
INSERT INTO final_images_objet (id_image, id_objet, id_membre, date_emprunt, date_retour)
VALUES (3, 40, 3, '2023-07-01', '2023-07-08');

-- Emprunt 4: Sophie emprunte un objet de Jean (Robot multifonction)
INSERT INTO final_images_objet (id_image, id_objet, id_membre, date_emprunt, date_retour)
VALUES (4, 8, 4, '2023-08-12', '2023-08-19');

-- Emprunt 5: Jean emprunte un objet de Pierre (Outil de diagnostic voiture)
INSERT INTO final_images_objet (id_image, id_objet, id_membre, date_emprunt, date_retour)
VALUES (5, 26, 1, '2023-09-05', '2023-09-12');

-- Emprunt 6: Marie emprunte un objet de Sophie (Autocuiseur électrique)
INSERT INTO final_images_objet (id_image, id_objet, id_membre, date_emprunt, date_retour)
VALUES (6, 38, 2, '2023-10-20', '2023-10-27');

-- Emprunt 7: Pierre emprunte un objet de Marie (Blender haute puissance)
INSERT INTO final_images_objet (id_image, id_objet, id_membre, date_emprunt, date_retour)
VALUES (7, 19, 3, '2023-11-15', '2023-11-22');

-- Emprunt 8: Sophie emprunte un objet de Jean (Sèche-cheveux professionnel)
INSERT INTO final_images_objet (id_image, id_objet, id_membre, date_emprunt, date_retour)
VALUES (8, 1, 4, '2023-12-01', '2023-12-08');

-- Emprunt 9: Jean emprunte un objet de Sophie (Visseuse sans fil) - emprunt en cours
INSERT INTO final_images_objet (id_image, id_objet, id_membre, date_emprunt, date_retour)
VALUES (9, 33, 1, '2024-01-10', NULL);

-- Emprunt 10: Marie emprunte un objet de Pierre (Chandelles de garage) - emprunt en cours
INSERT INTO final_images_objet (id_image, id_objet, id_membre, date_emprunt, date_retour)
VALUES (10, 27, 2, '2024-01-15', NULL);