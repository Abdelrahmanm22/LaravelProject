<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllProject extends Model
{
    use HasFactory;
    protected $primaryKey = 'portfolio_id';
    protected $table ="allportfolios";
    protected $fillable = [
        'portfolio_id',
        'title',
        'description',
        'img',
        'user_id',
        'user_name',
    ];
}
