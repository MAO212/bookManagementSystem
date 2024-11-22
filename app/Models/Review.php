<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //リレーションシップ（外部参照制約）の設定
    //reviewテーブル（このモデル）から見た関係は「多対1」
    //books手0ブル内では主キーは1つしか値がないので、ここで定義するメソッド名は「単数形」

public function book()
{
    return $this->belongsTo(Book::class);
}

public function employee()
{
    return $this->belongsTo(Employee::class);
}


}
