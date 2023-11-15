    <header>
        <nav>
            <ul>
                <?php
                //On vérifie l'extension et on affiche l'image selon son extension et si il est connecté
                if (isset($_SESSION['username']) && (file_exists($file = 'upload/' . $_SESSION['username'] . '.jpg')) && is_connected()) {
                    echo "<img style='width:200px;' src='$file' alt='Avatar de lutilisateur'>";
                }

                if (isset($_SESSION['username']) && (file_exists($file = 'upload/' . $_SESSION['username'] . '.png')) && is_connected()) {
                    echo "<img style='width:200px;' src='$file' alt='Avatar de lutilisateur'>";
                }

                if (isset($_SESSION['username']) && (file_exists($file = 'upload/' . $_SESSION['username'] . '.jpeg')) && is_connected()) {
                    echo "<img style='width:200px;' src='$file' alt='Avatar de lutilisateur'>";
                }

                ?>
                <li><a href="<?php echo generateUrl('simpleDatas', 'displayAll'); ?>">Liste des données</a></li>
                <?php if (is_connected()) : ?>
                    <li><a href="<?php echo generateUrl('simpleDatas', 'createData'); ?>">Ajouter</a></li>
                <?php endif; ?>
                <li><a href="<?php echo generateUrl('multiplie', 'displayMultiplie'); ?>">Tables de multiplication</a></li>
                <?php
                if (!is_connected()) :
                ?>
                    <li><a href="<?php echo generateUrl('security', 'login'); ?>">Se connecter</a></li>
                    <li><a href="<?php echo generateUrl('security', 'registration'); ?>">S'enregistrer</a></li>
                <?php
                else :
                ?>
                    <li><a href="<?php echo generateUrl('security', 'disconnect'); ?>">Se déconnecter</a></li>
                <?php
                    //téléchargé si l'on n'a pas d'avatar, modifier sinon;
                    if (is_connected()) {
                        $user = $_SESSION["username"];
                        $extensions = ["png", "jpg", "jpeg"];
                        $exists = false;

                        foreach ($extensions as $extension) {
                            $file = 'upload/' . $user . '.' . $extension;
                            //si le fichier exists alors on le passe a true et on sort de la conditions;
                            if (file_exists($file)) {
                                $exists = true;
                                break;
                            }
                        }
                        //si faux alors télécharger sinon modifier;
                        if (!$exists) {
                            echo '<li><a href="' . generateUrl('avatar', 'loadAvatar') . '">Téléchargez votre avatar</a></li>';
                        } else {
                            echo '<li><a href="' . generateUrl('avatar', 'loadAvatar') . '">Modifiez votre avatar</a></li>';
                        }
                    }

                endif ?>
            </ul>
        </nav>
    </header>