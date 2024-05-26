<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Projects_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'name' => 'Project 1',
                'subtitle' => 'Subtitle 1',
                'image_url' => 'https://s3-ap-south-1.amazonaws.com/static.awfis.com/wp-content/uploads/2017/07/07184649/ProjectManagement.jpg',
                'project_url' => 'https://brainster.co/',
                'description' => 'Description for Project 1',
            ],
            [
                'name' => 'Project 2',
                'subtitle' => 'Subtitle 2',
                'image_url' => 'https://s3-ap-south-1.amazonaws.com/static.awfis.com/wp-content/uploads/2017/07/07184649/ProjectManagement.jpg',
                'project_url' => 'https://brainster.co/',
                'description' => 'Description for Project 2',
            ],
            [
                'name' => 'Project 3',
                'subtitle' => 'Subtitle 3',
                'image_url' => 'https://example.com/image3.jpg',
                'project_url' => 'https://example.com/project3',
                'description' => 'Description for Project 3',
            ],
            [
                'name' => 'Project 4',
                'subtitle' => 'Subtitle 4',
                'image_url' => 'https://s3-ap-south-1.amazonaws.com/static.awfis.com/wp-content/uploads/2017/07/07184649/ProjectManagement.jpg',
                'project_url' => 'https://brainster.co/',
                'description' => 'Description for Project 4',
            ],
            [
                'name' => 'Project 5',
                'subtitle' => 'Subtitle 5',
                'image_url' => 'https://s3-ap-south-1.amazonaws.com/static.awfis.com/wp-content/uploads/2017/07/07184649/ProjectManagement.jpg',
                'project_url' => 'https://brainster.co/',
                'description' => 'Description for Project 5',
            ],
            [
                'name' => 'Project 6',
                'subtitle' => 'Subtitle 6',
                'image_url' => 'https://s3-ap-south-1.amazonaws.com/static.awfis.com/wp-content/uploads/2017/07/07184649/ProjectManagement.jpg',
                'project_url' => 'https://brainster.co/',
                'description' => 'Description for Project 6',
            ],
            [
                'name' => 'Project 7',
                'subtitle' => 'Subtitle 7',
                'image_url' => 'https://s3-ap-south-1.amazonaws.com/static.awfis.com/wp-content/uploads/2017/07/07184649/ProjectManagement.jpg',
                'project_url' => 'https://brainster.co/',
                'description' => 'Description for Project 7',
            ],
            [
                'name' => 'Project 8',
                'subtitle' => 'Subtitle 8',
                'image_url' => 'https://s3-ap-south-1.amazonaws.com/static.awfis.com/wp-content/uploads/2017/07/07184649/ProjectManagement.jpg',
                'project_url' => 'https://brainster.co/',
                'description' => 'Description for Project 8',
            ],
            [
                'name' => 'Project 9',
                'subtitle' => 'Subtitle 9',
                'image_url' => 'https://s3-ap-south-1.amazonaws.com/static.awfis.com/wp-content/uploads/2017/07/07184649/ProjectManagement.jpg',
                'project_url' => 'https://brainster.co/',
                'description' => 'Description for Project 9',
            ],
        ];
        DB::table('projects')->insert($projects);
    }
}
