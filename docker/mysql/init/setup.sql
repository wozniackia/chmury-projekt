CREATE DATABASE project;

create table users (
	id int primary key AUTO_INCREMENT,
	name varchar(40),
	email varchar(40),
	isAdmin boolean default false,
	password varchar(40),
	updated_at date,
	created_at date
	UNIQUE KEY unique_email (email)  
);

create table fleet (
	id int primary key AUTO_INCREMENT,
	manufacture varchar,
	model varchar,
	version varchar,
	seats int,
	pricePerHour float,
	isAvailable boolean
);

create table orders (
	id int primary key AUTO_INCREMENT,
	user_id bigint references users(id),
	vehicle_id bigint references fleet(id),
	booked_at date,
	duration_in_days int,
	payment_method varchar,
);
