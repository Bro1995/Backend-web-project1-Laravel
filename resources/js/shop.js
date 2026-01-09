function money(value) {
  return new Intl.NumberFormat(undefined, { style: "currency", currency: "EUR" }).format(value);
}

function loadCart() {
  try {
    return JSON.parse(localStorage.getItem("cart_v1") || "[]");
  } catch {
    return [];
  }
}

function saveCart(cart) {
  localStorage.setItem("cart_v1", JSON.stringify(cart));
}

function setCartCount(cart) {
  const count = cart.reduce((sum, item) => sum + item.qty, 0);
  const el = document.getElementById("cartCount");
  if (el) el.textContent = String(count);
}

function renderCart(cart) {
  const itemsEl = document.getElementById("cartItems");
  const subtotalEl = document.getElementById("cartSubtotal");
  if (!itemsEl || !subtotalEl) return;

  itemsEl.innerHTML = "";
  if (cart.length === 0) {
    itemsEl.innerHTML = `<div class="text-sm text-slate-400">Your cart is empty.</div>`;
    subtotalEl.textContent = money(0);
    return;
  }

  let subtotal = 0;

  for (const item of cart) {
    subtotal += item.price * item.qty;

    const row = document.createElement("div");
    row.className = "rounded-2xl border border-slate-800 bg-slate-900/30 p-3";
    row.innerHTML = `
      <div class="flex items-start justify-between gap-3">
        <div>
          <p class="text-sm font-semibold">${item.name}</p>
          <p class="mt-1 text-xs text-slate-400">${money(item.price)} • Qty: ${item.qty}</p>
        </div>
        <div class="flex items-center gap-2">
          <button class="rounded-xl border border-slate-800 px-2 py-1 text-sm hover:bg-slate-900" data-dec="${item.id}">-</button>
          <button class="rounded-xl border border-slate-800 px-2 py-1 text-sm hover:bg-slate-900" data-inc="${item.id}">+</button>
          <button class="rounded-xl border border-slate-800 px-2 py-1 text-sm hover:bg-slate-900" data-rm="${item.id}">x</button>
        </div>
      </div>
    `;
    itemsEl.appendChild(row);
  }

  subtotalEl.textContent = money(subtotal);

  itemsEl.querySelectorAll("[data-inc]").forEach(btn => {
    btn.addEventListener("click", () => updateQty(btn.getAttribute("data-inc"), +1));
  });
  itemsEl.querySelectorAll("[data-dec]").forEach(btn => {
    btn.addEventListener("click", () => updateQty(btn.getAttribute("data-dec"), -1));
  });
  itemsEl.querySelectorAll("[data-rm]").forEach(btn => {
    btn.addEventListener("click", () => removeItem(btn.getAttribute("data-rm")));
  });
}

function updateQty(id, delta) {
  const cart = loadCart();
  const item = cart.find(x => String(x.id) === String(id));
  if (!item) return;

  item.qty += delta;
  if (item.qty <= 0) {
    saveCart(cart.filter(x => String(x.id) !== String(id)));
  } else {
    saveCart(cart);
  }

  const updated = loadCart();
  setCartCount(updated);
  renderCart(updated);
}

function removeItem(id) {
  const cart = loadCart().filter(x => String(x.id) !== String(id));
  saveCart(cart);
  setCartCount(cart);
  renderCart(cart);
}

function openCart() {
  const drawer = document.getElementById("cartDrawer");
  if (!drawer) return;
  drawer.classList.remove("hidden");
  document.body.style.overflow = "hidden";
  const cart = loadCart();
  setCartCount(cart);
  renderCart(cart);
}

function closeCart() {
  const drawer = document.getElementById("cartDrawer");
  if (!drawer) return;
  drawer.classList.add("hidden");
  document.body.style.overflow = "";
}

document.addEventListener("DOMContentLoaded", () => {
  const cart = loadCart();
  setCartCount(cart);

  const openBtn = document.getElementById("openCartBtn");
  if (openBtn) openBtn.addEventListener("click", openCart);

  document.querySelectorAll("[data-cart-close]").forEach(el => {
    el.addEventListener("click", closeCart);
  });

  document.querySelectorAll("[data-add-to-cart]").forEach(btn => {
    btn.addEventListener("click", () => {
      const id = btn.getAttribute("data-id");
      const name = btn.getAttribute("data-name");
      const price = parseFloat(btn.getAttribute("data-price") || "0");

      const cart = loadCart();
      const found = cart.find(x => String(x.id) === String(id));
      if (found) found.qty += 1;
      else cart.push({ id, name, price, qty: 1 });

      saveCart(cart);
      setCartCount(cart);
      // optional: openCart();
    });
  });
});
