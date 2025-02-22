<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'foto_depan',
        'foto_belakang',
        'nama_produk',
        'harga',
        'stok',
        'deskripsi',
        'category'
    ];
    public function pesananDetail()
    {
        return $this->hasMany('App\Models\PesananDetail', 'posts_id', 'id');
    }
}
