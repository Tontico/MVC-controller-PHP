<?php

function constructAvatarForm()
{
    return "<form method='POST' action='" . generateUrl('avatar', 'loadAvatar') . "' enctype='multipart/form-data'>
        <input type='file' name='avatar' />
        <input type='submit' name='submit' value='télécharger'>
    </form>";
}

function processAvatarForm()
{
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === 0) {
        //vérifie le type de fichier

        $extensions = ['jpeg', 'jpg', 'png'];
        //normalise le fichier lowercase avec strtolower, pointe vers fin de tableau, possibilité d'utiliser PathInfo a la place de explode
        $ext = explode('.', $_FILES['avatar']['name']);
        $extArray = strtolower(end($ext));
        //1 ko = 1024octets donc 100 ko;
        $sizeImg = 100 * 1024;
        //on compare les deux variables
        if (in_array($extArray, $extensions)) {
            if ($_FILES['avatar']['size'] <= $sizeImg) {

                $name = 'upload/' . $_SESSION['username'] . '.' . $extArray;

                if (file_exists('upload/' . $_SESSION['username'] . '.jpg')) {
                    // Supprime l'ancien avatar
                    unlink('upload/' . $_SESSION['username'] . '.jpg');
                } else if (file_exists('upload/' . $_SESSION['username'] . '.jpeg')) {
                    // Supprime l'ancien avatar
                    unlink('upload/' . $_SESSION['username'] . '.jpeg');
                } else if (file_exists('upload/' . $_SESSION['username'] . '.png')) {
                    // Supprime l'ancien avatar
                    unlink('upload/' . $_SESSION['username'] . '.png');
                }

                if (move_uploaded_file($_FILES['avatar']['tmp_name'], $name)) {
                    echo 'Téléchargement réussi.';
                    redirect('index', 'index');
                } else {
                    echo 'Oups, une erreur est survenue lors du téléchargement, le fichier existe déja.';
                }
            } else {
                echo 'La taille du fichier dépasse la limite autorisée.';
            }
        } else {
            echo 'Type de fichier non autorisé.';
        }
    } else {
        echo 'Erreur lors du téléchargement du fichier.';
    }
}
