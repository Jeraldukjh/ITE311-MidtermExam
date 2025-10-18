<?= $this->extend('layouts/main') ?>

<?= $this->section('styles') ?>
<style>
  .login-container {
    min-height: 100vh;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 2rem 0;
  }
  .login-card {
    border: none;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
  }
  .login-sidebar {
    background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
    color: white;
    padding: 3rem 2rem;
    position: relative;
    overflow: hidden;
  }
  .login-sidebar::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 60%);
    transform: rotate(30deg);
    pointer-events: none;
  }
  .password-toggle {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    color: #6c757d;
  }
  .btn-google {
    background: #fff;
    color: #757575;
    border: 1px solid #ddd;
  }
  .btn-google:hover {
    background: #f8f9fa;
    border-color: #ccc;
  }
  .divider {
    position: relative;
    text-align: center;
    margin: 1.5rem 0;
  }
  .divider::before {
    content: "";
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    height: 1px;
    background-color: #e0e0e0;
    z-index: 1;
  }
  .divider span {
    position: relative;
    background: white;
    padding: 0 1rem;
    color: #6c757d;
    z-index: 2;
    font-size: 0.875rem;
  }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="login-container d-flex align-items-center">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-md-10 col-lg-8">
        <div class="login-card card">
          <div class="row g-0">
            <!-- Left Side (Illustration) -->
            <div class="col-lg-6 d-none d-lg-block">
              <div class="login-sidebar h-100 d-flex flex-column p-5">
                <div class="mb-4">
                  <h2 class="fw-bold mb-3">Welcome Back!</h2>
                  <p class="mb-0">Sign in to access your personalized dashboard and continue your learning journey.</p>
                </div>
                <div class="mt-auto text-center">
                  <img src="https://tse4.mm.bing.net/th/id/OIP.cPmoSJv1JYtpCRIjhLuSNAAAAA?pid=Api&P=0&h=220" alt="Student Portal" class="img-fluid" style="max-width: 200px;">
                </div>
              </div>
            </div>

            <!-- Right Side (Form) -->
            <div class="col-lg-6">
              <div class="card-body p-4 p-md-5">
                <div class="text-center mb-4">
                  <h3 class="fw-bold text-primary mb-2">Student Portal</h3>
                  <p class="text-muted">Sign in to access your account</p>
                </div>

                <?php if (session()->getFlashdata('error')): ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <?= esc(session()->getFlashdata('error')) ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                <?php endif; ?>
                <!-- Login Form -->
                <form id="loginForm" action="<?= base_url('login') ?>" method="post" class="needs-validation" novalidate>
                  <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="email" 
                           placeholder="name@example.com" value="<?= esc(old('email')) ?>" 
                           required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                    <label for="email">Email address</label>
                    <div class="invalid-feedback">
                      Please enter a valid email address.
                    </div>
                  </div>

                  <div class="form-floating mb-3 position-relative">
                    <input type="password" name="password" class="form-control" 
                           id="password" placeholder="Password" required
                           minlength="8" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                    <label for="password">Password</label>
                    <i class="bi bi-eye-slash password-toggle" id="togglePassword"></i>
                    <div class="invalid-feedback">
                      Password must be at least 8 characters long and contain at least one number and one uppercase letter.
                    </div>
                  </div>

                  <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="remember" id="remember">
                      <label class="form-check-label small" for="remember">
                        Remember me
                      </label>
                  <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg" id="loginButton">
                      <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                      <span class="button-text">
                        <i class="bi bi-box-arrow-in-right me-2"></i>Sign In
                      </span>
                    </button>
                  </div>
                </form>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
  // Password visibility toggle
  const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#password');
  
  togglePassword.addEventListener('click', function (e) {
    // Toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // Toggle the eye / eye slash icon
    this.classList.toggle('bi-eye');
    this.classList.toggle('bi-eye-slash');
  });

  // Form validation and loading state
  document.getElementById('loginForm').addEventListener('submit', function(e) {
    const form = this;
    const button = form.querySelector('button[type="submit"]');
    const spinner = button.querySelector('.spinner-border');
    const buttonText = button.querySelector('.button-text');
    
    if (form.checkValidity() === false) {
      e.preventDefault();
      e.stopPropagation();
    } else {
      // Show loading state
      button.disabled = true;
      spinner.classList.remove('d-none');
      buttonText.classList.add('d-none');
    }
    
    form.classList.add('was-validated');
  }, false);
</script>
<?= $this->endSection() ?>
