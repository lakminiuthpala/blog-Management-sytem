<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'blogs';
    protected $fillable = [
        'content',
        'publish_date',
        'title',
        'user_id'
    ];


    public function BlogsAuthor()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}