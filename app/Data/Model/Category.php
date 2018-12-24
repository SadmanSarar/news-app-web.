<?php

namespace App\Data\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'image'];

    function publishedNews(){
        return $this->hasMany(News::class)
            ->where('news.published','=','1');
    }

    function unPublishedNews(){
        return $this->hasMany(News::class)
            ->where('news.published','=','0');
    }
    function news(){
        return $this->hasMany(News::class);
    }
    
}
