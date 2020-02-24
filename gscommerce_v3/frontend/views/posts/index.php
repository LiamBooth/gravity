<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('post_message');?>
  <div class="row mb-3">
    <div class="col-md-6">
      <h1>Posts frontend</h1>
    </div>
  </div>

<?php foreach($data['posts'] as $post) : ?>
  <div class="card card-body mb-3">
    <h4 class="card-title"><?php echo $post->title; ?></h4>
    <div class="bg-light p-2 mb-3">
      Created on <?php echo $post->postCreated; ?>
    </div>
    <p class="card-text"><?php echo $post->body; ?></p>
    <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>" class="btn btn-dark">More</a>
  </div>
<?php endforeach; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>