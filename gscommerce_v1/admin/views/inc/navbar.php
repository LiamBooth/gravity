<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3 main-nav">
  <div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarsExampleDefault">

      <ul class="navbar-nav ml-auto nav-left">
        <li class="nav-item">
          <a class="nav-link" title="Packages" href="<?php echo URLROOT;?>/pages/packages">Packages</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" title="Portfolio" href="<?php echo URLROOT;?>/pages/portfolio">Portfolio</a>
        </li>
      </ul>

      <a class="navbar-brand" href="<?php echo URLROOT;?>">
        <img src="../public/images/logo.png" height="60" width="83"/>
      </a>

      <ul class="navbar-nav mr-auto nav-right">
        <li class="nav-item">
          <a class="nav-link" title="Contact Us" href="<?php echo URLROOT;?>/pages/contact_us">Contact Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" title="About Us" href="<?php echo URLROOT;?>/pages/about">About Us</a>
        </li>
      </ul>

    </div>
  </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3 slither-banners">
<div class="container">

  <ul class="navbar-nav ml-auto">
    <?php if(isset($_SESSION['user_id'])) : ?>
      <li class="nav-item">
        <a class="nav-link" href="#">Welcome <?php echo $_SESSION['user_name'];?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" title="Logout" href="<?php echo URLROOT;?>/users/logout">Logout</a>
      </li>
    <?php else : ?>
      <li class="nav-item">
        <a class="nav-link" title="Register" href="<?php echo URLROOT;?>/users/register">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" title="Login" href="<?php echo URLROOT;?>/users/login">Login</a>
      </li>
    <?php endif; ?>
  </ul>

</div>
</nav>