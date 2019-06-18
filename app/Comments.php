<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
      'user_id',
      'article_id',
      'parent_comment_id',
      'text'
    ];

    /**
     * The table associated with the model. 
     *
     * @var string
     */
    protected $table = 'comments';

    /**
     * The belongs to Relationship
     *
     * @var array
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

     /**
     * The has Many Relationship
     *
     * @var array
     */
    public function replies()
    {
        return $this->hasMany('App\Comments', 'parent_comment_id');
    }
}
