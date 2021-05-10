-- 1. What's the query for creating this new database table with the fields above?
CREATE DATABASE hackerhero_practice;
CREATE TABLE Users (
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL ,
	first_name VARCHAR(255),
    last_name VARCHAR(255),
    email VARCHAR(255),
    encrypted_password VARCHAR(255),
    created_at DATETIME,
    updated_at DATETIME
);

-- 2. What's the query for inserting new records into this table?  Write queries for inserting three fake users into the table (one query for each insert).
INSERT INTO users (first_name, last_name, email, encrypted_password)
VALUES ('Jayne2', 'Doe2', 'jaynedoe2@gmail.com', '374103471094');

INSERT INTO users (first_name, last_name, email, encrypted_password)
VALUES ('Foo', 'Bar', 'foobar@gmail.com', '12312312312321');

INSERT INTO users (first_name, last_name, email, encrypted_password)
VALUES ('Baz', 'Foo', 'bazfoo@gmail.com', '12312312312');

-- 3. What's the query for updating one of the user records?  For example, if you wanted to update the user record for id = 1, with some fake data, what would the query be?
UPDATE users 
SET first_name = 'Harry', last_name = 'Potter', email = 'harrypotter@wizard.com', encrypted_password = 'harrywashere'
WHERE id = 1;

-- 4. What query would you run for updating all of the user records with the last_name of 'Choi'?
UPDATE users 
SET first_name = 'Harry'
WHERE last_name LIKE 'Doe2%';

-- 5. What query would you run for updating all the user records where ID is 3, 5, 7, 12, or 19?
UPDATE users 
SET first_name = 'Harry'
WHERE id IN (3, 5, 7, 12, 19);

-- 6. What's the query for deleting a user record where id = 1?
DELETE FROM users WHERE id = 1;

-- 7. What's the query for deleting the entire users records in the users table?
DELETE FROM users;

-- 8. What's the query for dropping the entire users table?  What's the difference between dropping the table and deleting all records?
DROP TABLE users; -- The difference is dropping the table will delete entire table including the fields and data values, on the other hand deleting records will only delete the data values and the table, fields will remain.

-- 9. What's the query for altering the email field to have it be 'email_address' instead?
ALTER TABLE users CHANGE email email_address VARCHAR(255);

-- 10. What's the query for altering the id so that it's a BIGINT instead?
ALTER TABLE users MODIFY  COLUMN id BIGINT(255);

-- 11. What's the query for adding a new field to the users table called is_active where it's a Boolean (meaning it's either a 0 or a 1).  Imagine you wanted the default value of this to be 0 when a new record is created and you won't allow this field to ever be NULL.  With this in mind, now come up with a query.
ALTER TABLE users
ADD is_active BOOL DEFAULT false NOT NULL;
