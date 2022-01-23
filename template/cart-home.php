<main class="main-cart fullHeight">
      
        <?php if (isset($templateParams["nessunarticolo"])): ?>
          <div class="cartback center m-t-200">
            <h1 class="mediumTitle center"><?php echo $templateParams["nessunarticolo"]?></h1>
          </div>
        <?php else: ?>
          <form action="completeOrder.php" method="POST">
            <input type="hidden" name="cart">
            </input>
            <input type="submit" class="purchase-button" value="Procedi all'acquisto">
            </input>
          </form>
          <div class="cartback center m-t-200">
            <ul class="product-list center">

            <?php foreach($templateParams["articles"] as $article): ?>
              <li class="product-container">
                    <div class="product">
                    <a href=""><img class="product-image" src="<?php echo "./img/" . $article["Cartella_immagini"] . "/1.png" ?>" alt=""/></a>
                    <h1 class="product-name left-text"><?php echo $article["Nome"]; ?></h1>
                    <hr class="span-cart">
                      <div class="stars">
                      <?php $n = (int) $article["Voto_medio"]; 
                      for($i = 0; $i < $n; $i++):?>
                      <img src="./img/star.png" alt="" class="star" />
                      <?php endfor; 
                      if ($article["Voto_medio"] - (float)$n >= 0.5): $n++;?>
                      <img src="./img/halfStar.png" alt="" class="star" />
                      <?php endif; 
                      for($i=0; $i < 5 - $n; $i++):?>
                      <img src="./img/emptyStar.png" alt="" class="star" />
                      <?php endfor; ?>
                      </div>
                      <div class="price-section">
                        <p class="valuta">&#128</p>
                        <p class="price">
                        <?php $price = (float)$article["Costo_listino"] - round((float)$article["Sconto"]*(float)$article["Costo_listino"], 2);
                        echo min_precision($price, 2);?>                      
                      </div>
                      <a href="">
                        <div class="remove-button centered">
                          <p class="m-0">Rimuovi</p>
                          <!-- gestiscimi con ajax -->
                        </div>
                      </a>
                      <div class="quantity-button centered">
                        <div class="quantity buttons_added">
                          <input type="number" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="qty" size="4" pattern="" inputmode="">
                            <input type="button" value="-" class="minus">
                            <input type="button" value="+" class="plus">
                        </div>
                      </div>
                    </div>
              </li> 
            <?php endforeach; ?>
            </ul>
          </div>
            <?php endif; ?>
</main>