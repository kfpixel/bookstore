<?php

namespace Tests\Unit;

use App\Http\Controllers\BookController;
use App\Models\Book;
use Illuminate\Http\Request;
use Tests\TestCase;

class BookControllerTest extends TestCase{

    public function test_book_add_success(){

        $response = $this->post('/api/books', [
            'title' => 'foo',
            'author' => 'bar',
            'isbn' => 'baz',
            'price' => 12.34
        ]);
        $response->assertStatus(200);

    }

    public function test_book_add_fail(){

        $response = $this->post('/api/books', [
            'foo' => null
        ]);
        $response->assertStatus(302);
    
    }

    public function test_book_edit_success(){

        $response = $this->put('/api/books/1', [
            'title' => 'foo',
            'author' => 'bar',
            'isbn' => 'baz',
            'price' => 12.34
        ]);
        $response->assertStatus(200);

    }

    public function test_book_edit_fail_validation(){

        $response = $this->put('/api/books/1', [
            'foo' => null
        ]);
        $response->assertStatus(302);
    
    }

    public function test_book_edit_fail_404(){

        $response = $this->put('/api/books/-1', [
            'title' => 'foo',
            'author' => 'bar',
            'isbn' => 'baz',
            'price' => 12.34
        ]);
        $response->assertStatus(404);
    
    }

}