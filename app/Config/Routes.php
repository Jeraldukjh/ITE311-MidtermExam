<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::login');
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::attemptLogin');
$routes->get('logout', 'AuthController::logout');

// Public routes
$routes->get('announcements', 'AnnouncementsController::index');

// Admin routes - only accessible by admins
$routes->group('admin', ['filter' => 'roleauth'], function($routes) {
    $routes->get('dashboard', 'AdminController::dashboard');
});

// Teacher routes - only accessible by teachers
$routes->group('teacher', ['filter' => 'roleauth'], function($routes) {
    $routes->get('dashboard', 'TeacherController::dashboard');
});

// Student routes - only accessible by students
$routes->group('student', ['filter' => 'roleauth'], function($routes) {
    $routes->get('dashboard', 'StudentController::dashboard');
    $routes->get('courses', 'StudentController::courses');
});

// Legacy routes that need protection - apply auth filter
$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('dashboard', 'DashboardController::index');
});
