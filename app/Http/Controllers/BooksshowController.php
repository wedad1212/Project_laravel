<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BooksshowController extends Controller
{
    public function getbooks($id){
    $Category=Categories::findorFail($id);
    $Books= DB::select('select * from books');
    return view('panel.showbook',compact(['Category','Books']));
    }
}
