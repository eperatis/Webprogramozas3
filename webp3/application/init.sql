create table cities(
    id int not null AUTO_INCREMENT,
    postal_code char(4) not null,
    name varchar(250) not null,

    constraint UQ_cities_postal_code unique(postal_code),
    constraint UQ_cities_name unique(name),
    constraint PK_cities primary key(id)
    );