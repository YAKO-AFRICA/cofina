<?php

function Refgenerate($table,$init,$key)
{
    $latest = $table::latest('id')->first();
    if (! $latest) {
        return $init.'-00001';
    }

    $string = preg_replace("/[^0-9\.]/", '', $latest->$key);

    return $init.'-' . sprintf('%05d',$string+1);
}

function RefgenerateBulletinOld($table, $codeProduit, $key, $init)
{
    // Récupérer le dernier enregistrement de la table pour le code produit donné
    $contrat = $table::where('codeproduit', $codeProduit)
        ->orderBy('numBullettin', 'desc')
        ->first();

    // Si aucun contrat n'existe, retourner le numéro initial avec suffixe 1
    if (!$contrat) {
        return $init . '1';
    }

    $lastBulletin = $contrat->$key;

    $num = $lastBulletin + 1;

    // $rest = str_replace($init, '', $lastBulletin);

    return $num;
}

function RefgenerateBulletin($table, $codeProduit, $key, $init)
{
    // Récupérer le dernier enregistrement de la table pour le code produit donné
    $contrat = $table::where('codeproduit', $codeProduit)
        ->where('numBullettin', '!=', null)
        ->get();

    $nbr = count($contrat);

    // if (!$contrat) {
    //     return $nbr = '1';
    // }

    $lastBulletin = $nbr + 1;

    $num = $init . $lastBulletin;

    return $num;
}

function nombreEnLettre($nombre) {
    $unites = array('zero', 'un', 'deux', 'trois', 'quatre', 'cinq', 'six', 'sept', 'huit', 'neuf', 'dix', 'onze', 'douze', 'treize', 'quatorze', 'quinze', 'seize', 'dix-sept', 'dix-huit', 'dix-neuf');
    $dizaines = array('', 'dix', 'vingt', 'trente', 'quarante', 'cinquante', 'soixante', 'soixante-dix', 'quatre-vingts', 'quatre-vingt-dix');
    $centaines = array('', 'cent', 'deux cents', 'trois cents', 'quatre cents', 'cinq cents', 'six cents', 'sept cents', 'huit cents', 'neuf cents');

    if ($nombre < 20) {
        return $unites[$nombre];
    } elseif ($nombre < 100) {
        return $dizaines[floor($nombre / 10)] . ($nombre % 10 > 0 ? ' ' . $unites[$nombre % 10] : '');
    } elseif ($nombre < 1000) {
        return $centaines[floor($nombre / 100)] . ($nombre % 100 > 0 ? ' ' . nombreEnLettre($nombre % 100) : '');
    } elseif ($nombre < 1000000) {
        return nombreEnLettre(floor($nombre / 1000)) . ' mille' . ($nombre % 1000 > 0 ? ' ' . nombreEnLettre($nombre % 1000) : '');
    } elseif ($nombre < 1000000000) {
        return nombreEnLettre(floor($nombre / 1000000)) . ' million' . ($nombre % 1000000 > 0 ? ' ' . nombreEnLettre($nombre % 1000000) : '');
    } else {
        return nombreEnLettre(floor($nombre / 1000000000)) . ' milliard' . ($nombre % 1000000000 > 0 ? ' ' . nombreEnLettre($nombre % 1000000000) : '');
    }
}






?>