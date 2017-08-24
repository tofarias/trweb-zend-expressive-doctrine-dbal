create table series
(
	id int primary key auto_increment,
    nome varchar(100) not null,
    emissora varchar(100) not null,
    genero varchar(40) not null
);

insert into series values (null, 'BREAKING BAD', 'AXN', 'Drama');
insert into series values (null, 'GAME OF THRONES', 'HBO', 'Drama');
insert into series values (null, 'THE WALKING DEAD', 'AMC', 'Suspense/Terror');
insert into series values (null, 'THE BLACKLIST', 'NBC', 'Drama');