<!DOCTYPE html>
<html lang="cs">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <link rel="stylesheet" href="css/style.css" />
  <title>ŠejkSpír</title>
</head>
<body>
<header>
  <nav class="navbar">
  <div class="nav-logo">
  <a href="index.php">
    <img src="images/logo.jpg" alt="Logo ŠejkSpír" class="logo-img">
  </a>
</div>

    <ul class="nav-links" id="nav-links">
      <li><a href="index.php">Hlavní stránka</a></li>
      <li><a href="produkty.php">Produkty</a></li>
      <li><a href="onas.php">O nás</a></li>
      <li><a href="kontakt.php">Kontakt</a></li>
    </ul>

    <!-- CART + container (důležité IDs / classy) -->
    <div id="cart-container" class="cart-wrapper">
      <a id="cart-link" class="cart-icon" href="cart.php" aria-label="Košík">
        🛒 <span id="cart-count">0</span>
      </a>
      <div id="cart-dropdown" class="cart-dropdown" aria-hidden="true"></div>
    </div>

    <button class="hamburger" id="hamburger" aria-label="Otevřít menu">
      <span></span><span></span><span></span>
    </button>
  </nav>
</header>
