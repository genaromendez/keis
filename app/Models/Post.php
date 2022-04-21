<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'text',
        'likes',
        'dislikes',
        'postImage',
        'verified',
        'user_id'
    ];

    public function cadenaAleatoria(int $id) 
    {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return  $id . substr(str_shuffle($permitted_chars), 0, 16);
    }
}
