# Travel-Blog
This is a porject of group 1 for course Web Application Development.

Run on MAMP or XAMPP
## HOW TO RUN
- Project folder must be located at "htdocs" folder of MAMP or XAMPP.


- Database connection
  - At file: ***"/Travel-Blog/blog-php-mysql/app/database/connect.php"*** configure to match your database server.
  
  
- Configure BASE-URL path: ***"/Travel-Blog/blog-php-mysql/path.php"*** change the localhost port as your.


- Password recovery using PHPMailer:
  - Open file ***"/Travel-Blog/blog-php-mysql/PHP/requestReset.php"***
    - Set your format mail at line **45**. As here we use Gmail.
    - Open file ***"/Travel-Blog/blog-php-mysql/PHP/requestReset.php"*** at line **47** and **48** set your real email username and password. This is the receiver mail.
