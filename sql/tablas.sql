CREATE TABLE register (
  idregister INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  assistants INTEGER UNSIGNED  NOT NULL  ,
  date DATE  NOT NULL  ,
  startHour VARCHAR(20)  NOT NULL  ,
  finishHour VARCHAR(20)  NOT NULL  ,
  matters TEXT  NOT NULL  ,
  responsible VARCHAR(100)  NOT NULL  ,
  develop TEXT  NOT NULL  ,
  commitments TEXT  NOT NULL    ,
PRIMARY KEY(idregister));



CREATE TABLE account (
  username VARCHAR(50)  NOT NULL  ,
  password_2 TEXT  NOT NULL    ,
PRIMARY KEY(username));




