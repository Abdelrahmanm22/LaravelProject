<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $primaryKey = 'portfolio_id';
    protected $table ="portfolios";
    protected $fillable = [
        'portfolio_id',
        'title',
        'description',
        'img',
        'user_id',
    ];
}
