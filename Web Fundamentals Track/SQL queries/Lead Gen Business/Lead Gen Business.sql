-- Leads Database Exercise:

-- 1. What query would you run to get the total revenue for March of 2012?
SELECT 
	MONTHNAME(charged_datetime) AS month,
	SUM(amount) AS revenue 
FROM billing 
WHERE charged_datetime LIKE '%2012-03%';

-- 2. What query would you run to get total revenue collected from client=2?
SELECT 
	client_id,
	SUM(amount) AS total_revenue 
FROM billing 
WHERE client_id = 2;

-- 3. What query would you run to get all the sites that client = 10 owns?
SELECT 
	domain_name AS website,
	client_id
FROM sites 
WHERE client_id = 10;

-- 4. What query would you run to get total # of sites created each month for client=1? 
SELECT 
	client_id,
	COUNT(domain_name) AS number_of_websites,
    MONTHNAME(created_datetime) AS month_created,
    YEAR(created_datetime) AS year_created
FROM sites 
WHERE client_id = 1
GROUP BY domain_name
ORDER BY client_id;

-- What about for client=20?
SELECT 
	client_id,
	COUNT(domain_name) AS number_of_websites,
    MONTHNAME(created_datetime) AS month_created,
    YEAR(created_datetime) AS year_created
FROM sites 
WHERE client_id = 20
GROUP BY domain_name
ORDER BY client_id;

-- 5. What query would you run to get the total # of leads we have generated for each of our sites between January 1st 2011 to February 15th 2011?
SELECT 
	domain_name AS website,
    COUNT(leads.leads_id) AS number_of_leads,
    DATE_FORMAT(leads.registered_datetime, '%M %d, %Y') AS date_generated
FROM sites
LEFT JOIN leads 
	ON sites.site_id = leads.site_id
WHERE 
	DATE(leads.registered_datetime) LIKE '%2011-01%' 
    OR
    DATE(leads.registered_datetime) LIKE '%2011-02%'
GROUP BY leads.leads_id
ORDER BY client_id;

-- 6. What query would you run to get a list of client name and the total # of leads we have generated for each of our client between January 1st 2011 to December 31st 2011?
SELECT 
	CONCAT(clients.first_name , ' ', clients.last_name) AS client_name,
    COUNT(leads.leads_id) AS number_of_leads
FROM clients
LEFT JOIN sites 
	ON clients.client_id = sites.client_id
LEFT JOIN leads 
	ON sites.site_id = leads.site_id 
WHERE DATE(leads.registered_datetime) LIKE '%2011%'
GROUP BY clients.client_id;

-- 7. What query would you run to get a list of client name and the total # of leads we have generated for each client each month between month 1 - 6 of Year 2011?
SELECT 
	CONCAT(clients.first_name , ' ', clients.last_name) AS client_name,
    COUNT(leads.leads_id) AS number_of_leads,
    MONTHNAME(leads.registered_datetime) AS month_generated
FROM clients
LEFT JOIN sites 
	ON clients.client_id = sites.client_id
LEFT JOIN leads 
	ON sites.site_id = leads.site_id 
WHERE 
	DATE(leads.registered_datetime) >= '2011/01/01' 
	AND 
    DATE(leads.registered_datetime) <= '2011/06/31'
GROUP BY leads.leads_id
ORDER BY MONTH(leads.registered_datetime), leads.leads_id;

-- 8. What query would you run to get a list of client name and the total # of leads we have generated for each of our clients site between January 1st 2011 to December 31st 2011? 
SELECT 
	CONCAT(clients.first_name , ' ', clients.last_name) AS client_name,
    sites.domain_name AS website,
    COUNT(leads.leads_id) AS number_of_leads,
    DATE_FORMAT(leads.registered_datetime, '%M %d, %Y') AS date_generated
FROM clients
LEFT JOIN sites 
	ON clients.client_id = sites.client_id
LEFT JOIN leads 
	ON sites.site_id = leads.site_id 
WHERE 
	DATE(leads.registered_datetime) >= '2011/01/01' 
	AND 
    DATE(leads.registered_datetime) <= '2011/12/31'
GROUP BY sites.domain_name
ORDER BY clients.client_id, sites.site_id;

-- Come up with a second query that shows all the clients, the site name(s), and the total number of leads generated from each site for all time?
SELECT 
	CONCAT(clients.first_name , ' ', clients.last_name) AS client_name,
    sites.domain_name AS website,
    COUNT(leads.leads_id) AS number_of_leads
FROM clients
LEFT JOIN sites 
	ON clients.client_id = sites.client_id
LEFT JOIN leads 
	ON sites.site_id = leads.site_id 
GROUP BY sites.domain_name
ORDER BY clients.client_id, sites.site_id;

-- 9. Write a single query that retrieves total revenue collected from each client each month of the year?
SELECT 
	CONCAT(clients.first_name , ' ', clients.last_name) AS client_name,
    SUM(billing.amount) AS Total_Revenue,
    MONTHNAME(billing.charged_datetime) AS month_charge,
    YEAR(billing.charged_datetime) AS year_charge
FROM billing
LEFT JOIN clients 
	ON clients.client_id = billing.client_id
GROUP BY clients.client_id, 
	MONTH(billing.charged_datetime), 
	YEAR(billing.charged_datetime)
ORDER BY clients.client_id, 
	YEAR(billing.charged_datetime), 
	MONTH(billing.charged_datetime);

-- 10. Write a single query that retrieves all the sites that each client owns. Group the results so that each row shows a new client and have a new field called 'sites' that has 
-- all the sites that the client owns. (HINT: use GROUP_CONCAT)
SELECT 
	CONCAT(clients.first_name , ' ', clients.last_name) AS client_name,
    GROUP_CONCAT(sites.domain_name ORDER BY sites.site_id ASC SEPARATOR ' / ') AS sites
FROM clients
LEFT JOIN sites
	ON clients.client_id = sites.client_id
GROUP BY clients.client_id
ORDER BY clients.client_id;