# polyalumniloans
By Chisomo Kalumbe.
Small loan beneficiary assessment system. Collects applicant information, analyses it based on the socio-economic factors of the applicant and gives the applicant a general score. Includes other features like CRUD loan details etc and has three types of users Admin, Data Clerk and client/beneficiary.

# Requirements
PHP 7 or above
MySQL 5.6 or above

# Install procedure
- Clone repository
- Import database finaldb.sql
- It is important to set the root directory as a virtualhost. For example for Windows users can specify the line:
  127.0.0.1       polyalumniloans in the file C:\Windows\System32\drivers\etc\hosts.
  Linux users can do the same in /etc/hosts. Other settings can be made depending on the server running for example xamp server users need
  to specify the DocumentRoot in C:\xamp\apache\conf\extra\httpd-vhosts.conf like so:
  
  <VirtualHost *:80>
	DocumentRoot "C:/xampp/htdocs/dev.polyalumniloans.org"
	ServerName polyalumniloans
  </VirtualHost>
  
  # Other information
  
  All passwords are 123456
