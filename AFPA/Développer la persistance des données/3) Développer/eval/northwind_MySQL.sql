SELECT CompanyName 
AS 'Société', ContactName AS 'Contact', ContactTitle AS 'Fonction  du contact', phone AS 'Télephone' 
FROM suppliers 
WHERE country = 'France';

SELECT ProductName AS 'Produit', unitPrice AS 'Prix' 
FROM products 
WHERE supplierID = 1;

SELECT CompanyName AS 'Fournisseur', COUNT(productname) AS 'Nbr' 
FROM suppliers 
inner JOIN products ON suppliers.SupplierID = products.supplierID 
WHERE country = 'France' 
GROUP BY companyname
ORDER BY COUNT(productname) DESC;

SELECT Customers.CompanyName AS 'client', COUNT(orderid) AS 'nbre' 
FROM customers
INNER JOIN orders ON customers.CustomerID = orders.CustomerID
WHERE  Customers.country = 'France' 
GROUP by CompanyName
HAVING count(orderid) > 10 ;

SELECT
`customers`.`CompanyName` AS `Client`,
SUM(`order details`.`UnitPrice` * `order details`.`Quantity`) as `CA`,
`customers`.`Country` AS `Pays`
FROM ((`customers`
INNER JOIN `orders` ON `orders`.`CustomerID` = `customers`.`CustomerID`)
INNER JOIN `order details` ON `order details`.`OrderID` = `orders`.`OrderID`)
GROUP BY `customers`.`CustomerID`
HAVING `CA` > 30000
ORDER BY `CA` DESC;

SELECT customers.country AS 'pays' 
FROM customers
INNER JOIN orders ON customers.CustomerID = orders.CustomerID
INNER JOIN `order details` ON orders.orderid = `order details`.orderid
INNER JOIN products ON `order details`.productid = products.ProductID
INNER JOIN suppliers ON products.SupplierID = suppliers.supplierid
WHERE suppliers.supplierid = 1
GROUP BY customers.country;

SELECT SUM(unitprice * quantity) AS 'montant 97' 
FROM orders
INNER JOIN `order details`ON orders.OrderID = `order details`.orderid
WHERE YEAR(orderdate) = 1997;

SELECT month(orderdate) AS 'mois 97', SUM(unitprice * quantity) AS 'montant vente 97' 
FROM orders
INNER JOIN `order details` ON orders.OrderID = `order details`.orderid
WHERE YEAR(orderdate) = 1997
GROUP BY MONTH(orderdate);

SELECT max(orderdate) 
FROM orders
INNER JOIN customers ON customers.CustomerID = orders.CustomerID
WHERE companyname = 'Du monde entier';

SELECT round(AVG(datediff(shippeddate, orderdate))) 
FROM orders;
