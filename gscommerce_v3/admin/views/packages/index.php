<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('post_message');?>
  <div class="row mb-3 pl-2">
    <div class="col-md-6">
      <h1>Packages</h1>
    </div>
  </div>

<div class="row pl-3">
  <div class="col-lg-6">

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Add New Package</h6>
      </div>
      <div class="card-body">
        <div class="col-md-6">
          <a href="<?php echo URLROOT; ?>/admin/packages/add" class="btn btn-primary pull-right">
            <i class="fa fa-pencil"></i>Add Package
          </a>
        </div>
      </div>
    </div>

    <div class="card mb-4">
      <div class="card-header">
        Here you can control your Packages.
      </div>
      <div class="card-body">
        Use this area of the admin to alter your packages. <br>You can add new packages and edit/delete them here.
      </div>
    </div>

  </div>

  <div class="col-lg-6">
    <?php foreach($data['packages'] as $package) : ?>
    <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary"><?php echo $package->title;?></h6>
        <?php if($package->active == 'Y') {?>
        <div class="fas fa-check" style="color:#66CD00;" title="Active">&nbsp;</div>
        <?php } else { ?>
        <div class="fas fa-times" style="color:#cc0000" title="Inactive">&nbsp;</div>
        <?php } ?>
        <div class="dropdown no-arrow">
          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
            <div class="dropdown-header">Actions:</div>
            <a class="dropdown-item" href="/admin/packages/show/<?php echo $package->packageId; ?>">Preview</a>
            <a class="dropdown-item" href="/admin/packages/edit/<?php echo $package->packageId;?>">Edit</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="/admin/packages/delete/<?php echo $package->packageId;?>">Delete</a>
            <a class="dropdown-item" href="#">Mark as Inactive</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <?php echo $package->body; ?>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>



