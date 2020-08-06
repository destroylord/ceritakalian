<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Story extends Model
{
    use SoftDeletes;
    //
    protected $fillable = ['title','category_id','slug','body','thumbnail'];

    public function category()
    {
        return $this->BelongsTo(Category::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getTakeImageAttribute()
    {
        return "/storage/". $this->thumbnail;
    }
}
