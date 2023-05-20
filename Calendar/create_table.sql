CREATE TABLE tasks (
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255),
    type ENUM('встреча', 'звонок', 'совещание', 'дело'),
    location VARCHAR(255),
    datetime DATETIME,
    duration INT(11),
    comment TEXT
);
CREATE TABLE completed_tasks (
    id INT(11) NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) DEFAULT NULL,
    type VARCHAR(255) DEFAULT NULL,
    location VARCHAR(255) DEFAULT NULL,
    datetime DATETIME DEFAULT NULL,
    duration VARCHAR(255) DEFAULT NULL,
    comment TEXT,
    completed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);