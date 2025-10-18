<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1>Admin Dashboard</h1>
                    <p class="mb-0">Welcome, <?= session()->get('user_name') ?> (Admin)</p>
                </div>
                </a>
            </div>
            
            <!-- Admin-specific content -->
            <div class="card mt-4">
                <div class="card-header">
                    <h3>Admin Tools</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Manage Users</h5>
                                    <p class="card-text">View and manage all user accounts</p>
                                    <a href="#" class="btn btn-primary">Go to Users</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">System Settings</h5>
                                    <p class="card-text">Configure system settings</p>
                                    <a href="#" class="btn btn-primary">Settings</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Reports</h5>
                                    <p class="card-text">View system reports and analytics</p>
                                    <a href="#" class="btn btn-primary">View Reports</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
