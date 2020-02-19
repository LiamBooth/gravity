<?php require APPROOT . '/views/inc/header.php';?>
  <a class="btn btn-light" href="<?php echo URLROOT;?>/portfolios">
    <i class="fa fa-backward"> Back</i>
  </a>
  <br>
  <h1><?php echo $data['portfolios']->title;?></h1>

  <div class="bg-secondary text-white p-2 mb-3">
    Written By <?php echo $data['user']->name;?> on <?php echo $data['portfolios']->created_at;?>
  </div>
  <p>
    <?php echo $data['portfolios']->body;?>
  </p>

  <?php if($data['portfolios']->user_id == $_SESSION['user_id']) : ?>
  <hr>
  <a href="<?php echo URLROOT;?>/portfolios/edit/<?php echo $data['portfolios']->id;?>" class="btn btn-dark">
    Edit
  </a>
  <form class="pull-right" action="<?php echo URLROOT;?>/portfolios/delete/<?php echo $data['portfolios']->id;?>" method="post">
    <input type="submit" value="Delete" class="btn btn-danger">
  </form>
  <?php endif;?>

<?php require APPROOT.'/views/inc/footer.php';?>