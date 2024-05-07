<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title', 'author', 'publication_year', 'isbn', 'has_digital_copy', 'pdf_file', 'cover_image', 'description', 'abstract', 'physical_location', 'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function students()
    {
        return $this->belongsToMany(Student::class, 'bookings', 'book_id', 'student_id')->withTimestamps();
    }
}
