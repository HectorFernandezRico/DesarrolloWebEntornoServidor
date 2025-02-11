insert into users(name,email,password)
values
('marta', 'marta@educa.org', 'marta123'),
('alin', 'alin@educa.org', 'alin'),
('javi', 'javi@educa.org', 'javi'),
('hector', 'hector@educa.org', 'hector');

insert into posts (user_id, titulo, contenido)
values
('1','Cenas', 'Tortilla de patata'),
('2','Cenas', 'Sopa'),
('3','Desayuno', 'Tortilla de patata'),
('4','Desayuno', 'Sopa'),
('5','Comida', 'Sopa'),
('6','Comida', 'Sopa');

insert into roles (nombre)
values
("administrador"),
("jefe"),
("informatico"),
("secretario"),
("contable");

insert into role_user (user_id, role_id)
values
(1,1),
(1,3),
(2,2),
(2,1),
(3,4),
(4,5);