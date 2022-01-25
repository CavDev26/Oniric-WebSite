<main class="center">
<div class="simpleBack center">
    <?php if (isset($templateParams["noadmin"])): ?>
          <h1 class="mediumTitle"><?php echo $templateParams["noadmin"]?></h1>
    <?php else: ?>
        <header><h1>Inserisci un nuovo articolo</h1></header>
        <hr class="separator" />

        <form action="" method="POST" enctype="multipart/form-data">
        <section>
            <label for="imgarticolo">Immagine Articolo</label>
            <input type="file" name="imgarticolo" id="imgarticolo" />
        </section>
        <hr class="separator"/>
        <section>
                <label for="name">Nome dell'articolo*</label>
                <br>
                <input
                    class="box-input-add m-10t f-14"
                    type="text"
                    name="name"
                    placeholder="Nome articolo" required
                />
                <br>
                <label for="app_nome">Categoria dell'articolo*</label>
                <br>
                <input
                    class="box-input-add m-10t f-14"
                    type="text"
                    name="app_nome"
                    placeholder="Categoria" required
                />
        </section>
        <hr class="separator" />
         <section class=" center">
            <section class="descriptionPart fullWidth">
                <label for="briefDesc">Descrizione breve*</label>
                <br>
                <input
                    class="box-input-add m-10t f-14"
                    type="text"
                    name="briefDesc"
                    placeholder="descrizione breve" required
                />

              <footer class="italic-footer">
                Scorri in basso per altri dettagli
              </footer>
              <hr class="separator" />
            </section>
            <section class="pricePart">
              <ul class="priceList">
                <li>
                  <div>
                    <label for="price">Prezzo*</label>
                    <br>
                    <input
                        class="box-input-add m-10t f-14"
                        type="number"
                        name="price"
                        placeholder="Prezzo" required step="0.01"
                    />
                  </div>
                </li>
                <li>
                  <div>
                    <label for="discount">Sconto(&#37;)*</label>
                    <br>
                    <input
                        class="box-input-add m-10t f-14"
                        type="number"
                        name="discount"
                        placeholder="Sconto (null se non previsto)" 
                    />
                    </p>
                  </div>
                </li>
              </ul>
              <footer class="italic-footer lh-10">
                Tutti i prezzi sono inclusivi di IVA
              </footer>
              <hr class="separator" />
            </section>
            
            <section class="m-20">
            <main class="simpleText m-20t">
                <label for="name">Descrizione lunga*</label>
                <br>
                <input
                    class="box-input-add-long m-10t f-14"
                    type="text"
                    name="descrizione"
                    placeholder="Inserisci una descrizione lunga" required
                />
                <br><br>
                <label class="m-20t" for="qty">Quantit&agrave;*</label>
                <br>
                <input
                    class="box-input-add-qty f-14"
                    type="number"
                    name="qty"
                    required
                />
            </main>
            <aside class="tableSection center inline-block">
            <p class="center">Dettagli</p>
              <table class="detailsTable">
                <tr>
                  <th><input class="box-input-add m-10t f-14" type="text" name="nomeDettaglio[]" placeholder="Nome Dettaglio"/></th>
                  <td><input class="box-input-add m-10t f-14" type="text" name="valoreDettaglio[]" placeholder="Valore Dettaglio"/></td>
                </tr>
              </table>
              <button class="add-riga" type="button" id="addriga" onclick="addRiga()">
                  Aggiungi riga
              </button>
            </aside>
            <footer><hr class="separator" /></footer>
          </section>
        </section>

        <input type="submit" name="" id="" value="Inserisci" class="hardButton">

        </form>
       <?php endif; ?>
    </div>
</main>