<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1>Student Dashboard</h1>
                    <p class="mb-0">Welcome back, <?= session()->get('name') ?>!</p>
            <div>
            <!-- Student-specific content -->
            <div class="row mt-4">
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5>My Courses</h5>
                        </div>
                        <div class="card-body">
                            <p>View and manage your enrolled courses</p>
                            <a href="<?= site_url('courses') ?>" class="btn btn-primary">View Courses</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5>My Assignments</h5>
                        </div>
                        <div class="card-body">
                            <p>View and submit your assignments</p>
                            <a href="#" class="btn btn-primary">View Assignments</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5>Grades</h5>
                        </div>
                        <div class="card-body">
                            <p>Check your grades and progress</p>
                            <a href="#" class="btn btn-primary">View Grades</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5>Announcements</h5>
                        </div>
                        <div class="card-body">
                            <p>View latest announcements</p>
                            <a href="#" class="btn btn-primary">View Announcements</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
