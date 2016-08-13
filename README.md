# juddfoundation
juddfoundation.org's redesigned wordpress site

## Local Environment Setup
JUDD runs on the latest version of WordPress using PHP 5.6 and MySQL 5.5. Actual server is running on an AWS EC2 instance with the Amazon Linux AMI 2016.03 release.
 
* Download Vagrant
* Download VirtualBox
* Clone this vagrant file and follow the setup instructions in the readme file: https://github.com/ivcreative/Vagrant-scotch-lamp
   * This has the needed versions of PHP and MySQL.
   * Edit the vagrant file to set up your local domain – be sure to also name your database the same domain.
   * Upon provisioning, it will create a folder with the domain, and inside a db and public folder.
   * Run vagrant up – you should be live!
   * Edit your host file to set up your local domain.
   * Set up your MySQL databse by vagrant ssh into the local server.
   * Install the latest wordpress in the root of your public folder.
 
## The Repository
This repository only contains files in the wp-content folder – theme and plugins - and a database backup.
https://github.com/TeamSubjectMatter/juddfoundation
 
* Built using underscores
* Uses SASS and Gulp