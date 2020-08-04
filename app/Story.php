<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Story extends Model
{
    use SoftDeletes;
    //
    protected $fillable = ['title','category_id','slug','body'];

    public function category()
    {
        return $this->BelongsTo(Category::class);
    }
}
