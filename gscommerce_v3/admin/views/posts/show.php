<?php require APPROOT . '/views/inc/header.php';?>
  <a class="btn btn-light" href="<?php echo URLROOT;?>/admin/posts">
    <i class="fa fa-backward"> Back</i>
  </a>
  <br>
  <h1><?php echo $data['post']->title;?></h1>

  <div class="bg-secondary text-white p-2 mb-3">
    Created on <?php echo $data['post']->created_at;?>
  </div>
  <p>
    <?php echo $data['post']->body;?>
  </p>

  <hr>
  <a href="<?php echo URLROOT;?>/admin/posts/edit/<?php echo $data['post']->id;?>" class="btn btn-dark">
    Edit
  </a>
  <form class="pull-right" action="<?php echo URLROOT;?>/admin/posts/delete/<?php echo $data['post']->id;?>" method="post">
    <input type="submit" value="Delete" class="btn btn-danger">
  </form>

<?php require APPROOT.'/views/inc/footer.php';?>