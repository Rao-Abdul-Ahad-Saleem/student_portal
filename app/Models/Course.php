<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    /**
     * Mass assignable attributes
     */
    protected $fillable = [
        'name',           // e.g., Data Structures
        'code',           // e.g., CS101
        'credit_hours',   // e.g., 3
        'department_id',  // foreign key → departments.id
        'teacher_id',     // foreign key → teachers.id
        'semester',       // e.g., Fall 2025
        'description',    // optional course summary
    ];

    /**
     * 🏛️ Relationships
     */

    // Each course belongs to many department
    public function departments()
    {
        return $this->belongsToMany(Department::class);
    }

    // Each course is taught by many teacher
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }

    // // 🎓 A course can have many enrolled students
    // public function enrollments()
    // {
    //     return $this->hasMany(Enrollment::class);
    // }

    // // 🧾 A course can have multiple results/grades
    // public function results()
    // {
    //     return $this->hasMany(Result::class);
    // }

    // // 📅 A course can have attendance records
    // public function attendanceRecords()
    // {
    //     return $this->hasMany(Attendance::class);
    // }
}
