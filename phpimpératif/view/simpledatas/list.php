<main>
    <?php
        foreach($datas as $key=>$data) {
            echo $data;
            if(is_connected()) {
                echo "<a href='".generateUrl('simpleDatas','updateData',['cle'=>$key])."'>Modifier</a>";
            }            
            echo "<a href='".generateUrl('simpleDatas','displayOne',['cle'=>$key])."'>Voir</a><br>";
        }
    ?>
</main>