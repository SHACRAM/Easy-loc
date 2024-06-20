USE Easy_loc

CREATE TABLE IF NOT EXISTS Billing(
    id INT PRIMARY KEY AUTO_INCREMENT,
    contract_id INT,
    amount DECIMAL(10,2),
    FOREIGN KEY (contract_id) REFERENCES Contract(id)
)