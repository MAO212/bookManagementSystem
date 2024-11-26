<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book; // Bookモデルをインポート
use App\Models\Employee; // Employeeモデルをインポート
use App\Models\Review; // Reviewモデルをインポート
use Illuminate\Support\Facades\Session;

class BookController extends Controller
{
    public function index()
    {
        if (!session()->has('user')) {
            return redirect('login');
        }
        
        // データベースから書籍データを取得
        $books = Book::all(); // 全ての書籍を取得

        // ビューにデータを渡す
        return view('index', ['books' => $books]);
    }

    public function login(Request $req)
    {
        // フォームからの入力を取得
        $userId = $req->input('userId');
        $password = $req->input('password');

        // ユーザーをデータベースから取得
        $user = Employee::where('id', $userId)->first();
        // パスワードの確認
        if ($password === $user->pass) {
            // パスワードが正しい場合、ユーザー情報をセッションに保存
            Session::put('user', $user);
            return redirect('index'); // トップページにリダイレクト
        }

        // 認証に失敗した場合
        return redirect()->back()->with('error','IDまたはパスワードが間違っています');

    }

    public function logout()
    {
        // セッションからユーザ情報を削除
        Session::forget('user');
        return redirect('login'); // ログインページにリダイレクト
    }
    
}
