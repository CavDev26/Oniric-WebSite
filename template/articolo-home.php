<?php $articolo = $templateParams["articolo"][0]; ?>
<link rel="stylesheet" href="./css/productStyle.css" />
 <link rel="stylesheet" href="./css/carousel.css" />

<main class="center">
<div class="simpleBack center">
        <section>
          <h1 class="mediumTitle"><?php echo $articolo["Nome"]; ?></h1>
          <h2 class="mediumSubtitle"><?php echo $articolo["App_Nome"]; ?></h2>
          <img src="./img/star.png" alt="" class="reviewStar" />
          <img src="./img/star.png" alt="" class="reviewStar" />
          <img src="./img/star.png" alt="" class="reviewStar" />
          <img src="./img/star.png" alt="" class="reviewStar" />
          <img src="./img/halfStar.png" alt="" class="reviewStar" />
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
          <section>
            <main class="simpleText simpleTextLeft m-20t">
              <?php echo $articolo["Descrizione"]; ?>
            </main>
            <aside class="tableSection center inline-block">
              <table class="detailsTable">
                <tr class="detailsTable">
                  <th class="detailsTable">Processore</th>
                  <td class="detailsTable">Intel Core i9-11 3.5 GHz</td>
                </tr>
                <tr>
                  <th>Scheda grafica</th>
                  <td>NVIDIA RTX 3090</td>
                </tr>
                <tr class="detailsTable">
                  <th class="detailsTable">Memoria DRAM</th>
                  <td class="detailsTable">24 GB</td>
                </tr>
                <tr>
                  <th>Memoria RAM</th>
                  <td>128 GB</td>
                </tr>
                <tr class="detailsTable">
                  <th class="detailsTable">Archiviazione</th>
                  <td class="detailsTable">3 TB HDD 2 TB SSD</td>
                </tr>
                <tr>
                  <th>Gestione Energetica</th>
                  <td>850 W, 80 PLUS GoldD</td>
                </tr>
              </table>
            </aside>
            <footer><hr class="separator" /></footer>
          </section>
        </section>
        <section class="center">
          <h2>Recensioni</h2>
          <article class="review center">
            <img src="./img/account.png" alt="" class="reviewUserIcon" />
            <h3 class="inline-block">Fresh</h3>
            <div class="reviewVote right inline-block">
              <img src="./img/star.png" alt="" class="smallReviewStar" />
              <img src="./img/star.png" alt="" class="smallReviewStar" />
              <img src="./img/star.png" alt="" class="smallReviewStar" />
              <img src="./img/star.png" alt="" class="smallReviewStar" />
            </div>
            <p class="reviewText left-text">
              Ottimo PC! Lo consiglio a tutti quelli che, come me, necessitano
              di potenti workstation per passare gli esami di Tecnologie Web!
            </p>
            <footer class="reviewFooter right-text">
              Aggiunta il 03/12/2021
            </footer>
          </article>
          <article class="review center">
            <img src="./img/account.png" alt="" class="reviewUserIcon" />
            <h3 class="inline-block">Cava</h3>
            <div class="reviewVote right inline-block">
              <img src="./img/star.png" alt="" class="smallReviewStar" />
              <img src="./img/emptyStar.png" alt="" class="smallReviewStar" />
              <img src="./img/emptyStar.png" alt="" class="smallReviewStar" />
              <img src="./img/emptyStar.png" alt="" class="smallReviewStar" />
            </div>
            <p class="reviewText left-text">
              Non ascoltate quello che dicono gli altri utenti. Una vergogna
              vendere un pre-assemblato del genere, dal vivo ancora più
              inguardabile. Per questo prezzo si trovano anche PC più potenti
            </p>
            <footer class="reviewFooter right-text">
              Aggiunta il 03/12/2021
            </footer>
          </article>
          <footer>
            <button type="button" class="wideLiteButton">
              <span class="buttonContent">Mostra tutte le recensioni</span>
            </button>
          </footer>
        </section>
      </div>
</main>
<script src="./js/carousel.js"></script>