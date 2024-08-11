<?php

 function banco_de_dados_aplicacao($date_from_db){
    $format = 'd/m/Y';
    $dateFormat = \DateTime::createFromFormat($format, $date_from_db )->format('Y-m-d');
    return $dateFormat;
};