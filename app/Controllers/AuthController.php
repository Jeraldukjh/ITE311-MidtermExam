<?php
namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function login()
    {
        if (session()->get('user_id')) {
            return redirect()->to('/dashboard');
        }
        return view('auth/login', [
            'title' => 'Login',
        ]);
    }

    public function attemptLogin()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $model = new UserModel();
        $user = $model->where('email', $email)->first();

        if (!$user || !password_verify($password, $user['password'])) {
            return redirect()->back()->withInput()->with('error', 'Invalid credentials.');
        }

        session()->set([
            'user_id'    => $user['id'],
            'user_name'  => $user['name'],
            'user_email' => $user['email'],
            'user_role'  => $user['role'] ?? 'student',
            'isLoggedIn' => true,
        ]);

        return redirect()->to('/dashboard');
    }

    public function logout()
    {
        $session = session();
        
        $session->remove(['user_id', 'user_name', 'user_email', 'user_role', 'isLoggedIn']);
        
        $session->regenerate(true);
        
        $session->destroy();
        
        $sessionCookie = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            [
                'expires' => time() - 3600,
                'path' => $sessionCookie['path'],
                'domain' => $sessionCookie['domain'],
                'secure' => $sessionCookie['secure'],
                'httponly' => $sessionCookie['httponly'],
                'samesite' => $sessionCookie['samesite'] ?? 'Lax'
            ]
        );
        
        return redirect()->to('/login')->with('message', 'You have been successfully logged out.');
    }
}
