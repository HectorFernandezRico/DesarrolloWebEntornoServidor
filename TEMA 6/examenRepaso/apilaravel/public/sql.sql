INSERT INTO genres (nombre, descripcion, created_at, updated_at) VALUES
('Acción', 'Juegos de acción con mucha adrenalina.', NOW(), NOW()),
('Aventura', 'Juegos con exploración y narrativa profunda.', NOW(), NOW()),
('RPG', 'Juegos de rol con personajes personalizables.', NOW(), NOW()),
('Estrategia', 'Juegos que requieren planificación y táctica.', NOW(), NOW()),
('Deportes', 'Juegos basados en deportes reales o ficticios.', NOW(), NOW());
INSERT INTO games (genre_id, titulo, descripcion, precio, multijugador, pegi, created_at, updated_at) VALUES
(1, 'Call of Battle', 'Juego de disparos en primera persona con gráficos realistas.', 59.99, 1, 1, NOW(), NOW()),
(2, 'Lost Kingdom', 'Aventura épica en un mundo de fantasía.', 49.99, 0, 1, NOW(), NOW()),
(3, 'Legends of Avalon', 'RPG basado en la mitología artúrica.', 39.99, 1, 1, NOW(), NOW()),
(4, 'Galactic Tactics', 'Estrategia en tiempo real en el espacio.', 29.99, 0, 1, NOW(), NOW()),
(5, 'Ultimate Soccer', 'Juego de fútbol con licencias oficiales.', 19.99, 1, 0, NOW(), NOW());
