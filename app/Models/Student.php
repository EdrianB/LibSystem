<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Student extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'fullname',
        'email',
        'password',
        'student_no',
        'image',
        'program',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function books()
    {
        return $this->belongsToMany(Book::class, 'bookings', 'student_id', 'book_id')->withTimestamps();
    }
}
