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
        DB::table('users')->insert([
            'id' => '1',
            'name' => 'テストユーザー',
            'email' => 'test@example.com',
            'password' => bcrypt('test0000'),
        ]);
        DB::table('users')->insert([
            'id' => '11',
            'name' => '鈴木太郎',
            'email' => 'tarou@example.com',
            'password' => bcrypt('00000000'),
        ]);
        DB::table('users')->insert([
            'id' => '21',
            'name' => '山田花子',
            'email' => 'hanako@example.com',
            'password' => bcrypt('00000000'),
        ]);



        // DB::insert('INSERT INTO users (name, email, password) VALUES ("テストユーザー", "test@example.com", "test0000")');
        // DB::insert('INSERT INTO users (name, email, password) VALUES ("鈴木太郎", "tarou@example.com", "00000000")');
        // DB::insert('INSERT INTO users (name, email, password) VALUES ("山田花子", "hanako@example.com", "00000000")');
    }
}
