--1.	Liste des hôtels avec le nombre de chambres actives.

select
    hot_id,
    count(cha_id) nbChambresActives
from hotel, chambre
where
    cha_hotel = hot_id
    and cha_statut = "occupée"
group by hot_id
order by
    nbChambresActives desc;

--2.	Liste des chambres triée par hôtel.

select
    cha_id,
    cha_nom,
    hot_nom
from chambre, hotel
where cha_hotel = hot_id
group by cha_id
order by hot_id;

--3.	Liste des réservations avec leurs durées (en jours) triées par hôtel, par date de début et par statut.

select
    res_id,
    cha_nom,
    hot_nom,
    cli_login nom_client,
    res_date_debut_sejour,
    res_date_fin_sejour,
    res_etat, (
        res_date_fin_sejour - res_date_debut_sejour
    ) nbjours
from
    reservation,
    client,
    chambre,
    hotel
where
    res_chambre = cha_id
    and res_client = cli_id
    and res_hotel = hot_id
order by
    res_hotel,
    res_etat --4.	Liste des réservations entre 2 dates données pour un hôtel donné.
select
    res_id,
    cha_nom,
    hot_nom,
    cli_login,
    res_date_debut_sejour,
    res_date_fin_sejour,
    res_etat,
    res_prix_total
from
    reservation,
    hotel,
    chambre,
    client
where
    res_hotel = 50
    and res_chambre = cha_id
    and res_client = cli_id
    and res_hotel = hot_id
    and not (
        res_date_fin_sejour < "2022-12-24"
        or res_date_debut_sejour > "2022-12-31"
    );

--5.	Nombre de réservations entre 2 dates données par hôtel.

select hot_id, count(res_id)
from reservation, hotel
where
    res_hotel = hot_id
    and not (
        res_date_fin_sejour < "2022-12-24"
        or res_date_debut_sejour > "2022-12-31"
    )
group by hot_id;

--6.	Nombre d’hôtels par catégorie d’hôtel.

select
    sta_libelle,
    count(hot_id)
from standing, hotel
where hot_standing = sta_id
group by sta_libelle;

--7.	Nombre de chambres par catégorie de chambre.

select
    cat_libelle,
    count(cha_id)
from chambre, categorie
where cha_categorie = cat_id
group by cat_libelle;

--8.	Requête donnant la durée (en nombre d’heures) d’une location.

select
    res_id, (
        datediff(
            res_date_fin_sejour,
            res_date_debut_sejour
        ) * 20
    ) nbheurs
from reservation
where res_id = 18;

--9.	Liste les chambres libres entre deux dates données pour un hôtel donné.

select
    cha_id,
    cha_nom,
    hot_nom,
    cha_statut,
    res_date_debut_sejour,
    res_date_fin_sejour
from
    chambre,
    hotel,
    reservation
where
    cha_hotel = hot_id
    and cha_statut = "libre"
    and cha_hotel = 10
    and not (
        res_date_fin_sejour < "2022-12-24"
        or res_date_debut_sejour > "2022-12-31"
    );

--10.	Calcul du prix d’une réservation hors services.

select
    res_id,
    res_chambre,
    cha_categorie,
    res_hotel,
    hot_standing,
    tar_categorie,
    tar_standing,
    tar_prix prix_res
from
    reservation,
    chambre,
    hotel,
    tarifer
where
    res_hotel = hot_id
    and res_chambre = cha_id
    and hot_standing = tar_standing
    and cha_categorie = tar_categorie;

--11.	Calcul des services consommés par client.

select
    res_client,
    sum(don_quantite) nbserviceconsommé
from donnerAcces, reservation
where res_id = don_reservation
group by res_client;

--12.	Liste des services, avec pour chacun le nombre d’hôtels qui le proposent.

select
    ser_libelle,
    count(pre_hotel) nbhotelpropose
from services, prestation
where pre_service = ser_id
group by ser_libelle;

--13.	Chiffre d’affaire annuel par hôtel (hors services).

select
    res_hotel,
    hot_nom,
    sum(tar_prix) CA
from
    reservation,
    hotel,
    tarifer,
    chambre
where
    res_hotel = hot_id
    and hot_standing = tar_standing
    and cha_categorie = tar_categorie
group by res_hotel
order by CA desc;

--14.	Chiffre d’affaire annuel du groupe (hors services).

select sum(tar_prix) CA
from
    reservation,
    hotel,
    tarifer,
    chambre
where
    res_hotel = hot_id
    and hot_standing = tar_standing
    and cha_categorie = tar_categorie;

--15.	Chiffre d’affaire annuel des services par hôtel

select
    sum(pre_prix * don_quantite) CAservices,
    pre_hotel,
    hot_nom
from
    prestation,
    donnerAcces,
    services,
    hotel,
    reservation
where
    pre_service = ser_id
    and pre_hotel = hot_id
    and don_reservation = res_id
group by pre_hotel
order by CAservices desc;

--16.	Chiffre d’affaire annuel des services pour le groupe

select
    sum(pre_prix * don_quantite) CAservices
from
    prestation,
    donnerAcces,
    services,
    hotel,
    reservation
where
    pre_service = ser_id
    and pre_hotel = hot_id
    and don_reservation = res_id;

--17.	Calcul du chiffre d’affaire journalier maximum théorique (hôtel plein).

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

CREATE VIEW MAXCA AS 
	select
	    max(CAservices + CA) CAmax
	from CAserhotel, CAhotelier
	where
	    CAserhotel.hot_nom = CAhotelier.h
HOT_NOM; 

CREATE VIEW CAGROUP AS 
	select
	    sum(CAservices + CA) CAglobal
	from CAserhotel, CAhotelier
	where
	    CAserhotel.hot_nom = CAhotelier.hot_nom
; 

/ / ---------------------------------------------
reservation --autre
select
    max( (CAservice + CA)) CAjour
from (
        select
            sum(pre_prix * don_quantite) CAservices
        from
            prestation,
            donnerAcces,
            services,
            hotel,
            reservation
        where
            pre_service = ser_id
            and pre_hotel = hot_id
            and don_reservation = res_id;

) CAservice, (
    select sum(tar_prix) CA
    from
        reservation,
        hotel,
        tarifer,
        chambre
    where
        res_hotel = hot_id
        and hot_standing = tar_standing
        and cha_categorie = tar_categorie
        and res_date_debut_sejour > "2022-01-01"
        and res_date_fin_sejour > "2022-12-31";

) CA where res_date_fin_sejour==res_date_debut+1;