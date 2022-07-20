<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class UserTableSeeder extends Seeder
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
                'firstname' => 'DARIEL',
                'middlename' => 'CUARTERO',
                'lastname' => 'BONGABONG',
                'username' => 'dariel',
                'position' => 'Lead Software Developer',
                'email' => 'darielbongabong90@gmail.com',
                'password' => bcrypt('dariel'),
            ],
            [
                'firstname' => 'BEN VICTOR',
                'middlename' => 'LAGUNA',
                'lastname' => 'SUMAGANG',
                'username' => 'victor',
                'position' => 'Computer Programmer',
                'email' => 'benvictor@gmail.com',
                'password' => bcrypt('victor'),
            ],
            [
                'firstname' => 'EDCEL MARK',
                'middlename' => 'SARIM',
                'lastname' => 'PALOMAR',
                'username' => 'edcel',
                'position' => 'Computer Programmer',
                'email' => 'edcel@gmail.com',
                'password' => bcrypt('edcel'),
            ],
            [
                'firstname' => 'CHRISTOPHER',
                'middlename' => 'PLATINO',
                'lastname' => 'VISTAL',
                'username' => 'christopher',
                'position' => 'Lead Software Developer',
                'email' => 'christopher@gmail.com',
                'password' => bcrypt('christopher'),
            ],
            [
                'firstname' => 'J.WALD',
                'middlename' => 'LUNA',
                'lastname' => 'LUNA',
                'username' => 'jwald',
                'position' => 'Computer Programmer',
                'email' => 'jwald@gmail.com',
                'password' => bcrypt('jwald'),
            ],
            [
                'firstname' => 'MARIO JR',
                'middlename' => 'REBUERA',
                'lastname' => 'CUARTERO',
                'username' => 'marex',
                'position' => 'Lead Software Developer',
                'email' => 'marex@gmail.com',
                'password' => bcrypt('marex'),
            ],
            [
                'firstname' => 'REY ANDREW',
                'middlename' => 'TOROTORO',
                'lastname' => 'GAROL',
                'username' => 'reyandrew',
                'position' => 'Graphic Designer',
                'email' => 'reyandrew@gmail.com',
                'password' => bcrypt('reyandrew'),
            ],
            [
                'firstname' => 'ALWIN',
                'middlename' => 'DUMPA',
                'lastname' => 'BALBARINO',
                'username' => 'alwin',
                'position' => 'Computer Operator',
                'email' => 'alwin@gmail.com',
                'password' => bcrypt('alwin'),
            ],
            [
                'firstname' => 'PETER',
                'middlename' => 'MORALES',
                'lastname' => 'PLANAS',
                'username' => 'peter',
                'position' => 'SPIDC Technical Specialist',
                'email' => 'peter@gmail.com',
                'password' => bcrypt('peter'),
            ],
            [
                'firstname' => 'JOHNNY BOY',
                'middlename' => 'PETELO',
                'lastname' => 'DUA',
                'username' => 'johnny',
                'position' => 'Computer Technician',
                'email' => 'johnny@gmail.com',
                'password' => bcrypt('johnny'),
            ],
            [
                'firstname' => 'LADY SHAIKA',
                'middlename' => 'PONTEVEDRA',
                'lastname' => 'MANUEL',
                'username' => 'shaika',
                'position' => 'Admin Aide VI',
                'email' => 'shaika@gmail.com',
                'password' => bcrypt('shaika'),
            ],
            [
                'firstname' => 'ANDREW',
                'middlename' => 'PEREZ',
                'lastname' => 'PATRIMONIO',
                'username' => 'andrew',
                'position' => 'ITU Head',
                'email' => 'andrew@gmail.com',
                'password' => bcrypt('andrew'),
            ],
        ];
        foreach($data as $key => $value){
            User::create([
                'firstname'     => $value['firstname'],
                'middlename'    => $value['middlename'],
                'lastname'      => $value['lastname'],
                'username'      => $value['username'],
                'position'      => $value['position'],
                'email'         => $value['email'],
                'password'      => $value['password'],
            ]);
        }
        
        Admin::create([
            'name' => 'Administrator',
            'username' => 'admin',
            'password' => bcrypt('admin'),
        ]);
    }
}
