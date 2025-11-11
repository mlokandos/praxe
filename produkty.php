<?php include "includes/menu.php"; ?>

<main>
  <section class="filters">
    <button class="filter-btn active" data-filter="all">Všechny</button>
    <button class="filter-btn" data-filter="mlecny">Mlěčné</button>
    <button class="filter-btn" data-filter="ovocny">Ovocné</button>
    <button class="filter-btn" data-filter="proteinovy">Proteinové</button>
    <button class="filter-btn" data-filter="vegan">Vegan</button>
  </section>

  <section id="products" class="products">
    <!-- Produkty generované z JS -->
  </section>
</main>

<!-- === MODAL OKNO === -->
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
