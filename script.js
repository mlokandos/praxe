// ===== DATA: produkty (full list) =====
const produkty = [
  { nazev: "Čokoládový shake", kategorie: "mlecny", cena: 79, img: "https://images.unsplash.com/photo-1605712448686-25c9b0f7c87f?auto=format&fit=crop&w=600&q=80", popis: "Krémový shake s pravou belgickou čokoládou." },
  { nazev: "Vanilkový protein", kategorie: "proteinovy", cena: 99, img: "https://images.unsplash.com/photo-1590080875832-0c8ddee5cde0?auto=format&fit=crop&w=600&q=80", popis: "Proteinový shake s jemnou chutí vanilky." },
  { nazev: "Jahodový shake", kategorie: "ovocny", cena: 69, img: "https://images.unsplash.com/photo-1589187155479-093d3a5b0a9d?auto=format&fit=crop&w=600&q=80", popis: "Osvěžující jahodový shake z čerstvých plodů." },
  { nazev: "Karamelový sen", kategorie: "mlecny", cena: 89, img: "https://images.unsplash.com/photo-1603808033192-3c847b3cde68?auto=format&fit=crop&w=600&q=80", popis: "Sladký karamel v krémovém provedení." },
  { nazev: "Kokosové potěšení", kategorie: "vegan", cena: 85, img: "https://images.unsplash.com/photo-1565958011705-44a8e5d4b6a6?auto=format&fit=crop&w=600&q=80", popis: "Vegan shake s kokosovým mlékem." },
  { nazev: "Matcha power", kategorie: "vegan", cena: 95, img: "https://images.unsplash.com/photo-1607083206173-ea57d70b2f77?auto=format&fit=crop&w=600&q=80", popis: "Zelená energie z pravé japonské matchy." },
  { nazev: "Banánový sen", kategorie: "ovocny", cena: 75, img: "https://images.unsplash.com/photo-1601152157582-3b6f7f9c24f3?auto=format&fit=crop&w=600&q=80", popis: "Krémový banánový shake s trochou medu." },
  { nazev: "Borůvková bomba", kategorie: "ovocny", cena: 82, img: "https://images.unsplash.com/photo-1565958011705-44a8e5d4b6a6?auto=format&fit=crop&w=600&q=80", popis: "Borůvkový shake plný antioxidantů." },
  { nazev: "Protein cookie", kategorie: "proteinovy", cena: 89, img: "https://images.unsplash.com/photo-1613460777563-1e7a4fbe3f27?auto=format&fit=crop&w=600&q=80", popis: "Proteinový shake s příchutí cookie." }
];

// ===== KOŠÍK: util =====
const getCart = () => JSON.parse(localStorage.getItem("cart")) || [];
const saveCart = (cart) => localStorage.setItem("cart", JSON.stringify(cart));
const updateCartCount = () => {
  const el = document.getElementById("cart-count");
  if (!el) return;
  const count = getCart().reduce((s, it) => s + (it.mnozstvi || 0), 0);
  el.textContent = count;
};

// ===== TOAST =====
const showToast = (msg) => {
  let toast = document.getElementById("toast");
  if (!toast) {
    toast = document.createElement("div");
    toast.id = "toast";
    toast.className = "toast";
    document.body.appendChild(toast);
  }
  toast.textContent = msg;
  toast.classList.add("show");
  setTimeout(() => toast.classList.remove("show"), 1600);
};

// ===== ESCAPE =====
function escapeHtml(str) { return String(str).replace(/"/g,'&quot;').replace(/'/g,"&#39;"); }
function unescapeHtml(str) { return String(str).replace(/&quot;/g, '"').replace(/&#39;/g, "'"); }

// ===== DROPDOWN =====
const updateCartDropdown = () => {
  const dropdown = document.getElementById("cart-dropdown");
  if (!dropdown) return;
  const cart = getCart();
  dropdown.innerHTML = "";
  if (!cart.length) {
    dropdown.innerHTML = `<p class="cart-empty-note">Košík je prázdný.</p>`;
    return;
  }
  cart.forEach(item => {
    const div = document.createElement('div');
    div.className = 'cart-item';
    div.innerHTML = `
      <img src="${item.img}" alt="${item.nazev}">
      <div class="cart-item-details">
        <p><strong>${item.nazev}</strong></p>
        <p>${item.mnozstvi} × ${item.cena} Kč</p>
      </div>
      <button class="remove-item" data-name="${escapeHtml(item.nazev)}" aria-label="Odstranit">✖</button>
    `;
    dropdown.appendChild(div);
  });

  const total = cart.reduce((s,i) => s + i.cena * i.mnozstvi, 0);
  const footer = document.createElement('div');
  footer.className = 'cart-dropdown-footer';
  footer.innerHTML = `
    <hr style="border:none;border-top:1px solid #eee;margin:8px 0;">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:8px">
      <strong>Celkem</strong><span>${total} Kč</span>
    </div>
    <a href="cart.php" class="btn-go-cart">Přejít do košíku</a>
  `;
  dropdown.appendChild(footer);

  dropdown.querySelectorAll('.remove-item').forEach(btn => btn.addEventListener('click', (e) => {
    const name = unescapeHtml(btn.dataset.name || "");
    removeFromCart(name);
    showToast('Položka odstraněna');
  }));
};

// ===== CRUD KOŠÍK =====
const addToCart = (produkt) => {
  const cart = getCart();
  const found = cart.find(i => i.nazev === produkt.nazev);
  if (found) found.mnozstvi = (found.mnozstvi || 0) + 1;
  else cart.push({...produkt, mnozstvi: 1});
  saveCart(cart);
  updateCartCount();
  updateCartDropdown();
  showToast(`${produkt.nazev} přidán do košíku`);
};

const removeFromCart = (nazev) => {
  let cart = getCart();
  cart = cart.filter(i => i.nazev !== nazev);
  saveCart(cart);
  updateCartCount();
  updateCartDropdown();
};

// ===== RENDER PRODUKTŮ + MODAL + PAGES =====
document.addEventListener('DOMContentLoaded', () => {
  // --- hamburger behavior ---
  const hamburger = document.getElementById('hamburger');
  const navLinks = document.getElementById('nav-links');
  hamburger?.addEventListener('click', () => {
    navLinks.classList.toggle('show');
    hamburger.classList.toggle('active');
  });

  // --- cart hover + click logic (desktop hover, mobile click) ---
  const cartContainer = document.getElementById('cart-container');
  const cartLink = document.getElementById('cart-link'); // the <a href="cart.php">...
  const dropdown = document.getElementById('cart-dropdown');

  if (cartContainer && dropdown) {
    let leaveTimeout = null;

    // desktop: hover shows dropdown
    cartContainer.addEventListener('mouseenter', () => {
      clearTimeout(leaveTimeout);
      dropdown.classList.add('show');
      dropdown.setAttribute('aria-hidden','false');
    });
    cartContainer.addEventListener('mouseleave', () => {
      leaveTimeout = setTimeout(() => {
        dropdown.classList.remove('show');
        dropdown.setAttribute('aria-hidden','true');
      }, 180);
    });

    // mobile: click toggles dropdown; but clicking the inner link should navigate
    cartContainer.addEventListener('click', (e) => {
      // if click target (or its ancestor) is the "go to cart" link -> let navigation happen
      const clickedAnchor = e.target.closest('a');
      if (clickedAnchor && clickedAnchor.getAttribute('href') === 'cart.php') {
        // allow navigation
        return;
      }

      // otherwise toggle dropdown on small screens, on desktop a plain click on icon navigates
      if (window.innerWidth < 768) {
        e.preventDefault();
        dropdown.classList.toggle('show');
        const shown = dropdown.classList.contains('show');
        dropdown.setAttribute('aria-hidden', shown ? 'false' : 'true');
      } else {
        // desktop click on cart icon should navigate to cart.php
        if (cartLink && !e.target.closest('.remove-item')) {
          window.location.href = 'cart.php';
        }
      }
    });

    // close dropdown when clicking outside
    document.addEventListener('click', (e) => {
      if (!e.target.closest('#cart-container')) {
        dropdown.classList.remove('show');
        dropdown.setAttribute('aria-hidden','true');
      }
    });
  }

  // --- produkty page render ---
  const prodContainer = document.getElementById('products');
  if (prodContainer) {
    const renderProducts = (filter = 'all') => {
      prodContainer.innerHTML = '';
      produkty.filter(p => filter === 'all' || p.kategorie === filter).forEach(p => {
        const card = document.createElement('div');
        card.className = 'product';
        card.innerHTML = `
          <img src="${p.img}" alt="${p.nazev}">
          <div class="product-content">
            <h3 class="prod-name">${p.nazev}</h3>
            <p>${p.popis}</p>
            <div class="price">${p.cena} Kč</div>
            <button class="add-btn">Přidat do košíku</button>
          </div>
        `;
        // open modal on image/name click
        card.querySelector('img').addEventListener('click', () => openModal(p));
        card.querySelector('.prod-name').addEventListener('click', () => openModal(p));
        // add to cart button
        card.querySelector('.add-btn').addEventListener('click', (e) => { e.stopPropagation(); addToCart(p); });
        prodContainer.appendChild(card);
      });
    };

    document.querySelectorAll('.filter-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        renderProducts(btn.dataset.filter);
      });
    });

    renderProducts('all');
  }

  // --- modal handling ---
  const modal = document.getElementById('product-modal');
  if (modal) {
    const modalImg = document.getElementById('modal-img');
    const modalName = document.getElementById('modal-name');
    const modalDesc = document.getElementById('modal-desc');
    const modalPrice = document.getElementById('modal-price');
    const modalAdd = document.getElementById('modal-add');
    let current = null;

    window.openModal = (p) => {
      modal.style.display = 'flex';
      modalImg.src = p.img;
      modalName.textContent = p.nazev;
      modalDesc.textContent = p.popis;
      modalPrice.textContent = p.cena + ' Kč';
      current = p;
    };

    document.getElementById('close-modal')?.addEventListener('click', () => modal.style.display = 'none');
    modal.addEventListener('click', (e) => { if (e.target === modal) modal.style.display = 'none'; });
    modalAdd?.addEventListener('click', () => { if (current) addToCart(current); modal.style.display = 'none'; });
  }

  // --- cart page render ---
  if (document.getElementById('cart-items')) {
    let cart = getCart();
    const cartList = document.getElementById('cart-items');
    const totalEl = document.getElementById('cart-total');
    const renderCart = () => {
      cart = getCart();
      cartList.innerHTML = '';
      let total = 0;
      if (!cart.length) {
        cartList.innerHTML = '<p>Košík je prázdný.</p>';
      } else {
        cart.forEach((it, idx) => {
          total += it.cena * it.mnozstvi;
          const node = document.createElement('div');
          node.className = 'cart-item';
          node.innerHTML = `
            <img src="${it.img}" alt="${it.nazev}">
            <div class="cart-item-info">
              <div class="cart-item-name">${it.nazev}</div>
              <div class="cart-item-price">${it.cena} Kč / ks</div>
            </div>
            <div class="qty-controls">
              <button data-i="${idx}" data-action="minus">−</button>
              <span>${it.mnozstvi}</span>
              <button data-i="${idx}" data-action="plus">+</button>
            </div>
            <button class="remove-btn" data-i="${idx}">×</button>
          `;
          cartList.appendChild(node);
        });
      }
      totalEl.textContent = total + ' Kč';
      saveCart(cart);
      updateCartCount();
      updateCartDropdown();
    };

    cartList.addEventListener('click', (e) => {
      const btn = e.target;
      if (btn.dataset?.action) {
        const i = Number(btn.dataset.i);
        if (btn.dataset.action === 'plus') cart[i].mnozstvi++;
        else if (cart[i].mnozstvi > 1) cart[i].mnozstvi--;
        saveCart(cart);
        renderCart();
      }
      if (btn.classList.contains('remove-btn')) {
        cart.splice(Number(btn.dataset.i), 1);
        saveCart(cart);
        renderCart();
      }
    });

    document.getElementById('checkout-btn')?.addEventListener('click', () => {
      if (!getCart().length) return alert('Košík je prázdný!');
      window.location.href = 'checkout.php';
    });

    renderCart();
  }

  // --- checkout summary ---
  if (document.getElementById('order-form')) {
    const cart = getCart();
    const summaryList = document.getElementById('summary-items');
    const totalEl = document.getElementById('summary-total');
    if (!cart.length) {
      summaryList.innerHTML = '<li>Košík je prázdný.</li>';
      totalEl.textContent = '0 Kč';
    } else {
      let total = 0;
      cart.forEach(item => {
        const li = document.createElement('li');
        li.textContent = `${item.nazev} × ${item.mnozstvi} — ${item.cena * item.mnozstvi} Kč`;
        summaryList.appendChild(li);
        total += item.cena * item.mnozstvi;
      });
      totalEl.textContent = total + ' Kč';
    }
    document.getElementById('order-form').addEventListener('submit', (e) => {
      e.preventDefault();
      alert('Objednávka odeslána! Děkujeme za nákup 🧡');
      localStorage.removeItem('cart');
      window.location.href = 'index.php';
    });
  }

  // init UI
  updateCartCount();
  updateCartDropdown();
});
