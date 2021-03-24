-- 1:
SELECT * FROM customer WHERE customer_id = 20;
-- 2:
SELECT * FROM customer WHERE customer_id BETWEEN 20 and 60;
-- 3:
SELECT * FROM customer WHERE first_name LIKE 'l%';
-- 4:
SELECT * FROM customer WHERE first_name LIKE '%l%';
-- 5:
SELECT * FROM customer WHERE first_name LIKE '%l';
-- 6:
SELECT * FROM customer WHERE last_name LIKE 'c%' ORDER BY create_date DESC;
-- 7:
SELECT * FROM customer WHERE last_name LIKE '%nn%' ORDER BY create_date ASC LIMIT 5;
-- 8:
SELECT customer_id, first_name, last_name, email FROM customer WHERE customer_id IN (515, 181, 582, 503, 29, 85);
-- 9:
SELECT * FROM customer WHERE store_id = 2;
ALTER TABLE customer CHANGE email email_address varchar(255);
-- 10:
SELECT first_name, last_name, email FROM customer ORDER BY email DESC;
-- 11:
SELECT customer_id, first_name, last_name, email FROM customer WHERE active=1 AND create_date LIKE '%-02-%';
-- 12:
ALTER TABLE customer
ADD email_length INT(255); --Run first

SELECT email, LENGTH(email) AS email_length FROM customer ORDER BY email_length DESC; --Run second
-- 13:
SELECT email, LENGTH(email) AS email_length FROM customer ORDER BY email_length ASC LIMIT 100;

