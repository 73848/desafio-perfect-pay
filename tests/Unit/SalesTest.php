<?php

namespace Tests\Unit;

use App\Http\Controllers\Sales;
use PHPUnit\Framework\TestCase;

class SalesTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
  

    public function test_aplicacao_banco_de_dados_is_running_corretly()
    {
        $controllerTest = new Sales();
        $dateFromApp = '03/10/2024';
        $result = $controllerTest->aplicacao_banco_de_dados_($dateFromApp);
        $this->assertEquals('2024-10-03', $result);
    }
}
