<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'description',
        'img',
        'link_to_project'
    ];

    public function technologies(){
        return $this->belongsToMany(Technology::class);
    }
}
