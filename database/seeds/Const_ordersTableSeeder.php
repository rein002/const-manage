<?php

use Illuminate\Database\Seeder;

class Const_ordersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert('INSERT INTO const_orders (const_name, place, genre, user_id, status, order_date)
            VALUES ("A処理場ポンプ設備工事", "A処理場", "機械", 1, "発注済", "2020-4-1")');
        DB::insert('INSERT INTO const_orders (const_name, place, genre, user_id, status)
            VALUES ("A処理場ポンプ電気設備工事", "A処理場", "電気", 1, "設計中")');
        DB::insert('INSERT INTO const_orders (const_name, place, genre, user_id, status)
            VALUES ("B処理場送風機設備工事", "B処理場", "機械", 2, "設計中")');
        DB::insert('INSERT INTO const_orders (const_name, place, genre, user_id, status, order_date)
            VALUES ("C処理場送風機設備工事", "A処理場", "機械", 2, "発注済", "2020-5-1")');
        DB::insert('INSERT INTO const_orders (const_name, place, genre, user_id, status)
            VALUES ("C処理場送風機電気設備工事", "A処理場", "電気", 3, "設計中")');
    }
}
