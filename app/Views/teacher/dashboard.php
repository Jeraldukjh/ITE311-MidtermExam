 <?= $this->extend('layouts/main') ?>

 <?= $this->section('content') ?>
 <div class="container">
     <div class="row justify-content-center">
         <div class="col-md-8">
             <div class="text-center">
                 <h1 class="display-4">Teacher Dashboard</h1>
                 <div class="alert alert-success mt-4" role="alert">
                     <h4 class="alert-heading">Welcome, Teacher!</h4>
                     <p>You can manage your courses, view student progress, and access teaching tools here.</p>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <?= $this->endSection() ?>
