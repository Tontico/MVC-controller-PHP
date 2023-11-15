<?php

function constructFormMultiplie($method)
{
    return "<form method='POST' action='".generateUrl($_GET['controller'],$method)."'>
        <input type='text' placeholder='axe X' name='axex'>
        <input type='text' placeholder='axe Y' name='axey'>
        <input type='submit' name='submit' value='générer la table'>
    </form>";
}

function validateFormMultiplie()
{
    if (isset($_POST['axex']) && $_POST['axex']!==''
        && isset($_POST['axey']) && $_POST['axey']!==''
        && is_numeric($_POST['axex']) && is_numeric((int)$_POST['axey'])
        && !str_contains($_POST['axex'],'.') && !str_contains($_POST['axey'],'.')) {
            return true;
        }
        return false;
}