CREATE TABLE tasks (
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255),
    type ENUM('встреча', 'звонок', 'совещание', 'дело'),
    location VARCHAR(255),
    datetime DATETIME,
    duration INT(11),
    comment TEXT
);
