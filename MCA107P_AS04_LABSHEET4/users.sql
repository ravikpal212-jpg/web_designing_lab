USE college_db;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Generate a password hash with Q21.php and insert that hash:
-- INSERT INTO users (username,password) VALUES ('ravi','PASTE_HASH_HERE');