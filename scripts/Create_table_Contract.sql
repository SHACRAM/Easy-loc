USE Easy_loc

CREATE TABLE IF NOT EXISTS Contract(
    id INT PRIMARY KEY AUTO_INCREMENT,
    Vehicle_uid VARCHAR(255),
    Customer_uid VARCHAR(255),
    Sign_datetime DATETIME,
    Loc_begin_datetime DATETIME,
    Loc_end_datetime DATETIME,
    Returning_datetime DATETIME,
    Price DECIMAL(10,2)
)