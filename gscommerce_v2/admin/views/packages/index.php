<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('post_message');?>
  <div class="row mb-3">
    <div class="col-md-6">
      <h1>Posts</h1>
    </div>
    <div class="col-md-6">
      <a href="<?php echo URLROOT; ?>/portfolio/add" class="btn btn-primary pull-right">
        <i class="fa fa-pencil"></i> Add Portfolio
      </a>
    </div>
  </div>
<?php foreach($data['portfolios'] as $portfolio) : ?>
  <div class="card card-body mb-3">
    <h4 class="card-title"><?php echo $portfolio->title; ?></h4>
    <div class="bg-light p-2 mb-3">
      Written by <?php echo $portfolio->name; ?> on <?php echo $portfolio->portfolioCreated; ?>
    </div>
    <p class="card-text"><?php echo $portfolio->body; ?></p>
    <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $portfolio->portfolioId; ?>" class="btn btn-dark">More</a>
  </div>
<?php endforeach; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>