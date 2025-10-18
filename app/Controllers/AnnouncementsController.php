<?php
namespace App\Controllers;

use App\Models\AnnouncementModel;

class AnnouncementsController extends BaseController
{
    public function index()
    {
        $announcements = (new AnnouncementModel())
            ->orderBy('created_at', 'DESC')
            ->findAll();

        return view('announcements/index', [
            'title'         => 'Announcements',
            'announcements' => $announcements,
        ]);
    }
}
