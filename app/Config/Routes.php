<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::login');
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::attemptLogin');
$routes->get('logout', 'AuthController::logout');

$routes->get('dashboard', 'DashboardController::index');

$routes->get('profile', 'ProfileController::index');
$routes->post('profile/update', 'ProfileController::update');

$routes->get('courses', 'CoursesController::index');
$routes->post('courses/enroll/(:num)', 'CoursesController::enroll/$1');

$routes->get('announcements', 'AnnouncementsController::index');
