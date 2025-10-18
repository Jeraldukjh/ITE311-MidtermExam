<?php

namespace App\Database\Seeds;

use App\Models\AnnouncementModel;
use CodeIgniter\Database\Seeder;

class AnnouncementSeeder extends Seeder
{
    public function run()
    {
        $announcements = [
            [
                'title'      => 'Welcome to the Student Portal',
                'content'    => 'Welcome to our new student portal! Here you can access your courses, view announcements, and manage your academic information. Please explore all the features available to you.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title'      => 'Midterm Exam Schedule Released',
                'content'    => 'The midterm examination schedule for Fall 2025 has been released. Please check your course pages for specific dates and times. Make sure to prepare adequately for your exams.',
                'created_at' => date('Y-m-d H:i:s', strtotime('-3 days')),
                'updated_at' => date('Y-m-d H:i:s', strtotime('-3 days')),
            ]
        ];

        $announcementModel = new AnnouncementModel();

        foreach ($announcements as $announcement) {
            $announcementModel->insert($announcement);
        }

        echo "Announcements seeded successfully!\n";
    }
}
