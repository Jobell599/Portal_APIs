<?php
// Este es el API del clima, está colocado correctamente, con su apiKey funcionando, pero igual no lo recibe :(
$apiKey = "8078864fcfb046c159f35512f17bf740"; 
include("../includes/header.php");
?>

<div class="container mt-5">
  <div class="container mt-5 fade-in">
    <h2>Clima Actual</h2>
    <form method="GET" class="mb-3">
      <input type="text" name="city" class="form-control" placeholder="Escribe una ciudad de República Dominicana" required>
      <!-- con el metodo GET, obtenemos el resultado del clima en la ciudad que elijamos  -->
      <button type="submit" class="btn btn-primary mt-2">Consultar Clima</button>
    </form>
  </div>

  <?php
    if (isset($_GET['city'])) {
        $city = htmlspecialchars(trim($_GET['city'])); //chars especial para que no coloquen inyecciones en nuestra página
        $url = "https://api.openweathermap.org/data/2.5/weather?q={$city},DO&appid={$apiKey}&units=metric&lang=es";// url para obtener el clima

        $response = @file_get_contents($url);

        // condicional para manejo de errores
        if ($response === FALSE) {
            echo "<div class='alert alert-danger'>No se pudo conectar con la API.</div>";
        } else {
            $data = json_decode($response, true);

            if ($data['cod'] === 200) {
                $temp = $data['main']['temp'];
                $desc = ucfirst($data['weather'][0]['description']);
                $icon = $data['weather'][0]['icon'];
                $icon_url = "https://openweathermap.org/img/wn/$icon@2x.png";

                $bg = '';
                $condition = $data['weather'][0]['main'];
                if ($condition === 'Clear') $bg = 'bg-warning text-dark';
                elseif ($condition === 'Rain') $bg = 'bg-primary text-white';
                elseif ($condition === 'Clouds') $bg = 'bg-secondary text-white';
                else $bg = 'bg-light';

                echo "<div class='alert $bg'>";
                echo "<h4>$city</h4>";
                echo "<p><img src='$icon_url' alt='icono clima'> $desc</p>";
                echo "<p>Temperatura: <strong>$temp °C</strong></p>";
                echo "</div>";
            } else {
                echo "<div class='alert alert-warning'>Ciudad no encontrada o sin datos.</div>";
            }
        }
    }
  ?>
</div>

<?php include("../includes/footer.php"); ?>
