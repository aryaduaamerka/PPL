<?php
//load config.php
include("config.php");
 
//untuk api_key newsapi.org
$api_key="55575ed0298c404d8332ad3c4a071b63";
 
//url api untuk ambil berita headline di Indonesia
$url="https://newsapi.org/v2/top-headlines?country=us&apiKey=".$api_key;
 
//menyimpan hasil dalam variabel
$data=http_request_get($url);
 
//konversi data json ke array
$hasil=json_decode($data,true);
 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Rest Client dengan cURL</title>
    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
 
<!-- navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
  <div class="container">
    <a class="navbar-brand" href="#"><i class="fas fa-newspaper me-2"></i>RestClient News</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
      <li class="nav-item">
          <a class="nav-link active" href="#"><i class="fas fa-home me-1"></i>Home</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-newspaper me-1"></i>News</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-info-circle me-1"></i>About</a>
      </li>
    </ul>
    </div>
  </div>
</nav>


<div class="container" style="margin-top: 75px;">
    <div class="row">
 
<!-- looping hasil data di array article -->
<?php foreach ($hasil['articles'] as $row) { ?>
 
        <div class="col-md" style="margin-top: 10px; margin-bottom: 10px;">
            <div class="card" style="width: 18rem;">
              <img src="<?php echo $row['urlToImage']; ?>" class="card-img-top" height="180px">
              <div class="card-body">
                <p class="card-text"><i>Oleh <?php echo $row['author']; ?></i> ~ <?php echo $row['title']; ?></p>
                <p class="text-right"><a href="<?php echo $row['urlToImage']; ?>" target="_blank">Selengkapnya..</a></p>
              </div>
            </div>
        </div>
 
<?php } ?>
 
    </div>
</div>
 
<!-- JS Bootstrap -->
<script src="js/jquery-3.4.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>