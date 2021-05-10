-- 1. Retrieve customer information (all fields) where customer_id is 20
SELECT * FROM customer WHERE customer_id = 20;

-- 2. Retrieve customer information (all fields) where customer_id is BETWEEN 20 and 60
SELECT * FROM customer WHERE customer_id BETWEEN 20 and 60;

-- 3. Retrieve customer information (all fields) WHERE first_name starts with L
SELECT * FROM customer WHERE first_name LIKE 'l%';

-- 4. Retrieve customer information (all fields) WHERE first_name includes L.
SELECT * FROM customer WHERE first_name LIKE '%l%';

-- 5. Retrieve customer information (all fields) WHERE first_name ends with L
SELECT * FROM customer WHERE first_name LIKE '%l';

-- 6. Retrieve customer information (all fields) WHERE last_name starts with C and have the results be shown, starting with the record where it was created most recently.
SELECT * FROM customer WHERE last_name LIKE 'c%' ORDER BY create_date DESC, last_name ASC;

-- 7. Retrieve customer information (all fields) WHERE last_name includes NN.  Only have it retrieve the top 5 records, where the first record shown is the oldest customer (in terms of the create_date)
SELECT * FROM customer WHERE last_name LIKE '%nn%' ORDER BY create_date ASC LIMIT 5;

-- 8. Retrieve customer information (customer_id, first_name, last_name, and email address only) for customers with the following customer_id 515, 181, 582, 503, 29, 85.
SELECT customer_id, first_name, last_name, email FROM customer WHERE customer_id IN (515, 181, 582, 503, 29, 85);

-- 9. Retrieve customer information where store_id is 2.  Now when displaying the columns, instead of the column name be 'email', have it appear as 'email_address'.
SELECT first_name, last_name, email AS email_address, store_id FROM customer WHERE store_id = 2;

-- 10. Retrieve customer information (only the first_name, last_name, and email) but order the result with the email address in the DESC order.
SELECT first_name, last_name, email FROM customer ORDER BY email DESC;

-- 11. Retrieve only 'active' customer information (only the customer_id, first_name, last_name, and email) and where their record was created in the month of February.
SELECT customer_id, first_name, last_name, email FROM customer WHERE active=1 AND create_date LIKE '%-02-%';

-- 12. Retrieve customer records (email field as well as email_length field) where the customer with the longest email address is shown first.  If customers have the same length of email address, order the list by the email field in the ASC order (meaning it shows email address that starts with 'A' first).
SELECT email, LENGTH(email) AS email_length FROM customer ORDER BY email_length DESC, email ASC;

-- 13. Now retrieve top 100 customer records with the shortest email address.
SELECT email, LENGTH(email) AS email_length FROM customer ORDER BY email_length ASC LIMIT 100;


