# User Activity Logging Functionality

This feature logs user activity in the system, tracking the following information:
- Username
- Webpage accessed
- Client's IP address
- Timestamp

## Implementation Details

### Database Table
The logs are stored in a new table called `user_activity_logs` with the following structure:
```sql
CREATE TABLE `user_activity_logs` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `webpage` text NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

### Files Added
1. `classes/UserActivityLogger.php` - Class to handle logging user activity
2. `inc/activity_logger.php` - Middleware included in pages to log activity
3. `user_activity_logs.php` - Admin page to view activity logs
4. `setup_activity_logs.php` - Script to create the database table
5. `database/user_activity_logs.sql` - SQL file with table creation script

### Integration
- The activity logger is included in `index.php` and `login.php` to track all page accesses
- Only logged-in users' activities are tracked
- Admin users can view the logs by accessing the "User Activity Logs" page in the Maintenance section

## Setup Instructions

1. Run the `setup_activity_logs.php` script to create the database table:
   ```
   http://your-domain.com/setup_activity_logs.php
   ```

2. The logging functionality will automatically start working after the table is created

## Viewing Logs

Admin users can view the logs by clicking on "User Activity Logs" in the Maintenance section of the sidebar menu. 