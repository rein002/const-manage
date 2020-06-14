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
        DB::insert('INSERT INTO const_orders (const_name, place, genre, user_id, status, order_date) VALUES ("A処理場ポンプ棟躯体工事", "A処理場", "土木", 11, "発注済", "1998-6-1")');
        DB::insert('INSERT INTO const_orders (const_name, place, genre, user_id, status, order_date) VALUES ("A処理場ポンプ棟建築工事", "A処理場", "建築", 21, "発注済", "2000-7-1")');
        DB::insert('INSERT INTO const_orders (const_name, place, genre, user_id, status, order_date) VALUES ("A処理場汚水ポンプ設備工事", "A処理場", "機械", 31, "発注済", "2003-8-1")');
        DB::insert('INSERT INTO const_orders (const_name, place, genre, user_id, status, order_date) VALUES ("A処理場汚水ポンプ電気設備工事", "A処理場", "電気", 41, "発注済", "2003-9-1")');
        DB::insert('INSERT INTO const_orders (const_name, place, genre, user_id, status, order_date) VALUES ("A処理場機械棟建築機械設備工事", "A処理場", "機械", 51, "発注済", "2005-10-1")');
        DB::insert('INSERT INTO const_orders (const_name, place, genre, user_id, status, order_date) VALUES ("A処理場機械棟建築電気設備工事", "A処理場", "電気", 61, "発注済", "2005-11-1")');

        DB::insert('INSERT INTO const_orders (const_name, place, genre, user_id, status, order_date) VALUES ("B処理場ポンプ棟躯体工事", "B処理場", "土木", 11, "発注済", "2000-6-1")');
        DB::insert('INSERT INTO const_orders (const_name, place, genre, user_id, status, order_date) VALUES ("B処理場ポンプ棟建築工事", "B処理場", "建築", 21, "発注済", "2002-7-1")');
        DB::insert('INSERT INTO const_orders (const_name, place, genre, user_id, status, order_date) VALUES ("B処理場汚水ポンプ設備工事", "B処理場", "機械", 31, "発注済", "2005-8-1")');
        DB::insert('INSERT INTO const_orders (const_name, place, genre, user_id, status, order_date) VALUES ("B処理場汚水ポンプ電気設備工事", "B処理場", "電気", 41, "発注済", "2005-9-1")');
        DB::insert('INSERT INTO const_orders (const_name, place, genre, user_id, status, order_date) VALUES ("B処理場機械棟建築機械設備工事", "B処理場", "機械", 51, "発注済", "2007-10-1")');
        DB::insert('INSERT INTO const_orders (const_name, place, genre, user_id, status, order_date) VALUES ("B処理場機械棟建築電気設備工事", "B処理場", "電気", 61, "発注済", "2007-11-1")');

        DB::insert('INSERT INTO const_orders (const_name, place, genre, user_id, status, order_date) VALUES ("C処理場沈砂池躯体工事", "C処理場", "土木", 11, "発注済", "2003-6-1")');
        DB::insert('INSERT INTO const_orders (const_name, place, genre, user_id, status, order_date) VALUES ("C処理場沈殿池躯体工事", "C処理場", "土木", 11, "発注済", "2005-7-1")');
        DB::insert('INSERT INTO const_orders (const_name, place, genre, user_id, status, order_date) VALUES ("C処理場ポンプ棟建築工事", "C処理場", "建築", 21, "発注済", "2008-8-1")');
        DB::insert('INSERT INTO const_orders (const_name, place, genre, user_id, status, order_date) VALUES ("C処理場機械スクリーン設備工事", "C処理場", "機械", 31, "発注済", "2008-8-1")');
        DB::insert('INSERT INTO const_orders (const_name, place, genre, user_id, status, order_date) VALUES ("C処理場雨水ポンプ設備工事", "C処理場", "機械", 31, "発注済", "2011-8-1")');
        DB::insert('INSERT INTO const_orders (const_name, place, genre, user_id, status, order_date) VALUES ("C処理場機械スクリーン電気設備工事", "C処理場", "電気", 41, "発注済", "2011-9-1")');
        DB::insert('INSERT INTO const_orders (const_name, place, genre, user_id, status, order_date) VALUES ("C処理場雨水ポンプ電気設備工事", "C処理場", "電気", 41, "発注済", "2011-9-1")');
        DB::insert('INSERT INTO const_orders (const_name, place, genre, user_id, status) VALUES ("C処理場ポンプ棟機械設備工事", "C処理場", "機械", 51, "積算中")');
        DB::insert('INSERT INTO const_orders (const_name, place, genre, user_id, status) VALUES ("C処理場ポンプ棟建築電気設備工事", "C処理場", "電気", 61, "積算中")');

        DB::insert('INSERT INTO const_orders (const_name, place, genre, user_id, status) VALUES ("D処理場反応層躯体工事", "D処理場", "土木", 11, "決済中")');
        DB::insert('INSERT INTO const_orders (const_name, place, genre, user_id, status) VALUES ("D処理場かくはん機設備工事", "D処理場", "機械", 31, "積算中")');
        DB::insert('INSERT INTO const_orders (const_name, place, genre, user_id, status) VALUES ("D処理場かくはん機電気設備工事", "D処理場", "電気", 41, "積算中")');
        DB::insert('INSERT INTO const_orders (const_name, place, genre, user_id, status) VALUES ("D処理場沈澄池躯体工事", "D処理場", "土木", 11, "積算中")');
        DB::insert('INSERT INTO const_orders (const_name, place, genre, user_id, status) VALUES ("D処理場汚泥かき寄せ機設備工事", "D処理場", "機械", 31, "設計中")');
        DB::insert('INSERT INTO const_orders (const_name, place, genre, user_id, status) VALUES ("D処理場汚泥かき寄せ機電気設備工事", "D処理場", "電気", 41, "設計中")');
    }
}
