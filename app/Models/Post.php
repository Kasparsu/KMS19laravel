<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body'
    ];

    public function getBodyAttribute($value){
        return str_replace("\n\n", '<br><br>', $value);
    }

    public function getExcerptAttribute(){
        return explode("\n\n", $this->getRawOriginal('body'))[0];
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function image(){
        return $this->belongsTo(Image::class);
    }
}
