<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::insert('INSERT INTO users (name, email, password) VALUES ("テストユーザー", "test@example.com", "test0000")');
        DB::insert('INSERT INTO users (name, email, password) VALUES ("鈴木太郎", "tarou@example.com", "00000000")');
        DB::insert('INSERT INTO users (name, email, password) VALUES ("山田花子", "hanako@example.com", "00000000")');
    }
}
