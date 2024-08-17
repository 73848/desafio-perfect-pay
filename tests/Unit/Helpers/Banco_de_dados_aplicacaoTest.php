<?php

namespace Tests\Feature;

use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

# php artisan test --filter=HelpersDBAplication
class HelpersDBAplication extends TestCase
{
    public function is_test_aplicacao_banco_de_dados__is_working_corretly(){
        $date_from_db = '18/10/1972';

        $date_formated = aplicacao_banco_de_dados_($date_from_db);

        $this->assertEquals('1972-10-18', $date_formated);
        
    }

    public function is_test_banco_de_dados_aplicacao_is_working_corretly(){
        $date_from_db = '1972-10-18';

        $date_formated = banco_de_dados_aplicacao($date_from_db);

        $this->assertEquals('18/10/1972', $date_formated);
        
    }

   
    




}
