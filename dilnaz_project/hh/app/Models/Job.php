<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','company_name','schedule','author_id','salary','category_id','experience','city'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
