<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;

    protected $fillable = [
        'user_id', 'category_id', 'photo_id', 'name', 'review', 'title', 'description', 
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ['name', 'title']
            ]
        ];
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }
}
