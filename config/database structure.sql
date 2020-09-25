create table Entreprises (
id integer auto_increment primary key, 
	nom varchar(100) not null, 
	adresse varchar(300), 
	numeroFixe varchar(9), 
	numeroPortable varchar(10),
	fax varchar(9),
	nif varchar(20), 
	nis varchar(20), 
	nrcf varchar(20), 
	article varchar(50), 
	compte varchar(20), 
	email varchar(250),
	agence  varchar(100), 
	created date, 
	modified date, 
	modified_by integer
); 

create table  sexes(
	id integer auto_increment primary key, 
	libellé varchar(100), 
	created date, 
	modified date,
	modified_by integer
); 

create table  Situations_Familiales(
	id integer auto_increment primary key, 
	libellé varchar(100), 
	created date, 
	modified date,
	modified_by integer
);

create table Personnes (
	id integer auto_increment primary key, 
	nom varchar(100), 
	prenom varchar(100), 
	adresse varchar(200), 
	numero varchar(16),
	datedenaissance date, 
	situations_familiale_id integer, 
	sexe_id integer,
	created date, 
	modified date,
	modified_by integer
);

create table Gerants (
	id integer auto_increment primary key, 
	personnel_id integer, 
	societe_id integer,
	created date, 
	modified date, 
	create_by integer, 
	modified_by integer
); 

create table Maitres_Oeuvres (
	id integer auto_increment primary key,
	nom varchar(100) not null, 
	adresse varchar(300), 
	numeroFixe varchar(9), 
	numeroPortable varchar(10),
	fax varchar(9),
	nif varchar(20), 
	nis varchar(20), 
	nrcf varchar(20), 
	article varchar(50), 
	compte varchar(20), 
	email varchar(250),
	agence  varchar(100),
	created date, 
	modified date, 
	create_by integer, 
	modified_by integer
); 

create table Maitres_Ouvrages (
	id integer auto_increment primary key,
	nom varchar(100) not null, 
	adresse varchar(300), 
	numeroFixe varchar(9), 
	numeroPortable varchar(10),
	fax varchar(9),
	nif varchar(20), 
	nis varchar(20), 
	nrcf varchar(20), 
	article varchar(50), 
	compte varchar(20), 
	email varchar(250),
	agence  varchar(100),
	created date, 
	modified date, 
	modified_by integer
); 

create table Categories_Affaires ( 
	id integer auto_increment primary key,
	libelle varchar(100),
	created date, 
	modified date, 
	modified_by integer
);

create table Wilayas (
	id integer auto_increment primary key,
	nom varchar(250),
	created date, 
	modified date, 
	modified_by integer
); 

create table Affaires (
	id integer auto_increment primary key,
	intitule varchar(250) NOT NULL,
	categories_affaire_id integer,
	maitres_ouvrage_id integer,
	dateaffaire date, 
	types_affaire_id integer, 
	wilaya_id varchar(250),
	created date, 
	etat_id integer,
	modified date, 
	modified_by integer
); 

create table Etats (
	id integer auto_increment primary key,
	libelle varchar(20),
	created date, 
	modified date, 
	  
	modified_by integer
); 

create table Etats_Affaire (
	id integer auto_increment primary key,
	affaire_id integer, 
	etat_id integer, 
	created date, 
	modified date, 
	modified_by integer
); 

create table Types_Frais (
	id integer auto_increment primary key,
	libelle varchar(150),
	created date, 
	modified date, 
	modified_by integer
); 

create table Frais_Projets (
	id integer auto_increment primary key,
	frais_id integer,
	total real,
	affaire_id integer, 
	created date, 
	modified date, 
	modified_by integer
); 

create table Commissions (
	id integer auto_increment primary key,
	affaire_id integer, 
	datecommision date, 
	created date, 
	modified date,    
	modified_by integer
); 

create table Etats_Commissions(
	id integer auto_increment primary key,
	commission_id integer,
	dateetat date,
	newdatecommission date,
	etat_id integer,
	cause varchar(255),
	created date, 
	modified date, 
	modified_by integer
); 

create table Soumissionnaires (
	id integer auto_increment primary key,
	nom varchar(100) not null, 
	adresse varchar(300), 
	wilaya_id integer, 
	numeroFixe varchar(9), 
	numeroPortable varchar(10),
	fax varchar(9),
	nif varchar(20), 
	nis varchar(20), 
	nrcf varchar(20), 
	article varchar(50), 
	compte varchar(20), 
	email varchar(250),
	agence  varchar(100),
	created date, 
	modified date, 
	modified_by integer
);

create table Soumissions (
	id integer auto_increment primary key,
	soumissionnaire_id integer, 
	affaire_id integer,
	montant real, 
	delais int(5), 
	created date, 
	modified date, 
	modified_by integer
);

create table Unites (
	id integer auto_increment primary key,
	libelle varchar(20),
	signe varchar(5), 
	created date, 
	modified date, 
	  
	modified_by integer
);

create table Contraintes_Soumission (
	id integer auto_increment primary key,
	libelle varchar(150),
	valeur varchar(150), 
	unite_id integer,
	created date, 
	modified date, 
	  
	modified_by integer
);

create table Attributions (
	id integer auto_increment primary key,
	dateattribution date, 
	soumission_id integer,
	observation varchar(255),
	created date, 
	modified date, 
	modified_by integer
);

create table Marches (
	id integer auto_increment primary key,
	affaire_id varchar(150), 
	numero integer,
	maitres_oeuvre_id integer,
	created date, 
	modified date, 
	modified_by integer
);

create table Types_ODSs (
	id integer auto_increment primary key,
	libelle varchar(150), 
	created date, 
	modified date, 
	modified_by integer
);

create table ODSs (
	id integer auto_increment primary key,
	dateODS date, 
	types_ODS_id integer,
	numero integer,
	created date, 
	modified date, 	 
	modified_by integer
);

create table Types_Piece_Identite (
	id integer auto_increment primary key,
	libelle varchar(150), 
	created date, 
	modified date, 
	 
	modified_by integer
);

create table Documents (
	id integer auto_increment primary key,
	libelle varchar(150), 
	document varchar(250),
	created date, 
	modified date,  
	modified_by integer
);

create table Tags (
	id integer auto_increment primary key,
	libelle varchar(20), 
	created date, 
	modified date, 
	modified_by integer
);

create table Documents_Tags (
	id integer auto_increment primary key,
	document_id varchar(150), 
	tag_id integer,
	created date, 
	modified date, 
	 
	modified_by integer
);

create table Pieces_Identites (
	id integer auto_increment primary key,
	numero varchar(150), 
	type_piece_identite_id integer,
	datepiece date, 
	document_id integer,
	created date, 
	modified date, 
	 
	modified_by integer
);

create table Visas_CF (
	id integer auto_increment primary key,
	datevisa date, 
	numero integer,
	marche_id integer,
	created date, 
	modified date, 
	 
	modified_by integer
);

create table Types_Cautions (
	id integer auto_increment primary key,
	libelle varchar(150), 
	pourcentage integer,
	created date, 
	modified date, 
	modified_by integer
);

create table Cautions (
	id integer auto_increment primary key,
	marche_id integer, 
	types_caution_id integer,
	numero integer, 
	montant real, 
	etat varchar(250),
	created date, 
	modified date, 
	modified_by integer
);

create table Remboursements_Caution (
	id integer auto_increment primary key,
	caution_id integer, 
	montant real,
	dateremboursement date,
	observation varchar(200),
	created date, 
	modified date, 
	modified_by integer
);

create table Avances (
	id integer auto_increment primary key,
	marche_id integer, 
	montant real,
	numero integer, 
	types_avance_id integer,
	dateremboursement date, 
	dateavance date, 
	etat varchar(20),
	created date, 
	modified date, 
	modified_by integer
);

create table Remboursements_Avance (
	id integer auto_increment primary key,
	dateremboursement date, 
	avance_id integer,
	montant real,
	created date, 
	modified date, 
	  
	modified_by integer
);

create table Etats_Marches (
	id integer auto_increment primary key,
	marche_id integer, 
	dateetat date, 
	ODS_id integer,
	etat_id integer,
	created date, 
	modified date, 
	modified_by integer
);

create table Devis (
	id integer auto_increment primary key,
	marche_id integer,
	intitule varchar(255),
	created date, 
	modified date, 
	 
	modified_by integer
);

create table Lots (
	id integer auto_increment primary key,
	devi_id integer,
	intitule varchar(500),
	numero integer,
	created date, 
	modified date, 
	modified_by integer
);

create table Parties (
	id integer auto_increment primary key,
	lot_id integer,
	libelle varchar(500),
	numero integer,
	created date, 
	modified date, 
	  
	modified_by integer
);

create table Articles (
	id integer auto_increment primary key,
	partie_id integer,
	libelle varchar(500),
	numero integer,
	created date, 
	modified date, 
	 
	modified_by integer
);

create table Soustraitants (
	id integer auto_increment primary key,
	nom varchar(100) not null, 
	adresse varchar(300), 
	numeroFixe varchar(9), 
	numeroPortable varchar(10),
	fax varchar(9),
	nif varchar(20), 
	nis varchar(20), 
	nrcf varchar(20), 
	article varchar(50), 
	compte varchar(20), 
	email varchar(250),
	agence  varchar(100),
	created date, 
	modified date, 
	 
	modified_by integer
);

create table Details_Article (
	id integer auto_increment primary key,
	article_id integer,
	qte integer, 
	unite_id integer, 
	prix real,
	soustraitant_id integer,
	created date, 
	modified date, 
	modified_by integer
);

create table Attachements_Travaux (
	id integer auto_increment primary key,
	details_article_id integer,
	qte integer,
	dateattachement date,
	created date, 
	modified date, 
	modified_by integer
);

create table Avenants (
	id integer auto_increment primary key,
	dateavenant date, 
	marche_id integer,
	visa varchar(255),
	numero integer,
	montant real, 
	delai integer, 
	objet varchar(500),
	created date, 
	modified date,  
	modified_by integer
);

create table Lots_Avenants (
	id integer auto_increment primary key,
	avenant_id integer, 
	intitule varchar(250), 
	numero integer,
	created date, 
	modified date, 	 
	modified_by integer
);

create table Parties_Avenants (
	id integer auto_increment primary key,
	lots_avenant_id integer, 
	intitule varchar(250), 
	numero integer,
	created date, 
	modified date, 
	modified_by integer
);

create table Articles_Avenant (
	id integer auto_increment primary key,
	partie_avenant_id integer, 
	intitule varchar(250), 
	numero integer,
	created date, 
	modified date, 
	modified_by integer
);

create table Details_Articles_Avenant (
	id integer auto_increment primary key,
	article_avenant_id integer, 
	qte integer,
	unite_id integer,
	prix real,
	datedetailsavenant date,
	soustraitant_id integer,
	created date, 
	modified date, 
	 
	modified_by integer
);

create table Attachements_Travaux_Avenant (
	id integer auto_increment primary key,
	details_article_avenant_id integer, 
	qte integer,
	dateattachementavenant date,
	created date, 
	modified date, 
	 
	modified_by integer
);

create table Details_Marches (
	id integer auto_increment primary key,
	datedetails date, 
	marche_id integer,
	avenant_id integer,
	montant real,
	delai integer,
	created date, 
	modified date, 
	modified_by integer
);

create table Types_PVs (
	id integer auto_increment primary key,
	libelle varchar(50),
	created date, 
	modified date, 
	modified_by integer
);

create table PVs (
	id integer auto_increment primary key,
	datePV date, 
	libelle varchar(250), 
	numero integer,
	marche_id integer,
	types_PV_id integer,
	created date, 
	modified date, 
	modified_by integer
);

create table Correspondances (
	id integer auto_increment primary key,
	
	created date, 
	modified date, 
	modified_by integer
);

create table Expediteurs (
	id integer auto_increment primary key,
	nom varchar(100) not null, 
	adresse varchar(300), 
	numeroFixe varchar(9), 
	numeroPortable varchar(10),
	created date, 
	modified date, 
	modified_by integer
);

create table Correspondances_Entrantes (
	id integer auto_increment primary key,
	numero integer,
	marche_id integer,
	dateenvoi date, 
	expediteur_id integer,
	created date, 
	modified date, 
	modified_by integer
);

create table Destinataires (
	id integer auto_increment primary key,
	nom varchar(100) not null, 
	adresse varchar(300), 
	numeroFixe varchar(9), 
	numeroPortable varchar(10),
	created date, 
	modified date, 
	 
	modified_by integer
);

create table Correspondances_Sortantes (
	id integer auto_increment primary key,
	datecorrespondance date, 
	nombredocuments integer,
	numero integer,
	marche_id integer,
	destinataire_id integer,
	objet varchar(250), 
	observation varchar(500),
	created date, 
	modified date, 
	modified_by integer
);

create table Projets_Soustraitant (
	id integer auto_increment primary key,
	marche_id integer,
	soustraitant_id integer, 
	duree integer, 
	montant real,
	created date, 
	modified date, 
	 
	modified_by integer
);

create table Contrats (
	id integer auto_increment primary key,
	numero integer, 
	dateetablissement date, 
	durée integer, 
	type_contrat_id varchar(3),
	etat varchar(50), 
	created date, 
	modified date, 
	modified_by integer
);

create table Contrats_Soustraitant (
	id integer auto_increment primary key,
	contrat_id integer, 
	projet_soustraitant_id integer, 
	objet varchar(250), 
	created date, 
	modified date, 
	 
	modified_by integer
);

create table Equipes (
	id integer auto_increment primary key,
	nom varchar(250), 
	created date, 
	modified date, 
	 
	modified_by integer
);

create table Membres (
	id integer auto_increment primary key,
	personne_id integer, 
	created date, 
	modified date, 
	 
	modified_by integer
);

create table Membres_Equipe (
	id integer auto_increment primary key,
	membre_id integer, 
	equipe_id integer, 
	created date, 
	modified date, 
	 
	modified_by integer
);

create table Equipes_Soustraitant (
	id integer auto_increment primary key,
	equipe_id integer,
	projet_soustraitant_id integer, 
	created date, 
	modified date, 
	 
	modified_by integer
);

create table Types_Personnels (
	id integer auto_increment primary key,
	libellé varchar(50),	
	created date, 
	modified date, 
	modified_by integer
);

create table Personnels (
	id integer auto_increment primary key,
	personne_id integer,
	types_personnel_id integer,	 
	created date, 
	modified date, 
	modified_by integer
);

create table Types_Avertissement (
	id integer auto_increment primary key,
	objet varchar(250), 
	created date, 
	modified date, 
	 
	modified_by integer
);

create table Avertissements (
	id integer auto_increment primary key,
	dateavertissement date, 
	personnel_id integer,
	cause varchar(500),
	type__avertissement_id integer,
	created date, 
	modified date, 
	 
	modified_by integer
);

create table Types_Punition (
	id integer auto_increment primary key,
	libelle varchar(250), 
	durée integer,
	created date, 
	modified date, 
	 
	modified_by integer
);

create table Punitions (
	id integer auto_increment primary key,
	avertissement_id integer,
	type_punition_id integer,
	created date, 
	modified date, 
	modified_by integer
);

create table Etats_Personnel (
	id integer auto_increment primary key,
	personnel_id integer,
	dateetat date,
	cause varchar(250), 
	created date, 
	modified date, 
	 
	modified_by integer
);

create table Responsables (
	id integer auto_increment primary key,
	personnel_id integer, 
	created date, 
	modified date, 
	modified_by integer
);

create table Personnels_Chantiers (
	id integer auto_increment primary key,
	personnel_id integer, 
	created date, 
	modified date, 
	modified_by integer
);

create table Personnels_Administrations (
	id integer auto_increment primary key,
	personnel_id integer, 
	created date, 
	modified date, 
	modified_by integer
);

create table Fonctions (
	id integer auto_increment primary key,
	nom varchar(250), 
	created date, 
	modified date, 
	modified_by integer
);


create table Societes (
	id integer auto_increment primary key,
	nom varchar(100) not null, 
	adresse varchar(300), 
	numeroFixe varchar(9), 
	numeroPortable varchar(10),
	fax varchar(9),
	nif varchar(20), 
	nis varchar(20), 
	nrcf varchar(20), 
	article varchar(50), 
	compte varchar(20), 
	email varchar(250),
	agence  varchar(100),
	created date, 
	modified date, 
	modified_by integer
);

create table Departements (
	id integer auto_increment primary key,
	nom varchar(250), 
	societe_id integer,
	created date, 
	modified date, 
	modified_by integer
);

create table Types_Depenses (
	id integer auto_increment primary key,
	libelle varchar(250), 
	created date, 
	modified date, 
	modified_by integer
);

create table Depenses (
	id integer auto_increment primary key,
	cause varchar(250),
	montant real, 
	types_depense_id integer,  
	departement_id integer,
	created date, 
	modified date, 
	modified_by integer
);

create table Formations (
	id integer auto_increment primary key,
	libelle varchar(250), 
	durée integer,
	prix real,
	created date, 
	modified date, 
	 
	modified_by integer
);

create table Formations_Personnel (
	id integer auto_increment primary key,
	formation_id integer, 
	personnel_id integer,
	created date, 
	modified date, 
	 
	modified_by integer
);

create table Equipes_Personnel (
	id integer auto_increment primary key,
	personnel_id integer, 
	equipe_id integer,
	created date, 
	modified date, 
	 
	modified_by integer
);

create table Types_Assurance (
	id integer auto_increment primary key,
	libelle varchar(250), 
	pourcentage integer,
	created date, 
	modified date, 
	modified_by integer
);

create table Assurances (
	id integer auto_increment primary key,
	assurrance_type_id integer,
	personnel_id integer,
	created date, 
	modified date, 
	modified_by integer
);

create table Assurances_Personnel (
	id integer auto_increment primary key,
	nom varchar(250), 
	assurance_id integer,
	dateassurance date, 
	montant real, 
	created date, 
	modified date,
	modified_by integer
);

create table Salaires (
	id integer auto_increment primary key,
	montant real, 
	datesalaire date,
	personnel_id integer,
	created date, 
	modified date, 
	modified_by integer
);

create table Paies (
	id integer auto_increment primary key,
	nom varchar(250), 
	salaire_id integer, 
	datepaie date, 
	created date, 
	modified date, 
	modified_by integer
);

create table Cheques (
	id integer auto_increment primary key,
	numero integer,
	etat integer, 
	achat_id  integer,
	created date, 
	modified date, 
	modified_by integer
);

create table Fournisseurs (
	id integer auto_increment primary key,
	nom varchar(100) not null, 
	adresse varchar(300), 
	numeroFixe varchar(9), 
	numeroPortable varchar(10),
	fax varchar(9),
	nif varchar(20), 
	nis varchar(20), 
	nrcf varchar(20), 
	article varchar(50), 
	compte varchar(20), 
	email varchar(250),
	agence  varchar(100),
	created date, 
	modified date, 
	modified_by integer
);

create table Depots (
	id integer auto_increment primary key,
	libelle varchar(50), 
	adresse varchar(500),
	wilaya_id integer,
	created date, 
	modified date, 
	modified_by integer
);

create table Types_Produits (
	id integer auto_increment primary key,
	libelle varchar(250),  
	types_produit_id  integer, 
	couleur varchar(10),
	created date, 
	modified date,  
	modified_by integer
);

create table Produits (
	id integer auto_increment primary key,
	nom varchar(250), 
	code varchar(50), 
	qte date,
	unite_id integer,  
	categories_produit_id integer,
	qtealert integer,
	types_produit_id integer,
	created date, 
	modified date, 
	modified_by integer
);



create table Fournitures (
	id integer auto_increment primary key,
	dateutilisation date,  
	qte integer,
	departement_id real,
	stock_id integer,
	observation varchar(500), 
	created date, 
	modified date, 
	 
	modified_by integer
);

create table Bons_Commandes (
	id integer auto_increment primary key,
	departement_id integer, 
	total real, 
	tva integer,
	numero varchar(20),
	fournisseur_id integer, 
	datebon date, 
	created date, 
	modified date, 
	 
	modified_by integer
);

create table Details_Bon_Commande (
	id integer auto_increment primary key,
	bons_commande_id integer, 
	qte integer, 
	prixachat real,  
	produit_id integer,
	created date, 
	modified date, 
	 
	modified_by integer
);

create table Modes_Reglements (
	id integer auto_increment primary key,
	libelle varchar(20),  
	created date, 
	modified date, 
	modified_by integer
);

create table Ressources (
	id integer auto_increment primary key,
	nom varchar(250), 
	code varchar(50), 
	types_ressource_id integer, 
	datedebutservice date, 
	datedebutcirculation date, 
	location_id integer,
	qte integer,
	created date, 
	modified date, 
	modified_by integer
);

create table Types_Ressources (
	id integer auto_increment primary key,
	libelle varchar(255),
	created date, 
	modified date, 
	modified_by integer
);

create table Materiels (
	id integer auto_increment primary key,
	ressource_id integer,
	created date, 
	modified date, 
	modified_by integer
);

create table Reparateurs (
	id integer auto_increment primary key,
	nom varchar(100) not null, 
	adresse varchar(300), 
	numeroFixe varchar(9), 
	numeroPortable varchar(10),
	created date, 
	modified date, 
	modified_by integer
);

drop table Reparations_Materiel;
create table Reparations_Materiels (
	id integer auto_increment primary key,
	materiel_id integer,
	reparateur_id integer, 
	datereparation date,
	cout real,  
	duree integer, 
	created date, 
	modified date, 
	modified_by integer
);

create table Proprietaires (
	id integer auto_increment primary key,
	nom varchar(100) not null, 
	adresse varchar(300), 
	numeroFixe varchar(9), 
	numeroPortable varchar(10),
	created date, 
	modified date, 
	 
	modified_by integer
);

create table Categories_Machine (
	id integer auto_increment primary key,
	libelle varchar(20),
	created date, 
	modified date, 
	 
	modified_by integer
);

create table Marques (
	id integer auto_increment primary key,
	nom varchar(100) not null, 
	adresse varchar(300), 
	numeroFixe varchar(9), 
	numeroPortable varchar(10),
	created date, 
	modified date, 
	 
	modified_by integer
);

create table Machines (
	id integer auto_increment primary key,
	proprietaire_id integer, 
	ressource_id integer,
	marque_id integer, 
	created date, 
	modified date, 
	modified_by integer
);

create table Locataires (
	id integer auto_increment primary key,
	nom varchar(100) not null, 
	adresse varchar(300), 
	numeroFixe varchar(9), 
	numeroPortable varchar(10),
	created date, 
	modified date, 
	 
	modified_by integer
);

create table Locations_Machine (
	id integer auto_increment primary key,
	machine_id integer,
	cout real,  
	locataire_id integer,
	datelocation date,
	duree integer,  
	created date, 
	modified date, 
	 
	modified_by integer
);

create table Pieces (
	id integer auto_increment primary key,
	nom varchar(20), 
	ref varchar(20), 
	description varchar(255), 
	created date, 
	modified date, 
	modified_by integer
);

create table Pieces_Ressources (
	id integer auto_increment primary key,
	ressource_id integer, 
	piece_id integer, 
	created date, 
	modified date,  
	modified_by integer
);

create table Garages (
	id integer auto_increment primary key,
	nom varchar(50), 
	adresse varchar(250),  
	numeroFixe varchar(255), 
	numeroPortable varchar(255), 
	created date, 
	modified date, 
	modified_by integer
);

create table roles(
	id integer auto_increment primary key,
	libellé integer, 
	created date, 
	modified date
); 

create table users(
	id integer auto_increment primary key,
	username VARCHAR(50) not null,
	email VARCHAR(255) not null, 
	password VARCHAR(255) not null,
	role_id VARCHAR(20),
	societe_id integer, 
	personnel_id integer,
	photo varchar(255),
	created date, 
	modified date
); 

create table Types_Gifts(
	id integer auto_increment primary key,
	libelle varchar(250),
	created date, 
	modified date
); 


create table Gifts(
	id integer auto_increment primary key,
	personne_id integer,  
	types_gift_id integer,
	qte integer, 
	montant real, 
	datecadeau date, 
	observation varchar(250),
	created date, 
	modified date
); 

create table profile (
	id integer auto_increment primary key, 
	image varchar(255), 	
	created date, 
	modified date
); 

--///modifications faites à la BD

alter table affaires add column dateaffaire date; 
alter table Correspondances_Sortantes add column fichier varchar(255);
alter table Correspondances_Entrantes add column fichier varchar(255);
alter table Correspondances_Entrantes add column objet varchar(255);
alter table Correspondances_Entrantes add column observation varchar(255);

--//07/01/2018
alter table Etats_Commissions add column cause varchar(255);
alter table Etats_Commissions add column datecommission date;
alter table affaires add etat_affaire_id integer;
alter table affaires add types_affaire_id integer;

drop table Etats_affaire; 
create table Etats_Affaires (
	id integer auto_increment primary key,
	affaire_id integer, 
	etat_id integer, 
	cause varchar(255), 
	created date, 
	modified date, 
	modified_by integer
); 
create table Types_Affaires (
	id integer auto_increment primary key,
	libelle varchar(255),  
	created date, 
	modified date, 
	modified_by integer
); 

drop table frais; 

drop table frais_projet; 

create table Frais_Projets (
	id integer auto_increment primary key,
	types_frais_id integer, 
	montant real,
	datefrais date,
	affaire_id integer, 
	observation varchar(255), 
	created date, 
	modified date, 
	modified_by integer
);

drop table frais_chantier;

create table Frais_Chantiers (
	id integer auto_increment primary key,
	types_frais_id integer, 
	montant real,
	datefrais date,
	chantier_id integer,
	observation varchar(255),  
	created date, 
	modified date,
	modified_by integer
);

drop table Correspondances_Sortantes;
drop table Correspondances_Entrantes; 

create table Correspondances_Sortantes (
	id integer auto_increment primary key,
	datecorrespondance date, 
	nombredocuments integer,
	numero integer,
	marche_id integer,
	destinataire_id integer,
	objet varchar(250), 
	observation varchar(500),
	created date, 
	modified date, 
	modified_by integer
);

create table Correspondances_Entrantes (
	id integer auto_increment primary key,
	numero integer,
	marche_id integer,
	dateenvoi date, 
	expediteur_id integer,
	created date, 
	modified date, 
	modified_by integer
);

alter table Frais_Projets drop column types_frais_id; 
alter table Frais_Projets drop column montant; 
alter table Frais_Projets drop column observation; 

create table Details_Frais_Projets (
	id integer auto_increment primary key,
	types_frais_id integer, 
	montant real,
	datefrais date,
	observation varchar(255),
	frais_projet_id integer,
	created date, 
	modified date, 
	modified_by integer
);

alter table frais_projets add column total real; 

create table Qualifications (
	id integer auto_increment primary key,
	libelle integer, 
	soumissionnaire_id integer,
	created date, 
	modified date, 
	modified_by integer
);

drop table Soumissions; 

create table Soumissions (
	id integer auto_increment primary key,
	soumissionnaire_id integer, 
	affaire_id integer,
	montant real, 
	delais varchar(255), 
	created date, 
	modified date, 
	modified_by integer
); 

drop table attributions; 

create table Attributions (
	id integer auto_increment primary key,
	dateattribution date, 
	soumission_id integer,
	observation varchar(255),
	created date, 
	modified date, 
	modified_by integer
);

alter table societes add column principal boolean; 

drop table Types_Assurrance;
drop table Assurances;
drop table Assurances_Personnel;

create table Types_Assurances (
	id integer auto_increment primary key,
	libelle varchar(250), 
	pourcentage integer,
	created date, 
	modified date, 
	modified_by integer
);

create table Assurances (
	id integer auto_increment primary key,
	types_assurance_id integer,
	personnel_id integer,
	created date, 
	modified date, 
	modified_by integer
);

create table Assurances_Personnels (
	id integer auto_increment primary key,
	assurance_id integer,
	dateassurance date, 
	montant real, 
	created date, 
	modified date,
	modified_by integer
);

drop table Details_Marche; 
create table Details_Marches (
	id integer auto_increment primary key,
	datedetails date, 
	marche_id integer,
	avenant_id integer,
	intitule varchar(255), 
	montant real,
	delai integer,
	created date, 
	modified date, 
	modified_by integer
);

drop table Etats_Marche; 
create table Etats_Marches (
	id integer auto_increment primary key,
	marche_id integer, 
	dateetat date, 
	ODS_id integer,
	etat_id integer,
	created date, 
	modified date, 
	modified_by integer
);

drop table Avances; 
create table Avances (
	id integer auto_increment primary key,
	marche_id integer, 
	montant real,
	numero integer, 
	dateremboursement date, 
	dateavance date, 
	etat varchar(20),
	created date, 
	modified date, 
	modified_by integer
);

drop table marches; 
create table Marches (
	id integer auto_increment primary key,
	affaire_id varchar(150), 
	numero integer,
	maitres_oeuvre_id integer,
	created date, 
	modified date, 
	modified_by integer
);

drop table Details_Marches; 
create table Details_Marches (
	id integer auto_increment primary key,
	datedetails date, 
	marche_id integer,
	avenant_id integer,
	intitule varchar(255), 
	montant real,
	delai int(5),
	created date, 
	modified date, 
	modified_by integer
);

drop table Lots;
create table Lots (
	id integer auto_increment primary key,
	devi_id integer,
	intitule varchar(500),
	numero integer,
	created date, 
	modified date, 
	modified_by integer
);

create table Types_Avances (
	id integer auto_increment primary key,
	libelle varchar(150), 
	pourcentage integer,
	created date, 
	modified date, 
	modified_by integer
);

alter table cautions modify etat varchar(250);

drop table Devis; 
create table Devis (
	id integer auto_increment primary key,
	marche_id integer,
	intitule varchar(255),
	datedevis date, 
	created date, 
	modified date, 
	modified_by integer
);

alter table avances add column types_avance_id integer; 

drop table ODSs; 
create table ODSs (
	id integer auto_increment primary key,
	dateODS date, 
	types_ODS_id integer,
	marche_id integer,
	document_id integer, 
	numero integer,
	observation varchar(255),
	fichier varchar(255),
	created date, 
	modified date, 	 
	modified_by integer
);



drop table Lots_Avenant; 
create table Lots_Avenants (
	id integer auto_increment primary key,
	avenant_id integer, 
	intitule varchar(250), 
	numero integer,
	created date, 
	modified date, 	 
	modified_by integer
);

drop table Parties_Avenant; 
create table Parties_Avenants (
	id integer auto_increment primary key,
	lots_avenant_id integer, 
	libelle varchar(250), 
	numero integer,
	created date, 
	modified date, 
	modified_by integer
);

drop table Articles_Avenant; 
create table Articles_Avenants (
	id integer auto_increment primary key,
	parties_avenant_id integer, 
	libelle varchar(250), 
	numero integer,
	created date, 
	modified date, 
	modified_by integer
);

drop table Details_Articles_Avenant; 
create table Details_Articles_Avenants (
	id integer auto_increment primary key,
	articles_avenant_id integer, 
	qte integer,
	unite_id integer,
	prix real,
	datedetailsavenant date,
	soustraitant_id integer,
	created date, 
	modified date, 
	modified_by integer
);

drop table Attachements_Travaux_Avenant; 
create table Attachements_Travaux_Avenants (
	id integer auto_increment primary key,
	details_articles_avenant_id integer, 
	qte integer,
	dateattachementavenant date,
	created date, 
	modified date, 
	modified_by integer
);

alter table Parties_Avenants drop column intitule; 
alter table Parties_Avenants add column libelle varchar(255); 

alter table Articles_Avenants drop column intitule; 
alter table Articles_Avenants add column libelle varchar(255); 

alter table Avenants add column intitule varchar(255); 

drop table Achats; 
create table Achats (
	id integer auto_increment primary key,
	departement_id integer, 
	total real, 
	tva integer,
	numero varchar(20),
	bons_reception_id integer, 
	fournisseur_id integer, 
	datebon date, 
	regle varchar(3), 
	modes_reglement_id integer, 
	created date, 
	modified date, 
	modified_by integer
);

drop table Achats_Details; 
create table Achats_Details (
	id integer auto_increment primary key,
	prix real, 
	qte integer, 
	achat_id integer,
	stock_id integer,
	created date, 
	modified date, 
	modified_by integer
);

create table Types_Stocks (
	id integer auto_increment primary key,
	libelle varchar(30),
	created date, 
	modified date, 
	modified_by integer
);

create table Stocks (
	id integer auto_increment primary key,
	datestock date,  
	qte integer,
	prix real,
	depot_id integer, 
	achats_detail_id integer, 
	produit_id integer,
	created date, 
	modified date, 
	modified_by integer
);

create table Dettes (
	id integer auto_increment primary key, 
	datedette date, 
	achat_id integer,
	etat varchar(20),
	created date, 
	modified date, 
	modified_by integer
);

create table Versements (
	id integer auto_increment primary key,
	dateversement date, 
	montant real, 
	dette_id integer,
	created date, 
	modified date, 
	modified_by integer
);

create table Bons_Receptions (
	id integer auto_increment primary key,
	achat_id integer,  
	bons_commande_id integer, 
	datereception date, 
	observation varchar(250),
	created date, 
	modified date, 
	modified_by integer
);

create table Details_Bon_Reception (
	id integer auto_increment primary key,
	bons_reception_id integer,  
	produit_id integer, 
	qte integer,
	prix real, 
	created date, 
	modified date, 
	modified_by integer
);

alter table Devis add column avenant_id integer; 

drop table Attachements_Travaux;
create table Attachements_Travaux (
	id integer auto_increment primary key,
	devi_id integer,
	intitule varchar(255),
	dateattachement date,
	created date, 
	modified date, 
	modified_by integer
);

create table Details_Attachements (
	id integer auto_increment primary key,
	Attachements_Travail_id integer, 
	details_article_id integer,
	qte integer,
	created date, 
	modified date, 
	modified_by integer
);

alter table Remboursements_Avance add column situation_id integer; 

create table Situations (
	id integer auto_increment primary key,
	Attachements_Travail_id integer, 
	datesituation date,
	total real, 
	observation varchar(255),
	created date, 
	modified date, 
	document_id integer, 
	modified_by integer
);

create table Situations_Details (
	id integer auto_increment primary key,
	situation_id integer,
	qte real, 
	created date, 
	modified date, 
	modified_by integer
);

alter table PVs add column document_id integer; 
drop table Types_Stocks ;
alter table depots add column wilaya_id; 

create table Emails(
	id integer auto_increment primary key,
	destinataire varchar(250),
	expediteur varchar(250),
	objet varchar(250),
	dateenvoi date,
	message varchar(750), 
	document_id integer,
	etat varchar(50), 
	created date, 
	modified date
);

/*
create table Attachements(
	id integer auto_increment primary key,
	email_id integer,
	document_id integer,
	created date, 
	modified date
);*/

alter table achats add column document_id integer; 
alter table avenants add column document_id integer; 
alter table avances add column document_id integer; 
alter table cautions add column document_id integer; 
alter table commissions add column document_id integer; 
alter table frais_projets add column document_id integer; 
alter table marches add column document_id integer; 
alter table ODSs add column document_id integer; 
alter table devis add column document_id integer; 
alter table pvs add column document_id integer; 


drop table Reparations_Materiel;
create table Reparations_Materiels (
	id integer auto_increment primary key,
	materiel_id integer,
	reparateur_id integer, 
	datereparation date,
	cout real,  
	duree integer, 
	created date, 
	modified date, 
	modified_by integer
);

create table Parcs(
	id integer auto_increment primary key,
	libelle varchar(255), 
	adresse varchar(500), 
	wilaya_id integer, 
	delai integer, 
	dateexploitation date, 
	created date, 
	modified date, 
	modified_by integer
);

create table Locations (
	id integer auto_increment primary key,
	departement_id integer, 
	total real, 
	tva integer,
	numero varchar(20),
	proprietaire_id integer, 
	datelocation date, 
	regle varchar(3), 
	modes_reglement_id integer, 
	created date, 
	modified date, 
	modified_by integer
);

drop table Locations_Details; 
/*create table Locations_Details (
	id integer auto_increment primary key,
	prix real, 
	qte integer, 
	location_id integer,
	stocks_location_id integer,
	created date, 
	modified date, 
	modified_by integer
);*/

drop table Stocks_Locations; 
/*create table Stocks_Locations (
	id integer auto_increment primary key,
	datestock date,  
	qte integer,
	prix real,
	depot_id integer, 
	locations_detail_id integer, 
	produit_id integer,
	created date, 
	modified date, 
	modified_by integer
);*/

create table Dettes_Locations (
	id integer auto_increment primary key, 
	datedette date, 
	location_id integer,
	etat varchar(20),
	created date, 
	modified date, 
	modified_by integer
);

create table Versements_Locations (
	id integer auto_increment primary key,
	dateversement date, 
	montant real, 
	dettes_location_id integer,
	created date, 
	modified date, 
	modified_by integer
);

create table Gardiens (
	id integer auto_increment primary key,
	personnel_id integer, 
	created date, 
	modified date, 
	modified_by integer
);


create table Responsables_Parcs(
 	id integer auto_increment primary key,
 	parc_id integer, 
 	responsable_id integer, 
	created date, 
	modified date, 
	modified_by integer
);

create table Gardiens_Parcs(
 	id integer auto_increment primary key,
 	parc_id integer, 
 	gardien_id integer, 
	created date, 
	modified date, 
	modified_by integer
);  

create table Parcs_Ressources(
 	id integer auto_increment primary key,
 	parc_id integer, 
 	ressource_id integer, 
 	dateparc date, 
	created date, 
	modified date, 
	modified_by integer
);  

create table Cheques_Locations (
	id integer auto_increment primary key,
	numero integer,
	etat integer, 
	location_id  integer,
	created date, 
	modified date, 
	modified_by integer
);

create table Locations_Details (
	id integer auto_increment primary key,
	prix real, 
	duree integer, 
	details_location_id integer,
	created date, 
	modified date, 
	modified_by integer
);

create table Chantiers (
	id integer auto_increment primary key,
	libelle varchar(250), 
	marche_id integer, 
	etats_chantier_id integer, 
	responsable_id integer, 
	created date, 
	modified date, 
	modified_by integer
);

create table Etats_Chantiers (
	id integer auto_increment primary key,
	chantier_id integer, 
	types_etats_chantier_id integer, 
	dateetat date, 
	created date, 
	modified date, 
	modified_by integer
);

create table Types_Etats_Chantiers (
	id integer auto_increment primary key,
	libelle varchar(250),
	created date, 
	modified date, 
	modified_by integer
);


create table Fonctions_Chantiers (
	id integer auto_increment primary key,
	fonction_id varchar(250), 
	created date, 
	modified date, 
	modified_by integer
);

create table Positions (
	id integer auto_increment primary key,
	personnel_id integer,
	dateposition date,  
	created date, 
	modified date, 
	modified_by integer
);

create table Positions_Chantiers (
	id integer auto_increment primary key,
	position_id integer,
	fonction_id integer, 
	chantier_id integer, 
	created date, 
	modified date, 
	modified_by integer
);

create table Fonctions_Administratives (
	id integer auto_increment primary key,
	fonction_id integer, 
	created date, 
	modified date, 
	modified_by integer
);

create table Positions_Administratives (
	id integer auto_increment primary key,
	position_id integer, 
	fonction_id integer, 
	departement_id integer,
	created date, 
	modified date,  
	modified_by integer
);

create table Contrats (
	id integer auto_increment primary key,
	numero integer, 
	dateetablissement date, 
	durée integer, 
	type varchar(3),
	document_id integer, 
	created date, 
	modified date, 
	modified_by integer
);

create table Types_Contrats(
	id integer auto_increment primary key, 
	libelle varchar(255),
	created date, 
	modified date, 
	modified_by integer
);

create table Etats_Contrats(
	id integer auto_increment primary key, 
	contrat_id integer,
	types_etats_contrat_id integer,
	created date, 
	modified date, 
	modified_by integer
);

create table Types_Etats_Contrats(
	id integer auto_increment primary key, 
	libelle varchar(255),
	created date, 
	modified date, 
	modified_by integer
);

create table Contrats_Personnels(
	id integer auto_increment primary key, 
	contrat_id integer,
	personnel_id integer, 
	created date, 
	modified date, 
	modified_by integer
);

create table Types_Etats_Ressource (
	id integer auto_increment primary key,
	libelle varchar(250), 
	created date, 
	modified date, 
	modified_by integer
);

create table Etats_Ressources (
	id integer auto_increment primary key,
	cause varchar(250),
	ressource_id integer, 
	types_etat_ressource_id integer,
	dateetat date, 
	created date, 
	modified date, 
	modified_by integer
);

create table Affectations (
	id integer auto_increment primary key,
	ressource_id integer,
	duree integer, 
	dateaffectation date, 
	created date, 
	modified date, 
	modified_by integer
);

create table Affectations_Chantier (
	id integer auto_increment primary key,
	personnel_id integer,
	affectation_id integer,
	chantier_id integer,  
	created date, 
	modified date, 
	modified_by integer
);

create table Affectations_Administration (
	id integer auto_increment primary key,
	personnel_id integer,
	affectation_id integer,
	departement_id integer,  
	created date, 
	modified date, 
	modified_by integer
);

create table Stocks_Ressources (
	id integer auto_increment primary key,
	stock_id integer,
	ressource_id integer,
	qte integer,  
	created date, 
	modified date, 
	modified_by integer
);

create table Entretiens (
	id integer auto_increment primary key,
	libelle varchar(255), 
	cout real, 
	duree integer, 
	periode_id integer,  
	created date, 
	modified date, 
	modified_by integer
);

create table Periodes(
	id integer auto_increment primary key,
	libelle varchar(255),
	created date, 
	modified date, 
	modified_by integer 
);

create table Entretiens_Ressources (
	id integer auto_increment primary key,
	ressource_id integer,
	datedebut date, 
	entretien_id integer,  
	created date, 
	modified date, 
	modified_by integer
);

create table Entretiens_Ressources_Periodiques (
	id integer auto_increment primary key,
	entretiens_ressource_id integer,
	garage_id integer,  
	dateentretien date, 
	duree integer, 
	etat varchar(50),
	created date, 
	modified date, 
	modified_by integer
);

create table ODSs_Chantiers(
	id integer auto_increment primary key,	
	ODS_id integer, 
	chantier_id integer,
	created date, 
	modified date, 
	modified_by integer
);

create table Tasks(
	id integer auto_increment primary key,	
	intitule varchar(255),
    datedebut date,
    datefin date,
    details varchar(750),
	personne_id integer,
	created date, 
	modified date, 
	modified_by integer
);

create table Status(
	id integer auto_increment primary key,	
	task_id integer, 
	types_statu_id integer,
	created date, 
	modified date, 
	modified_by integer
);

create table Types_Status(
	id integer auto_increment primary key,	
	libelle varchar(50), 
	created date, 
	modified date, 
	modified_by integer
);

create table Pannes (
	id integer auto_increment primary key,
	ressource_id integer, 
	datepanne date,
	cause varchar(200), 
	duree integer, 
	created date, 
	modified date, 
	modified_by integer
);

create table Reparations (
	id integer auto_increment primary key,
	panne_id integer, 
	garage_id integer,
	datereparation date, 
	cout real, 
	duree integer,  
	created date, 
	modified date, 
	modified_by integer
);