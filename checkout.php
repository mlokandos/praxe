<?php include "includes/menu.php" ?>

<main class="checkout-page">
  <section class="checkout-form">
    <h2>📦 Doručovací údaje</h2>
  <form id="order-form" action="odeslano.php" method="post">
  <label>Jméno a příjmení</label>
  <input type="text" name="name" required>

  <label>Email</label>
  <input type="email" name="email" required>

  <label>Adresa</label>
  <input type="text" name="address" required>

  <label>Město</label>
  <input type="text" name="city" required>

  <label>PSČ</label>
  <input type="text" name="zip" required>

  <label>Způsob platby</label>
  <select name="payment" required>
    <option value="card">💳 Kartou online</option>
    <option value="cash">💵 Dobírka</option>
    <option value="applepay">🍎 Apple Pay</option>
  </select>

  <!-- Skryté pole pro produkty -->
  <input type="hidden" name="cartData" id="cartData">

  <button type="submit" class="submit-btn">Odeslat objednávku</button>
</form>


<script>
document.getElementById('order-form').addEventListener('submit', function(e) {
  e.preventDefault(); // 🚫 Zabrání okamžitému odeslání formuláře
  const cart = JSON.parse(localStorage.getItem('cart')) || [];
  document.getElementById('cartData').value = JSON.stringify(cart);
  this.submit(); // ✅ Teď odešli formulář ručně
});
</script>

</script>
  </section>

  <section class="checkout-summary">
    <h2>🧾 Souhrn objednávky</h2>
    <ul id="summary-items"></ul>
    <p class="summary-total">Celkem: <strong id="summary-total">0 Kč</strong></p>
  </section>
</main>


<script src="script.js"></script>

<?php include "includes/footer.php" ?>
