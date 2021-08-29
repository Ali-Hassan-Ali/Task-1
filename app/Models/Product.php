<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    use HasTranslations;

    protected $fillable  = ['name'];

    protected $hidden = ['remember_token'];

    public $translatable = ['name'];

    public function scopeWhenSearch($query , $search) 
    {
        return $query->when($search, function ($q) use ($search) {

            return $q->where('name->ar' , 'like', "%$search%")
            ->orWhere('name->en', 'like', "%$search%");
        });
        
    }//end ofscopeWhenSearch

    public function categorys()
    {
        return $this->belongsToMany(Category::class,'product_category');
    }

}//end of models
