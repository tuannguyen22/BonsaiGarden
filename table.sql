DROP DATABASE bonsaigarden;
create database  if not exists bonsaiGarden;
use bonsaiGarden;

CREATE TABLE bonsaiGarden.user (
  id bigint NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(30),
  phone VARCHAR(12),
  job_title VARCHAR(30),
  email varchar(255) ,
  age INT NOT NULL,
  userName VARCHAR(30),
  password VARCHAR(30),
  address varchar(255),
  status BOOLEAN DEFAULT TRUE,
  unique(userName)
);
CREATE TABLE country (
  country_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  country VARCHAR(50) NOT NULL,
  last_update TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (country_id)
);
CREATE TABLE city (
  city_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  city VARCHAR(50) NOT NULL,
  country_id SMALLINT UNSIGNED NOT NULL,
  last_update TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (city_id),
  FOREIGN KEY (country_id) REFERENCES country (country_id) ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE address (
  address_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  address VARCHAR(50) NOT NULL,
  district VARCHAR(20) NOT NULL,
  city_id SMALLINT UNSIGNED NOT NULL,
  postal_code VARCHAR(10) DEFAULT NULL,
  phone VARCHAR(20) NOT NULL,
  last_update TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (address_id),
  FOREIGN KEY (city_id) REFERENCES city (city_id) ON DELETE cascade ON UPDATE CASCADE
);
CREATE TABLE category (
  id BIGINT NOT NULL AUTO_INCREMENT,
  title VARCHAR(75) NOT NULL,
  content TEXT NULL DEFAULT NULL,
 
  PRIMARY KEY (id)
);
CREATE TABLE product (
  id BIGINT NOT NULL AUTO_INCREMENT,
  name varchar(255) ,
  userName varchar(30),
  subtitle VARCHAR(75) NOT NULL,
  summary TINYTEXT NULL,
  type varchar(6) NOT NULL DEFAULT 0,
  price FLOAT NOT NULL DEFAULT 0,
  discount FLOAT NOT NULL DEFAULT 0,
  quantity SMALLINT(6) NOT NULL DEFAULT 0,
  content TEXT NULL DEFAULT NULL,
	 categoryId bigint,
FOREIGN KEY (categoryId) REFERENCES category (id) ON DELETE NO ACTION ON UPDATE NO ACTION,
  PRIMARY KEY (id)
);

Create table image (
id bigint primary key null auto_increment,
    image text
    );

Create table product_image(
id int not null auto_increment primary key,
    id_product bigint not null,
    id_image bigint not null,
    unique (id_product,id_image),
    Foreign key (id_product) references product(id) on delete cascade on update cascade,
    Foreign key (id_image) references image(id) on delete cascade on update cascade
    );
   CREATE TABLE notify(
	id bigint not null auto_increment PRIMARY KEY,
	userName varchar(30),
	message text
);




CREATE TABLE cart (
  id BIGINT NOT NULL AUTO_INCREMENT,
  userId BIGINT NULL DEFAULT NULL,
  status SMALLINT(6) NOT NULL DEFAULT 0,
  content TEXT NULL DEFAULT NULL,
  PRIMARY KEY (id),
   FOREIGN KEY (userId) REFERENCES user (id) ON DELETE NO ACTION ON UPDATE NO ACTION
);
CREATE TABLE cart_item (
  id BIGINT NOT NULL AUTO_INCREMENT,
  productId BIGINT NOT NULL,
  cartId BIGINT NOT NULL,
  price FLOAT NOT NULL DEFAULT 0,
  discount FLOAT NOT NULL DEFAULT 0,
  quantity SMALLINT(6) NOT NULL DEFAULT 0,
  active boolean NOT NULL DEFAULT True,
  content TEXT NULL DEFAULT NULL,
  PRIMARY KEY (id),
 FOREIGN KEY (productId) REFERENCES product (id) ON DELETE NO ACTION ON UPDATE NO ACTION,
  FOREIGN KEY (cartId) REFERENCES cart (id) ON DELETE NO ACTION ON UPDATE NO ACTION
);


CREATE VIEW product_view AS SELECT product.id ,product.name,product.subtitle, product.price,product.discount, product.quantity,product.type, product.content, image.image
FROM ((product
inner join  product_image on product_image.id_product= product.id)
inner join  image on image.id= product_image.id_image);

ALTER TABLE product ADD FULLTEXT (name, content);

SELECT * from product inner join product_image
                                ON product.id = product_image.id_product
                                inner join image on product_image.id_image = image.id
                                WHERE MATCH (name,content) AGAINST('Cây xanh' IN NATURAL LANGUAGE MODE);





INSERT INTO `category` (`id`, `title`, `content`) VALUES
(1, 'Indoor plants', 'Dùng để trang trí trong nhà'),
(2, 'Garden plants', 'Dùng để trang trí ngoài vườn'),
(3, 'Bonsai air', 'Dùng để trang trí trong nhà'),
(4, 'Post jar', 'Lọ dùng để đựng hoa');

-- --------------------------------------------------------


insert into image (image) values('https://thietkesanvuonviet.com/wp-content/uploads/2019/12/cay-xanh-trong-nha_216.jpg');
insert into image (image) values('https://thietkesanvuonviet.com/wp-content/uploads/2019/12/cay-xanh-trong-nha_216.jpg');
insert into image (image) values('https://thietkesanvuonviet.com/wp-content/uploads/2019/12/cay-xanh-trong-nha_216.jpg');

insert into image (image) values('https://cayxanhhadong.com/wp-content/uploads/2018/01/cay-cau-vang-cay-xanh-ha-dong-600x600.jpg');
insert into image (image) values('https://cayxanhhadong.com/wp-content/uploads/2018/01/cay-cau-vang-cay-xanh-ha-dong-600x600.jpg');
insert into image (image) values('https://cayxanhhadong.com/wp-content/uploads/2018/01/cay-cau-vang-cay-xanh-ha-dong-600x600.jpg');

insert into image (image) values('https://9xgarden.com/wp-content/uploads/2020/04/cay-khong-khi-gia-re-tphcm-9xgarden-4.jpg');
insert into image (image) values('https://9xgarden.com/wp-content/uploads/2020/04/cay-khong-khi-gia-re-tphcm-9xgarden-4.jpg');
insert into image (image) values('https://9xgarden.com/wp-content/uploads/2020/04/cay-khong-khi-gia-re-tphcm-9xgarden-4.jpg');


insert into image (image) values('https://quangcanhxanh.vn/wp-content/uploads/2020/07/chau-dat-nung-mau-basic-6.jpg');
insert into image (image) values('https://kenh14cdn.com/thumb_w/600/LJ9BRCA2SwO2i2yoqIMzIMq9QI2QMI/Image/2015/04/c1-3c368.jpg');
insert into image (image) values('https://lh3.googleusercontent.com/proxy/RcjnMP8fp0NcmaeQeLoIHTFA9sE45kMuA3U07SG1sMOFpnZMAEJPVyVTAxYHvOamlS5XgEodJf_-rs9DdMG7sveZubihqw5d_5Djbe8w6oeMS2BGKm5z1n95lGka_VoL8lmgNvM1aaqD5xEqW2j73Rzv');


INSERT INTO bonsaigarden.`user` (`id`, `name`, `phone`, `job_title`, `email`, `age`, `userName`, `password`, `address`, `status`) VALUES
(1, 'long', '099999999', 'IT', 'longnguyen22', 10, 'admin', '123456', 'Quang Binh', 1),
(2, 'long2', '099999999', 'IT', 'longnguyen22', 10, 'admin2', '123456', 'Quang Binh', 1);

-- --------------------------------------------------------


insert into product(name,subtitle,summary,type,price,discount,quantity,content,categoryId)
 values('Cây lan ý','Ban gi day','San pham nay dung de','L',20000,20.5,5,'Chuc nang san pham nay dung de','1'),
('Cây dừa cảnh','Ban gi day','San pham nay dung de','L',25000,20.5,5,'Chuc nang san pham nay dung de','2'),
('Chi dứa','Ban gi day','San pham nay dung de','L',22000,20.5,5,'Chuc nang san pham nay dung de','3'),
('Chậu đất nung','Ban gi day','San pham nay dung de','L',150000,20.5,5,'Chuc nang san pham nay dung de','4');

insert into product(name,subtitle,summary,type,price,discount,quantity,content,categoryId) values('Cây lan ý','Ban gi day','San pham nay dung de','L',20000,20.5,5,'Chuc nang san pham nay dung de','4');
insert into product(name,subtitle,summary,type,price,discount,quantity,content,categoryId) values('Cây lan ý','Ban gi day','San pham nay dung de','L',20000,20.5,5,'Chuc nang san pham nay dung de','4');

-- --------------------------------------------------------
INSERT INTO `cart` (`id`, `userId`, `status`, `content`) VALUES
(1, 1, 0, NULL);
--

INSERT INTO `cart_item` (`id`, `productId`, `cartId`, `price`, `discount`, `quantity`, `active`, `content`) VALUES
(2, 1, 1, 0, 0, 0, 1, NULL);
