create table if not exists client (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(200),
  created_at datetime,
  updated_at datetime
);

create table if not exists product (
  id int auto_increment primary key,
  name varchar(200),
  sku varchar(50),
  created_at datetime,
  updated_at datetime
);

create table if not exists stock (
  id int auto_increment primary key,
  amount int,
  product_id int,
  created_at datetime,
  updated_at datetime,
  FOREIGN KEY(product_id) REFERENCES product(id)
);

create table if not exists cart (
  id int auto_increment primary key,
  client_id int,
  created_at datetime,
  updated_at datetime,
  foreign key(client_id) references client(id)
);

create table if not exists cart_product_list (
  id int auto_increment primary key,
  product_id int,
  amount int,
  cart_id int,
  foreign key(product_id) references product(id),
  foreign key(cart_id) references cart(id)
);

