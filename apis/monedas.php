<?php include("../includes/header.php"); ?>
<!-- API sobre la conversión de monedas -->
<div class="container mt-5">
  <div class="container mt-5 fade-in">
    <h2>Conversión de Monedas</h2>
    <form method="GET" class="mb-3">
      <input type="number" step="0.01" name="amount" class="form-control" placeholder="Cantidad en USD" required>
      <button type="submit" class="btn btn-primary mt-2">Convertir</button>
    </form>
  </div>

  <?php
    if (isset($_GET['amount'])) {
        $amount = floatval($_GET['amount']);
        $apiUrl = "https://api.exchangerate-api.com/v4/latest/USD";

        $response = @file_get_contents($apiUrl);

        if ($response === FALSE) {
            echo "<div class='alert alert-danger'>Error al obtener los tipos de cambio.</div>";
        } else {
            $data = json_decode($response, true);
            $rates = $data['rates'];
            $usd = $amount;

            $dop = $usd * ($rates['DOP'] ?? 0);
            $eur = $usd * ($rates['EUR'] ?? 0);
            $btc = $usd * ($rates['BTC'] ?? 0); // Algunas APIs no devuelven BTC

            echo "<div class='alert alert-success'>";
            echo "<h4>USD \$" . number_format($usd, 2) . " equivale a:</h4>";
            echo "<ul>";
            // acá emitimos las imagenes utilizando las que tenemos en la carpeta img por medio del <li>
            echo "<li><img src='/img/usd.png' width='24'> DOP: <strong>RD$" . number_format($dop, 2) . "</strong></li>";
            echo "<li><img src='/img/eur.png' width='24'> EUR: <strong>€" . number_format($eur, 2) . "</strong></li>";
            if ($btc) {
              echo "<li><img src='/img/btc.png' width='24'> BTC: <strong>" . number_format($btc, 6) . " BTC</strong></li>";
            }
            echo "</ul>";
            echo "</div>";
        }
    }
  ?>
</div>

<?php include("../includes/footer.php"); ?>
