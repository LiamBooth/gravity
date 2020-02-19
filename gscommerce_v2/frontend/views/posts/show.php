<?php require APPROOT . '/views/inc/header.php';?>
  <a class="btn btn-light" href="<?php echo URLROOT;?>/posts">
    <i class="fa fa-backward"> Back</i>
  </a>
  <br>
  <h1><?php echo $data['post']->title;?></h1>

  <div class="bg-secondary text-white p-2 mb-3">
    Written By <?php echo $data['user']->name;?> on <?php echo $data['post']->created_at;?>
  </div>
  <p>
    <?php echo $data['post']->body;?>
  </p>

<?php require APPROOT.'/views/inc/footer.php';?>