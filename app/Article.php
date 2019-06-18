<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Article extends Model
{
	use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
      'user_id',
      'title',
      'descripion',
      'image_name'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'articles';

    public function user() {
      return $this->belongsTo('App\User', 'user_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comments')->whereNull('parent_comment_id');
    }
}
