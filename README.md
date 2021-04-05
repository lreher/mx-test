# MX Test

This application was developed with Laravel/Vue using Laravel Sail. 

The easiest way to test it is by having docker installed. Sail will bring up all the services (namely the DB) and run all required commands to test the application locally. 

This can done by using the ``sail up`` command. Otherwise you may simply bring it up using a local Laravel environment.

Before testing please ensure to run all the required migrations, dependencies (npm, composer) and compile with webpack/mix.  ```npm run development```
