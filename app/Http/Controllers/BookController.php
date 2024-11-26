<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book; // Bookモデルをインポート
use App\Model\Employee; // Employeeモデルをインポート
use App\Models\Review; // Reviewモデルをインポート

class BookController extends Controller
{
    public function index()
    {
        // データベースから書籍データを取得
        $books = Book::all(); // 全ての書籍を取得

        // ビューにデータを渡す
        return view('index', ['books' => $books]);
    }
    
}
