#regions, regiones
CREATE TABLE regions(
	regions_id int UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	regions_name varchar(200) NOT NULL,
	regions_zone varchar(200) NOT NULL,
	regions_active int(11) NOT NULL DEFAULT 1,
	regions_status int(11) NOT NULL DEFAULT 1
)ENGINE = InnoDB DEFAULT CHARACTER SET=utf8 COLLATE=utf8_spanish_ci;

#oficinas offices
CREATE TABLE offices (
  offices_id int UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  regions_id int(11) UNSIGNED NOT NULL,
  offices_code varchar(255) NOT NULL,
  offices_name varchar(255) NOT NULL,
  offices_type varchar(255) NOT NULL,
  offices_active int(11) NOT NULL DEFAULT 1,
  offices_status int(11) NOT NULL DEFAULT 1,
  FOREIGN KEY (regions_id) REFERENCES regions(regions_id)
  ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8 COLLATE=utf8_spanish_ci;

#Marcas brands
CREATE TABLE brands (
  brand_id int UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  brand_name varchar(255) NOT NULL,
  brand_active int(11) NOT NULL DEFAULT 0,
  brand_status int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8 COLLATE=utf8_spanish_ci;

#Categorias categories
CREATE TABLE categories (
  categories_id int UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  categories_name varchar(255) NOT NULL,
  categories_active int(11) NOT NULL DEFAULT 0,
  categories_status int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8 COLLATE=utf8_spanish_ci;

#Equipos teams
CREATE TABLE teams (
  teams_id int UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  categories_id int(11) UNSIGNED NOT NULL,
  brand_id int(11) UNSIGNED NOT NULL,
  teams_name varchar(255) NOT NULL,
  teams_active int(11) NOT NULL DEFAULT 0,
  teams_status int(11) NOT NULL DEFAULT 0,
  FOREIGN KEY (categories_id) REFERENCES categories(categories_id),
  FOREIGN KEY (brand_id) REFERENCES brands(brand_id)
  ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8 COLLATE=utf8_spanish_ci;

#Niveles levels
CREATE TABLE levels (
  level_id int UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  level_name varchar(255) NOT NULL,
  level_active int(11) NOT NULL DEFAULT 0,
  level__status int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8 COLLATE=utf8_spanish_ci;

#Usuarios users
CREATE TABLE users (
  user_id int UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  level_id int(11) UNSIGNED NOT NULL,
  regions_id int(11) UNSIGNED NOT NULL,
  username varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  FOREIGN KEY (level_id) REFERENCES levels(level_id),
  FOREIGN KEY (regions_id) REFERENCES regions(regions_id)
  ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8 COLLATE=utf8_spanish_ci;

#Productos product
CREATE TABLE product (
  product_id int UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  product_name varchar(255) NOT NULL,
  product_image text NOT NULL,
  brand_id int(11) NOT NULL,
  categories_id int(11) NOT NULL,
  quantity varchar(255) NOT NULL,
  rate varchar(255) NOT NULL,
  active int(11) NOT NULL DEFAULT 0,
  status int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8 COLLATE=utf8_spanish_ci;

#Pedidos orders
CREATE TABLE orders (
  order_id int UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  order_date date NOT NULL,
  client_name varchar(255) NOT NULL,
  client_contact varchar(255) NOT NULL,
  sub_total varchar(255) NOT NULL,
  vat varchar(255) NOT NULL,
  total_amount varchar(255) NOT NULL,
  discount varchar(255) NOT NULL,
  grand_total varchar(255) NOT NULL,
  paid varchar(255) NOT NULL,
  due varchar(255) NOT NULL,
  payment_type int(11) NOT NULL,
  payment_status int(11) NOT NULL,
  order_status int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8 COLLATE=utf8_spanish_ci;

#Pedidos items order_item
CREATE TABLE order_item (
  order_item_id int UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  order_id int(11) UNSIGNED NOT NULL DEFAULT 0,
  product_id int(11) UNSIGNED NOT NULL DEFAULT 0,
  quantity varchar(255) NOT NULL,
  rate varchar(255) NOT NULL,
  total varchar(255) NOT NULL,
  order_item_status int(11) NOT NULL DEFAULT 0,
  FOREIGN KEY (order_id) REFERENCES orders(order_id),
  FOREIGN KEY (product_id) REFERENCES product(product_id)
  ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8 COLLATE=utf8_spanish_ci;

#Notificaciones notifications
CREATE TABLE notifications (
  notifications_id int UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  user_id int(11) UNSIGNED NOT NULL,
  notifications_admin int(11) NOT NULL,
  notifications_body varchar(255) NOT NULL,
  notifications_active int(11) NOT NULL DEFAULT 1,
  notifications__status int(11) NOT NULL DEFAULT 1,
  FOREIGN KEY (user_id) REFERENCES users(user_id)
  ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8 COLLATE=utf8_spanish_ci;