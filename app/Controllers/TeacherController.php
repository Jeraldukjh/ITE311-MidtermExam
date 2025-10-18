<?php
namespace App\Controllers;

class TeacherController extends BaseController
{
    public function dashboard()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $role = session()->get('user_role');
        if ($role !== 'teacher') {
            return redirect()->to('/login')->with('error', 'Access denied. Teachers only.');
        }

        return view('teacher/dashboard', [
            'title' => 'Teacher Dashboard',
            'name' => session()->get('user_name') ?? 'Teacher'
        ]);
    }
}
