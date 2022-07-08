<nav>
  <ul class="menu">
    <li><a href="home">Home</a></li>
    <li><a href="salon">Salon</a></li>
    <li><a href="explorer">File Explorer</a></li>
    <li>About</li>
    <li>Contact</li>
  </ul>
  <script>
    F1.deferred.push(function initMainMenu() {
      console.log('Init Main Menu, page =', F1.page);
      const items = document.querySelectorAll('.menu a');
      items.forEach(function(el) { if (el.getAttribute('href') === F1.page)
        el.parentElement.classList.add('active'); });
    });
  </script>
</nav>