<?php
namespace App\Controllers;

class AdminController extends BaseController
{
    public function dashboard()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $role = session()->get('user_role');
        if ($role !== 'admin') {
            return redirect()->to('/login')->with('error', 'Access denied. Admins only.');
        }

        return view('admin/dashboard', [
            'title' => 'Admin Dashboard',
            'name' => session()->get('user_name') ?? 'Admin'
        ]);
    }
}
