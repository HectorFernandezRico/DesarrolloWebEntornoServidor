INSERT INTO customers (nombre, direccion, telefono, email, created_at, updated_at) VALUES

('Juan Pérez', 'Calle Falsa 123', '555-1234', 'juan@example.com', NOW(), NOW()),

('María López', 'Avenida Siempre Viva 742', '555-5678', 'maria@example.com', NOW(), NOW()),

('Carlos García', 'Boulevard de los Sueños Rotos 456', '555-8765', 'carlos@example.com', NOW(), NOW());INSERT INTO pizzas (nombre, descripcion, precio, created_at, updated_at) VALUES
('Pizza Margherita', 'Pizza clásica con tomate, mozzarella y albahaca', 8.50, NOW(), NOW()),
('Pizza Pepperoni', 'Pizza con salsa de tomate, mozzarella y pepperoni', 9.00, NOW(), NOW()),
('Pizza Cuatro Quesos', 'Pizza con una mezcla de cuatro quesos', 10.00, NOW(), NOW());INSERT INTO orders (fecha, hora, customer_id, email, created_at, updated_at) VALUES
('2023-10-01', '18:30:00', 1, 'juan@example.com', NOW(), NOW()),
('2023-10-02', '19:00:00', 2, 'maria@example.com', NOW(), NOW()),
('2023-10-03', '20:00:00', 3, 'carlos@example.com', NOW(), NOW());INSERT INTO order_pizza (order_id, pizza_id, numero, importe) VALUES
(1, 1, 2, 17.00),  -- 2 Pizza Margherita
(1, 2, 1, 9.00),   -- 1 Pizza Pepperoni
(2, 3, 1, 10.00),  -- 1 Pizza Cuatro Quesos
(3, 1, 1, 8.50);   -- 1 Pizza Margherita