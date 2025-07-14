<?php
require("connection.php");

function make_request($sql)
{
    return mysqli_query(dbconnect(), $sql);
}

function request_to_array($sql)
{
    $request = make_request($sql);
    $result = array();
    while ($r = mysqli_fetch_assoc($request)) {
        $result[] = $r;
    }
    mysqli_free_result($request);
    return $result;
}

function fetch_result($sql)
{
    $request = make_request($sql);
    $result = mysqli_fetch_assoc($request);
    mysqli_free_result($request);
    return $result;
}

function count_result($sql)
{
    $request = make_request($sql);
    $result = mysqli_num_rows($request);
    mysqli_free_result($request);
    return $result;
}

function isBefore($date, $other_date)
{
    $sql = "SELECT '%s' < '%s' AS valid_date";
    $sql = sprintf($sql, $date, $other_date);
    $request = make_request($sql);
    return fetch_result($request)['valid_date'] == 0 ? false : true;
}
function getDateDiff($date)
{
    $query = "SELECT TIMESTAMPDIFF(YEAR, '%s', NOW()) AS diffYear";
    $query = sprintf($query, $date);

    $result = make_request($query);
    $data = mysqli_fetch_assoc($result);
    mysqli_free_result($result);

    return $data['diffYear'];
}

function savefile($fichier)
{
    $uploadDir = __DIR__ . '/../assets/uploads/';
    $maxSize = 300 * 1024 * 1024; // 300 Mo
    $allowedMimeTypes = ['image/jpeg', 'image/png'];
    // Vérifie si un fichier est soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($fichier)) {
        $file = $fichier;
        if ($file['error'] !== UPLOAD_ERR_OK) {
            die('Erreur lors de l’upload : ' . $file['error']);
        }
        // Vérifie la taille
        if ($file['size'] > $maxSize) {
            die('Le fichier est trop volumineux.');
        }
        // Vérifie le type MIME avec `finfo`
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $file['tmp_name']);
        finfo_close($finfo);
        if (!in_array($mime, $allowedMimeTypes)) {
            die('Type de fichier non autorisé  : ' . $mime);
        }
        // renommer le fichier
        $originalName = pathinfo($file['name'], PATHINFO_FILENAME);
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $newName = $originalName . '_' . uniqid() . '.' . $extension;
        // Déplace le fichier
        if (move_uploaded_file($file['tmp_name'], $uploadDir . $newName)) {
            echo "Fichier uploadé avec succès : " . $newName;
            return $newName;
        } else {
            echo "Échec du déplacement du fichier.";
        }
    } else {
        echo "Aucun fichier reçu.";
    }
}

function getListObjet()
{
    $sql = "SELECT f.id_objet,f.nom_objet,f.id_categorie,m.*, e.date_emprunt, e.date_retour, c.nom_categorie, i.nom_image, i.id_image 
            FROM final_objet f JOIN final_membre m ON f.id_membre = m.id_membre
            JOIN final_categorie_objet c ON f.id_categorie = c.id_categorie
            LEFT JOIN final_images_objet i ON f.id_objet = i.id_objet
            LEFT JOIN final_emprunt e ON f.id_objet = e.id_objet";
    $result = request_to_array($sql);
    return $result;
}

function getObjet($id_objet)
{
    $sql = "select fi.*,fo.* from final_images_objet fi right join final_objet fo on fi.id_objet = fo.id_objet where fo.id_objet = '%s'";
    $sql = sprintf($sql, $id_objet);
    $result = fetch_result($sql);
        return $result;
    
}

function getAllImageObjet($id_membre)
{
    $sql = "select * from final_images_objet where id_objet in (select id_objet from final_objet where id_membre = '%s')";
    $sql = sprintf($sql, $id_membre);
    $result = request_to_array($sql);
    return $result;
}

function getFilteredListObjet($categorie)
{
    $conditions = array();
    foreach($categorie as $k)
    {
        $condition = "f.id_categorie = '%s'";
        $conditions[] =sprintf($condition, $k); 
    }
    $sql = "SELECT distinct f.id_objet,f.nom_objet,f.id_categorie,m.*, e.date_emprunt, e.date_retour, c.nom_categorie, i.nom_image, i.id_image 
            FROM final_objet f JOIN final_membre m ON f.id_membre = m.id_membre
            JOIN final_categorie_objet c ON f.id_categorie = c.id_categorie
            LEFT JOIN final_images_objet i ON f.id_objet = i.id_objet
            LEFT JOIN final_emprunt e ON f.id_objet = e.id_objet";
    $sql = $sql." where ";
    $sql = $sql.implode( " or " ,$conditions); 
    $result = request_to_array($sql);
    return $result;
}

function getListCategorie()
{
    $sql = "SELECT  * FROM final_categorie_objet";
    $result = request_to_array($sql);
    return $result;
}


function inscription($inscription)
{
    $sql = "INSERT INTO final_membre (nom, date_de_naissance, email, genre,ville,mdp,image_profil) VALUES ('%s', '%s', '%s', '%s','%s','%s', '%s')";
    $sql = sprintf($sql, $inscription['nom'], $inscription['dtn'], $inscription['email'], $inscription['genre'], $inscription["ville"], $inscription["mdp"], $inscription["image_profil"]);
    make_request($sql);
}

function log_in($logInfo)
{
    $sql = "SELECT id_membre, email, nom, date_de_naissance, image_profil, genre, ville FROM final_membre WHERE email = '%s' AND mdp = '%s'";
    $sql = sprintf($sql, $logInfo['email'], $logInfo['mdp']);

    $result = fetch_result($sql);
    return $result;
}

function addObjet($objet)
{
    $sql = "INSERT INTO final_objet (nom_objet, id_categorie, id_membre) VALUES ('%s', '%s', '%s')";
    $sql = sprintf($sql, $objet['nom_objet'], $objet['id_categorie'], $objet['id_membre']);
    $result = make_request($sql);

    $id_objet = "select max(id_objet) as id_objet from final_objet where nom_objet = '%s' and id_categorie = '%s' and id_membre = '%s'";
    $id_objet = sprintf($id_objet, $objet['nom_objet'], $objet['id_categorie'], $objet['id_membre']);
    $id_objet = fetch_result($id_objet);

    if (isset($objet['nom_image'])) {
        return addImageObjet($id_objet['id_objet'], $objet['nom_image']);
    }

}

function addImageObjet($id_objet, $image)
{
    $sql = "INSERT INTO final_images_objet (id_objet, nom_image) VALUES ('%s', '%s')";
    $sql = sprintf($sql, $id_objet, $image);
    make_request($sql);
    return $sql;
}

function getIfEmpreinter($objet)
{
    $sql = "SELECT * FROM final_emprunt WHERE id_objet = '%s' AND date_retour IS NULL";
    $sql = sprintf($sql, $objet["id_objet"]);
    $result = fetch_result($sql);
    if(count_result($sql)>0)
    {
        return true;
    }
    else{
        false;
    }
}

function calculEmpreint($nbrjour)
{
    $sql = "SELECT DATE_ADD(NOW(), INTERVAL '%s' DAY) AS date_retour";
    $sql = sprintf($sql, $nbrjour);
    $result = fetch_result($sql);
    return $result['date_retour'];
}

function calculdatederetour($nbrjour,$id_objet)
{
    $sql = "insert into final_emprunt (id_objet,date_emprunt,date_retour) values ('%s',NOW(),DATE_ADD(NOW(), INTERVAL '%s' DAY))";
    $sql = sprintf($sql, $id_objet, $nbrjour);
    make_request($sql);
}

function calculDifferencedeDate($emprunt)
{
    $sql = "select DATE_DIFF('%s', NOW()) as diff";
    $sql = sprintf($sql, $emprunt["date_retour"]);
    $result = fetch_result($sql);
    return $result['diff'];
}
