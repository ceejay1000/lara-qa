<?php

namespace App\Models;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['url', 'avatar'];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function getUrlAttribute($value)
    {
       // return route("question.show", $this->id);
       return '#'; 
    }

    public function answers(){
        return $this->hasMany(Answer::class);
    } 

    public function getAvatarAttribute()
    {
        $email = $this->email;
        $size = 32;
        return "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?s=". $size;

    }

    public function favourites(){
        return $this->belongsToMany(Question::class, 'favourites')-withTimestamps();
    }

    public function voteQuestions(){
        return $this->morphedByMany(Question::class, 'votables');
    }

    public function voteAnswers(){
        return $this->morphedByMany(Answer::class, 'votables');
    }

    public function voteQuestion(Question $question, $vote){
        $voteQuestions = $this->voteQuestions();
        //dd($voteQuestions);

        $this->_vote($voteQuestions, $question, $vote);
        // if ($voteQuestions->where('votables_id', $question->id)->exists()){
        //     $voteQuestions->updateExistingPivot($question, ['vote' => $vote]);
        // } else {
        //     $voteQuestions->attach($question, ['vote' => $vote]);
        // }

        // $question->load('votes');
        // $downVotes = (int) $question->downVotes()->sum('vote');
        // $upVotes = (int) $question->upVotes()->sum('vote');
        // $question->votes_count = $upVotes + $downVotes;
        // $question->save();
    }

    public function voteAnswer(Answer $answer, $vote){
        $voteAnswers = $this->voteAnswers();
        //dd($voteAnswers)
        $this->_vote($voteAnswers, $answer, $vote);
    }

    private function _vote($relationship, $model, $vote){
        
        if ($relationship->where('votables_id', $model->id)->exists()){
            $relationship->updateExistingPivot($model, ['vote' => $vote]);
        } else {
            $relationship->attach($model, ['vote' => $vote]);
        }

        $model->load('votes');
        $downVotes = (int) $model->downVotes()->sum('vote');
        $upVotes = (int) $model->upVotes()->sum('vote');
        $model->votes_count = $upVotes + $downVotes;
        $model->save();
    }
}
