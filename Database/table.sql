create database  if not exists bonsaiGarden
use bonsaiGarden
CREATE TABLE user (
  id bigint NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(30),
  phone VARCHAR(12),
  job_title VARCHAR(30),
  email varchar(255) ,
  age INT NOT NULL,
  userName VARCHAR(30),
  password VARCHAR(30),
  address varchar(255),
  status BOOLEAN DEFAULT TRUE
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
  userId BIGINT NOT NULL,
  title VARCHAR(75) NOT NULL,
  summary TINYTEXT NULL,
  type SMALLINT(6) NOT NULL DEFAULT 0,
  price FLOAT NOT NULL DEFAULT 0,
  discount FLOAT NOT NULL DEFAULT 0,
  quantity SMALLINT(6) NOT NULL DEFAULT 0,
  content TEXT NULL DEFAULT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (userId) REFERENCES user(id) ON DELETE NO ACTION ON UPDATE NO ACTION
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
  parentId BIGINT NULL DEFAULT NULL,
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


CREATE VIEW product_view AS SELECT product.title, product.price,product.discount, product.quantity,product.type, product.content, image.image
FROM ((product 
inner join  product_image on product_image.id_product= product.id)
inner join  image on image.id= product_image.id_image);