<?php
namespace App\Controllers;

use App\Models\CourseModel;
use App\Models\EnrollmentModel;

class CoursesController extends BaseController
{
    public function index()
    {
        $courses = (new CourseModel())->findAll();
        $enrolled = [];
        $enrollments = (new EnrollmentModel())
            ->where('user_id', session()->get('user_id'))
            ->findAll();
        foreach ($enrollments as $e) {
            $enrolled[$e['course_id']] = true;
        }

        return view('courses/index', [
            'title'    => 'Courses',
            'courses'  => $courses,
            'enrolled' => $enrolled,
        ]);
    }

    public function enroll($courseId)
    {
        $userId = session()->get('user_id');
        $enrollments = new EnrollmentModel();
        $exists = $enrollments
            ->where('user_id', $userId)
            ->where('course_id', $courseId)
            ->first();

        if ($exists) {
            return redirect()->to('/courses')->with('message', 'Already enrolled');
        }

        $enrollments->insert([
            'user_id'   => $userId,
            'course_id' => (int) $courseId,
        ]);

        return redirect()->to('/courses')->with('message', 'Enrolled successfully');
    }
}
