

## Install Project
    - $ git clone https://github.com/cakecom/eas.git
    - composer install
    - php artisan key:generate
    
## Config Project
    - change .env.example to .env
    - edit .env file 
## Config .env
    - DB_DATABASE=
    - DB_USERNAME=
    - DB_PASSWORD=
## Import Mysql to DataBase
    - import eas.sql
## Run Server Test
    - php artisan serve
## Unit Test
        1. Auth Test
       Commands
        -  ./vendor/bin/codecept  run functional AuthCest.php
        2. Register Test
        Commands
        -   ./vendor/bin/codecept  run unit
## Feature
     1.Employee
        Username:employee@eas.com, employee2@eas.com, employee3@eas.com, employee4@eas.com, employee5@eas.com, employee6@eas.com, employee7@eas.com, employee8@eas.com
                 employee9@eas.com,employee10@eas.com
        Password:P@ssw0rd
        
     . Take the employee evaluation form
     
    2.Manager
        Username:manager@eas.com
        Password:P@ssw0rd
        
     . Create evaluation form
     . View evaluation scores
     . Submit a salary adjustment request
     
    3.Director
        Username:manager@eas.com
        Password:P@ssw0rd
      . View employee details  
      . Approve request  
     .    
## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
