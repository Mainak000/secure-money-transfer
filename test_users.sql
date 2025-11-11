-- Create test users with Password@123 (MD5 hash: d00f5d5217896fb7fd601412cb890830)
INSERT INTO users (id, firstname, lastname, username, password, email, phone, balance, type) VALUES
(101, 'John', 'Doe', 'johndoe1', 'd00f5d5217896fb7fd601412cb890830', 'johndoe1@example.com', '9876543210', 100.00, 2),
(102, 'Jane', 'Smith', 'janesmith1', 'd00f5d5217896fb7fd601412cb890830', 'janesmith1@example.com', '9876543211', 100.00, 2),
(103, 'Michael', 'Johnson', 'michaelj1', 'd00f5d5217896fb7fd601412cb890830', 'michaelj1@example.com', '9876543212', 100.00, 2),
(104, 'Sarah', 'Williams', 'sarahw1', 'd00f5d5217896fb7fd601412cb890830', 'sarahw1@example.com', '9876543213', 100.00, 2),
(105, 'David', 'Brown', 'davidb1', 'd00f5d5217896fb7fd601412cb890830', 'davidb1@example.com', '9876543214', 100.00, 2),
(106, 'Emily', 'Taylor', 'emilyt1', 'd00f5d5217896fb7fd601412cb890830', 'emilyt1@example.com', '9876543215', 100.00, 2),
(107, 'James', 'Anderson', 'jamesa1', 'd00f5d5217896fb7fd601412cb890830', 'jamesa1@example.com', '9876543216', 100.00, 2),
(108, 'Lisa', 'Martinez', 'lisam1', 'd00f5d5217896fb7fd601412cb890830', 'lisam1@example.com', '9876543217', 100.00, 2),
(109, 'Robert', 'Garcia', 'robertg1', 'd00f5d5217896fb7fd601412cb890830', 'robertg1@example.com', '9876543218', 100.00, 2),
(110, 'Maria', 'Lopez', 'marial1', 'd00f5d5217896fb7fd601412cb890830', 'marial1@example.com', '9876543219', 100.00, 2);