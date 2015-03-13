To run locally:
1. run moore_joshua_backend.sql to create the database
2. open functions.php and change the user and pass on lines 4 and 5 to match your username and password
3. If you Use xampp or a similar program to simulate a server with php and mysql
4. For xampp copy all files into a sub folder in xampp/htdocs folder
5. In your web browser go to localhost/subfolder/index.php where subfolder is the name of the sub folder in htdocs where you put the files
6. If you use a server to run php, upload everything to the server and go to index.php

5 Test queries and expected results are shown in test_cases.pdf

Known bugs and missing features:
-if you add an item ot post there is currently no checking to make sure you have all necessary value (attributes marked as not null in db), so if you don't fill those in there will be an error
-When pictures are not present the porgram runs but the browser console complains
-No check to make sure a file uploaded is actually a picture
-When a user makes a trade with an item they have already put in a post, it removes the item but not the post
-trade history becomes inaccurate after the item gets traded multiple times
-No Option to post an item recieved in a trade
-trading is bugged, the seller keeps their item during a trade
-Can currently put an item into mulitple posts