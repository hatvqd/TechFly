<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Model\Term;

class Post extends Model
{
    protected $fillable = ['author_id', 'title', 'slug', 'body', 'excerpt', 'published_at', 'term_id'];

    protected $dates = ['published_at'];

	public function setPublishedAtAttribute($value)
    {
        $this->attributes['published_at'] = $value ?: null;
    }
    
    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function term() 
    {
        return $this->belongsTo(Term::class);
    }
}
