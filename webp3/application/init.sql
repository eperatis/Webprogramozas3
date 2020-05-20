create table documents(
    id int not null AUTO_INCREMENT,
    name varchar(250) not null,
    path varchar(250) not null,

    constraint PK_documents primary key(id)
    );