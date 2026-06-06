<?php

namespace Database\Seeders;

use App\Models\Projects;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Projects::insert([
            [
                'title' => 'Sistem ERP',
                'description' => 'Sistem ERP (Enterprise Resource Planning) Perusahaan Manufaktur',
                'teknologi' => 'PHP, Laravel, MySQL',
                'image' => 'erp.png',
                'status' => 'active',
            ],
            [
                'title' => 'Sistem HRIS',
                'description' => 'Sistem HRIS (Human Resource Information System) Perusahaan Manufaktur',
                'teknologi' => 'PHP, Laravel, MySQL',
                'image' => 'hris.png',
                'status' => 'active',
            ],
            [
                'title' => 'Sistem SCM',
                'description' => 'Sistem SCM (Supply Chain Management) Perusahaan Manufaktur',
                'teknologi' => 'PHP, Laravel, MySQL',
                'image' => 'scm.png',
                'status' => 'active',
            ],
            [
                'title' => 'Sistem WMS',
                'description' => 'Sistem WMS (Warehouse Management System) Perusahaan Manufaktur',
                'teknologi' => 'PHP, Laravel, MySQL',
                'image' => 'wms.png',
                'status' => 'active',
            ]
        ]);
    }
}