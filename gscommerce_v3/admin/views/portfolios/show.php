<?php require APPROOT . '/views/inc/header.php';?>
  <a class="btn btn-light" href="<?php echo URLROOT;?>/admin/portfolios">
    <i class="fa fa-backward"> Back</i>
  </a>
  <br>
  <h1><?php echo $data['portfolios']->title;?></h1>

  <div class="bg-secondary text-white p-2 mb-3">
    Created on <?php echo $data['portfolios']->created_at;?>
  </div>
  <p>
    <?php echo $data['portfolios']->body;?>
  </p>

  <hr>
  <a href="<?php echo URLROOT;?>/admin/portfolios/edit/<?php echo $data['portfolios']->id;?>" class="btn btn-dark">
    Edit
  </a>
  <form class="pull-right" action="<?php echo URLROOT;?>/admin/portfolios/delete/<?php echo $data['portfolios']->id;?>" method="post">
    <input type="submit" value="Delete" class="btn btn-danger">
  </form>

<?php require APPROOT.'/views/inc/footer.php';?>