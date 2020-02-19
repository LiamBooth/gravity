<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('post_message');?>
  <div class="row mb-3">
    <div class="col-md-6">
      <h1>Posts</h1>
    </div>
  </div>
<?php foreach($data['packages'] as $package) : ?>
  <div class="card card-body mb-3">
    <h4 class="card-title"><?php echo $packageo->title; ?></h4>
    <div class="bg-light p-2 mb-3">
      Written by <?php echo $package->name; ?> on <?php echo $package->packageCreated; ?>
    </div>
    <p class="card-text"><?php echo $package->body; ?></p>
    <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $package->packageId; ?>" class="btn btn-dark">More</a>
  </div>
<?php endforeach; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>