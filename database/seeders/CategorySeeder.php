<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'description'   => 'Hardware Repair and Maintenance',
                'remarks'       => 'Resolved',
            ],
            [
                'description'   => 'SPIDC',
                'remarks'       => 'Discharged',
            ],
            [
                'description'   => 'Webpage Maintenance',
                'remarks'       => 'Discharged',
            ],
            [
                'description'   => 'Daily Time Record System',
                'remarks'       => 'Discharged',
            ],
            [
                'description'   => 'Software Maintenance',
                'remarks'       => 'Resolved',
            ],
            [
                'description'   => 'GSIS Kiosk',
                'remarks'       => 'Resolved',
            ],
            [
                'description'   => 'Pag-ibig Updating of Records',
                'remarks'       => 'Discharged',
            ],
            [
                'description'   => 'Identification Cards',
                'remarks'       => 'Discharged',
            ],
            [
                'description'   => 'Video Conference via Zoom',
                'remarks'       => 'Discharged',
            ],
            [
                'description'   => 'Seminars Attended',
                'remarks'       => 'Discharged',
            ],
            [
                'description'   => 'Multimedia Presentations ',
                'remarks'       => 'Discharged',
            ],
            [
                'description'   => 'E-pims',
                'remarks'       => 'Discharged',
            ],
            [
                'description'   => 'E-PDS',
                'remarks'       => 'Discharged',
            ],
            [
                'description'   => 'Payroll System',
                'remarks'       => 'Discharged',
            ],
            [
                'description'   => 'Document Tracking System',
                'remarks'       => 'Discharged',
            ],
            [
                'description'   => 'Others',
                'remarks'       => 'Discharged',
            ],
        ];
        foreach($data as $key => $value){
            Category::create([
                'description'   => $value['description'],
                'remarks'       => $value['remarks'],
            ]);
        }
    }
}
