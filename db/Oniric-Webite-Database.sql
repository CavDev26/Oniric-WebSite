-- *********************************************
-- * SQL MySQL generation                      
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.1              
-- * Generator date: Dec  4 2018              
-- * Generation date: Thu Jan 20 14:40:58 2022 
-- * LUN file: E:\Download\PCeCommerce_logica.lun 
-- * Schema: eCommerce/1 
-- ********************************************* 


-- Database Section
-- ________________ 

create database eCommerce;
use eCommerce;


-- Tables Section
-- _____________ 

create table ARTICOLO (
     ID_Articolo char(20) not null,
     Nome varchar(30) not null,
     Descrizione varchar(1000) not null,
     Descrizione_breve varchar(200) not null,
     Costo_listino float(10) not null,
     Quantita_Disp int not null,
     Sconto float,
     Cartella_immagini varchar(50) not null,
     Voto_medio float not null,
     Nome_Utente varchar(20) not null,
     App_Nome char(20) not null,
     constraint ID_ARTICOLO_ID primary key (ID_Articolo));

create table BUONO_SCONTO (
     Codice char(16) not null,
     Sconto float not null,
     ID_Ordine char(20),
     constraint ID_BUONO_SCONTO_ID primary key (Codice));

create table CATEGORIA (
     Nome char(20) not null,
     constraint ID_CATEGORIA_ID primary key (Nome));

create table DETTAGLIO_ARTICOLO (
     ID_Articolo char(20) not null,
     Nome varchar(20) not null,
     Valore varchar(20) not null,
     constraint ID_DETTAGLIO_ARTICOLO_ID primary key (ID_Articolo, Nome));

create table DETTAGLIO_SPEDIZIONE (
     ID_Spedizione char(20) not null,
     Costo_Spedizione float not null,
     Data_Arrivo date not null,
     Indirizzo_Consegna varchar(30) not null,
     Status_Ordine char(16) not null,
     ID_Articolo char(20) not null,
     ID_Tipo_Sped char(20) not null,
     ID_Ordine char(20) not null,
     constraint ID_DETTAGLIO_SPEDIZIONE_ID primary key (ID_Spedizione));

create table INDIRIZZO (
     Via char(20) not null,
     Numero_civico int not null,
     Citta char(20) not null,
     Nome_Utente varchar(20) not null,
     constraint ID_INDIRIZZO_ID primary key (Via, Numero_civico, Citta));

create table METODO_PAGAMENTO (
     Nome_Utente varchar(20) not null,
     Nome varchar(20) not null,
     Numero varchar(16) not null,
     Circuito_pagamento char(1) not null,
     Tassa float not null,
     constraint ID_METODO_PAGAMENTO_ID primary key (Nome_Utente, Nome));

create table carrello (
     ID_Articolo char(20) not null,
     Nome_Utente varchar(20) not null,
     constraint ID_carrello_ID primary key (ID_Articolo, Nome_Utente));

create table NOTIFICA (
     ID_Notifica char(20) not null,
     Titolo varchar(40) not null,
     Descrizione char(40) not null,
     Data_Ora datetime not null,
     Letto bool not null,
     ID_Ordine char(20),
     Nome_Utente varchar(20) not null,
	 Immagine varchar(50) not null,
     constraint ID_NOTIFICA_ID primary key (ID_Notifica));

create table ORDINE (
     ID_Ordine char(20) not null,
     Indirizzo_Consegna varchar(30) not null,
     Data_Acquisto date not null,
     Spesa_Totale float not null,
     Nome_Utente varchar(20) not null,
     constraint ID_ORDINE_ID primary key (ID_Ordine));

create table RECENSIONE (
     Nome_Utente varchar(20) not null,
     ID_Articolo char(20) not null,
     Voto float not null,
     Testo varchar(200) not null,
     Titolo char(50) not null,
     Data_recensione date not null,
     constraint ID_RECENSIONE_ID primary key (ID_Articolo, Nome_Utente, Voto, Testo, Titolo, Data_recensione));

create table richiamo (
     ID_Articolo char(20) not null,
     Nome char(20) not null,
     constraint ID_richiamo_ID primary key (ID_Articolo, Nome));

create table TAG (
     Nome char(20) not null,
     constraint ID_TAG_ID primary key (Nome));

create table TIPO_SPEDIZIONE (
     ID_Tipo_Sped char(20) not null,
     Nome_Corriere varchar(20) not null,
     Tariffa float not null,
     Paese_Provenienza varchar(30) not null,
     constraint ID_TIPO_SPEDIZIONE_ID primary key (ID_Tipo_Sped));

create table UTENTE (
     Email char(30) not null,
     Saldo float(1) not null,
     Nome varchar(20) not null,
     Cognome varchar(20) not null,
     Nome_Utente varchar(20) not null,
     Password char(20) not null,
     Data_Nascita date not null,
     Amministratore bool not null,
     constraint ID_UTENTE_ID primary key (Nome_Utente));


-- Constraints Section
-- ___________________ 

alter table ARTICOLO add constraint FKinserimento_FK
     foreign key (Nome_Utente)
     references UTENTE (Nome_Utente);

alter table ARTICOLO add constraint FKappartenenza_FK
     foreign key (App_Nome)
     references CATEGORIA (Nome);

alter table BUONO_SCONTO add constraint FKsfruttamento_FK
     foreign key (ID_Ordine)
     references ORDINE (ID_Ordine);

alter table DETTAGLIO_ARTICOLO add constraint FKdettaglio
     foreign key (ID_Articolo)
     references ARTICOLO (ID_Articolo);

alter table DETTAGLIO_SPEDIZIONE add constraint FKspedizione_FK
     foreign key (ID_Articolo)
     references ARTICOLO (ID_Articolo);

alter table DETTAGLIO_SPEDIZIONE add constraint FKgestione_FK
     foreign key (ID_Tipo_Sped)
     references TIPO_SPEDIZIONE (ID_Tipo_Sped);

alter table DETTAGLIO_SPEDIZIONE add constraint FKcomposizione_FK
     foreign key (ID_Ordine)
     references ORDINE (ID_Ordine);

alter table INDIRIZZO add constraint FKpossiede_FK
     foreign key (Nome_Utente)
     references UTENTE (Nome_Utente);

alter table METODO_PAGAMENTO add constraint FKdisponibilita
     foreign key (Nome_Utente)
     references UTENTE (Nome_Utente);

alter table carrello add constraint FKcar_UTE_FK
     foreign key (Nome_Utente)
     references UTENTE (Nome_Utente);

alter table carrello add constraint FKcar_ART
     foreign key (ID_Articolo)
     references ARTICOLO (ID_Articolo);

alter table NOTIFICA add constraint FKriguardo_FK
     foreign key (ID_Ordine)
     references ORDINE (ID_Ordine);

alter table NOTIFICA add constraint FKricezione_FK
     foreign key (Nome_Utente)
     references UTENTE (Nome_Utente);

alter table ORDINE add constraint FKinvio_acquisto_FK
     foreign key (Nome_Utente)
     references UTENTE (Nome_Utente);

alter table RECENSIONE add constraint FKvalutazione
     foreign key (ID_Articolo)
     references ARTICOLO (ID_Articolo);

alter table RECENSIONE add constraint FKscrittura_FK
     foreign key (Nome_Utente)
     references UTENTE (Nome_Utente);

alter table richiamo add constraint FKric_TAG_FK
     foreign key (Nome)
     references TAG (Nome);

alter table richiamo add constraint FKric_ART
     foreign key (ID_Articolo)
     references ARTICOLO (ID_Articolo);


-- Index Section
-- _____________ 

create unique index ID_ARTICOLO_IND
     on ARTICOLO (ID_Articolo);

create index FKinserimento_IND
     on ARTICOLO (Nome_Utente);

create index FKappartenenza_IND
     on ARTICOLO (App_Nome);

create unique index ID_BUONO_SCONTO_IND
     on BUONO_SCONTO (Codice);

create index FKsfruttamento_IND
     on BUONO_SCONTO (ID_Ordine);

create unique index ID_CATEGORIA_IND
     on CATEGORIA (Nome);

create unique index ID_DETTAGLIO_ARTICOLO_IND
     on DETTAGLIO_ARTICOLO (ID_Articolo, Nome);

create unique index ID_DETTAGLIO_SPEDIZIONE_IND
     on DETTAGLIO_SPEDIZIONE (ID_Spedizione);

create index FKspedizione_IND
     on DETTAGLIO_SPEDIZIONE (ID_Articolo);

create index FKgestione_IND
     on DETTAGLIO_SPEDIZIONE (ID_Tipo_Sped);

create index FKcomposizione_IND
     on DETTAGLIO_SPEDIZIONE (ID_Ordine);

create unique index ID_INDIRIZZO_IND
     on INDIRIZZO (Via, Numero_civico, Citta);

create index FKpossiede_IND
     on INDIRIZZO (Nome_Utente);

create unique index ID_METODO_PAGAMENTO_IND
     on METODO_PAGAMENTO (Nome_Utente, Nome);

create unique index ID_carrello_IND
     on carrello (ID_Articolo, Nome_Utente);

create index FKcar_UTE_IND
     on carrello (Nome_Utente);

create unique index ID_NOTIFICA_IND
     on NOTIFICA (ID_Notifica);

create index FKriguardo_IND
     on NOTIFICA (ID_Ordine);

create index FKricezione_IND
     on NOTIFICA (Nome_Utente);

create unique index ID_ORDINE_IND
     on ORDINE (ID_Ordine);

create index FKinvio_acquisto_IND
     on ORDINE (Nome_Utente);

create unique index ID_RECENSIONE_IND
     on RECENSIONE (ID_Articolo, Nome_Utente, Voto, Testo, Titolo, Data_recensione);

create index FKscrittura_IND
     on RECENSIONE (Nome_Utente);

create unique index ID_richiamo_IND
     on richiamo (ID_Articolo, Nome);

create index FKric_TAG_IND
     on richiamo (Nome);

create unique index ID_TAG_IND
     on TAG (Nome);

create unique index ID_TIPO_SPEDIZIONE_IND
     on TIPO_SPEDIZIONE (ID_Tipo_Sped);

create unique index ID_UTENTE_IND
     on UTENTE (Nome_Utente);

