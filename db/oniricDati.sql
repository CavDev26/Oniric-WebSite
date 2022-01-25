insert into utente values ("admin@oniric.com", 10000.00, "Admin", "Admin", "AdminOniric", "Oniric2022", "2022-01-20",true);
insert into utente values ("paolo@oniric.com", 143.23, "Paolo", "Rossi", "Paul23", "paoloyeah", "1998-01-20",false);
insert into metodo_pagamento values ('Paul23', 'Carta mia', '1023032310100765', 'Visa', 0.0);
insert into ordine values ('cicici', 'Via Parri 727', '2022-01-17', 100.0, 'Paul23');

insert into categoria values ('Desktop pc');
insert into tipo_spedizione values ('14T', "Bartolini", 10.0, "Italia");
insert into articolo values ("CAR3F", "Cava 2000", "Una potente workstation in grado di reggere qualsiasi software. Il
              PC monta una NVidia RTX 3090 in grado di sopportare grossi sforzi
              lato GPU. Il processore Ã¨ un Intel Core i9-11 con frequenza di 3.5
              GHz. Di seguito i dettagli:", "Il PC al top di gamma 2021, pre-assemblato dai nostri esperti e
                con i migliori componenti disponibili oggi nei nostri magazzini", 999.99, 20, 0.2, "cava2000",0.0,"AdminOniric" ,'desktop pc');

insert into dettaglio_spedizione values ('1010lo', 10.0, '2022-01-18', 'Via Parri 727', 'in corso', 'CAR3F', "14T", 'cicici');

insert into indirizzo values ('Via F. Parri', 727, 'Cesena', 'Paul23');
insert into indirizzo values ('Via Rossi', 123, 'Cesena', 'Paul23');

insert into categoria values ('Mobile');
insert into categoria values ('Portatili');
insert into categoria values ('Console da gioco');
insert into categoria values ('Veicoli');
insert into categoria values ('Cuffie');
insert into tag values ('saldiinvernali2022');

insert into articolo values ("AADO4", "Audio 4", "Le nostre nuovissime cuffie, 
con frequenze mai sentite prima e un audio naturale. Grazie alle nostre nuove tecnologie,
tra cui Oniric Natural Sounds&#8482;, il brand delle Oniric Audio&#8482; subisce ancora una
volta una svolta.", "Il nuovo modello della nostra serie Oniric Audio&#8482;", 499.99, 
20, 0.1, "oniricAudio4",0.0,"AdminOniric" ,'Cuffie');
insert into richiamo values ("AADO4", "saldiinvernali2022");

insert into articolo values ("ABTWO", "Book Two", "Il portatile general-purpose Oniric,
con specifiche di medio livello adatte a qualsiasi utente", "&Egrave; arrivato il secondo
modello della nostra serie tanto richiesta! Divertitevi a scoprire le sue nuove funzionalit&agrave;",
 699.99, 20, 0.05, "oniricBook2", 0.0,"AdminOniric" ,'Portatili');
 
insert into articolo values ("ADRT2", "Drift 2", "Il secondo modello della serie Drift di Oniric.
 Una console portatile da gioco, in grado di reggere anche moltissimi dei giochi recenti.", 
 "Prova il secondo modello della serie Drift. Una piattaforma ergonomica e potente, ma, 
 soprattutto, PORTATILE!",
 599.99, 20, 0.20, "oniricDrift2", 0.0,"AdminOniric" ,'Console da gioco');
insert into richiamo values ("ADRT2", "saldiinvernali2022");

insert into articolo values ("ADRT3", "Drift 3", "Non lasciatevi ingannare dalla sua dimensione.
Oniric Drift 3 &egrave; una delle console pi&ugrave; potenti attualmente sul mercato. Con le sue
dimensioni di solo 43,6 x 70,9 x 7,7 mm riesce ad esplorare giochi che anche alcune macchine
pi&ugrave; recenti faticano a reggere!", 
 "Ultimo modello della serie Drift!
Pi&ugrave; piccola che mai, tascabile, resistente, dotata di potenze mai viste su un dispositivo
portatile.",
 799.99, 20, 0.0, "oniricDrift3", 0.0,"AdminOniric" ,'Console da gioco');

insert into articolo values ("AMBX1", "Mad Box", "Tra i nostri pc pi&ugrave; potenti 
e pi&ugrave; venduti! Un pc che comprime una hardware all'avanguardia in uno spazio limitato 
sempre mantenuto fresco grazie a dissipatori di marchio Oniric&#8482;", 
 "Una build folle! Potente! Appariscente! Tra i nostri prodotti pi&ugrave; venduti!",
 1599.99, 20, 0.1, "oniricMadBox", 0.0,"AdminOniric" ,'Desktop pc');
 insert into richiamo values ("AMBX1", "saldiinvernali2022");

insert into articolo values ("ANXS1", "Nexus", "Uno dei nostri modelli pi&ugrave; appariscenti e
coraggiosi. L'approccio in fase di progettazione si &egrave; basato sull'ergonomia e
comodit&agrave; per l'utente. Divertitevi!", 
 "Una console da gioco imperdibile. Speaker potenti, schermo curvo, hardware potente e
 un sistema operativo Oniric",
 849.99, 20, 0.3, "oniricNexus", 0.0,"AdminOniric" ,'Console da gioco');
  insert into richiamo values ("ANXS1", "saldiinvernali2022");

insert into articolo values ("ADBLE", "Dreamable New", "Un sogno, una speranza. Oniric Dreamable&#8482; &egrave; tra i prodotti che ha dato il via a
 Oniric e la sua storia. Dreamable New reincarna tale sogno sotto veste nuova, portandolo ad
 un nuovo livello.", 
 "Uno dei nostri prodotti storici &egrave;
ora disponibile in una nuova versione! Potenziato sotto ogni aspetto, in occasione dell'apertura
del nostro nuovo sito!",
 199.99, 20, 0.15, "oniricDreamable", 0.0,"AdminOniric" ,'Mobile');
insert into richiamo values ("ADBLE", "saldiinvernali2022");

insert into articolo values ("ASND3", "Sound 3", "La tecnologia Oniric porta avanti 
il progetto delle Oniric Sound&#8482; evolvendolo ogni volta. La durabilit&agrave; di
queste cuffie non ha pari: resistenti all'acqua e flessibili. Queste cuffie sono 
progettate per durare nel tempo ma garantendo una qualit&agrave; di stampo Oniric&#8482;", 
 "Sono tornate! Le nostre cuffie adattabili, elastiche, con riduzione del rumore e 
 materiali ergonomici!",
 99.99, 20, 0.50, "oniricSound3", 0.0,"AdminOniric" ,'Cuffie');
insert into articolo values ("ASPRT", "Oni Sport", "Veicolo potente, dotata di Bluetooth&#8482;
 e Wi-Fi ed un motore da 1500 CV. I suoi interni sono confortevoli, volante ergonomico e 
 bagagliaio spazioso. ", 
 "Una macchina veloce, elettrica, intelligente e progettata seguendo il design dei nostri
 esperti. Perditi nei chilometri con Oni Sport.",
 79999.99, 5, 0.05, "oniricSport", 0.0,"AdminOniric" ,'Veicoli');

INSERT INTO recensione (Nome_Utente, ID_Articolo, Voto, Testo, Titolo, Data_Recensione) VALUES ("AdminOniric", "AADO4", 4, "Prodotto che rispecchia a pieno ogni aspettativa. Non potevo chiedere di meglio, spedizione assolutamente rapida con Omni!", "Prodotto perfetto", "2021-01-24");
INSERT INTO recensione (Nome_Utente, ID_Articolo, Voto, Testo, Titolo, Data_Recensione) VALUES ("Paul23", "AADO4", 5, "Mai vista una cosa simile, è spettacolare tutto ciò, proprio incredibile.", "Consigliato", "2021-01-20");

INSERT INTO recensione (Nome_Utente, ID_Articolo, Voto, Testo, Titolo, Data_Recensione) VALUES ("Paul23", "ABTWO", 1, "E' arrivato dopo 1 anno dall'acquisto. Ridicolo, Oniric decisamente sotto la media", "Pessimo", "2021-01-24");
INSERT INTO recensione (Nome_Utente, ID_Articolo, Voto, Testo, Titolo, Data_Recensione) VALUES ("AdminOniric", "ABTWO", 3, "Fa quello che deve, senza lodi, però. Un po' troppo costoso rispetto alla concorrenza", "Meh", "2021-01-23");

INSERT INTO recensione (Nome_Utente, ID_Articolo, Voto, Testo, Titolo, Data_Recensione) VALUES ("AdminOniric", "ADRT3", 5, "Regalo di compleanno per mia figlia, non potevo trovare di meglio!", "Mia figlia lo ha adorato!o", "2021-01-24");


INSERT INTO tipo_spedizione (ID_Tipo_Sped, Nome_Corriere, Tariffa, Paese_Provenienza) VALUES ("OMNI", "Omni", 0.00, "Italia");

