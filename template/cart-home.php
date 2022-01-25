<main class="main-cart fullHeight">
        <?php if (isset($templateParams["nessunarticolo"])): ?>
          <div class="cartback center m-t-200">
            <h1 class="mediumTitle center"><?php echo $templateParams["nessunarticolo"]?></h1>
          </div>
        <?php else: ?>
          <form action="completeOrder.php" method="POST">
            <input type="hidden" name="cart">
            </input>
            <input id="acquista" type="submit" class="purchase-button" value="Procedi all'acquisto">
            </input>
            <?php foreach($templateParams["articles"] as $art): ?>
              <input id="<?php echo $art["ID_Articolo"]; ?>" type="hidden" name="quantity[]" value="1"></input>
            <?php endforeach; ?>
          </form>
          <div class="cartback center m-t-200">
            <ul class="product-list center">

            <?php foreach($templateParams["articles"] as $article): ?>
              <li class="product-container">
                    <div class="product">
                    <a href="articolo.php?id=<?php echo $article["ID_Articolo"];?>"><img class="product-image" 
                    src="<?php echo findExtension("./img/".$article["Cartella_immagini"], 1); ?>" 
                    alt="Immagine articolo <?php echo $article["Nome"]; ?>"/></a>
                    <h1 class="product-name left-text"><?php echo $article["Nome"]; ?></h1>
                    <hr class="span-cart">
                      <div class="stars">
                        <?php $n = (int) $article["Voto_medio"]; 
                        for($i = 0; $i < $n; $i++):?>
                        <img src="./img/star.png" alt="<?php echo $article["Voto_medio"];?>" class="star" />
                        <?php endfor; 
                        if ($article["Voto_medio"] - (float)$n >= 0.5): $n++;?>
                        <img src="./img/halfStar.png" alt="<?php echo $article["Voto_medio"];?>" class="star" />
                        <?php endif; 
                        for($i=0; $i < 5 - $n; $i++):?>
                        <img src="./img/emptyStar.png" alt="<?php echo $article["Voto_medio"];?>" class="star" />
                        <?php endfor; ?>
                      </div>
                      <div class="price-section">
                        <p class="valuta">&#128</p>
                        <p class="price">
                        <?php $price = (float)$article["Costo_listino"] - round((float)$article["Sconto"]*(float)$article["Costo_listino"], 2);
                        echo min_precision($price, 2);?>                      
                      </div>
                      <button class="remove-button centered" onClick="removeFromCart(this, '<?php echo $article["ID_Articolo"]; ?>')">
                          <p class="m-0">Rimuovi</p>
                      </button>
                      <div class="quantity-button centered">
                        <div class="quantity buttons_added">
                          <input class="idContainer" name="idContainer" type="hidden" value="<?php echo $article["ID_Articolo"]; ?>">
                          <input type="number" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="qty" size="4">
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