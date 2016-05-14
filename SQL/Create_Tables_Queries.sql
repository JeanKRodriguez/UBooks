drop table if exists Books;
drop table if exists Review;
drop table if exists Orders;
drop table if exists Products;
drop table if exists Books;
drop table if exists Users;

create table Books(
	isbn_10 varchar(10) not null,
	title char(30) not null,
    author char(30),
    publish_date date,
	edition int(2),
	subject char(15),
	
	primary key (isbn_10)
);

create table Users(
	user_ID varchar(5) not null,
	user_name char(30),
	phone_num int(10),
	email char(30),
	passwords char(40),
	
	primary key (user_ID)
);

create table Review(
	review_ID varchar(5) not null,
	reviewer_ID varchar(5) not null,
	reviewing_ID varchar(5) not null,
	stars int(1),
	
	primary key (review_ID),
	foreign key (reviewer_ID) references Users(user_ID),
	foreign key (reviewing_ID) references Users(user_ID)
);

create table Products(
	product_ID varchar(5) not null,
	user_ID varchar(5) not null,
	isbn_10 varchar(10) not null,
	qty int(2),
	price float(5,2),
	pay_method char(15),
	delivery_method char(30),
	
	primary key (product_ID),
	foreign key (user_ID) references Users(user_ID),
	foreign key (isbn_10) references Books(isbn_10)
);

create table Orders(
	order_ID varchar(5) not null,
	user_ID varchar(5) not null,
	product_ID varchar(5) not null,
	order_date datetime,
	address_1 varchar(30),
	city char(15),
	states char(15),
	zip_code int(5),
	
	primary key (order_ID),
	foreign key (user_ID) references Users(user_ID),
	foreign key (product_ID) references Products(product_ID)
);

insert into Books values
('0123567891','Intro to CS','Paul George','2001-07-04',2,'Computer Science'),
('0223567891','Data Structures','Joe Bidden','2011-08-14',1,'Computer Science'),
('0323567891','High Level Language','Vicky Muniz','2003-03-20',2,'Computer Science'),
('0423567891','Database','Rose Courtes','2007-03-29',1,'Computer Science'),
('0523567891','Compiler','Steph Curry','2008-03-15',2,'Computer Science'),
('0623567891','Discrete Math','Jadden Roger','2016-03-22',2,'Computer Science'),
('0723567891','Operting Systems','Alex Smith','2013-03-20',6,'Computer Science'),
('0823567891','Abstract Algebra','Chris Turner','2002-04-10',2,'Computer Science'),
('0923567891','Software Engineer','Peter Smith','2001-10-20',5,'Computer Science'),
('0133567891','Intro to Cyber Security','Jhene Aiko','2005-07-20',3,'Computer Science'),
('0143567891','Algorithm with Python','John Sean','2007-04-20',2,'Computer Science');

insert into Users values
('12345','Jean K.',7870001111,'jeanjean@lit.com','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
('12346','Javier ',7871010111,'javier@lit.com','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
('12347','Pablo',7874001111,'pablo@lit.com','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
('12348','Travis ',7871610111,'travis@lit.com','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
('12349','Vince',7870091111,'vince@lit.com','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
('12350','Joe ',7871040121,'joe@lit.com','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
('12351','Pam',7871801111,'pam@lit.com','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
('12352','Angelina ',7879310111,'angelina@lit.com','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
('12353','Daniela',7870551111,'daniela@lit.com','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
('12354','Alexis ',7871340111,'alexis@lit.com','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8');

insert into Products values
('31234','12346','0423567891',1,20.00,'cash','personal'),
('32234','12345','0623567891',1,20.00,'cash','personal'),
('33234','12345','0223567891',1,10.00,'cash','personal'),
('34234','12349','0423567891',1,20.00,'cash','personal'),
('35234','12347','0723567891',1,20.00,'cash','personal'),
('36234','12354','0423567891',1,10.00,'cash','personal'),
('37234','12352','0423567891',1,10.00,'cash','personal'),
('38234','12348','0723567891',1,30.00,'cash','personal'),
('39234','12348','0143567891',1,20.00,'cash','personal'),
('31334','12353','0423567891',1,15.00,'cash','personal'),
('31434','12348','0133567891',1,25.00,'cash','personal'),
('31534','12348','0423567891',1,20.00,'cash','personal');


insert into Review values
('41234','12345','12346',5);

insert into Orders values
('51234','12345','31234','2016-05-20 13:00:00','we the south','San Juan','Puerto Rico',00001);