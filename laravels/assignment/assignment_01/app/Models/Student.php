<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Student extends Model
{
    use HasFactory,Notifiable;
    use SoftDeletes;
    protected $table = 'students';
    protected $fillable = [
        'name',
        'email',
        'major_id',
        'course',
        'profile_image',
    ];
    public function major()
    {
        return $this->belongsTo(Major::class,'major_id','id');
    }
    protected $dates = ['deleted_at'];
}
