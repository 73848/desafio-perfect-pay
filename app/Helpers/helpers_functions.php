<?php

 function aplicacao_banco_de_dados_($date_from_app){
    $format = 'd/m/Y';
    $dateFormat = \DateTime::createFromFormat($format, $date_from_app )->format('Y-m-d');
    return $dateFormat;
};

function banco_de_dados_aplicacao($date_from_db){
    $format = 'Y-m-d';
    $date_formated = \DateTime::createFromFormat($format, $date_from_db )->format('d/m/Y');
    return $date_formated;

}