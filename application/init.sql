create table students(
    id int not null AUTO_INCREMENT,
    firstName varchar(250) not null,
    lastName varchar(250) not null,
    osztaly char(4) not null,

    constraint PK_students primary key(id)
    );

create table teachers(
    id int not null AUTO_INCREMENT,
    firstName varchar(250) not null,
    lastName varchar(250) not null,
    email varchar(250) not null,
    path varchar(250) not null,
    osztaly char(4) not null,

    constraint PK_students primary key(id)
    );