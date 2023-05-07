
CREATE TABLE `students` (

-- `admin_id` int(11) NOT NULL,
-- `email` varchar(50) NOT NULL,
-- `password` varchar(500) NOT NULL
-- 'id' INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
'name' VARCHAR(30) NOT NULL,
'email' VARCHAR(50) NOT NULL,
'age' INT(3) NOT NULL,
'college' VARCHAR(50) NOT NULL,
'branch' VARCHAR(30) NOT NULL,
'password' VARCHAR(255) NOT NULL,
'gender' ENUM('Male','Female','Other') NOT NULL,
'technical_skills' VARCHAR(255) NOT NULL,
'phone' VARCHAR(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- CREATE TABLE `admin` (
--   `admin_id` int(11) NOT NULL,
--   `email` varchar(50) NOT NULL,
--   `password` varchar(500) NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8;