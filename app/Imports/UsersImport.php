<?php

namespace App\Imports;

use App\Models\Facuty;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $facuty = Facuty::where('facuty_code', $row[6])->first();

        return new Student([
            'name' => $row[0],
            'email' => $row[2],
            'password' => Hash::make(env('PASSWORD_STUDENT', 12345678)),
            'phone' => $row[3],
            'is_active' => 1,
            'student_code' => $row[1],
            'home_town' => $row[5],
            'class' => $row[4],
            'facuty_id' => $facuty ? $facuty->id : null,
            'status' => 0,
        ]);
    }
}
