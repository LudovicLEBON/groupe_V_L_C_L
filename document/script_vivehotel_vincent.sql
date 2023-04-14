-- création bases de données vivehotel

create database
    if not exists vivehotel default character set utf8 collate utf8_general_ci;

use vivehotel;

set foreign_key_checks = 0;

-- création table hotel

drop table if exists hotel;

create table
    hotel (
        hot_id int auto_increment primary key,
        hot_nom varchar(500) not null,
        hot_telephone varchar(10) not null,
        hot_adresse varchar(500) not null,
        hot_longitude int not null,
        hot_latitude int not null,
        hot_photo varchar(500) not null,
        hot_descriptif varchar(500) not null,
        hot_statut varchar(500) not null,
        hot_standing int not null
    ) engine = innodb;

-- création table standing

drop table if exists standing;

create table
    standing (
        sta_id int auto_increment primary key,
        sta_libelle varchar(100) not null
    ) engine = innodb;

-- création table chambre

drop table if exists chambre;

create table
    chambre (
        cha_id int auto_increment primary key,
        cha_nom varchar(500) not null,
        cha_photo varchar(500) not null,
        cha_descriptif varchar(500) not null,
        cha_statut varchar(100) not null,
        cha_surface int not null,
        cha_type_lit varchar(100) not null,
        cha_jacuzzi bool,
        cha_balcon bool,
        cha_wifi bool,
        cha_minibar bool,
        cha_coffre bool,
        cha_vue bool,
        cha_categorie int not null,
        cha_hotel int not null
    ) engine = innodb;

-- création table catégorie

drop table if exists categorie;

create table
    categorie (
        cat_id int auto_increment primary key,
        cat_libelle varchar(100) not null
    ) engine = innodb;

-- création table individu

drop table if exists individu;

create table
    individu (
        ind_id int auto_increment primary key,
        ind_nom varchar(100) not null,
        ind_prenom varchar(100) not null,
        ind_login varchar(200) not null,
        ind_pwd varchar(500) not null,
        ind_profil int not null,
        ind_hotel int
    ) engine = innodb;

-- création table profil

drop table if exists profil;

create table
    profil (
        pro_id int auto_increment primary key,
        pro_libelle varchar(100) not null
    ) engine = innodb;

-- création table client

drop table if exists client;

create table
    client (
        cli_id int auto_increment primary key,
        cli_nom varchar(500) not null,
        cli_prenom varchar(500) not null,
        cli_login varchar(500) not null,
        cli_pwd varchar(500) not null,
        cli_profil int not null
    ) engine = innodb;

-- création table reservation

drop table if exists reservation;

create table
    reservation (
        res_id int auto_increment primary key,
        res_date_creation datetime not null,
        res_date_maj datetime not null,
        res_date_debut_sejour date not null,
        res_date_fin_sejour date not null,
        res_prix_total float not null,
        res_etat varchar(100) not null,
        res_client int not null,
        res_hotel int not null,
        res_chambre int not null,
        res_commende varchar(500)
    ) engine = innodb;

-- création table services

drop table if exists services;

create table
    services (
        ser_id int auto_increment primary key,
        ser_libelle varchar(100) not null
    ) engine = innodb;

-- création table donnerAcces

drop table if exists donnerAcces;

create table
    donnerAcces (
        don_id int auto_increment primary key,
        don_reservation int not null,
        don_service int not null,
        don_quantite int not null
    ) engine = innodb;

-- création table prestation

drop table if exists prestation;

create table
    prestation (
        pre_id int auto_increment primary key,
        pre_service int not null,
        pre_hotel int not null,
        pre_prix int not null
    ) engine = innodb;

-- création table tarifer

drop table if exists tarifer;

create table
    tarifer (
        tar_id int auto_increment primary key,
        tar_standing int not null,
        tar_categorie int not null,
        tar_prix int not null
    ) engine = innodb;

set foreign_key_checks = 1;

-- les views

drop view if exists CASERHOTEL;

CREATE VIEW CASERHOTEL AS 
	select
	    hot_nom,
	    sum(pre_prix * don_quantite) CAservices
	from
	    prestation,
	    donnerAcces,
	    hotel,
	    reservation
	where
	    pre_service = don_service
	    and pre_hotel = hot_id
	    and don_reservation = res_id
	    and res_etat = "validée"
	group by hot_nom
	order by CAservices
DESC; 

drop view if EXISTS CAHOTELIER;

CREATE VIEW CAHOTELIER AS 
	select
	    hot_nom,
	    sum(
	        tar_prix * (
	            res_date_fin_sejour - res_date_debut_sejour
	        )
	    ) CA
	from
	    reservation,
	    hotel,
	    tarifer,
	    chambre
	where
	    res_hotel = hot_id
	    and res_etat = "validée"
	    and hot_standing = tar_standing
	    and cha_categorie = tar_categorie
	    and res_etat = "validée"
	group by res_hotel
	order by CA
DESC; 

drop view if EXISTS MAXCA;

CREATE VIEW MAXCA AS 
	select
	    max(CAservices + CA) CAmax
	from CASERHOTEL, CAHOTELIER
	where
	    CASERHOTEL.hot_nom = CAHOTELIER.hot_nom
; 

drop view if EXISTS CAGROUP;

CREATE VIEW CAGROUP AS 
	select
	    sum(CAservices + CA) CAglobal
	from CASERHOTEL, CAHOTELIER
	where
	    CASERHOTEL.hot_nom = CAHOTELIER.hot_nom
; 

-- contraintes

alter table hotel
add
    constraint cs1 foreign key (hot_standing) references standing(sta_id) on delete cascade;

alter table chambre
add
    constraint cs2 foreign key (cha_categorie) references categorie(cat_id) on delete cascade;

alter table chambre
add
    constraint cs3 foreign key (cha_hotel) references hotel(hot_id) on delete cascade;

alter table individu
add
    constraint cs4 foreign key (ind_profil) references profil(pro_id) on delete cascade;

alter table individu
add
    constraint cs5 foreign key (ind_hotel) references hotel(hot_id) on delete cascade;

alter table client
add
    constraint cs6 foreign key (cli_profil) references profil(pro_id) on delete cascade;

alter table reservation
add
    constraint cs7 foreign key (res_client) references client(cli_id) on delete cascade;

alter table reservation
add
    constraint cs8 foreign key (res_hotel) references hotel(hot_id) on delete cascade;

alter table reservation
add
    constraint cs9 foreign key (res_chambre) references chambre(cha_id) on delete cascade;

alter table donnerAcces
add
    constraint cs10 foreign key (don_reservation) references reservation(res_id) on delete cascade;

alter table donnerAcces
add
    constraint cs11 foreign key (don_service) references services(ser_id) on delete cascade;

alter table prestation
add
    constraint cs12 foreign key (pre_service) references services(ser_id) on delete cascade;

alter table prestation
add
    constraint cs13 foreign key (pre_hotel) references hotel(hot_id) on delete cascade;

alter table tarifer
add
    constraint cs14 foreign key (tar_standing) references standing(sta_id) on delete cascade;

alter table tarifer
add
    constraint cs15 foreign key (tar_categorie) references categorie(cat_id) on delete cascade;

-- génération données table profil

insert into profil
values (null, "visitor"), (null, "user"), (null, "moderator"), (null, "admin");