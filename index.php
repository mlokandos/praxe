<?php include "includes/menu.php" ?>
  <section class="hero">
    <div class="slider">
      <div class="slide active">
        <img src="images/jahoda.jpeg" alt="Jahodový šejk">
      </div>
      <div class="slide">
        <img src="images/vanil.jpg" alt="Vanilkový šejk">
      </div>
      <div class="slide">
        <img src="images/vegan.jpg" alt="Vegan šejk">
      </div>
      <div class="slide">
        <img src="images/cokolada.jpg" alt="Čokoládový šejk">
      </div>
    </div>

    <div class="dots">
      <span class="dot active"></span>
      <span class="dot"></span>
      <span class="dot"></span>
      <span class="dot"></span>
    </div>
  </section>

  <!-- Sekce produktů -->
  <section class="products">
    <div class="product"><img src="images/cokolada.jpg"> </div>
    <div class="product"><img src="images/jahoda.jpeg"></div>
    <div class="product"><img src="images/vegan.jpg"></div>
    <div class="product"><img src="images/vanil.jpg"></div>
  </section>

  <!-- Sekce se sloganem a logem -->
  <section class="slogan-section">
    <div class="slogan-logo"><img width=100px src="images/logofinal.png"> </div>
    <div class="slogan-text">Ať chutná či nechutná, toť otázka</div>
  </section>

   
   <script>
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.dot');
    let index = 0;

    function showSlide(i) {
      slides.forEach((slide, n) => {
        slide.classList.toggle('active', n === i);
        dots[n].classList.toggle('active', n === i);
      });
    }

    setInterval(() => {
      index = (index + 1) % slides.length;
      showSlide(index);
    }, 2000);
  </script>

<?php include "includes/footer.php" ?>


    
