create table if not exist `employees`(
    `id` int(11) not null auto_increment,
    `name` varchar(100) not null,
    `address` varchar(255) not null,
    `salary` int(10) not null,
    primary key (id)
) engine=InnoDB default charset=latin1 auto_increment=4;