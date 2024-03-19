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
  <h1>Negozio</h1>
  <main>
    <p>
      <?php 
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
        
        class Store {
          public $cart = [];
          
          public function getCartItem($id){
            foreach ($this -> cart as $product){
              if ($product -> id === $id){ return $product; }
            }
          }

          public function addToCart($id){
            if ($this -> getCartItem($id) !== NULL) { 
              echo "error: product already inside cart <br>";
              return; 
            };
            $productToPush = getProductById($id);
            array_push($this -> cart, $productToPush);
          }

          public function removeFromCart($id){
            if ($this -> getCartItem($id) === NULL) { 
              echo "error: product does not exist <br>";
              return; 
            };

            $length = count($this -> cart);
            for ($i=0; $i < $this -> cart; $i++) { 
              if ($this -> cart[$i] -> id === $id){
                array_splice($this -> cart, $i, 1);
                break;
              }
            }
          }

          function getCart(){
            return $this -> cart;
          }


        }

        $Store = new Store();
        $Store -> addToCart(1);
        $Store -> addToCart(2);
        // $Store -> removeFromCart(1);
        var_dump($Store -> cart);
      ?>
    </p>
  </main>
</body>
</html>