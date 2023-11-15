<?php

include_once(__DIR__ . '/../forms/avatarForm.php');


function loadAvatar()
{

    $form = constructAvatarForm();
    $error = [];
    if (isset($_POST['submit']) && (($error = processAvatarForm()) === true)) {
        //vérifie si le fichier a été téléchargé avec succès
        if (is_connected()) {
            processAvatarForm();
    
        } else {
            $error[] = 'Il faut vous connectez pour pouvoir load un avatar';
        }
    }

    createView([
        'title' => 'Télécharger ou modifier votre avatar',
        'form' => $form,
        'error' => $error,
    ], '/avatar/form.php');
}
