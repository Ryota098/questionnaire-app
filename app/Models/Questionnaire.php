<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Questionnaire extends Model
{
    use HasFactory;
    
    // protected $guarded = [];
    protected $fillable = [
        'uuid',
        'title',
    ];
    
    public function publicPath()
    {
        return url('/survey/'.$this->uuid);
    }
    
    public function questions() 
    {
        return $this->hasMany(Question::class);
    }
    
    public function surveys() 
    {
        return $this->hasMany(Survey::class);
    }
}
