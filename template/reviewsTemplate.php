<main class="fullHeight">
        <div class="centered m-50t">
            <a class="normal" href="<?php echo $templateParams["backlink"] ?>">
                <div class="purchase-button">
                  <p>Indietro</p>
                </div>
             </a>
        </div>
        <div class="simpleBack center">
            <section class="center">
                <?php if (isset($templateParams["id"])): ?>
                    <?php if (isset($templateParams["noarticolo"])): ?>
                        <h1><?php echo $templateParams["noarticolo"]; ?></h1>
                    <?php else: ?>
                        <?php if (isset($templateParams["norecensioni"])): ?>
                        <h1><?php echo $templateParams["norecensioni"]; ?></h1>
                        <?php else: ?>
                            <?php foreach($templateParams["reviews"] as $rev): ?>
                                <article class="review center">
                                    <p class="right m-10r">Aggiunta da: <?php echo $rev["Nome_Utente"];?></p>
                                        <img class="product-review-image left m-10"
                                            src="<?php echo "./img/" . $rev["Cartella_immagini"] . "/" . 1 . ".png" ?>" 
                                            alt="<?php echo $rev["Nome"] ?>"/>
                                        <p class="nome-articolo m-10t m-10l left-text"><?php echo $rev["Nome"]; ?></p>
                                    <div class="reviewVote inline-block">
                                    <?php $n = (int) $rev["Voto"];
                                                    for($i = 0; $i < $n; $i++):?>
                                                    <img src="./img/star.png" alt="full star" class="smallReviewStar" />
                                                    <?php endfor; 
                                                    if ($rev["Voto"] - (float)$n >= 0.5): $n++;?>
                                                    <img src="./img/halfStar.png" alt="half star" class="smallReviewStar" />
                                                    <?php endif; 
                                                    for($i=0; $i < 5 - $n; $i++):?>
                                                    <img src="./img/emptyStar.png" alt="empty star" class="smallReviewStar" />
                                                <?php endfor; ?>
                                    </div>
                                    <p class="reviewTitle left-text">
                                        <?php echo $rev["Titolo"]; ?>
                                    </p>
                                    <p class="reviewText-page left-text">
                                        <?php echo $rev["Testo"]; ?>
                                    </p>
                                    <footer class="reviewFooter right-text">
                                        Aggiunta il <?php echo $rev["Data_recensione"]; ?>
                                    </footer>
                                </article>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php else: ?>
                    <h2>Le tue Recensioni</h2>
                    <?php if (isset($templateParams["norecensioni"])): ?>
                        <h1><?php echo $templateParams["norecensioni"]; ?></h1>
                    <?php else: ?>
                        <?php foreach($templateParams["reviews"] as $rev): ?>
                            <article class="review center">
                                <a href="<?php echo "articolo.php?id=".$rev["ID_Articolo"] ?>" class="normal">
                                    <img class="product-review-image left m-10"
                                        src="<?php echo "./img/" . $rev["Cartella_immagini"] . "/" . 1 . ".png" ?>" 
                                        alt="<?php echo $rev["Nome"] ?>"/>
                                    <p class="nome-articolo m-10t m-10l left-text"><?php echo $rev["Nome"]; ?></p>
                                </a>
                                <div class="reviewVote inline-block">
                                <?php $n = (int) $rev["Voto"];
                                                for($i = 0; $i < $n; $i++):?>
                                                <img src="./img/star.png" alt="full star" class="smallReviewStar" />
                                                <?php endfor; 
                                                if ($rev["Voto"] - (float)$n >= 0.5): $n++;?>
                                                <img src="./img/halfStar.png" alt="half star" class="smallReviewStar" />
                                                <?php endif; 
                                                for($i=0; $i < 5 - $n; $i++):?>
                                                <img src="./img/emptyStar.png" alt="empty star" class="smallReviewStar" />
                                            <?php endfor; ?>
                                </div>
                                <p class="reviewTitle left-text">
                                    <?php echo $rev["Titolo"]; ?>
                                </p>
                                <p class="reviewText-page left-text">
                                    <?php echo $rev["Testo"]; ?>
                                </p>
                                <footer class="reviewFooter right-text">
                                    Aggiunta il <?php echo $rev["Data_recensione"]; ?>
                                </footer>
                            </article>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <?php endif; ?>
              </section>
        </div>
</main>