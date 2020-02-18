delimiter -

create trigger modif_reservation before update on reservation
    for each row
    begin
        signal sqlstate '40000' set message_text = 'modification interdite !!!!!!!!!!';
    end-

create trigger insert_reservation before insert on reservation
    for each row
    begin
        declare nbr_reservation int;
        set nbr_reservation = count(num_client);
        if nbr_reservation>=10 then
            signal sqlstate '40000' set message_text = '10 réservations sont déja enregistrées!';
        end if;
    end-


create trigger insert_reservation2 after insert on reservation
    for each row 
    begin
    declare 
        set nbr_reservation = 


create trigger insert_chambre after before on reservation
    for each row 
    begin
        declare nbr_chambre int;
        set nbr_chambre = sum(capacite_chambre);
        if nbr_chambre>50 then
            signal sqlstate '40000' set message_text = 'plus de 50 chambres disponible';
        end if;
    end-





