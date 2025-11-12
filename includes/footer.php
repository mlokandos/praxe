<footer class="footer">
  <div class="footer-container">

    <div class="footer-section footer-logo">
      <img src="images/logofinal.png" alt="Shake Logo">
    </div>

    <div class="footer-section footer-links">
      <h3>Odkazy</h3>
      <ul>
        <li><a href="index.php">Domů</a></li>
        <li><a href="produkty.php">Produkty</a></li>
        <li><a href="onas.php">O nás</a></li>
        <li><a href="kontakt.php">Kontakt</a></li>
      </ul>
    </div>

    <div class="footer-section footer-contact">
      <h3>Kontakt</h3>
      <p>Email: <a href="mailto:sejkspir123@gmail.com">sejkspir123@gmail.com</a></p>
      <p>Tel: +420 123 456 789</p>
      <div class="social-icons">
        
        <a target="_blank" href="https://www.instagram.com/sejkspir_/#"><img src="images/ig.png" alt="Instagram"></a>
      </div>
    </div>
  </div>

  <div class="footer-bottom">
    <p>© 2025 ŠejkSpír. Všechna práva vyhrazena.</p>
  </div>
</footer>
<script>
document.addEventListener("DOMContentLoaded", () => {
  const slides = document.querySelectorAll('.slide');
  const dots = document.querySelectorAll('.dot');
  let index = 0;
  let autoSlide;

  // Zobrazit konkrétní slide
  function showSlide(i) {
    slides.forEach((slide, n) => {
      slide.classList.toggle('active', n === i);
      dots[n].classList.toggle('active', n === i);
    });
    index = i;
  }

  // Další / předchozí slide
  function nextSlide() {
    index = (index + 1) % slides.length;
    showSlide(index);
  }

  function prevSlide() {
    index = (index - 1 + slides.length) % slides.length;
    showSlide(index);
  }

  // Automatické přepínání
  function startAutoSlide() {
    autoSlide = setInterval(nextSlide, 5000);
  }

  function stopAutoSlide() {
    clearInterval(autoSlide);
  }

  // Klikací tečky
  dots.forEach(dot => {
    dot.addEventListener('click', () => {
      stopAutoSlide();
      const i = parseInt(dot.dataset.index);
      showSlide(i);
      startAutoSlide();
    });
  });

  // Swipe podpora pro mobily
  let startX = 0;
  document.querySelector('.slider').addEventListener('touchstart', e => {
    startX = e.touches[0].clientX;
  });

  document.querySelector('.slider').addEventListener('touchend', e => {
    const endX = e.changedTouches[0].clientX;
    const diff = startX - endX;
    if (diff > 50) { // swipe doleva
      stopAutoSlide();
      nextSlide();
      startAutoSlide();
    } else if (diff < -50) { // swipe doprava
      stopAutoSlide();
      prevSlide();
      startAutoSlide();
    }
  });

  // Inicializace
  showSlide(0);
  startAutoSlide();
});
</script>

</body>
</html>
