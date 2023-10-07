<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;
    protected $fillable=['content','idea_id','user_id'];


    public function comments() : BelongsTo {
        return $this->belongsTo(Idea::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
