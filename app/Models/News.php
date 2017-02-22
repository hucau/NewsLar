<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = "mt95_news";

    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function cate()
    {
        return $this->belongsTo('App\Models\Category','category_id');
    }
}
