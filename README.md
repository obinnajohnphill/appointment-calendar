#### Simple Appointment Bookings

- ###### Installation: 

  - Clone and extract project to a server
  
  - RUN: composer install
  
  - Create a database
  
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
  


- Run Test: ./vendor/bin/phpunit tests



