<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IsbnSinController extends Controller
{
    //
    public function searchBook(Request $request)
    {
        
            // ISBNを取得
            $isbn = $request->input('ISBN');
            $response = Http::get("https://api.openbd.jp/v1/get?isbn={$isbn}");
            $bookInfo = $response->json();
    
            if (!empty($bookInfo[0])) {
                // 書籍情報を取得
                $bookData = $bookInfo[0]['summary'];
                return view('book_register', compact('bookData'));
            }
    
            return redirect()->back()->with('error', '書籍が見つかりませんでした。');
        }
}
