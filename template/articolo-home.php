<?php $articolo = $templateParams["articolo"][0]; var_dump($articolo); ?>
<div class="simpleBack center">
        <section>
          <h1 class="mediumTitle"><?php echo $articolo["Nome"]; ?></h1>
          <h2 class="mediumSubtitle"><?php echo $articolo["App_Nome"]; ?></h2>
          <img src="../img/star.png" alt="" class="reviewStar" />
          <img src="../img/star.png" alt="" class="reviewStar" />
          <img src="../img/star.png" alt="" class="reviewStar" />
          <img src="../img/star.png" alt="" class="reviewStar" />
          <img src="../img/halfStar.png" alt="" class="reviewStar" />
        </section>
        <hr class="separator" />
          <section class="carouselSection left-text">
            <div class="slideshow-container">
              <div class="mySlides fade">
                <div class="numbertext">1 / 4</div>
                <img src="../img/cava2000.png" alt="" class="productImage" />
              </div>
              <div class="mySlides fade">
                <div class="numbertext">2 / 4</div>
                <img
                  src="../img/scheda grafica.png"
                  alt=""
                  class="productImage"
                />
              </div>

              <div class="mySlides fade">
                <div class="numbertext">3 / 4</div>
                <img src="../img/CAVA PHONE.png" alt="" class="productImage" />
              </div>

              <div class="mySlides fade">
                <div class="numbertext">3 / 4</div>
                <img src="../img/cava2000.png" alt="" class="productImage" />
              </div>
            </div>
            <div class="carouselNav center">
              <img
                src="../img/carouselDot.png"
                alt=""
                class="carouselDot activeDot"
                onclick="currentSlide(1)"
              />
              <img
                src="../img/carouselDot.png"
                alt=""
                class="carouselDot"
                onclick="currentSlide(2)"
              />
              <img
                src="../img/carouselDot.png"
                alt=""
                class="carouselDot"
                onclick="currentSlide(3)"
              />
              <img
                src="../img/carouselDot.png"
                alt=""
                class="carouselDot"
                onclick="currentSlide(4)"
              />
            </div>
          </section>
          <section class="secondPart center">
            <section class="descriptionPart">
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
                    <p class="normalPriceNumber lineThroughNumber">
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
                    </p>
                  </div>
                </li>
                <li class="priceListItem">
                  <div>
                    <p class="priceItem">Sconto:</p>
                    <p class="normalPriceNumber">
                      200,<em class="priceItalic">00</em> € (17%)
                    </p>
                  </div>
                </li>
                <li class="priceListItem">
                  <div>
                    <p class="priceItem">Prezzo:</p>
                    <p class="finalPriceNumber">
                      999, <em class="priceItalic">99</em> €
                    </p>
                  </div>
                </li>
              </ul>
              <footer class="italic-footer lh-10">
                Tutti i prezzi sono inclusivi di IVA
              </footer>
              <hr class="separator" />
            </section>
            <section class="center">
              <h2 class="smallSubTitle">Spedizione Gratuita</h2>
              <main class="simpleText">
                Spedito da BRT: Consegna Prevista per
                <strong>2 Gennaio 2024</strong>
              </main>
              <footer><hr class="separator" /></footer>
            </section>
            <button type="button" class="wideLiteButton">
              Aggiungi al Carrello
            </button>
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
            <img src="../img/userIcon.png" alt="" class="reviewUserIcon" />
            <h3 class="inline-block">Fresh</h3>
            <div class="reviewVote right inline-block">
              <img src="../img/star.png" alt="" class="smallReviewStar" />
              <img src="../img/star.png" alt="" class="smallReviewStar" />
              <img src="../img/star.png" alt="" class="smallReviewStar" />
              <img src="../img/star.png" alt="" class="smallReviewStar" />
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
            <img src="../img/userIcon.png" alt="" class="reviewUserIcon" />
            <h3 class="inline-block">Cava</h3>
            <div class="reviewVote right inline-block">
              <img src="../img/star.png" alt="" class="smallReviewStar" />
              <img src="../img/emptyStar.png" alt="" class="smallReviewStar" />
              <img src="../img/emptyStar.png" alt="" class="smallReviewStar" />
              <img src="../img/emptyStar.png" alt="" class="smallReviewStar" />
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