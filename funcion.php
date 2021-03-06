<?php
function sanear_string($string)
{
 
    $string = trim($string);
 
    $string = str_replace(
        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
        array('&aacute', '&aacute', '&aacute', '&aacute', '&aacute', '&Aacute', '&Aacute', '&Aacute', '&Aacute'),
        $string
    );
 
    $string = str_replace(
        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
        array('&eacute', '&eacute', '&eacute', '&eacute', '&Eacute', '&Eacute', '&Eacute', '&Eacute'),
        $string
    );
 
    $string = str_replace(
        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
        array('&iacute', '&iacute', '&iacute', '&iacute', '&Iacute', '&Iacute', '&Iacute', '&Iacute'),
        $string
    );
 
    $string = str_replace(
        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
        array('&oacute', '&oacute', '&oacute', '&oacute', '&Oacute', '&Oacute', '&Oacute', '&Oacute'),
        $string
    );
 
    $string = str_replace(
        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
        array('&uacute', '&uacute', '&uacute', '&uacute', '&Uacute', '&Uacute', '&Uacute', '&Uacute'),
        $string
    );
 
    $string = str_replace(
        array('ñ', 'Ñ', 'ç', 'Ç'),
        array('&ntilde', '&Ntilde', 'c', 'C',),
        $string
    );
 
    //Esta parte se encarga de eliminar cualquier caracter extraño
    /*
    $string = str_replace(
        array("\", "¨", "º", "-", "~",
             "#", "@", "|", "!", """,
             "·", "$", "%", "&", "/",
             "(", ")", "?", "'", "¡",
             "¿", "[", "^", "<code>", "]",
             "+", "}", "{", "¨", "´",
             ">", "< ", ";", ",", ":",
             ".", " "),
        '',
        $string
    );
    */
    
    return $string;
}
?>