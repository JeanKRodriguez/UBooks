drop table if exists Books;
drop table if exists Review;
drop table if exists Orders;
drop table if exists Products;
drop table if exists Books;
drop table if exists Users;

create table Books(
	isbn_10 char(13) not null,
	title char(100) not null,
    author char(50),
    publish_date date,
	edition int(2),
	subject char(15)
);

create table Users(
	user_ID char(5) not null,
	user_name char(30),
	phone_num int(10),
	email char(30),
	passwords char(40),
	review_ID char(5)

);

create table Review(
	review_ID char(5) not null,
	reviewer_ID char(5) not null,
	reviewing_ID char(5) not null,
	stars int(1)
);

create table Products(
	product_ID char(5) not null,
	user_ID char(5) not null,
	isbn_10 char(13) not null,
	qty int(2),
	price float(4,2),
	pay_method char(15),
	delivery_method char(30)
);

create table Orders(
	order_ID char(5) not null,
	user_ID char(5) not null,
	product_ID char(5) not null,
	order_date datetime,
	address_1 char(30),
	city char(20),
	state char(20),
	zip_code int(5)
);