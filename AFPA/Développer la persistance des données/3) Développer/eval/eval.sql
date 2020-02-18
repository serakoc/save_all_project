create trigger verif_commande before insert on `order details`
for each row 
begin
	 
	declare pays_client varchar(50);
	declare pays_fournisseur varchar(50);

	set pays_client = (SELECT DISTINCT country 
		from customers, Orders 
		where `Orders.OrderID` = NEW.OrderID 
		AND
		`orders.CustomerID` = `customers.CustomerID`
	);
	 
	set pays_fournisseur = (SELECT DISTINCT country 
		from suppliers
		join products on `products.supplierID` = `suppliers.supplierID`
		join `order details` on `order details`.`productID` = products.productID
		where `products.productID` = NEW.productID);
	
	if (pays_fournisseur <> pays_client) then
		signal sqlstate '40000' set message_text = 'livraison pas possible';
	end if;
	
end;
