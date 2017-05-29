# Money-in-the-Bank
Basic Banking Website using PHP and MYSQL

The Database here, named "ATM" uses two tables:
"users" and "Passbook"

users Structure:

id        int           not NUll  AutoIncrement(Primary Key)

username  varchar(50)   not NUll

password  varchar(50)   not NUll



Passbook Structure:

id				        	int				      not NULL		AutoIncrement(PRIMARY KEY)

amount	      			decimal(10,2) 	not NULL		

date_transaction  	varchar(50)		  not NULL

time_transaction	  time 	 		      not NULL

details				      varchar(50)		

user        				varchar(50)		  not NULL

