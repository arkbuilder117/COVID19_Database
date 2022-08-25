# CSE 3330 Project

This repositry contains the directory for the projects done by Noah Walker and Jose Ibarra for CSE 3330 Databases taught by Dr. Bhanu Jain in the Spring 2021 semester at the University of Texas at Arlington.

`Phase 1`
---
***Phase_1*** is the directory for the first part of our project. We were tasked to create an EER diagram and a Relational Schema for said diagram. 

The requirements of the database were as follows:
1. The data is organized by counties, so we need to keep track of each US state, and the list of counties 
within that state. 
2. For each STATE, we want to store the state abbreviation, state name, its capital city along with the number of officials which can be derived from the officials’ table. 
3. Elected OFFICIALS will be organized by each state – for each elected official, the data will include their ID, name (elected_official), designation (office), email and phone number. The IDs, email ids, and the phone numbers are unique. The officials’ names may or may not be unique. Each state has a different number of elected officials.  
4. For each CITY, we want to store the city name and the state it is a part of. Some cities can span across multiple counties. The city name is unique only within a state regardless of whether it spans multiple counties or not. Each city is within one state only.  
5. For each COUNTY, we want to store the county name and its population. Each county is within one state, but the county name is unique only within that state. Counties in different states may have the same name. A county can have 1 or more cities in it. 
6. COVIDDATA will be organized by county – for each date. The data will include several pieces of information like the state abbreviation, number of confirmed new daily infections, and the number of confirmed new daily deaths. We will also keep track of derived information about the total monthly infections and total monthly deaths from Covid-19 in each county for each date. 
7. The covidData.txt data file has more than 62,000 lines and includes the data for 5 states: Texas, New Mexico, Oklahoma, Arkansas, and Louisiana between March 22 and August 2, 2020.   
8. This surveillance data will be used for tracking US trends in disease incidence (the number of new cases of a disease in a population as time progresses) and to stay in contact with the state’s elected officials. 

`Phase 2`
---
***Phase_2*** is the directory for the second part of our project.

`Phase 3`
---
***Phase_3*** is the directory for the third part of our project.