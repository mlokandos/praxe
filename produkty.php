<?php include "includes/menu.php"; ?>

<main>
<section class="filters">
  <button class="filter-btn active" data-filter="all">Všechny</button>
  <button class="filter-btn" data-filter="letni">Letní sonety</button>
  <button class="filter-btn" data-filter="hamlet">Síla Hamleta</button>
  <button class="filter-btn" data-filter="sladke">Sladké drama</button>
  <button class="filter-btn" data-filter="epilog">Zdravý epilog</button>
</section>


  <section id="products" class="products"></section>
</main>


<div id="product-modal" class="modal">
  <div class="modal-content">
    <span id="close-modal" class="close">&times;</span>
    <img id="modal-img" src="" alt="">
    <h2 id="modal-name"></h2>
    <p id="modal-desc"></p>
    <div id="modal-price" class="price"></div>
    <button id="modal-add" class="add-btn">Přidat do košíku</button>
  </div>
</div>

<script src="script.js"></script>
<?php include "includes/footer.php"; ?>
