<?php include "includes/menu.php" ?>

<!-- Úvod sekce -->
<section class="contact-intro">
  <h1>Kontaktujte nás</h1>
  <p>
    Máte dotaz, nápad nebo chcete s námi spolupracovat?  
    Jsme tu pro vás – napište, zavolejte nebo se zastavte na šejk a úsměv!
  </p>
</section>

<!-- Kontaktní informace -->
<section class="contact-info">
  <div class="contact-grid">

    <div class="contact-card">
      <h2>📍 Kde nás najdete</h2>
      <p><strong>Adresa:</strong><br> ŠejkSpír s.r.o.<br> Erbenova 184<br> 344 01 Domažlice</p>
    </div>

    <div class="contact-card">
      <h2>📞 Spojte se s námi</h2>
      <p><strong>Telefon:</strong> <a href="tel:+420777123456">+420 777 123 456</a></p>
      <p><strong>Email:</strong> <a href="mailto:info@sejkarnalife.cz">sejkspir123@gmail.com</a></p>
    </div>

    <div class="contact-card">
      <h2>🕒 Otevírací doba</h2>
      <p>Pondělí – Pátek: 9:00 – 19:00<br>Sobota – Neděle: 10:00 – 18:00</p>
    </div>

  </div>
</section>

<!-- Mapa -->
<section class="contact-map">
  <h2>Kde nás najdete</h2>
  <iframe
    src="https://www.google.com/maps?q=Erbenova+184,+34401+Domažlice&output=embed"
    width="100%"
    height="400"
    style="border:0; border-radius: 16px;"
    allowfullscreen=""
    loading="lazy">
  </iframe>
</section>

<!-- Kontaktní formulář -->
<section class="contact-form-section">
  <h2>Napište nám</h2>
  <form class="contact-form" action="odeslano.php" method="post">
    <div class="form-group">
      <label for="name">Jméno a příjmení</label>
      <input type="text" id="name" name="name" placeholder="Vaše jméno" required>
    </div>

    <div class="form-group">
      <label for="email">E-mail</label>
      <input type="email" id="email" name="email" placeholder="např. vase@email.cz" required>
    </div>

    <div class="form-group">
      <label for="message">Zpráva</label>
      <textarea id="message" name="message" rows="5" placeholder="Sem napište svou zprávu..." required></textarea>
    </div>

    <button type="submit" class="submit-btn">Odeslat zprávu</button>
  </form>
</section>
<script src="script.js"></script>
<?php include "includes/footer.php" ?>

