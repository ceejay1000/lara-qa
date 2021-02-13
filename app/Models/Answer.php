<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'user_id'
    ];

    public function question(){
        return $this->belongsTo(Question::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    //public function boot(){
        // parent::boot();

        // static::deleted(function($answer){
        //     $answer->question->decrement('answers_count');
        // });

        // static::created(function($answer){
        //     echo "Answer created\n";
        // }); 

        // static::saved(function($answer){
        //     echo "Answer saved\n";
        // }); 
    //}

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function getIsStatusAtrribute()
    {
        return $this->isBest() ? 'vote-accepted' : '';
    }

    public function getIsBestAtrribute()
    {
        return $this->isBest(); 
    }

    public function isBest()
    {
        return $this->id === $this->question->best_answer_id;
    }

    public function votes(){
        return $this->morphToMany(User::class, 'votables');
    }

    public function upVotes(){
        return $this->votes()->wherePivot("vote", 1);
    }

    public function downVotes(){
        return $this->votes()->wherePivot("vote", -1);
    }
}
