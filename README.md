# RoverMapping

Application requires php7.4 and php-dom (php-xml) extension.

When download run **composer install** command


In order to input data and run application, there is two ways: 
* you can call via http request ./index.php and add input parameter as series of sequences
as **/index.php?input=5 5,1 2 N,LMLMLMLMM,3 3 E,MMRMMRMRRM**
* through console call (my perfer) **index.php 5,5 1,2,N LMLMLMLMM**

Difference is in console passing arguments are seperated with space and link space in squence between numbers and letters are replaced with comma


in order to run tests command is **vendor/bin/phpunit tests**
