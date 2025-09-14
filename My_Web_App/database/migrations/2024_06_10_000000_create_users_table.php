<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });
        
        // Seed users
        $this->seedUsers();
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
    
    private function seedUsers(): void
    {
        $users = [
            [
                'name' => 'Michael',
                'email' => 'michael@gmail.com',
                'password' => Hash::make('Moka@123'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Mina',
                'email' => 'mina@gmail.com',
                'password' => Hash::make('Mina@123'),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
        
        DB::table('users')->insert($users);
    }
};
