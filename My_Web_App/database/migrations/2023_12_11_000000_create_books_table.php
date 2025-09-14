<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->text('description')->nullable();
            $table->decimal('price', 8, 2)->default(0);
            $table->integer('quantity')->default(0);
            $table->string('cover_image')->nullable();
            $table->timestamps();
        });

        // Seed books data
        $this->seedBooks();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }

    /**
     * Seed books with initial data
     */
    private function seedBooks()
    {
        $books = [
            [
                'title' => 'The Great Gatsby',
                'author' => 'F. Scott Fitzgerald',
                'description' => 'A novel about the American Dream set in the 1920s.',
                'price' => 12.99,
                'quantity' => 25,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'To Kill a Mockingbird',
                'author' => 'Harper Lee',
                'description' => 'A novel about racial inequality in the American South.',
                'price' => 14.99,
                'quantity' => 30,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => '1984',
                'author' => 'George Orwell',
                'description' => 'A dystopian novel about totalitarianism and surveillance.',
                'price' => 11.99,
                'quantity' => 20,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'The Hobbit',
                'author' => 'J.R.R. Tolkien',
                'description' => 'A fantasy novel about the adventures of Bilbo Baggins.',
                'price' => 15.99,
                'quantity' => 15,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Pride and Prejudice',
                'author' => 'Jane Austen',
                'description' => 'A romantic novel about relationships and social standing.',
                'price' => 10.99,
                'quantity' => 35,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        DB::table('books')->insert($books);
    }
}
