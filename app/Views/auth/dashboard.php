<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?php
if (!session()->get('isLoggedIn')) {
    return redirect()->to('/login');
}
$role = session()->get('user_role') ?? 'student';
$name = session()->get('user_name') ?? 'User';

switch (strtolower($role)) {
    case 'admin':
        echo view('admin/dashboard', ['name' => $name]);
        break;
    case 'teacher':
        echo view('teacher/dashboard', ['name' => $name]);
        break;
    case 'student':
    default:
        echo view('student/dashboard', ['name' => $name]);
        break;
}
?>
<?= $this->endSection() ?>