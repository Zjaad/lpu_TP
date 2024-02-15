CREATE TABLE tasks (
    ID int(11) NOT NULL AUTO_INCREMENT,
    Task_title VARCHAR(255) NOT NULL,
    Task_description TEXT NOT NULL,
    Task_deadline DATETIME NOT NULL,
    PRIMARY KEY (ID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;