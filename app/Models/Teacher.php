<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    /**
     * Mass assignable attributes
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'designation',     // e.g., Lecturer, Assistant Professor
        'department_id',   // Relation with Department
        'qualification',   // e.g., MSc Computer Science
        'experience_years',
        'joining_date',
        'address',
    ];

    /**
     * 🏛️ Relationships
     */

    // Each teacher belongs to one department
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    // A teacher can teach many courses
    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    // (Optional) A teacher might have attendance records
    // public function attendanceRecords()
    // {
    //     return $this->hasMany(Attendance::class);
    // }

    // (Optional) A teacher can give results/grades to students
    // public function results()
    // {
    //     return $this->hasMany(Result::class);
    // }
}
