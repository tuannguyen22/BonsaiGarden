create database  if not exists bonsaigarden
use bonsaigarden
CREATE TABLE bonsaigarden.user (
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

CREATE TABLE product (
  id BIGINT NOT NULL AUTO_INCREMENT,
  name varchar(255) ,
  subtitle VARCHAR(75) NOT NULL,
  summary TINYTEXT NULL,
  type varchar(6) NOT NULL DEFAULT 0,
  price FLOAT NOT NULL DEFAULT 0,
  discount FLOAT NOT NULL DEFAULT 0,
  quantity SMALLINT(6) NOT NULL DEFAULT 0,
  content TEXT NULL DEFAULT NULL,
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
    


CREATE TABLE category (
  id BIGINT NOT NULL AUTO_INCREMENT,
  title VARCHAR(75) NOT NULL,
  content TEXT NULL DEFAULT NULL,
  PRIMARY KEY (id)
);
CREATE TABLE product_category (
  productId BIGINT NOT NULL,
  categoryId BIGINT NOT NULL,
  PRIMARY KEY (productId, categoryId),
  FOREIGN KEY (productId) REFERENCES product (id) ON DELETE NO ACTION ON UPDATE NO ACTION,
  FOREIGN KEY (categoryId) REFERENCES category (id) ON DELETE NO ACTION ON UPDATE NO ACTION
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



-- User

insert into user(name,phone,job_title,email,age,userName,password,address) values('long','099999999','IT','longnguyen22',10,'admin','123456','Quang Binh');


-- Product
insert into product(name,type,price,quantity) values('Bone Dragon','L',20000,20);
insert into product(name,type,price,quantity) values('Pink anthurium','L',25000,60);
insert into product(name,type,price,quantity) values('Snake Plant','L',25000,70);
insert into product(name,type,price,quantity) values('Monstera Deliciosa','L',20000,70);
insert into product(name,type,price,quantity) values('Golden Pothos Vine','XL',35000,70);
insert into product(name,type,price,quantity) values('Peace Lily','X',30000,70);



-- Image

insert into image (image) values('https://www.whiteflowerfarm.com/mas_assets/cache/image/7/4/5/f/29791.Jpg');
insert into image (image) values('https://blueprint-api-production.s3.amazonaws.com/uploads/card/image/1313925/819e4cb1-2c20-4b90-ad50-cc4558281ca6.png');
insert into image (image) values('https://hips.hearstapps.com/vader-prod.s3.amazonaws.com/1551636850-gallery_the-sill_snake_laurentii_august_2230x.progressive.jpg?crop=0.752xw:0.581xh;0.223xw,0.0409xh&resize=768:*');
insert into image (image) values('https://i.etsystatic.com/20948249/r/il/f2a5f8/2843437086/il_794xN.2843437086_pvjk.jpg');
insert into image (image) values('https://i.etsystatic.com/21063677/r/il/df5bef/2485154742/il_794xN.2485154742_kpa5.jpg');
insert into image (image) values('https://cdn.shopclues.com/images1/thumbnails/106360/640/1/149564155-106360635-1589345712.jpg');


-- Image/product
insert into product_image(id_product,id_image) values(1,1);
insert into product_image(id_product,id_image) values(2,2);
insert into product_image(id_product,id_image) values(3,3);
insert into product_image(id_product,id_image) values(4,4);
insert into product_image(id_product,id_image) values(5,5);
insert into product_image(id_product,id_image) values(6,6);

-- Cart

insert into cart(userId,content) values(1,"Nguoi dung1");

insert into cart_item(productId,cartId) values(1,1);