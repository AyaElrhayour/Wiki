CREATE TABLE users (
    user_id int PRIMARY KEY AUTO_INCREMENT,
    role_id int,
    user_name varchar(50),
    user_email varchar(100) UNIQUE,
    user_password varchar(250),
    FOREIGN KEY (role_id) REFERENCES role(role_id)
);

 CREATE table categories(
 id  int PRIMARY KEY AUTO_INCREMENT,
name  varchar(50)
);

 CREATE table tags(
 id  int PRIMARY KEY AUTO_INCREMENT,
name  varchar(50)
);

 CREATE table wikis(
 id  int PRIMARY KEY AUTO_INCREMENT,
 title  varchar(100),
 content text,
 image varchar(255),
 date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 category_id int,
 user_id int,
archived boolean
 FOREIGN KEY (user_id) REFERENCES users(id)
 FOREIGN KEY (category_id) REFERENCES categories(id)
);

 CREATE table tags_wikis(
 id  int PRIMARY KEY AUTO_INCREMENT,
 wiki_id int,
 tag_id int,
 FOREIGN KEY (tag_id) REFERENCES tags(id)
 FOREIGN KEY (wiki_id) REFERENCES wikis(id)
);
