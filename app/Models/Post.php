<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title','excerpt','body','slug','category_id'];


    // cau hinh route bang cach 3
    // public function getRouteKeyName(){
    //     // return parent::getRouteKeyName();
    //     return 'slug';
    // }
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){ // phuong thuc la user nen foreign key(khoa ngoai) de lien ket den bang user phai la user_id
        return $this->belongsTo(User::class);
    }
}
