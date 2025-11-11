<?php include "includes/menu.php" ?>

<main class="checkout-page">
  <section class="checkout-form">
    <h2>📦 Doručovací údaje</h2>
    <form id="order-form">
      <label>Jméno a příjmení</label>
      <input type="text" id="name" required>

      <label>Email</label>
      <input type="email" id="email" required>

      <label>Adresa</label>
      <input type="text" id="address" required>

      <label>Město</label>
      <input type="text" id="city" required>

      <label>PSČ</label>
      <input type="text" id="zip" required>

      <label>Způsob platby</label>
      <select id="payment" required>
        <option value="card">💳 Kartou online</option>
        <option value="cash">💵 Dobírka</option>
        <option value="applepay">🍎 Apple Pay</option>
      </select>

      <button type="submit" class="submit-btn">Odeslat objednávku</button>
    </form>
  </section>

  <section class="checkout-summary">
    <h2>🧾 Souhrn objednávky</h2>
    <ul id="summary-items"></ul>
    <p class="summary-total">Celkem: <strong id="summary-total">0 Kč</strong></p>
  </section>
</main>

<script src="script.js"></script>

<?php include "includes/footer.php" ?>
