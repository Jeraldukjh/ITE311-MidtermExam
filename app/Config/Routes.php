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
    $routes->get('users', 'AdminController::users');
    $routes->get('courses', 'AdminController::courses');
    $routes->post('courses/create', 'AdminController::createCourse');
    $routes->get('courses/edit/(:num)', 'AdminController::editCourse/$1');
    $routes->post('courses/update/(:num)', 'AdminController::updateCourse/$1');
    $routes->get('courses/delete/(:num)', 'AdminController::deleteCourse/$1');
});

// Teacher routes - only accessible by teachers
$routes->group('teacher', ['filter' => 'roleauth'], function($routes) {
    $routes->get('dashboard', 'TeacherController::dashboard');
    $routes->get('courses', 'TeacherController::courses');
    $routes->get('courses/(:num)', 'TeacherController::courseDetails/$1');
    $routes->get('assignments', 'TeacherController::assignments');
    $routes->post('assignments/create', 'TeacherController::createAssignment');
    $routes->get('assignments/edit/(:num)', 'TeacherController::editAssignment/$1');
    $routes->post('assignments/update/(:num)', 'TeacherController::updateAssignment/$1');
    $routes->get('assignments/delete/(:num)', 'TeacherController::deleteAssignment/$1');
    $routes->get('grades', 'TeacherController::grades');
    $routes->post('grades/update', 'TeacherController::updateGrades');
});

// Student routes - only accessible by students
$routes->group('student', ['filter' => 'roleauth'], function($routes) {
    $routes->get('dashboard', 'StudentController::dashboard');
    $routes->get('courses', 'StudentController::courses');
    $routes->post('courses/enroll/(:num)', 'StudentController::enroll/$1');
    $routes->get('assignments', 'StudentController::assignments');
    $routes->get('assignments/(:num)', 'StudentController::assignmentDetails/$1');
    $routes->post('assignments/submit/(:num)', 'StudentController::submitAssignment/$1');
    $routes->get('grades', 'StudentController::grades');
});

// Legacy routes that need protection - apply auth filter
$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('dashboard', 'DashboardController::index');
});
