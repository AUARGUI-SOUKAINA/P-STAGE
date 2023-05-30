<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Group extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    ///on ajout cette function pour afficher students de chaque groupe

    public function students()
{
    return $this->hasMany(User::class);
}
public function timetables()
{
    return $this->hasMany(Timetable::class);
}

}
