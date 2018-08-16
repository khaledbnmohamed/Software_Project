
Create Table user(
user_id int Auto_Increment,
first_name varchar(15)  not null,
email varchar(50)   not null UNIQUE,
password varchar(100) not null,
admin_auth BOOLEAN DEFAULT '0' ,
pic BLOB ,
img_status tinyint(5)  DEFAULT '1',
PRIMARY key(user_id),
daily_income int(5),
monthly_income int(5)
);
Create Table patient(
patient_id int Auto_Increment,
first_name varchar(15)  not null,
last_name varchar(15)  not null,
phonenum1 varchar(11),
gender char(30) not null,
birthdate date not null,
medicalHistory text(300) ,
img_status tinyint(5)  DEFAULT '1',
PRIMARY key(patient_id)
);
Create Table visits(
vtime TIMESTAMP NOT NULL UNIQUE,
visit_id int(3) not null ,
type BOOLEAN DEFAULT '0',
fees tinyint(3),
Foreign key(visit_id) REFERENCES patient(patient_id),
Foreign key (visit_id) REFERENCES user(user_id)
);
