-- World II – Assignment

-- 1. How many countries in each continent have life expectancy greater than 70?
SELECT continent, count(*) AS total_countries, 
	LifeExpectancy 
FROM country 
WHERE LifeExpectancy>70 
GROUP BY continent
ORDER BY LifeExpectancy DESC;

-- 2. How many countries in each continent have life expectancy between 60 and 70?
SELECT continent, count(*) AS total_countries, 
	LifeExpectancy 
FROM country 
WHERE LifeExpectancy 
	BETWEEN 60 
    AND 70 
GROUP BY continent
ORDER BY LifeExpectancy DESC;

-- 3. How many countries have life expectancy greater than 75?
SELECT name AS country, 
	LifeExpectancy 
FROM country 
WHERE LifeExpectancy > 75;

-- 4. How many countries have life expectancy less than 40?
SELECT name AS country, 
	LifeExpectancy 
FROM country 
WHERE LifeExpectancy < 40;

-- 5. How many people live in the top 10 countries with the most population?
SELECT name AS country, 
	Population 
FROM country 
GROUP BY population DESC;

-- 6. According to the world database, how many people are there in the world?
SELECT sum(Population) AS total_population 
FROM country;

-- 7. Show results for continents where it shows the continent name and the total population. Only show results where the total_population for the continent is more than 500,00,000. If. the continent doesn't have 500,000,000 people, do NOT show the result.
SELECT continent, sum(Population) AS total_population 
FROM country 
GROUP BY continent 
HAVING sum(Population) > 500000000
ORDER BY total_population DESC;

-- 8. Show results of all continents that has average life expectancy for the continent to be less than 71. Show each of these continent name, how many countries there are in each of the continent, total population for the continent, as well as the life expectancy of this continent. 
-- For example, as Europe and North America both have continent life expectancy greater than 71, these continents shouldn't show up in your sql results.
SELECT continent, 
	COUNT(Name) AS country, 
	sum(Population) AS total_population, 
	AVG(LifeExpectancy) AS life_expectancy 
FROM country 
GROUP BY continent 
HAVING avg(LifeExpectancy) < 71
ORDER BY total_population DESC;

-- 1. How many cities are there for each of the country? Show the total city count for each country where you display the full country name.
SELECT country.name AS country, 
	count(city.name) AS number_of_cities 
FROM country
INNER JOIN city
	ON country.Code = city.CountryCode
GROUP BY country.name
ORDER BY code;

-- 2. For each language, find out how many countries speak each language.
SELECT country.name AS country, 
	countrylanguage.language, 
	count(country.name) AS number_of_countries
FROM country
INNER JOIN countrylanguage
	ON country.Code = countrylanguage.CountryCode
GROUP BY countrylanguage.Language
ORDER BY Code, language;

-- 3. For each language, find out how many countries use that language as the official language.
SELECT countrylanguage.Language AS language, 
	count(country.name) AS total_countries, 
    countrylanguage.IsOfficial
FROM country
INNER JOIN countrylanguage
	ON country.Code = countrylanguage.CountryCode
WHERE countrylanguage.IsOfficial = 'T'
GROUP BY countrylanguage.Language
ORDER BY code;

-- 4. For each continent, find out how many cities there are (according to this database) and the average population of the cities for each continent. 
-- For example, for continent A, have it state the number of cities for that continent, and the average city population for that continent.
SELECT country.Continent AS continent, 
	count(city.name) AS total_cities, 
	AVG(city.Population) AS average_cities_population
FROM country
INNER JOIN city
	ON country.Code = city.CountryCode
GROUP BY country.continent
ORDER BY Code;

-- 5. (Advanced) Find out how many people in the world speak each language. Make sure the total sum of. this number is comparable to the total population in the world
SELECT countrylanguage.Language AS language, 
	sum(country.population * countrylanguage.Percentage) AS total_population
FROM country
INNER JOIN countrylanguage
	ON country.Code = countrylanguage.CountryCode
GROUP BY countrylanguage.Language
ORDER BY total_population DESC;