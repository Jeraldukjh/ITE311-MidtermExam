<?php

namespace App\Controllers;

use App\Models\AnnouncementModel;

class AnnouncementController extends BaseController
{
    protected $announcementModel;

    public function __construct()
    {
        $this->announcementModel = new AnnouncementModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Announcements',
            'announcements' => $this->announcementModel->orderBy('created_at', 'DESC')->findAll()
        ];

        return view('announcements/index', $data);
    }
}
