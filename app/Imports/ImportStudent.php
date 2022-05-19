<?php

namespace App\Imports;

use App\Models\Detail;
use App\Models\Student;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMappedCells;
use Maatwebsite\Excel\Concerns\WithValidation;

class ImportStudent implements ToModel,WithHeadingRow,WithMappedCells
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    // public function model(array $row)
    // {
    //     // return new Student([
    //     //     "id" => $row['id'],
    //     //     "name" => $row['name'],
    //     //     "nrc" => $row['nrc'],
    //     //     "birthday" => $row['birthday'],
    //     //     "phone" => $row['phone'],
    //     //     "profile" => $row['profile'],
    //     //     "gender" => $row['gender'],
    //     //     "region" => $row['region'],
    //     //     "hobbies" => $row['hobbies'],

    //     // ]);
    // }
        // public function collection(Collection $rows)
        // {
            
        //     // foreach($rows as $row){
        //     //     Student::create([
        //     //             // "id" => $row['id']
        //     //             "name" => $row['name'],
        //     //             "nrc" => $row['nrc'],
        //     //             "birthday" => $row['birthday'],
        //     //             "phone" => $row['phone'],
        //     //             "profile" => $row['profile'],
        //     //             "gender" => $row['gender'],
        //     //             "region" => $row['region'],
        //     //             "hobbies" =>$row["hobbies"],
        //     //     ]);
        //     //     Detail::create([
        //     //         "stu_id" => $row['id'],
        //     //         "years" => explode(",",$row['years']),
        //     //         "marks1" => explode(",",$row['marks1']),
        //     //         "marks2" => explode(",",$row['marks2']),
        //     //         "marks3" => explode(",",$row['marks3']),
        //     //         "remarks" => explode(",",$row['remarks'])
        //     //     ]);
        //     // }
        // }
        public function mapping(): array
        {
            return [
                "name" => 'A2',
                "nrc" => 'B2',
                "birthday" => 'C2',
                "phone" => 'D2',
                // "profile" => 'E2',
                "gender" => 'E2',
                "region" => 'F2',
                "hobbies" => 'G2',
                "years" => 'A5',
                "marks1" => 'C5',
                "marks2" => 'D5',
                "marks3" => 'E5',
                "remarks" => 'F5'
            ];
        }
        // public function rules(): array
        // {
        //     return [
        //         "name" => "required",
        //         "nrc" => "required",
        //         "birthday" => "required",
        //         "phone" => "required",
        //         // "profile" => "required",
        //         "gender" => "required",
        //         "region" => "required",
        //         "hobbies" => "required"
        //     ];
        // }
        public function model(array $row)
        {
            $arr = explode(", ", $row['hobbies']);
            
            $student =  new Student([
                "name" => $row['name'],
                "nrc" => $row['nrc'],
                "birthday" => $row['birthday'],
                "phone" => $row['phone'],
                // "profile" => $row['profile'],
                "gender" => $row['gender'],
                "region" => $row['region'],
                "hobbies" => json_encode($arr)
            ]);
        //    dd($student);
           $student->save();
           $years = explode(",", $row["years"]);
           $marks1 = explode(",", $row["marks1"]);
           $marks2 = explode(",", $row["marks2"]);
           $marks3 = explode(",", $row["marks3"]);
           $remarks = explode(",", $row["remarks"]);
          
            dd($years);
            $details = new Detail([
                "stu_id" => $student->id,
                "years" => json_encode($years),
                "marks1" => json_encode($marks1),
                "marks2" => json_encode($marks2),
                "marks3" => json_encode($marks3),
                "remarks" => json_encode($remarks)
            ]);
            // dd($details);
           $details->save();
        }
}
