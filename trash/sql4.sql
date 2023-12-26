#1
SELECT `firstName`,`lastName` FROM employees WHERE  `officeCode` IN (SELECT `officeCode` FROM offices WHERE country = "USA") 
#2
SELECT customerNumber FROM payments WHERE amount = ( SELECT MAX(amount) FROM payments );
#3
SELECT customerNumber FROM payments WHERE amount>(SELECT AVG(amount) FROM payments);
#4
SELECT customerNumber FROM customers WHERE customerNumber!=ANY(SELECT customerNumber FROM orders)
#5
SELECT ROUND(AVG(e)),ROUND(MIN(e)),ROUND(MAX(e)) FROM (SELECT DISTINCT orderNumber,SUM(quantityOrdered) as `e` FROM orderdetails GROUP BY orderNumber) as e1
#6
SELECT `productCode` FROM products as e WHERE buyPrice > (SELECT AVG(`buyPrice`) as f FROM products WHERE e.productLine=productLine) 
#7
SELECT orderNumber From orders WHERE orderNumber in (SELECT orderNumber,SUM(`priceEach`*`quantityOrdered`) FROM orderdetails GROUP BY orderNumber HAVING SUM(`priceEach`*`quantityOrdered`)>60000)
#8
SELECT customerNumber From orders WHERE orderNumber IN (SELECT orderNumber FROM orderdetails GROUP BY orderNumber HAVING SUM(`priceEach`*`quantityOrdered`)>60000) 
#9
SELECT orderNumber, SUM(`priceEach`*`quantityOrdered`) FROM orderdetails WHERE orderNumber IN (SELECT orderNumber FROM orders WHERE YEAR(`orderDate`)="2003") GROUP BY  orderNumber ORDER BY SUM(`priceEach`*`quantityOrdered`) DESC LIMIT 5
#10
