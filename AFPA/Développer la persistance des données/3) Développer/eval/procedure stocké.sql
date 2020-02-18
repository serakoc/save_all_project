delimiter -

create procedure nocmd_by_companyname(in company varchar(50))

begin
	SELECT max(orderdate) 
	FROM orders
	INNER JOIN customers ON customers.CustomerID = orders.CustomerID
	WHERE companyname = company;
end -

delimiter;
--------------------------------------
delimiter -