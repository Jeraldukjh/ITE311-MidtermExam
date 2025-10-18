<?php
namespace App\Controllers;

class DashboardController extends BaseController
{
    public function index()
    {

        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $role = session()->get('user_role') ?? 'student';
        
        if ($role === 'admin') {
            return view('admin/dashboard', [
                'title' => 'Admin Dashboard',
                'name' => session()->get('name') ?? 'User'
            ]);
        } else {

            return view('student/dashboard', [
                'title' => 'Student Dashboard',
                'name' => session()->get('name') ?? 'User'
            ]);
        }
    }
}
