CREATE TABLE Individual (
  Individual_ID int NOT NULL AUTO_INCREMENT,
  Username varchar(50),
  Password varchar(50),
  Name varchar(50),
  Schedule_ID int,
  PRIMARY KEY (Individual_ID),
  FOREIGN KEY (Schedule_ID) REFERENCES Schedule(Schedule_ID)
);

CREATE TABLE Scheduled_Pairing (
  Low_Skill_ID int NOT NULL,
  High_Skill_ID int NOT NULL,
  Focus_ID int,
  Time_Period int,
  Day_of_Week varchar(10),
  PRIMARY KEY (Low_Skill_ID, High_Skill_ID),
  Constraint CHK_Not_Same_ID Check (Low_skill_id != High_Skill_ID),
  FOREIGN KEY (Low_Skill_ID) REFERENCES Individual(Individual_ID),
  FOREIGN KEY (High_Skill_ID) REFERENCES Individual(Individual_ID),
  FOREIGN KEY (Focus_ID) REFERENCES Focus(Focus_ID)
);

CREATE TABLE Schedule (
  Schedule_ID int NOT NULL AUTO_INCREMENT,
  Monday_Available int,
  Tuesday_Available int,
  Wednesday_Available int,
  Thursday_Available int,
  Friday_Available int,
  PRIMARY KEY (Schedule_ID)
);

CREATE TABLE Focus (
  Focus_ID int NOT NULL AUTO_INCREMENT,
  Name varchar(50),
  PRIMARY KEY (Focus_ID)
);

CREATE TABLE Practices (
  Focus_ID int NOT NULL,
  Individual_ID int NOT NULL,
  Skill_Rating int,
  PRIMARY KEY (Focus_ID, Individual_ID),
  FOREIGN KEY (Focus_ID) REFERENCES Focus(Focus_ID),
  FOREIGN KEY (Individual_ID) REFERENCES Individual(Individual_ID)
);

CREATE TABLE Admin (
  Admin_ID int NOT NULL AUTO_INCREMENT,
  Individual_ID int,
  Username varchar(50),
  Password varchar(50),
  Name varchar(50),
  PRIMARY KEY (Admin_ID),
  FOREIGN KEY (Individual_ID) REFERENCES Individual(Individual_ID)
);
