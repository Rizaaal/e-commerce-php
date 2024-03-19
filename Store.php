<?php 
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
    for ($i=0; $i < $length; $i++) { 
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
?>