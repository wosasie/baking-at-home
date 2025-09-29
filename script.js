window.addEventListener("load", () => {
  const searchForm = document.getElementById("searchForm");
  const searchInput = document.getElementById("searchInput");
  const resultBadge = document.getElementById("resultBadge");

  const filterSelectors = [
    ".categories .cat",
    ".tips .tip",
    ".cookies .cookie",
  ];
  const getAllCards = () => document.querySelectorAll(filterSelectors.join(","));

  const toText = (el) => el.textContent.trim().toLowerCase();

  const showToast = (msg, timeout = 1800) => {
    const t = document.createElement("div");
    t.className = "toast";
    t.textContent = msg;
    document.body.appendChild(t);
    setTimeout(() => t.remove(), timeout);
  };

  const updateBadge = (n) => {
    if (!resultBadge) return;
    if (n == null) {
      resultBadge.textContent = "";
    } else {
      resultBadge.textContent = `${n} result${n === 1 ? "" : "s"}`;
    }
  };

  const filterCards = (query) => {
    const q = query.trim().toLowerCase();
    const cards = getAllCards();
    if (!q) {
      cards.forEach((c) => c.classList.remove("hidden"));
      updateBadge(null);
      return;
    }

    let visible = 0;
    cards.forEach((c) => {
      const match = toText(c).includes(q);
      c.classList.toggle("hidden", !match);
      if (match) visible++;
    });

    updateBadge(visible);

    const first = Array.from(cards).find((c) => !c.classList.contains("hidden"));
    if (first) first.scrollIntoView({ behavior: "smooth", block: "center" });
  };

  searchInput?.addEventListener("input", (e) => {
    filterCards(e.target.value);
  });

  searchForm?.addEventListener("submit", (e) => {
    e.preventDefault();
    filterCards(searchInput.value);
  });

  const catGrid = document.querySelector(".categories .grid");
  catGrid?.addEventListener("click", (e) => {
    const card = e.target.closest(".cat");
    if (!card) return;
    e.preventDefault();
    const term = card.dataset.category || card.textContent.trim();
    searchInput.value = term;
    filterCards(term);
    showToast(`Filter: ${term}`);
  });

  const main = document.querySelector("main");

  const openModal = (src, caption) => {
    const overlay = document.createElement("div");
    overlay.id = "modalOverlay";
    overlay.setAttribute("role", "dialog");
    overlay.setAttribute("aria-modal", "true");

    const card = document.createElement("div");
    card.id = "modalCard";

    const img = document.createElement("img");
    img.src = src;
    img.alt = caption || "";

    const cap = document.createElement("div");
    cap.id = "modalCaption";
    cap.textContent = caption || "";

    card.appendChild(img);
    card.appendChild(cap);
    overlay.appendChild(card);
    document.body.appendChild(overlay);

    const close = () => overlay.remove();
    overlay.addEventListener("click", (ev) => {
      if (ev.target === overlay) close();
    });
    document.addEventListener(
      "keydown",
      function onEsc(ev) {
        if (ev.key === "Escape") {
          close();
          document.removeEventListener("keydown", onEsc);
        }
      },
      { once: true }
    );
  };

  main?.addEventListener("click", (e) => {
    const link = e.target.closest(".cat a, .tip a, .cookie a");
    if (!link) return;

    e.preventDefault();
    const imgEl = link.querySelector("img");
    const pEl = link.querySelector("p");
    const src = imgEl?.getAttribute("src");
    const caption = pEl?.textContent?.trim() || imgEl?.alt || "Preview";
    if (src) openModal(src, caption);
  });

  const FAV_KEY = "baking_favorites_v1";

  const loadFavs = () => {
    try {
      return JSON.parse(localStorage.getItem(FAV_KEY)) || [];
    } catch {
      return [];
    }
  };
  const saveFavs = (arr) => localStorage.setItem(FAV_KEY, JSON.stringify(arr));

  const favs = new Set(loadFavs());

  const cookieCards = document.querySelectorAll(".cookies .cookie");
  cookieCards.forEach((card) => {
    const title = card.querySelector("p")?.textContent?.trim() || "";
    const btn = document.createElement("button");
    btn.className = "fav-btn";
    btn.type = "button";
    btn.setAttribute("aria-label", `Favorit: ${title}`);
    const setVisual = () => {
      btn.textContent = favs.has(title) ? "♥" : "♡";
      btn.classList.toggle("active", favs.has(title));
    };
    setVisual();

    btn.addEventListener("click", () => {
      if (favs.has(title)) {
        favs.delete(title);
        showToast(`Removed: ${title}`);
      } else {
        favs.add(title);
        showToast(`Saved: ${title}`);
      }
      saveFavs([...favs]);
      setVisual();
    });

    card.appendChild(btn);
  });

  document.querySelectorAll('nav a[href^="#"]').forEach((a) => {
    a.addEventListener("click", (e) => {
      const id = a.getAttribute("href").slice(1);
      const target = document.getElementById(id);
      if (!target) return;
      e.preventDefault();
      target.scrollIntoView({ behavior: "smooth", block: "start" });
    });
  });

  const toTop = document.createElement("button");
  toTop.id = "toTopBtn";
  toTop.type = "button";
  toTop.textContent = "↑ Top";
  document.body.appendChild(toTop);

  toTop.addEventListener("click", () => {
    window.scrollTo({ top: 0, behavior: "smooth" });
  });

  window.addEventListener("scroll", () => {
    toTop.style.display = window.scrollY > 400 ? "block" : "none";
  });
});
