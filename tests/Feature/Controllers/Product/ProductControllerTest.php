<?php

namespace Tests\Feature;

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Users;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

# php artisan test --filter=ProductUpdate
class ProductUpdate extends TestCase
{
    use RefreshDatabase;
    // PRODUTOS
    protected $productTest;
    protected $productForUpdateTest;
    protected $productTestArray;
    protected $arrayToCreateProducts;

    public function setUp(): void
    {
        parent::setUp();
        $this->arrayToCreateProducts = ['name' => 'Iphone 7','description' => 'O melhor móvel da atualizade',
        'price' => '800',];
        $this->productTest = Product::factory()->create($this->arrayToCreateProducts);
        $this->productForUpdateTest = ['name' => 'Iphone 15','description' => 'Esse sim é o melhor.',
            'price' => '10000'];
        // arrays para as requests    
        $this->productTestArray = Product::query()->where('id','1')->get()->toArray()[0];
    }

    public function test_product_are_update_correctly()
    {
        Event::fake();

        $admin = Users::factory()->create();
        $this->actingAs($admin)->withSession(['role_id' => '1', 'user_id' => '7']);
       
        $request = Request::create(route('product.edit', ['product' => 1]), 'PUT',  $this->productForUpdateTest);

        $product = new ProductController();

        $response = $product->edit($this->productTest, $request);
        // aqui a aplicacao redireciona logo apos a chamad ado metodo
        $this->assertEquals(302, $response->getStatusCode());

        $this->assertDatabaseHas('products', $this->productForUpdateTest);
    }
    public function test_product_are_set_correctly()
    {
        Event::fake();
        $request = Request::create('/products', 'POST', $this->arrayToCreateProducts);
        $controller = new ProductController;
        $response = $controller->create($request);

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertDatabaseHas('products',$this->arrayToCreateProducts );
    }

    public function test_product_are_deleted_corretly()
    {
        $product = new ProductController();
        $productDeleted = Product::create([
            'name' => 'Iphone 15',
            'description' => 'Esse sim é o melhor.',
            'price' => '10000',
        ]);
        $response = $product->delete($productDeleted);
        $this->assertEquals(302, $response->getStatusCode());
    }
}
