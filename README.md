#### Simple Appointment Bookings

- ###### Installation: 

  - Clone and extract project to a server
  
  - cd into project root directory
  
  - RENAME: .htaccess.sample to .htaccess
  
  - RUN: composer install
  
  - Create a database
  
  - update the database connection details in config/Database.php file
  
  - Created tables:
  
  CREATE TABLE appointments(
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  person_id Integer,
  time_from VARCHAR(10),
  time_to VARCHAR(10),
  created_at DATETIME NULL
  );
  
  CREATE TABLE boundaries (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  person_id Integer,
  time_from VARCHAR(10),
  time_to VARCHAR(10),
  created_at DATETIME NULL
  );
  
  
- Navigate to your host domain to view/interact with the calendar application

###### Important Note!!
- To test that the appointment inputs shown are not outside the boundary, you must make sure the 'from' boundary time is not higher than the 'to'
  
###### Application Screenshot
![Screenshot](screenshot.png)



