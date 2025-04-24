DROP TABLE IF EXISTS IceCream;

CREATE TABLE IceCream (
    id INT AUTO_INCREMENT PRIMARY KEY,
    flavor VARCHAR(20) NOT NULL,
    `price$` DECIMAL(4,2) NOT NULL
);

INSERT INTO IceCream (flavor, `price$`) VALUES
('Vanilla', 3.00),
('Chocolate', 3.50),
('Strawberry', 3.25),
('Espresso Nuggets', 4.00),
('Cookies N Cream', 3.75),
('Mango', 3.50),
('Blueberry Swirl', 3.75),
('Coconut', 3.50),
('Lemon', 3.75),
('Pumpkin Seed', 3.50);
