<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';
    public $timestamps = false;
    public function updateRow($data)
    {
        $student = DB::table($this->table)->first();
        if ($student) {
            $id = $student->id;
            return DB::table($this->table)->where('id', $id)->update($data);
        } else {
            return false;
        }
    }

    public function getStudentsFromPhnomPenh()
    {
        $students = DB::table($this->table)
            ->where('location', 'Phnom-Penh')
            ->where('age', '>', 20)
            ->get();
        return $students;
    }
    public function deleteStudent($id)
    {
    }
}
