What is Receet ?
================
This project is first and foremost a learning tool for its' author to learn more about Symfony4, Angular and other technologies. 
As a personnal website, though, it's also a tool to get rid of the eternal question "What do we eat tonight ?" : you'll be able to generate a menu for a week, for as many people as you need, and get the recipes associated with it. The best part being, you'll get the matching groceries list !

How to install Receet ?
=======================

Prerequisites:
--------------
You need a PHP server, composer and npm installed on your machine. You can find help to install these on their official websites.

Step by Step installation:
--------------------------
Let's say you want to install Receet in the "receet" folder :
- Clone this repository (get the author's code)
	git clone https://github.com/Senvisage/receet.git receet
- Install the software (Angular and Symfony need to set up a lot of dependancies missing from the Github release)
	cd symfony ; composer install
	cd ../angular ; npm install
- Ensure your PHP server is online
- Reset the database (creation, and filling with default data) :
	cd ../symfony ; php bin/console doctrine:database:create ; php bin/console doctrine:migrations:diff ; php bin/console doctrine:migrations:migrate ; php bin/console doctrine:fixtures:load 
- Launch the Node server for the frontend part :
	cd ../angular ; ng serve

That's it ! You can now access :
- http://localhost/receet/symfony/public/ : The "backend" website, written in Symfony. It's main purpose is to provide basic CRUD operations.
- http://localhost:4200 : The "frontend" website, written in Angular. It's purpose is to deliver your menu and the grocery lists !

