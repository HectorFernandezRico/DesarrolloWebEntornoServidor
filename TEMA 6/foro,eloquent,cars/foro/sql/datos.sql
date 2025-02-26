insert into users (name, email, password, created_at, updated_at)
values
    ('marta','marta@edu.es','marta1234',now(),now()),
    ('pepe','pepe@edu.es','pepe1234',now(),now()),
    ('juan','juan@edu.es','juan1234',now(),now()),
    ('pedro','pedro@edu.es','pedro1234',now(),now()),
    ('carlos','carlos@edu.es','carlos1234',now(),now()),
    ('antonio','antonio@edu.es','antonio1234',now(),now()),
    ('maria','maria@edu.es','maria1234',now(),now()),
    ('nacho','nacho@edu.es','nacho1234',now(),now()),
    ('luis','luis@edu.es','luis1234',now(),now()),
    ('alberto','alberto@edu.es','alberto1234',now(),now()),
    ('dolores','dolores@edu.es','dolores1234',now(),now());
insert into categories (nombre,slug,created_at,updated_at)
values
    ('comida','comida',now(),now()),
    ('servicio','servicio',now(),now()),
    ('ambiente','ambiente',now(),now()),
    ('menú','menu',now(),now()),
    ('precios','precios',now(),now()),
    ('código de vestimenta','vestimenta',now(),now()),
    ('música ambiente','musica',now(),now()),
    ('ubicación','ubicacion',now(),now()),
    ('calidad','calidad',now(),now()),
    ('alérgenos','alergenos',now(),now()),
    ('vegetariano/vegano','vegetariano',now(),now());
insert into tags (nombre,slug,created_at,updated_at)
values
    ('aperitivo','aperitivo',now(),now()),
    ('postres','postres',now(),now()),
    ('carne','carne',now(),now()),
    ('camarero','camarero',now(),now()),
    ('espera','espera',now(),now()),
    ('ruido','ruido',now(),now()),
    ('pescado','pescado',now(),now()),
    ('chef','chef',now(),now()),
    ('precio','precio',now(),now());
insert into threads (category_id, user_id, titulo, slug, body,created_at,updated_at)
values
    (1,11,'Titulo 1','Titulo1','Body 1',now(),now()),
    (2,11,'Titulo 2','Titulo2','Body 2',now(),now()),
    (3,10,'Titulo 2','Titulo3','Body 3',now(),now()),
    (4,10,'Titulo 4','Titulo4','Body 4',now(),now()),
    (5,9,'Titulo 5','Titulo5','Body 5',now(),now()),
    (6,9,'Titulo 6','Titulo6','Body 6',now(),now()),
    (7,8,'Titulo 7','Titulo7','Body 7',now(),now()),
    (8,8,'Titulo 8','Titulo8','Body 8',now(),now()),
    (9,7,'Titulo 9','Titulo9','Body 9',now(),now()),
    (10,7,'Titulo 10','Titulo10','Body 10',now(),now()),
    (11,6,'Titulo 11','Titulo11','Body 11',now(),now()),
    (1,6,'Titulo 12','Titulo12','Body 12',now(),now()),
    (2,5,'Titulo 13','Titulo13','Body 13',now(),now()),
    (3,5,'Titulo 14','Titulo14','Body 14',now(),now()),
    (4,4,'Titulo 15','Titulo15','Body 15',now(),now()),
    (5,4,'Titulo 16','Titulo16','Body 16',now(),now()),
    (6,3,'Titulo 17','Titulo17','Body 17',now(),now()),
    (7,3,'Titulo 18','Titulo18','Body 18',now(),now()),
    (8,2,'Titulo 19','Titulo19','Body 19',now(),now()),
    (9,2,'Titulo 20','Titulo20','Body 20',now(),now()),
    (10,1,'Titulo 21','Titulo21','Body 21',now(),now()),
    (11,1,'Titulo 22','Titulo22','Body 22',now(),now()),
    (1,2,'Titulo 23','Titulo23','Body 23',now(),now()),
    (2,3,'Titulo 24','Titulo24','Body 24',now(),now()),
    (3,4,'Titulo 25','Titulo25','Body 25',now(),now()),
    (4,4,'Titulo 26','Titulo26','Body 26',now(),now()),
    (5,5,'Titulo 27','Titulo27','Body 27',now(),now()),
    (6,5,'Titulo 28','Titulo28','Body 28',now(),now()),
    (7,6,'Titulo 29','Titulo29','Body 29',now(),now()),
    (8,6,'Titulo 30','Titulo30','Body 30',now(),now()),
    (9,7,'Titulo 31','Titulo31','Body 31',now(),now());
insert into tag_thread (tag_id,thread_id, created_at, updated_at)
values
    (1,10, now(), now()),
    (2,10, now(), now()),
    (3,10, now(), now()),
    (4,5, now(), now()),
    (5,15, now(), now()),
    (2,25, now(), now()),
    (2,2, now(), now()),
    (6,12, now(), now()),
    (7,22, now(), now()),
    (8,4, now(), now()),
    (9,14, now(), now()),
    (9,4, now(), now()),
    (1,11, now(), now()),
    (2,21, now(), now()),
    (3,31, now(), now()),
    (4,6, now(), now()),
    (5,16, now(), now()),
    (2,26, now(), now()),
    (2,7, now(), now()),
    (6,17, now(), now()),
    (7,27, now(), now()),
    (8,8, now(), now()),
    (9,18, now(), now()),
    (9,28, now(), now());
insert into comments (thread_id, user_id, body, created_at,updated_at)
values
(10,1,'comentarios varios',now(),now()),
(10,2,'comentarios varios',now(),now()),
(10,1,'comentarios varios',now(),now()),
(1,3,'comentarios varios',now(),now()),
(5,3,'comentarios varios',now(),now()),
(6,4,'comentarios varios',now(),now()),
(7,5,'comentarios varios',now(),now()),
(2,6,'comentarios varios',now(),now()),
(2,7,'comentarios varios',now(),now()),
(2,8,'comentarios varios',now(),now()),
(9,9,'comentarios varios',now(),now()),
(11,10,'comentarios varios',now(),now()),
(12,1,'comentarios varios',now(),now()),
(12,2,'comentarios varios',now(),now()),
(15,3,'comentarios varios',now(),now()),
(15,4,'comentarios varios',now(),now()),
(20,5,'comentarios varios',now(),now()),
(20,6,'comentarios varios',now(),now());