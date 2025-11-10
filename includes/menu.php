<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

  
  <nav class="navbar">
   <div class="nav-logo">
    <a href="index.php">
      <img src="images/logo.jpg" alt="Logo" class="logo-img">
    </a>
  </div>

  <!-- Hamburger -->
  <div class="hamburger" id="hamburger">
    <span></span>
    <span></span>
    <span></span>
  </div>

  <ul class="nav-links" id="nav-links">
    <li><a href="produkty.php" class="active">Produkty</a></li>
    <li><a href="onas.php">O nás</a></li>
    <li><a href="kontakt.php">Kontakt</a></li>
  </ul>
</nav>
<script>
  const hamburger = document.getElementById('hamburger');
  const navLinks = document.getElementById('nav-links');

  hamburger.addEventListener('click', () => {
    navLinks.classList.toggle('show');
    hamburger.classList.toggle('active');
  });

  // Aktivní odkaz podle URL
  const links = document.querySelectorAll('.nav-links li a');
  const currentPath = window.location.pathname.split('/').pop() || 'index.php';

  links.forEach(link => {
    if(link.getAttribute('href') === currentPath) {
      link.classList.add('active');
    } else {
      link.classList.remove('active');
    }
  });
</script>





  </nav>