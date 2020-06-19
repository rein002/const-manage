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
            'email_verified_at' => now(),
        ]);
        DB::table('users')->insert([
            'id' => '11',
            'name' => '発注太郎',
            'email' => 'tarou@example.com',
            'password' => bcrypt('00000000'),
        ]);
        DB::table('users')->insert([
            'id' => '21',
            'name' => '発注次郎',
            'email' => 'jirou@example.com',
            'password' => bcrypt('00000000'),
        ]);
        DB::table('users')->insert([
            'id' => '31',
            'name' => '発注三郎',
            'email' => 'saburou@example.com',
            'password' => bcrypt('00000000'),
        ]);
        DB::table('users')->insert([
            'id' => '41',
            'name' => '山田花子',
            'email' => 'hanako@example.com',
            'password' => bcrypt('00000000'),
        ]);
        DB::table('users')->insert([
            'id' => '51',
            'name' => '佐藤春子',
            'email' => 'haruko@example.com',
            'password' => bcrypt('00000000'),
        ]);
        DB::table('users')->insert([
            'id' => '61',
            'name' => '鈴木夏子',
            'email' => 'natsuko@example.com',
            'password' => bcrypt('00000000'),
        ]);
    }
}
