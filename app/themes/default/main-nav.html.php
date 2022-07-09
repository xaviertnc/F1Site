<nav>
  <ul class="menu" aria-label="Main Menu">
    <?php foreach( $app->menu as $link => $title ): ?>
    <li><a href="<?=$link?>"><?=$title?></a></li>
    <?php endforeach; ?>
  </ul>
  <script>
    F1.deferred.push(function initMainMenu() { document.querySelectorAll('.menu a').forEach(
      function(el) { if (el.getAttribute('href') === F1.page) el.parentElement.classList.add('active'); });
    });
  </script>
</nav>