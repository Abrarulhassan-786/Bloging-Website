<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Post extends Model
{
    protected $table = 'post';
    protected $fillabled = [
        'category_id',
        'name',
        'slug',
        'description',
        'yt_frame',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'status',
        'created_by'
    ];
    public function category()
    {
                                                //forign key , Primary key
        return $this->belongsTo(Category::class,'category_id','id');
    }
    use HasFactory;
}
