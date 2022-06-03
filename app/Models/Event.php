<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    use HasFactory;


    const CATEGORIES = [
        1 => "勉強会",
        2 => "セミナー",
        3 => "交流会",
        4 => "催事",
        5 => "試験",
    ];

    const STATUS = [
        1 => "非公開",
        2 => "公開",
    ];



    protected $fillable = [
        'event_name',
        'event_category',
        'event_date',
    ];
}
