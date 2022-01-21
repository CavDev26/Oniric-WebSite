<main class="main-cart">
      <div class="centered">
        <a class="normal" href="">
          <div class="purchase-button">
            <p>
              Procedi all'acquisto
            </p>
          </div>
        </a>
      </div>

      <div class="cartback center m-t-200">
        <?php if (isset($templateParams["nessunarticolo"])): ?>
          <h1 class="mediumTitle"><?php echo $templateParams["nessunarticolo"]?></h1> 
          <!-- da fixare perchè c'eè un articolo con null -->
        <?php endif ?>
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
                    <p class="price"><?php echo $article["Costo_listino"] ?></p>
                  </div>
                  <a href="">
                    <div class="remove-button centered">
                      <p class="m-0">Rimuovi</p>
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





          <!-- <li class="product-container">
            <div class="product">
              <a href=""><img class="product-image" src="../img/cava2000.png" alt=""/></a>
              <h1 class="product-name left-text">Cava 2000</h1>
              <hr class="span-cart">
              <div class="stars">
                <img class="star" src="../img/star.png" alt="">
                <img class="star" src="../img/star.png" alt="">
                <img class="star" src="../img/star.png" alt="">
                <img class="star" src="../img/star.png" alt="">
                <img class="star" src="../img/star.png" alt="">
              </div>
              <div class="price-section">
                <p class="valuta">€</p>
                <p class="price">999,99</p>
              </div>
              <a href="">
                <div class="remove-button centered">
                  <p class="m-0">Rimuovi</p>
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
          <li class="product-container">
            <div class="product">
              <a href=""><img class="product-image" src="../img/CAVA PHONE.png" alt=""/></a>
              <h1 class="product-name left-text">Cava Phone</h1>
              <hr class="span-cart">
              <div class="stars">
                <img class="star" src="../img/star.png" alt="">
                <img class="star" src="../img/star.png" alt="">
                <img class="star" src="../img/star.png" alt="">
                <img class="star" src="../img/star.png" alt="">
                <img class="star" src="../img/halfStar.png" alt="">
              </div>
              <div class="price-section">
                <p class="valuta">€</p>
                <p class="price">889,99</p>
              </div>
              <a href="">
                <div class="remove-button centered">
                  <p class="m-0">Rimuovi</p>
                </div>
              </a>
              <div class="quantity-button centered">
                <div class="quantity buttons_added">
                  <input type="number" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="qty" size="4">
                    <input type="button" value="-" class="minus">
                    <input type="button" value="+" class="plus">
                </div>
              </div>
            </div>
          </li> 
          <li class="product-container">
            <div class="product">
              <a href=""><img class="product-image" src="../img/scheda grafica.png" alt=""/></a>
              <h1 class="product-name left-text">Scheda grafica bella cella vella ella ellla bella  2000</h1>
              <hr class="span-cart">
              <div class="stars">
                <img class="star" src="../img/star.png" alt="">
                <img class="star" src="../img/star.png" alt="">
                <img class="star" src="../img/star.png" alt="">
                <img class="star" src="../img/emptyStar.png" alt="">
                <img class="star" src="../img/emptyStar.png" alt="">
              </div>
              <div class="price-section">
                <p class="valuta">€</p>
                <p class="price">999,99</p>
              </div>
              <a href="">
                <div class="remove-button centered">
                  <p class="m-0">Rimuovi</p>
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
          <li class="product-container">
            <div class="product">
              <a href=""><img class="product-image" src="../img/cava2000.png" alt=""/></a>
              <h1 class="product-name left-text">Cava 2000</h1>
              <hr class="span-cart">
              <div class="stars">
                <img class="star" src="../img/star.png" alt="">
                <img class="star" src="../img/star.png" alt="">
                <img class="star" src="../img/star.png" alt="">
                <img class="star" src="../img/star.png" alt="">
                <img class="star" src="../img/star.png" alt="">
              </div>
              <div class="price-section">
                <p class="valuta">€</p>
                <p class="price">999,99</p>
              </div>
              <a href="">
                <div class="remove-button centered">
                  <p class="m-0">Rimuovi</p>
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
          <li class="product-container">
            <div class="product">
              <a href=""><img class="product-image" src="../img/cava2000.png" alt=""/></a>
              <h1 class="product-name left-text">Cava 2000</h1>
              <hr class="span-cart">
              <div class="stars">
                <img class="star" src="../img/star.png" alt="">
                <img class="star" src="../img/star.png" alt="">
                <img class="star" src="../img/star.png" alt="">
                <img class="star" src="../img/star.png" alt="">
                <img class="star" src="../img/star.png" alt="">
              </div>
              <div class="price-section">
                <p class="valuta">€</p>
                <p class="price">999,99</p>
              </div>
              <a href="">
                <div class="remove-button centered">
                  <p class="m-0">Rimuovi</p>
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
          </li>  -->
        </ul>
      </div>
</main>