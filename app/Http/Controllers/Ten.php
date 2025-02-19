<?php

namespace App\Http\Controllers;



use App\Models\notice;
use App\Models\Student;
use Illuminate\Http\Request;

class Ten extends Controller
{
    public static function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'student_id' => 'required|unique:students',
            'department' => 'required',
        ]);

        $student = Student::createStudent($validated);

        return $student->toArray();
    }
    public static function read($id): array
    {
        return Student::get($id)->toArray();
    }
    public function update($id,Request $request)
    {

        $validated = $request->validate([
            'name' => 'required',
            'student_id' => 'required',
            'department' => 'required',
        ]);
        return Student::updateStudent($id, $validated)->toArray();
    }
    public function delete($id)
    {
        return Student::deleteStudent($id);
    }
}
