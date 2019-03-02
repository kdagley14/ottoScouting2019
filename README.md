# ottoScouting2019
## General Setup
You will need to [install MAMP](https://www.mamp.info/en/downloads/) on your computer before you can begin.

- download all of the files in ottoScouting2019 and place them in MAMP's htdocs folder.
- start MAMP and click the 'Start Server' button
- click 'My Website' at the top of the webpage that it pulls up to go to the scouting site
- click on 'phpMyAdmin' under 'Tools' to go to the database

## Competition Setup
- open phpMyAdmin to go to the database
- on the left-hand side, click 'New' to create a new database for the competition
- name the database after the name of the competition and year with no spaces (ex. gainsville2019) and hit create.
- open globalVars.php and update $dbname to be exact same name that you gave the database. For example:
'''
$dbName = "gainsville2019";
'''
- open up the terminal and run the following command:
'''
php createNewTables.php
'''
- check to make sure that 3 tables were made in the new database