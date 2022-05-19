<?php

namespace App\Exports;

use App\Models\Student;
use Hamcrest\Core\HasToString;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Maatwebsite\Excel\Concerns\FromQuery;
use PhpOffice\PhpSpreadsheet\Style\Color;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithBackgroundColor;

class StudentExport implements FromView,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Student::all();
    // }
        // public function backgroundColor()
        // {
        //     return [
        //         'fillType'   => Fill::FILL_GRADIENT_LINEAR,
        //         'startColor' => ['argb' => Color::COLOR_RED],
        //    ];
        // }
        // public function headings(): array
        // {
        //     $data =[  'id',
        //     'Name',
        //     'Nrc',
        //     'Birthday',
        //     'Phone',
        //     'Gender',
        //     'Region',
        //     'Hobbies'];
        //     $detail = ["years", "marks1","marks2", "marks3", "remarks"];
        //     return [
        //       $data,
        //       $detail
        //     ];

        // }
        // public function collection()
        // {
        //     return Student::with('details')->get();   
        // }
        // public function map($student): array
        // {
        //     $arr = json_decode($student->hobbies);
        //     $detail = json_decode($student->details);
         
        //     $item  = [];
        //     foreach($student->details as $data){
        //        $stu_id = json_decode($data->stu_id);
        //       ;
        //         $years = json_decode($data->years);
        //         $marks1 = json_decode($data->marks1);
        //         $marks2 = json_decode($data->marks2);
        //         $marks3 = json_decode($data->marks3);
        //         $remarks = json_decode($data->remarks);
        //         for($i =0; $i < count($years); $i++){
        //             // $data = ["stu_id" => $stu_id, "year" =>$years[$i], "marks1" => $marks1[$i], "marks2" => $marks2[$i], "marks3" => $marks3[$i], "remarks" => $remarks[$i]];
        //             // array_push($item, $data);
        //             $data = [$years[$i], $marks1[$i], $marks2[$i], $marks3[$i], $remarks[$i]];  
        //             array_push($item, $data);
        //         }
        //     }
         
        //     return [
        //        [
        //         $student->id,
        //         // $student->profile,
        //         $student->name,
        //         $student->nrc,
        //         $student->birthday,
        //         $student->phone,
        //         $student->gender,
        //         $student->region,
        //         implode(",",$arr)
        //        ],
        //        ...$item 
        //     //     // $arr,
        //     //     // [
        //     //     //     "years" => $years, "marks1" => $marks1, "marks2" => $marks2, "marks3" => $marks3, "remarks" => $remarks
        //     //     // ]
        //     //     $item
        //     ];
        // }
        // public function registerEvents(): array
        // {
        //     return [
        //         AfterSheet::class    => function(AfterSheet $event) {
        //             $cellRange = 'A1:W1'; // All headers
        //             $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
        //         },
        //     ];
        // }
        public function view(): View
        {
            return view('exports.data', [
                'students' => Student::all()
            ]);
        }

}
