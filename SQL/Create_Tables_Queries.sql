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
	user_name char(30) not null,
	phone_num int(10),
	email char(30)	not null,
	passwords char(40) not null,
	
	primary key (user_ID)
);

create table Review(
	review_ID varchar(5) not null,
	reviewer_ID varchar(5) not null,
	reviewing_ID varchar(5) not null,
	stars int(1) not null,
	
	primary key (review_ID),
	foreign key (reviewer_ID) references Users(user_ID),
	foreign key (reviewing_ID) references Users(user_ID)
);

create table Products(
	product_ID varchar(5) not null,
	user_ID varchar(5) not null,
	isbn_10 varchar(10) not null,
	price float(5,2) not null,
	pay_method char(30) not null,
	delivery_method char(30) not null,
	
	primary key (product_ID),
	foreign key (user_ID) references Users(user_ID),
	foreign key (isbn_10) references Books(isbn_10)
);

create table Orders(
	order_ID varchar(5) not null,
	user_ID varchar(5) not null,
	product_ID varchar(5) not null,
	order_date datetime not null,
	address_1 varchar(30),
	city char(15),
	states char(15),
	zip_code int(5),
	
	primary key (order_ID),
	foreign key (user_ID) references Users(user_ID),
	foreign key (product_ID) references Products(product_ID)
);

insert into Books values
('0123567891','Introduction to Programming','Paul George','2001-07-04',2,'Computer Science'),
('0223567891','Data Structures','Joe Bidden','2011-08-14',1,'Computer Science'),
('0323567891','High Level Language','Vicky Muniz','2003-03-20',2,'Computer Science'),
('0423567891','Database Management System','Rose Courtes','2007-03-29',1,'Computer Science'),
('0523567891','Compiler','Steph Curry','2008-03-15',2,'Computer Science'),
('0623567891','Discrete Mathematics','Jadden Roger','2016-03-22',2,'Computer Science'),
('0723567891','Operting Systems','Alex Smith','2013-03-20',6,'Computer Science'),
('0823567891','Abstract Algebra','Chris Turner','2002-04-10',2,'Computer Science'),
('0923567891','Software Engineer','Peter Smith','2001-10-20',5,'Computer Science'),
('0133567891','Introduction to Cyber Security','Jhene Aiko','2005-07-20',3,'Computer Science'),
('0143567891','Algorithms with Python','John Sean','2007-04-20',2,'Computer Science');

insert into Users values
('12345','Jean K.',7870001111,'jean@gmail.com','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
('12346','Javier ',7871010111,'javier@gmail.com','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
('12347','Pablo',7874001111,'pablo@gmail.com','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
('12348','Travis ',7871610111,'travis@gmail.com','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
('12349','Vince',7870091111,'vince@gmail.com','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
('12350','Joe ',7871040121,'joe@gmail.com','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
('12351','Pam',7871801111,'pam@gmail.com','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
('12352','Angelina ',7879310111,'angelina@gmail.com','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
('12353','Daniela',7870551111,'daniela@gmail.com','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
('12354','Alexis ',7871340111,'alexis@gmail.com','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8');

insert into Products values
('31234','12346','0423567891',20.00,'cash','personal'),
('32234','12345','0623567891',20.00,'cash','personal'),
('33234','12345','0223567891',10.00,'cash','personal'),
('34234','12349','0423567891',20.00,'cash','personal'),
('35234','12347','0723567891',20.00,'cash','personal'),
('36234','12354','0423567891',10.00,'cash','personal'),
('37234','12352','0423567891',10.00,'cash','personal'),
('38234','12348','0723567891',30.00,'cash','personal'),
('39234','12348','0143567891',20.00,'cash','personal'),
('31334','12353','0423567891',15.00,'cash','personal'),
('31434','12348','0133567891',25.00,'cash','personal'),
('31534','12348','0423567891',20.00,'cash','personal'),
('31634','12354','0123567891',20.00,'cash','personal'),
('32734','12345','0623567891',20.00,'cash','personal'),
('33834','12352','0223567891',40.00,'cash','personal'),
('34934','12349','0423567891',20.00,'cash','personal'),
('35204','12347','0723567891',20.00,'cash','personal'),
('36214','12354','0923567891',30.00,'cash','personal'),
('37224','12352','0923567891',10.00,'cash','personal'),
('38134','12348','0723567891',30.00,'cash','personal'),
('39244','12346','0143567891',20.00,'cash','personal'),
('31354','12353','0423567891',15.00,'cash','personal'),
('31464','12348','0133567891',25.00,'cash','personal'),
('31574','12348','0123567891',30.00,'cash','personal');

insert into Review values
('41234','12345','12346',5),
('42234','12346','12345',5),
('43234','12347','12352',4),
('44234','12353','12348',3),
('44235','12345','12348',4),
('45234','12350','12353',5),
('46234','12349','12354',5);

insert into Orders values
('51234','12345','31234','2016-05-20 13:00:00','We the South','San Juan','Puerto Rico',00001),
('51235','12345','38134','2016-05-21 10:00:00','We the South','San Juan','Puerto Rico',00001),
('52234','12346','32234','2016-05-22 12:00:00','Calle sur','San Juan','Puerto Rico',000201),
('53234','12347','37234','2016-05-21 13:00:00','Calle norte','San Juan','Puerto Rico',00071),
('54234','12350','31354','2016-05-01 11:00:00','Condado','San Juan','Puerto Rico',00402),
('55234','12354','34934','2016-05-10 09:00:00','Urb. Lola','San Juan','Puerto Rico',00261),
('56234','12350','37224','2016-05-15 20:00:00','Condado','San Juan','Puerto Rico',00402),
('57234','12346','33834','2016-05-08 15:00:00','Calle Loiza','San Juan','Puerto Rico',000501),
('58234','12353','31574','2016-05-05 13:00:00','Urb. Pepe','San Juan','Puerto Rico',00601);