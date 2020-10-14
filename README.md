# Under Current Capital Test
This is Under Current Capital Test files

## File/Folder Contains
```
- database
- ucctestclient
- ucctestrestapi
```

`database` folder contain database SQL file `ucctest.sql` (MariaDB)

`ucctestclient` folder is **Single Page Application (Client)**

`ucctestrestapi` folder is **REST Webservice Application**

## For Run Application
I used XAMPP for Windows (Internal PHP Apache Server), including PHPMyAdmin for database server (MariaDB). To run the application, please install XAMPP or any internal Apache Server and database server (MariaDB). After that, copy folder `ucctestclient` and `ucctestrestapi` to htdocs folder or root host folder, then import file `ucctest.sql` to database server.

## Configuration
Need to setup the config for **REST Webservice** and **Client** application
- **REST Webservice**
  
  Set database connection config on file `ucctestrestapi/config/database.php`
  ```php
  private $host = "";	// Set Database Host
  private $database_name = ""; // Set Database Name
  private $username = ""; // Set Database Username
  private $password = ""; // Set Database Password
  ```
  
- **Client Page**

  Set API URL and BASE URL on file `ucctestclient/config/config.php`
  ```php
  // Set Default Config
  // API URL
  $api_url = ''; // Set API URL (REST Webservice URL)
  // BASE URL
  $base_url = ''; // Set BASE URL
  ```
  
## Unit Tests
Still on progress and will be update soon
