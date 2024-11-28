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
        $books = Book::withCount('reviews')->withAvg('reviews', 'score')->get();

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
            return redirect('top'); // トップページにリダイレクト
        }

        // 認証に失敗した場合
        return redirect()->back()->with('error','IDまたはパスワードが間違っています');

    }

    public function logout()
    {
        // セッションからユーザ情報を削除
        Session::forget('user');
        return redirect('/'); // ログインページにリダイレクト
    }

    public function detail(Request $req) 
    {
        $bookId = $req->input('id');
        $record = Book::withCount('reviews')->withAvg('reviews','score')->findOrFail($bookId);
        $reviews = Book::with('reviews.employee')->find($bookId);
        
        // 書籍が見つからない場合は404エラーを返す
        if (!$record) {
            abort(404);
        }

        // セッションからユーザ情報を取得
        $user = Session::get('user');

        return view('detail', compact('record', 'reviews', 'user')); // 詳細ページにデータを渡す
    }

    public function review_register(Request $req)
    {
        $bookId = $req->input('book_id'); // 書籍IDを取得
        $book = Book::find($bookId); // 書籍情報を取得 (IDで検索)

        // 書籍が見つからない場合の処理
        if (!$book) {
            abort(404); // 404エラーを返す
        }

        $user = session('user'); // セッションからユーザ情報を取得
        $name = $user ? $user->name : 'ゲスト'; // ユーザー名を取得

        return view('review_register', compact('book', 'name')); // ビューに渡す
    }


    public function top()
    {
        if (!session()->has('user')) {
            return redirect('login');
        }

        return view('top');
    }
    
    // レビューを保存
    public function store(Request $req)
    {
        // バリデーション
        $validateData = $req->validate([
            'post_content' => 'required|string|max:500',
            'reviewScore' => 'required|string',
            'book_id' => 'required|exists:books,id', // 書籍IDがbooksテーブルに存在することを確認
        ]);

        // 新しいレビューを作成
        $review = new Review();
        $review->post_content = $validateData['post_content'];
        $review->score = $validateData['reviewScore'];
        $review->book_id = $validateData['book_id'];
        $review->employee_id = Session::get('user')->id; // セッションからユーザIDを取得

        // レビューを保存
        $review->save();

        // 成功メッセージをセッションに保存
        return redirect()->route('reviews.complete')
            ->with([
                'name' => Session::get('user')->name, // 投稿者名
                'post_content' => $review->post_content, // レビュー本文
                'score' => $review->score, // 点数
                'book_id' => $review->book_id // 書籍IDを追加
            ]);
    }

    public function review_complete(Request $req) 
    {
        // セッションからデータを取得
        $name = $req->session()->get('name');
        $post_content = $req->session()->get('post_content');
        $score = $req->session()->get('score');
        $book_id = $req->session()->get('book_id'); // 書籍IDを取得

        return view('review_complete', compact('name','post_content','score', 'book_id'));
    }

    public function registerBook(Request $request)
    {
        // バリデーションを追加

        $book_data = new Book();

        $data = $request->validate([
            'isbn' => 'required|digits:13',
            'book_name' => 'required|string|max:255',
            'author' => 'nullable|string|max:255',
            'publisher_name' => 'nullable|string|max:255',
            'price' => 'nullable|numeric',
        ]);

        $book_data->isbn = $request->isbn;
        $book_data->book_name = $request->book_name;
        $book_data->author = $request->author;
        $book_data->publisher_name = $request->publisher_name;
        $book_data->price = $request->price;




        // データを保存
        $book_data->save(); // 画像がある場合は適宜修正

        return redirect('/book_complete'); // 登録完了ページへリダイレクト
    }

    // レビュー削除のメソッド
    public function destroy(Request $req) 
    {
        // 指定されたIDのレビューを取得
        $review = Review::findOrFail($req->id);

        // レビューを削除
        $review->delete();

        // 成功メッセージをセッションに保存
        Session::flash('success', 'レビューが削除されました');

        // リダイレクトする場所を指定
        return redirect()->back();
    }

    public function edit(Request $req)
    {
        // リクエスト時のmethodの種類を判別
        if ($req->isMethod('get')) { // GET通信の場合
            $id = $req->input('id'); // 修正対象データのIDを取得
            $record = Review::find($id); // IDに基づいてレビューを取得

            // レビューが見つからない場合は404エラーを返す
            if (!$record) {
                abort(404);
            }

            return view('review_update', compact('record')); // データを指定してビューを表示
        } elseif ($req->isMethod('post')) { // POST通信の場合
            $id = $req->input('id'); // 修正対象データのIDを取得

            // IDに基づいてレビューを取得
            $record = Review::find($id);

            // レビューが見つからない場合は404エラーを返す
            if (!$record) {
                abort(404);
            }

            return view('review_update', compact('record')); // データを指定してビューを表示
        } else { // GET/POST以外の場合
            return redirect('/'); // Topページにリダイレクト
        }
    }

    public function update(Request $req)
    {
        // 修正対象のIDに該当するレコードを取得
        $review = Review::find($req->id);

        // レビューが見つからない場合は404エラーを返す
        if (!$review) {
            abort(404);
        }

        // フォームに入力されているデータをモデルに代入（上書き）
        $review->post_content = $req['post_content'];
        $review->score = $req['score'];

        // モデルのデータをテーブルに保存（上書き）
        $review->save();

        $data = [
            'post_content' => $req['post_content'],
            'score' => $req['score'],
            'name' => Session::get('user')->name,
            'book_id' => $review->book_id // 書籍IDを取得
        ];


        // 更新完了後のメッセージやリダイレクト先を指定
        return view('review_update_complete', $data);
    }


}
