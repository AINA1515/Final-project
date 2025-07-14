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
    $uploadDir = __DIR__ . '/../uploads/';
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