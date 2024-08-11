<?php

 function aplicacao_banco_de_dados_($date_from_app){
    $format = 'd/m/Y';
    $dateFormat = \DateTime::createFromFormat($format, $date_from_app )->format('Y-m-d');
    return $dateFormat;
};