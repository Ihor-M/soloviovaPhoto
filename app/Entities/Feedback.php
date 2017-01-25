<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    /**
     * Table name
     *
     * @var string
     */
    protected $table = 'feedbacks';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'short_feedback',
        'full_feedback',
        'album_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id', 'id');
    }
}
