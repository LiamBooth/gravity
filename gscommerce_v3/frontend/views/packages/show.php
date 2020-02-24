<?php require APPROOT . '/views/inc/header.php';?>
  <a class="btn btn-light" href="<?php echo URLROOT;?>/packages">
    <i class="fa fa-backward"> Back</i>
  </a>
  <br>
  <h1><?php echo $data['packages']->title;?></h1>

  <div class="bg-secondary text-white p-2 mb-3">
    Created on <?php echo $data['packages']->created_at;?>
  </div>
  <p>
    <?php echo $data['packages']->body;?>
  </p>
<?php require APPROOT.'/views/inc/footer.php';?>