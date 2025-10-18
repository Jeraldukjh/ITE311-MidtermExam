<?php /** @var array $courses */ /** @var array $enrolled */ ?>
<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<h3 class="mb-3">Courses</h3>
<?php if (empty($courses)): ?>
  <div class="alert alert-info">No courses available.</div>
<?php else: ?>
  <div class="list-group">
    <?php foreach ($courses as $c): ?>
      <div class="list-group-item d-flex justify-content-between align-items-center">
        <div>
          <div class="fw-bold"><?= esc($c['code']) ?>: <?= esc($c['title']) ?></div>
          <div class="text-muted small"><?= esc($c['description'] ?? '') ?></div>
        </div>
        <div>
          <?php if (!empty($enrolled[$c['id']])): ?>
            <span class="badge bg-success">Enrolled</span>
          <?php else: ?>
            <form action="/courses/enroll/<?= (int)$c['id'] ?>" method="post" class="m-0">
              <button type="submit" class="btn btn-sm btn-primary">Enroll</button>
            </form>
          <?php endif; ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>
<?= $this->endSection() ?>
