-- Run only if the database is already created
-- Database: skillswap
-- Host: localhost
-- For Jacob 5 use export data as described in the "Exporting a table to RMIT SQL Server" document
-- This script creates a users table and modifies the skills table to include a user_id column 
USE skillswap;

-- Step 1: Create the users table
CREATE TABLE IF NOT EXISTS users (
    user_id     INT AUTO_INCREMENT PRIMARY KEY,
    username    VARCHAR(50)   NOT NULL UNIQUE,
    email       VARCHAR(100)  NOT NULL UNIQUE,
    password    CHAR(60)      NOT NULL,        -- hashed passwords
    bio         TEXT,
    joined_at   DATETIME      NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Step 2: Add user_id column to the existing skills table
ALTER TABLE skills ADD COLUMN user_id INT; 

-- Step 3: Add foreign key constraint
ALTER TABLE skills
ADD CONSTRAINT fk_user_id
FOREIGN KEY (user_id) REFERENCES users(user_id)
ON DELETE CASCADE;