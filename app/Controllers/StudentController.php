<?php
namespace App\Controllers;

use App\Models\CourseModel;
use App\Models\EnrollmentModel;
use App\Models\AnnouncementModel;

class StudentController extends BaseController
{
    protected $courseModel;
    protected $enrollmentModel;
    protected $announcementModel;

    public function __construct()
    {
        $this->courseModel = new CourseModel();
        $this->enrollmentModel = new EnrollmentModel();
        $this->announcementModel = new AnnouncementModel();
        
        // Ensure user is logged in and is a student
        if (!session()->get('isLoggedIn') || session()->get('user_role') !== 'student') {
            return redirect()->to('/login');
        }
    }

    public function dashboard()
    {
        $userId = session()->get('user_id');
        
        // Get enrolled courses
        $enrolledCourses = $this->enrollmentModel->select('courses.*')
            ->join('courses', 'courses.id = enrollments.course_id')
            ->where('enrollments.user_id', $userId)
            ->findAll();
        
        // Get latest announcements
        $announcements = $this->announcementModel->orderBy('created_at', 'DESC')
            ->findAll(5); // Get 5 latest announcements
        
        // Get assignments (you'll need to implement this based on your requirements)
        $assignments = [];
        
        // Get grades (you'll need to implement this based on your requirements)
        $grades = [];
        
        $data = [
            'title' => 'Student Dashboard',
            'enrolledCourses' => $enrolledCourses,
            'announcements' => $announcements,
            'assignments' => $assignments,
            'grades' => $grades,
            'userName' => session()->get('user_name')
        ];
        
        return view('student/dashboard', $data);
    }
}
