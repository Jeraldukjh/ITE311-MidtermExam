<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body text-center p-5">
                    <div class="mb-4">
                        <i class="bi bi-box-arrow-right text-primary" style="font-size: 3rem;"></i>
                        <h3 class="mt-3">Logging Out</h3>
                        <p class="text-muted">You are being logged out of your account...</p>
                    </div>
                    <div class="spinner-border text-primary mb-4" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="text-muted">Please wait while we securely log you out.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Automatically submit the logout form after a short delay
    document.addEventListener('DOMContentLoaded', function() {
        // Redirect to login page after 1.5 seconds
        setTimeout(function() {
            window.location.href = '<?= base_url('login') ?>';
        }, 1500);
    });
</script>
<?= $this->endSection() ?>
