<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    use HasTranslations;

    protected $fillable  = ['name','parent_id'];

    public $translatable = ['name'];

    public function scopeWhenSearch($query , $search) 
    {
        return $query->when($search, function ($q) use ($search) {

            return $q->where('name->ar' , 'like', "%$search%")
            ->orWhere('name->en', 'like', "%$search%");
            
        });
        
    }//end ofscopeWhenSearch

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }//end pf children

    public function product()
    {
        return $this->belongsToMany(Product::class,'product_category');
    }//end of categorys

}//end of mode
