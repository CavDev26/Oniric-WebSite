<?php $articolo = $templateParams["articolo"]; ?>
<link rel="stylesheet" href="./css/productStyle.css" />
 <link rel="stylesheet" href="./css/carousel.css" />

<main class="center">
<div class="simpleBack center">
        <section>
          <h1 class="mediumTitle"><?php echo $articolo["Nome"]; ?></h1>
          <h2 class="mediumSubtitle"><?php echo $articolo["App_Nome"]; ?></h2>
          <?php $n = (int) $templateParams["votomedio"]; 
          for($i = 0; $i < $n; $i++):?>
          <img src="./img/star.png" alt="" class="reviewStar" />
          <?php endfor; 
          if ($templateParams["votomedio"] - (float)$n >= 0.5): $n++;?>
          <img src="./img/halfStar.png" alt="" class="reviewStar" />
          <?php endif; 
          for($i=0; $i < 5 - $n; $i++):?>
          <img src="./img/emptyStar.png" alt="" class="reviewStar" />
          <?php endfor; ?>
          <span class="mediumSubtitle">(<?php echo count($templateParams["recensioni"]);?>)</span>
        </section>
        <hr class="separator" />
          <section class="carouselSection left-text">
            <div class="slideshow-container">
              <?php $dir = scandir("./img/" . $articolo["Cartella_immagini"]); 
              array_splice($dir, 0, 2);
              for($i=1; $i <= count($dir); $i++): ?>
                <div class="mySlides fade">
                  <img
                    src="<?php echo "./img/" . $articolo["Cartella_immagini"] . "/" . $i . ".png" ?>"
                    alt="<?php echo $articolo["Nome"] . " immagine numero: " . $i ?>"
                    class="productImage"
                  />
                </div>
              <?php endfor; ?>
            </div>
            <div class="carouselNav center">
            <?php 
            for($i=1; $i <= count($dir); $i++): ?>
                <img
                  src="./img/carouselDot.png"
                  alt="Seleziona immagine numero <?php echo $i ?>"
                  class="carouselDot activeDot"
                  onclick="currentSlide(<?php echo $i ?>)"
                />
            <?php endfor; ?>
            </div>
          </section>
          <section class="secondPart center">
            <section class="descriptionPart fullWidth">
              <p class="briefDesc">
                <?php echo $articolo["Descrizione_breve"]; ?>
              </p>
              <footer class="italic-footer">
                Scorri in basso per altri dettagli
              </footer>
              <hr class="separator" />
            </section>
            <section class="pricePart">
              <ul class="priceList">
                <li class="priceListItem">
                  <div>
                    <p class="priceItem">Prezzo Consigliato:</p>
                    <p class="<?php if (is_null($articolo["Sconto"])) 
                    { echo "finalPriceNumber";} else { echo "normalPriceNumber lineThroughNumber"; } ?>">
                      <?php $price = explode(".",$articolo["Costo_listino"]);
                      if (count($price) == 1) {
                        echo $price[0];
                        echo ", <em class=\"priceItalic\">00</em>";
                      }
                      else {
                        echo $price[0];
                        echo ", <em class=\"priceItalic\">". $price[1] . "</em>";
                      }
                      ?>
                      &#128;
                    </p>
                  </div>
                </li>
                <?php if (!is_null($articolo["Sconto"])): ?>
                <li class="priceListItem">
                  <div>
                    <p class="priceItem">Sconto:</p>
                    <p class="normalPriceNumber">
                      <?php echo (string) ((float)$articolo["Sconto"]*$articolo["Costo_listino"]) ?>,<em class="priceItalic">00</em> € <?php echo "( " . (string) ((float)$articolo["Sconto"]*100)."% )"?>
                    </p>
                  </div>
                </li>
                <li class="priceListItem">
                  <div>
                    <p class="priceItem">Prezzo:</p>
                    <p class="finalPriceNumber"><?php $price = explode(".",
                    (string)((float)$articolo["Costo_listino"] - (float)$articolo["Sconto"]*(float)$articolo["Costo_listino"]));
                      if (count($price) == 1) {
                        echo $price[0];
                        echo ", <em class=\"priceItalic\">00</em>";
                      }
                      else {
                        echo $price[0];
                        echo ", <em class=\"priceItalic\">". $price[1] . "</em>";
                      }
                      ?>
                      &#128;
                    </p>
                  </div>
                </li>
                <?php endif; ?>
              </ul>
              <footer class="italic-footer lh-10">
                Tutti i prezzi sono inclusivi di IVA
              </footer>
              <hr class="separator" />
            </section>
            <section class="center">
              <h2 class="smallSubTitle">Spedizione Gratuita</h2>
              <p class="simpleText">
                Spedito da BRT: Consegna Prevista per
                <strong>2 Gennaio 2024</strong>
              </p>
              <footer><hr class="separator" /></footer>
              <button type="button" class="wideLiteButton">Aggiungi al Carrello
            </button>
            </section>
            
              
          </section>
          <section class="m-20">
            <main class="simpleText simpleTextLeft m-20t">
              <?php echo $articolo["Descrizione"]; ?>
            </main>
            <aside class="tableSection center inline-block">
              <?php if(count($templateParams["dettagli"]) > 0): ?>
              <table class="detailsTable">
                <?php $i = 0; foreach($templateParams["dettagli"] as $dettaglio): ?>
                <?php if ($i % 2 == 0): ?>
                <tr class="detailsTable">
                  <th class="detailsTable"><?php echo $dettaglio["Nome"];?></th>
                  <td class="detailsTable"><?php echo $dettaglio["Valore"];?></td>
                </tr>
                <?php else : ?>
                <tr>
                  <th><?php echo $dettaglio["Nome"];?></th>
                  <td><?php echo $dettaglio["Valore"];?></td>
                </tr>
                <?php endif; $i++; endforeach; ?>
              </table>
              <?php endif; ?>
            </aside>
            <footer><hr class="separator" /></footer>
          </section>
        </section>
        <section class="center">
          <h2>Recensioni</h2>
          <?php foreach($templateParams["recensioni"] as $review ): ?>
          <article class="review">
            <img src="./img/account.png" alt="Icona utente <?php echo $review["Nome_Utente"]; ?>" class="reviewUserIcon" />
            <h3 class="inline-block left-text"> <?php echo $review["Nome_Utente"]; ?></h3>
            <div class="reviewVote right inline-block">
              <?php $n = (int) $review["Voto"]; 
              for($i = 0; $i < $n; $i++):?>
              <img src="./img/star.png" alt="" class="smallReviewStar" />
              <?php endfor; 
              if ($review["Voto"] - (float)$n >= 0.5): $n++?>
              <img src="./img/halfStar.png" alt="" class="smallReviewStar" />
              <?php endif; 
              for($i=0; $i < 5 - $n; $i++):?>
              <img src="./img/emptyStar.png" alt="" class="smallReviewStar" />
              <?php endfor; ?>
            </div>
            <p class="reviewText left-text">
              <?php echo $review["Testo"]; ?>
            </p>
            <footer class="reviewFooter right-text">
              Aggiunta il <?php echo $review["Data_Recensione"]; ?>
            </footer>
          </article>
          <?php endforeach; ?>
          <footer>
            <?php if (count($templateParams["recensioni"]) > 0):?>
            <button type="button" class="wideLiteButton">
              <span class="buttonContent">Mostra tutte le recensioni</span>
            </button>
            <?php else: ?>
              <p>Ops! Non ci sono ancora recensioni!</p>
            <?php endif; ?>
          </footer>
        </section>
      </div>
</main>
<script src="./js/carousel.js"></script>