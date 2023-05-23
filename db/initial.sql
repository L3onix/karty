create table `customer` (
	`id` int auto_increment unique,
    `name` varchar(255) not null,
    primary key (`id`)
);

create table `product` (
	`id` int auto_increment unique,
    `name` varchar(255) not null,
    `qtdStock` int not null default 0,
    primary key (`id`)
);

create table `order` (
	`id` int auto_increment unique,
    `fk_customer` int not null,
    `fk_product` int not null,
    primary key (`id`),
    foreign key (`fk_customer`) references `customer`(`id`),
    foreign key (`fk_customer`) references `customer`(`id`)
);