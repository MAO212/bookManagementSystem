<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //リレーションシップ（外部参照制約）の設定
    //booksテーブル（このモデル）から見た関係は「１対多」
    //reviewsテーブル内では同じ値が重複して利用されているので、ここで定義するメソッド名は「複数形」

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }



}
