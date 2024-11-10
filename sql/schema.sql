CREATE TABLE artist (
    artist_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    gender VARCHAR(50),
    date_of_birth VARCHAR(50),
    specialization TEXT,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    added_by VARCHAR(50),                    -- Username or ID of the user who added the artist record
    last_updated TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP, -- Timestamp updates when the record is edited
    edited_by VARCHAR(50) NULL               -- Username or ID of the user who last edited the artist record
);

CREATE TABLE projects (
    project_id INT AUTO_INCREMENT PRIMARY KEY,
    project_name VARCHAR(50),
    genre TEXT,
    artist_id INT,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Timestamp for when the project was first added
    last_updated TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP, -- Automatically updates when record is modified
    added_by VARCHAR(50), -- Username or ID of the user who added the project
    edited_by VARCHAR(50) NULL -- Username or ID of the user who last edited the project
);

CREATE TABLE user_passwwords (
    user_id INT AUTO_INCREMENT PRIMARY KEY,  -- Automatically generates a unique ID for each user
    username VARCHAR(255) NOT NULL UNIQUE,    -- Username field with unique constraint
    password VARCHAR(255) NOT NULL,           -- Password field
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP  -- Automatically set to current timestamp
);

