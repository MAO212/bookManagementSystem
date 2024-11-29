<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Book;


class IsbnSinController extends Controller
{
    //

    public function searchBook(Request $request)
    {
        $isbn = $request->input('isbn');
        $bookName = $request->input('book_name');

        $bookData = null;
        $error = null;

        // ISBNが入力されている場合
        if (!empty($isbn)) {
            // OpenBD APIから書籍情報を取得
            $response = Http::get("https://api.openbd.jp/v1/get?isbn={$isbn}");
            // dd($response);
            $bookInfo = $response->json();
            // dd($bookInfo);
            if (!empty($bookInfo[0])) {
                // 書籍情報を取得
                $bookData = $bookInfo[0]['summary'];
                // Google Books APIから価格を取得
                $googlePrice = $bookInfo[0]['onix']['ProductSupply']['SupplyDetail']['Price'][0]['PriceAmount'];
                $bookData['price'] = $googlePrice;
                $bookData['author'] = $bookInfo[0]['summary']['author'];

                // ISBNを追加
                $bookData['isbn'] = $bookInfo[0]['summary']['isbn'];

                // 画像のリンクを追加
                $bookData['img_link'] = "https://ndlsearch.ndl.go.jp/thumbnail/{$bookData['isbn']}.jpg";
            } else {
                $error = '該当する書籍が見つかりませんでした。';
            }
        }
        // 書籍名が入力されている場合
        elseif (!empty($bookName)) {
            // Google Books APIから書籍情報を取得
            $response = Http::get("https://www.googleapis.com/books/v1/volumes?q=" . urlencode($bookName));
            $bookInfo = $response->json();

            if (isset($bookInfo['items']) && count($bookInfo['items']) > 0) {
                $bookData = $bookInfo['items'][0]['volumeInfo'];
                // ISBNが存在する場合は価格を取得
                if (isset($bookData['industryIdentifiers'])) {
                    foreach ($bookData['industryIdentifiers'] as $identifier) {
                        if ($identifier['type'] === 'ISBN_13') {
                            $googlePrice = $this->getBookPriceFromGoogleBooks($identifier['identifier']);
                            break;
                        }
                    }
                }
                $bookData['price'] = $googlePrice ?? '不明';
            } else {
                $error = '該当する書籍が見つかりませんでした。';
            }
        }

        // dd($bookData);
        return view('result_search', compact('bookData', 'error'));
    }

    private function getBookPriceFromGoogleBooks($isbn)
    {
        $url = "https://www.googleapis.com/books/v1/volumes?q=isbn:{$isbn}";
        $response = Http::get($url);
        $bookInfo = $response->json();

        if (isset($bookInfo['items']) && count($bookInfo['items']) > 0) {
            $bookData = $bookInfo['items'][0]['volumeInfo'];
            return isset($bookData['saleInfo']['listPrice']['amount']) ? $bookData['saleInfo']['listPrice']['amount'] : '不明';
        }

        return null;
    

        
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
