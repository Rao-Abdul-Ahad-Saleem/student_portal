<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    /**
     * 🧩 Fields that can be mass-assigned
     */
    protected $fillable = [
        'name',            // e.g. Computer Science
        'code',            // e.g. CS, EE, BBA
        'head_of_department', // Optional: Name or teacher ID of HOD
        'description',     // A short description of the department
        'email',           // Department contact email
        'phone',           // Department contact phone
        'office_location', // e.g. Room 202, Science Building
    ];

    /**
     * 🏛️ Relationships
     */

    // // A department has many teachers
    // public function teachers()
    // {
    //     return $this->hasMany(Teacher::class);
    // }

    // A department has many courses
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_department')
            ->withTimestamps();
    }

    // A department has many students
    // public function students()
    // {
    //     return $this->hasMany(Student::class);
    // }
}
