# Introduction #

While one of Kohanas and our principle is "convention over configuration" this list should give you some advices.

# Accepted Conventions #
  * Follow the [Kohana CodingStyle](http://trac.kohanaphp.com/wiki/CodingStyle)
  * Convention over Configuration
  * Using the [latest stable Kohana release](http://svn.kohanaphp.com/tags/2.2.1)
  * Using [HTML 4.01 strict](http://www.w3.org/TR/html401/)

# Conventions in discussion #

  * validation should be done in the model.
  * Module views are in views/_module\_name_/
  * I think it's also wise to enforce a views convention. Best would be the standard controller to view mapping. So 'localhost/blog/post' url will have the view 'views/blog/post.php', 'localhost/blog/' -> views/blog/index.php etc. This will make for a consistent organisation of the view files.
  * What should we use as preferred javascript lib? +1 for jQuery
  * front- and backend have to contain the default route, while modules do not


# HTML #
  * form field names should contain form name, e.g. 

&lt;form id="login"&gt;

...

&lt;input name="login[username]"/&gt;

