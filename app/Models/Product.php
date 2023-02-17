<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    private $cover_img;
    private $images = array();

    public function setImages($img){
      array_push($this->images, $img);
    }
    public function getImages(){
      return $this->images;
    }

    public function setCoverImg($img){
        $this->cover_img = $img;
    }
    public function getCoverImg()
    {
        return  $this->cover_img;
    }
    protected $fillable = [
        'name',
        'description',
        'created_by'
    ];
    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }

//    public function productImages($id)
//    {
//        return $this->hasMany(ProductImage::class);
//    }
}
