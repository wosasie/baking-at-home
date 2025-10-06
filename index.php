<?php
session_start();

if (isset($_GET['from']) && $_GET['from'] === 'dashboard') {
  $msg = "Hai, {$_SESSION['username']}! Welcome back ! 🍰";
}

?>
<!DOCTYPE html>

<html lang="id">

  <head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title> Baking at Home </title>
    <link rel="stylesheet" href="style.css" />
    <script src="script.js" defer> </script>

  </head>

  <body>

  <?php if (isset($msg)): ?>
      <p style="background:#cb7885; color:white; padding:10px;"> <?php echo $msg; ?> </p>
    <?php endif; ?>

    <header>

      <h1> Baking at Home </h1>

      <nav>
        <ul>
          <li><a href="#home"> Home </a> </li>
          <li><a href="#tips"> Tips </a> </li>
          <li><a href="#categories"> Categories </a> </li>
          <li><a href="#cookies"> All Recipes </a> </li>
          <li><a href="#about"> About</a> </li>
        </ul>
      </nav>

    </header>

    <main>

      <section id="home" class="cover">
        <div class="cover-image">
          <img src="images/cover.jpeg" alt="Baking at Home" />
        </div>
        <h2> Welcome to the World of Homemade Baking </h2>
        <p>
          Discover delicious recipes you can easily bake at home — from classic
          cookies to indulgent cakes. Whether you're a beginner or a pro, this
          is your place to find inspiration for your next bake.
        </p>
      </section>

      <section class="search-section">
        <h2> What do you want to bake today? <span id="resultBadge" aria-live="polite"> </span> </h2>
        <form id="searchForm" class="search-bar">
          <input id="searchInput" type="text" placeholder="Search recipes . . ." />
          <button type="submit" aria-label="Cari"> 🔍 </button>
        </form>
      </section>

      <section id="about" class="about">
        <h2> About Baking at Home </h2>
        <div class="about-content">
          <img src="images/about.jpeg" alt="About Baking at Home" />
          <p>
            Baking at Home is a collection of tried-and-true recipes designed
            for every kitchen. Our goal is to make baking simple, fun, and
            rewarding — so you can create sweet moments to share with family and
            friends.
          </p>
        </div>
      </section>

      <section id="categories" class="categories">
        <h2> Categories </h2>
        <div class="grid">

          <div class="cat" data-category="Cheesecake">
            <a href="#">
              <img src="images/cheesecake.webp" alt="Cheesecake" />
              <p> Cheesecake </p>
            </a>
          </div>

          <div class="cat" data-category="Cake">
            <a href="#">
              <img src="images/cakes.webp" alt="Cake" />
              <p> Cake </p>
            </a>
          </div>

          <div class="cat" data-category="Pies">
            <a href="#">
              <img src="images/pies.jpg" alt="Pies" />
              <p> Pies </p>
            </a>
          </div>

          <div class="cat" data-category="Brownie">
            <a href="#">
              <img src="images/brownies.jpg" alt="Brownie" />
              <p> Brownie </p>
            </a>
          </div>

          <div class="cat" data-category="Cookies">
            <a href="#">
              <img src="images/cookies.webp" alt="Cookies" />
              <p> Cookies </p>
            </a>
          </div>

          <div class="cat" data-category="Bread">
            <a href="#">
              <img src="images/bread.jpg" alt="Bread" />
              <p> Bread </p>
            </a>
          </div>

        </div>
      </section>

      <section id="tips" class="tips">
        <h2> Best Baking Tips </h2>
        <p>
          Level up your baking with easy-to-follow tips and techniques. From
          mastering yeast dough to perfecting buttercream, these guides will
          help you achieve bakery-quality results at home.
        </p>
        <div class="grid">

          <div class="tip">
            <a href="#">
              <img src="images/brown butter.webp" alt="Brown Butter" />
              <p>How to Brown Butter</p>
            </a>
          </div>

          <div class="tip">
            <a href="#">
              <img src="images/chocolate ganache.webp" alt="Chocolate Ganache" />
              <p> How to Make Chocolate Ganache </p>
            </a>
          </div>

          <div class="tip">
            <a href="#">
              <img src="images/yeast guide.jpg" alt="Yeast Guide" />
              <p> Baking with Yeast Guide </p>
            </a>
          </div>

        </div>
      </section>

      <section id="cookies" class="cookies">
        <h2> Craving Cookies? </h2>
        <p>
          If cookies are your comfort food, you’re in the right place. Explore
          our collection of chewy, crispy, and buttery cookies that are perfect
          for any occasion.
        </p>
        <div class="grid">

          <div class="cookie">
            <a href="#">
              <img src="images/snickerdoodles cookies.jpg" alt="Snickerdoodles Cookies" />
              <p> Soft & Thick Snickerdoodles </p>
            </a>
          </div>

          <div class="cookie">
            <a href="#">
              <img src="images/peanut cookies.jpeg" alt="Peanut Cookies" />
              <p> Soft & Thick Peanut Butter Cookies </p>
            </a>
          </div>

          <div class="cookie">
            <a href="#">
              <img src="images/inside cookies.webp" alt="Inside Cookies" />
              <p> Inside Out Chocolate Chip Cookies </p>
            </a>
          </div>

          <div class="cookie">
            <a href="#">
              <img src="images/frosted cookies.jpeg" alt="Frosted Cookies" />
              <p> Chocolate Frosted Cookies </p>
            </a>
          </div>

          <div class="cookie">
            <a href="#">
              <img src="images/oatmeal cookies.jpeg" alt="Oatmeal Cookies" />
              <p> Chewy Oatmeal Chocolate Chip Cookies </p>
            </a>
          </div>

          <div class="cookie">
            <a href="#">
              <img src="images/batter cookies.jpeg" alt="Cake Batter Chocolate Chip Cookies" />
              <p> Cake Batter Chocolate Chip Cookies </p>
            </a>
          </div>

        </div>
      </section>

    </main>

    <footer>
      <p>&copy; 2025 Baking at Home. All Rights Reserved.</p>
      <p>
        Referensi desain dari
        <a href="https://sallysbakingaddiction.com/" target="_blank"> Sally's Baking Addiction </a>
      </p>
    </footer>
  </body>
</html>
