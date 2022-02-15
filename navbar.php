<?php 
if(isset($_GET["content"])){
  $active = $_GET["content"];
}else {
  $active="";
}
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Op.wpgg</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?php if($_GET["content"]== "home"){ echo "active";} ?>" aria-current="page" href="index.php?content=home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($_GET["content"]== "streams"){ echo "active";} ?>" href="./index.php?content=streams">Streams</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($_GET["content"]== "patchnotes"){ echo "active";} ?>" href="./index.php?content=patchnotes">patch notes</a>
        </li>
      </ul>
    </div>
  </div>
</nav>