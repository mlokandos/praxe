<?php include "includes/menu.php" ?>

   <section class="filters">
    <button class="filter-btn active" data-filter="jahodový">jahodový</button>
    <button class="filter-btn" data-filter="vanilkový">vanilkový</button>
    <button class="filter-btn" data-filter="čokoládový">čokoládový</button>
    <button class="filter-btn" data-filter="vegan">vegan</button>
  </section>

  <!-- Produkty podle filtru -->
  <section class="products" id="product-list">
    <!-- Sem se dynamicky vkládají produkty -->
  </section>

    <script>
    const products = {
      jahodový: [
        "https://via.placeholder.com/200x200/ffb3b3/000000?text=Jahoda+1",
        "https://via.placeholder.com/200x200/ff9999/000000?text=Jahoda+2",
        "https://via.placeholder.com/200x200/ff8080/000000?text=Jahoda+3",
        "https://via.placeholder.com/200x200/ff6666/000000?text=Jahoda+4"
      ],
      vanilkový: [
        "https://via.placeholder.com/200x200/fff0b3/000000?text=Vanilka+1",
        "https://via.placeholder.com/200x200/ffe680/000000?text=Vanilka+2",
        "https://via.placeholder.com/200x200/ffdb4d/000000?text=Vanilka+3",
        "https://via.placeholder.com/200x200/ffd11a/000000?text=Vanilka+4"
      ],
      čokoládový: [
        "https://via.placeholder.com/200x200/d9b38c/000000?text=Čokoláda+1",
        "https://via.placeholder.com/200x200/cca57a/000000?text=Čokoláda+2",
        "https://via.placeholder.com/200x200/b38f5e/000000?text=Čokoláda+3",
        "https://via.placeholder.com/200x200/997a3d/000000?text=Čokoláda+4"
      ],
      vegan: [
        "https://via.placeholder.com/200x200/c2f0c2/000000?text=Vegan+1",
        "https://via.placeholder.com/200x200/a8e6a3/000000?text=Vegan+2",
        "https://via.placeholder.com/200x200/8cd98c/000000?text=Vegan+3",
        "https://via.placeholder.com/200x200/70db70/000000?text=Vegan+4"
      ]
    };
 </script>

<?php include "includes/footer.php" ?>
