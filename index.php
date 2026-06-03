<?php
$conn = new mysqli("localhost:4406", "root", "", "kbec_db");

if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
$events = $conn->query(" SELECT * FROM events ORDER BY event_date DESC ");
$sponsors = $conn->query("SELECT * FROM sponsors");?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>KBEC - KUET Business & Entrepreneurship Club</title>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <!-- Navigation Bar Start -->
  <nav class="navbar">
    <div class="nav-container">
      <div class="logo">
        <a href="#">KBEC</a>
      </div>

      <!-- Hamburger Button -->
      <div class="hamburger" id="hamburger">
        ☰
      </div>

      <ul class="nav-links" id="navLinks">
        <li><a href="#">Home</a></li>
        <li><a href="#activities">Activities</a></li>
        <li><a href="#sponsors">Sponsors</a></li>
        <li><a href="#">Club Partners</a></li>
        <li><a href="#">Alumni</a></li>
        <li><a href="#">Executive Panel</a></li>
        <li><a href="#">Faculty Advisors</a></li>
        <li><a href="#contact">Contact Us</a></li>
      </ul>
    </div>
  </nav>
  <!-- Navigation Bar End -->
  <!-- Hero Section Start -->
  <section class="hero" id="home">
    <img class="hero_background" src="hero_background.jpg" alt="" />
    <div class="hero-content">
      <div><img src="kbeclogo.svg" alt="" /></div>
      <p>Empowering Future Leaders, Innovators, and Entrepreneurs</p>

      <div class="hero-buttons">
        <a href="form.php" class="btn primary-btn">Join Us</a>
        <a href="#activities" class="btn secondary-btn">Learn More</a>
      </div>
    </div>
  </section>
  <!-- Hero Section End -->
  <!-- Activities Section Start -->
  <section id="activities" class="activities">
    <h2>Our Activities & Events</h2>

    <div class="slider">

      <?php
    $first = true;

    while($event = $events->fetch_assoc()) {
    ?>

      <div class="slide <?= $first ? 'active' : ''; ?>">

        <img src="<?= htmlspecialchars($event['image']); ?>" alt="<?= htmlspecialchars($event['title']); ?>" />

        <div class="slide-content">

          <h3>
            <?= htmlspecialchars($event['title']); ?>
          </h3>

          <p>
            <?= htmlspecialchars(substr($event['description'], 0, 150)); ?>
            <?= strlen($event['description']) > 150 ? '...' : ''; ?>
          </p>

          <small>
            <?= date("F d, Y", strtotime($event['event_date'])); ?>
          </small>

        </div>

      </div>

      <?php
        $first = false;
    }
    ?>

      <button class="prev">&#10094;</button>
      <button class="next">&#10095;</button>

    </div>
    </div>
  </section>
  <!-- Activities Section End -->
  <script>
  let slides = document.querySelectorAll(".slide");
  let index = 0;

  document.querySelector(".next").onclick = function() {
    slides[index].classList.remove("active");
    index = (index + 1) % slides.length;
    slides[index].classList.add("active");
  };

  document.querySelector(".prev").onclick = function() {
    slides[index].classList.remove("active");
    index = (index - 1 + slides.length) % slides.length;
    slides[index].classList.add("active");
  };
  </script>
  <!-- View all events -->
  <section class="view-all-events-cta">
    <div class="cta-container">
      <h3>Want to explore more of our initiatives?</h3>
      <p>
        Discover past competitions, workshops, and flagship seminars organized
        by KBEC.
      </p>
      <a href="events.php" class="btn primary-btn">View All Events</a>
    </div>
  </section>
  <!-- Sponsors Section Start -->
  <section class="sponsors-section" id="sponsors">

    <h2>Our Sponsors</h2>

    <div class="sponsors-slider">

      <div class="sponsors-track">

        <?php while($sponsor = $sponsors->fetch_assoc()) { ?>

        <div class="sponsor-card">

          <img src="uploads/sponsors/<?= $sponsor['logo']; ?>" alt="<?= htmlspecialchars($sponsor['title']); ?>">

          <h3>
            <?= htmlspecialchars($sponsor['title']); ?>
          </h3>

        </div>

        <?php } ?>

        <?php
            mysqli_data_seek($sponsors,0);

            while($sponsor = $sponsors->fetch_assoc()) {
            ?>

        <div class="sponsor-card">

          <img src="uploads/sponsors/<?= $sponsor['logo']; ?>" alt="<?= htmlspecialchars($sponsor['title']); ?>">

          <h3>
            <?= htmlspecialchars($sponsor['title']); ?>
          </h3>

        </div>

        <?php } ?>

      </div>

    </div>
    <!-- Sponsors Section End -->
  </section>
  <!-- Footer Section Start -->
  <footer class="footer" id="contact">
    <div class="footer-container">
      <!-- Club Info -->
      <div class="footer-section">
        <h2>KBEC</h2>
        <p>
          KUET Business & Entrepreneurship Club empowers students through
          innovation, leadership, networking, and entrepreneurial activities.
        </p>
      </div>

      <!-- Quick Links -->
      <div class="footer-section">
        <h3>Quick Links</h3>

        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#activities">Activities</a></li>
          <li><a href="form.php">Join Us</a></li>
          <li><a href="admin_login.php">Admin</a></li>
        </ul>
      </div>

      <!-- Contact Info -->
      <div class="footer-section">
        <h3>Contact Us</h3>

        <p>Email: kbec@kuet.ac.bd</p>
        <p>Location: KUET, Khulna, Bangladesh</p>
        <p>Phone: +880 1XXXXXXXXX</p>
      </div>
    </div>

    <!-- Bottom Footer -->
    <div class="footer-bottom">
      <p>
        © 2026 KBEC - KUET Business & Entrepreneurship Club. All Rights
        Reserved.
      </p>
    </div>
  </footer>
  <!-- Footer Section End -->
  <script>
  const hamburger = document.getElementById("hamburger");
  const navLinks = document.getElementById("navLinks");

  hamburger.addEventListener("click", () => {
    navLinks.classList.toggle("active");
  });
  </script>
</body>

</html>