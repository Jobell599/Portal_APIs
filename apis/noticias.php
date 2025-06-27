<?php include("../includes/header.php"); ?>

<div class="container mt-5">
  <div class="container mt-5 fade-in">
    <h2>Noticias desde WordPress</h2>
    <form method="GET" class="mb-3">
      <label for="site">Selecciona un sitio de noticias:</label>
      <select name="site" class="form-select" required>
        <option value="https://techcrunch.com">TechCrunch</option>
      </select>
      <button type="submit" class="btn btn-primary mt-2">Cargar Noticias</button>
    </form>
  </div>

  <?php
    if (isset($_GET['site'])) {
        $base = rtrim($_GET['site'], '/');
        $apiUrl = $base . "/wp-json/wp/v2/posts?per_page=3";

        $response = @file_get_contents($apiUrl);

        if ($response === FALSE) {
            echo "<div class='alert alert-danger'>No se pudo conectar con el sitio WordPress seleccionado.</div>";
        } else {
            $posts = json_decode($response, true);
            echo "<h4 class='mt-4'>Últimas noticias de <a href='$base' target='_blank'>$base</a>:</h4>";
            echo "<div class='list-group'>";

            foreach ($posts as $post) {
                $title = htmlspecialchars($post['title']['rendered']);
                $excerpt = strip_tags($post['excerpt']['rendered']);
                $link = htmlspecialchars($post['link']);

                echo "<a href='$link' target='_blank' class='list-group-item list-group-item-action'>";
                echo "<h5 class='mb-1'>$title</h5>";
                echo "<p class='mb-1'>$excerpt</p>";
                echo "</a>";
            }

            echo "</div>";
        }
    }
  ?>
</div>

<?php include("../includes/footer.php"); ?>
