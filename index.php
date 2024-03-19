<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="script.js" defer></script>
  <link rel="stylesheet" href="style.css">
  <title>e-commerce</title>
</head>
<body>
  <nav>
    <ul>
      <li><a href="">Home</a></li>
      <li><a href="">carrello</a></li>
    </ul>
  </nav>
  <h1>Negozio</h1>
  <main>
      <?php 
        include 'Store.php';

        $data = file_get_contents("https://mockend.up.railway.app/api/products/");
        $products = json_decode($data);

        function getProductById($id){
          global $products;
          foreach ($products as $product) {
            if ($product -> id === $id){
              return $product;
              break;
            }
          }
        }
        

        $Store = new Store();
        // $Store -> addToCart(1);
        // $Store -> addToCart(2);
        // $Store -> removeFromCart(4);
        // foreach ($Store -> cart as $item) {
          // echo $item -> id . ": " . $item -> title . "<br>";
        // }
      ?>
      <ul>
        <?php foreach ($products as $product) : ?>
          <div class="card">
            <h2><?php echo $product -> title ?></h2>
            <p><?php echo $product -> price . "€" ?></p>
          </div>
          <?php endforeach; ?>
      </ul>
  </main>
</body>
</html>