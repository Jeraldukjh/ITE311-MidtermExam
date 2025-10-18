<?php /** @var array $announcements */ ?>
<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<h3 class="mb-3">Announcements</h3>
<?php if (empty($announcements)): ?>
  <div class="alert alert-info">No announcements at this time.</div>
<?php else: ?>
  <div class="vstack gap-3">
    <?php foreach ($announcements as $a): ?>
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-2"><?= esc($a['title']) ?></h5>
          <p class="card-text"><?= esc($a['content']) ?></p>
          <div class="text-muted small">Posted: <?= esc($a['created_at'] ?? '') ?></div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>
<?= $this->endSection() ?>
