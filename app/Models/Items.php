<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    protected $table = 'items';

    protected $fillable = [
        'id',
        'title',
        'description',
        'completed',
        'order'
    ];

    protected $hidden = ['created_at', 'updated_at'];
}