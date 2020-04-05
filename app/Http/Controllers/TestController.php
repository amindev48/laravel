<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function insert(){
        DB::insert('insert into test_command_db(title,content) values (?,?)',['amin','amin content']);
    }

    public function select(){
        $val = DB::select('select * from test_command_db');
        return $val;
    }

    public function update(){
        DB::update('update test_command_db set title=? , content=? where id=?',['title updated','content updated',4]);
    }

    public function delete (){
        DB::delete('delete from test_command_db ');
    }
}
