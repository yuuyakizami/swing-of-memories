<?php

namespace App\Models;
use App\Policies\TutorialPolicy;
use Database\Factories\TutorialFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{
    use HasFactory;


    protected $guarded = [
        'id'
    ];
    protected $fillable = [
        'title', 'video', 'title_description'
    ];
    protected static function newFactory()
{
    return TutorialFactory::new();
}
}
