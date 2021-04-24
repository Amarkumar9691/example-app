<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','name','slug','address','thumbnail','phone','country','state','city'];

    public function users()
    {
       return $this->belongsToMany(User::class);
    }

}
