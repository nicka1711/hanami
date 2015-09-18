## What is Hanami ? ##

Hanami is a project driven by the community around the Kohana framework (note: not the core Kohana devs) showing a common-sense or good coding style for a Kohana CMS application

This project aims at building the basic structure of a cms system that allow developers to have a common context in witch to develop modules for a production grade CMS system.

Hanami is a bundle of lib, models, views. Our intention is to create an basic functional, easy extensible CMS that can be the  basement for our projects.

Hanami ams at being a great starting place the next time you need to develop a cms for a client.

## Project status ##
This project has just been set up. We are in the initial faces and have to define the 'playing field'. We are in the process of defining what Hanami should do 'out of the box'. [Please tell us](http://forum.kohanaphp.com/comments.php?DiscussionID=648&page=1#Item_5) , what would be your ideal starting point for a cms?

If you want to help just pick an item from the todo list and get in touch.
The debate on the nature of this project is currently  taking place in [this category in the Kohana forum ](http://forum.kohanaphp.com/?CategoryID=12) generously provided by the Kohana team. The results of these discussions will the posted here in condensed form so we have some structure for the project.

## To do list ##

  * Create a 'roadmap',  'master plan' , The concrete actions needed to achieve Goal.
  * Lay out some 'milestones'. Errant and others have made inroads.
  * Break project up into smaller assignments that one person can work on.
  * How should Hanami be structured?
  * Put conventions into words.
  * Write Hanami 'Upgrade policy'. How do we handle the steady flow of new versions of Kohana in the future.
  * Start coding ! Create an actual commonly used module.

## Project goals ##
Debate is on [in the forum](http://forum.kohanaphp.com/comments.php?DiscussionID=640&page=1#Item_2)

This is a 'work in progress list'

  * Hanami is a simple generic starting-point for a CMS.
  * The most basic and commonly used cms features should work out of the box.
  * Hanami is about speeding up the development process.
  * Hanami is driven by the Kohana community. (note: not the core kohana devs, this is a separate project from Kohana).
  * Anyone can contribute as long as they follow the co-operation guide-lines .
  * Hanami is built with the Kohana framework following the  upgrade policy (yet to be defined)
  * Hanami is modular.
  * Because Hanami is a common context and modular Hanami can be a place for developers to share code an avoid that everyone has to 'reinvent the wheel'.
  * Hanami is place to share good coding practice and learn from each other.
  * Hanami will use convention over configuration.
  * Hanami has to be relatively simple 'Tools that you don't understand are of no use'.
  * Hanami should use OOP features of PHP5.
  * Hanami is should use the MVC pattern.


The more precise and detailed we can make this list the easier it will be to realise I think. Please add or subtract bullet points. All your other posts are not forgotten I just haven't had time to traverse them all and extract all the goodies


## What should Hanami do as an application out of the box ? ##
A concrete feature-list. (terribly incomplete)

  * have nice models (should we use ORM?)
  * authentication and acl of some kind
  * User management of some kind.
  * Hanami should have an administration interface and a 'recommended' way of building it. (that is not based on Forge or Formation but Coded  manually, or using helpers, models or whatever )

Suggestions from the forum:
  * static pages with basic version control (restoring pages, seeing what is changed, ..)
  * hierarchical pages (for example a page about photography (/page/photography) and its 'children' pages (aperture (/page/photography/aperture), HDR (/page/photography/HDR), ...))

## Low hanging fruit ##
This is a list a classes or resources or building blocks that already exist within the community that with a little tweaking could be used in Hanami.

  * dlibs [learning Kohana blog](http://learn.kohanaphp.com)
  * The [Kohana modules repository](http://code.google.com/p/kohanamodules/)
  * Some folks have suggested use of modules or classes they have already written I will traverse the forum and collect all these suggestions so we can discuss them.
  * ixmatus has ported the Zend ACL to kohana [see this thread](http://forum.kohanaphp.com/comments.php?DiscussionID=292&page=1#Item_8)
  * mkjems has a class for creating sucker-fish-type mark-up for easy menu generation.
  * more comming... please suggest.

## Quality insurance ##
How do we keep code clean and quality high?
-Text comming-

## Road map/ Milestones, Master plan ##
discussion [going on here](http://forum.kohanaphp.com/comments.php?DiscussionID=649&page=1#Item_1)

  * Establish some sort of authentication enhancing the existing Kohana Auth so that it can be given back to Kohana
  * Expand work on models already started by Errant. Should we use ORM ?


## Coding style ##
We use [the same coding style as Kohana](http://trac.kohanaphp.com/wiki/CodingStyle#CodingStandards)

## Basic application structure ##
  * That Hanami is split in two application folders 'frontend' and 'backend' with one system folder and one Modules folder.
  * Access to the two apps is done via .htaccess rewriting.  index.php loads 'frontend' application. admin.php loads  'backend' app.
  * The backend is accesed through the subdomain: admin. (ex: admin.hanami.dev)
  * The frontend  is accesed through www.hanami.dev

## The Hanami name ##
  * We have a name: [Hanami ](http://en.wikipedia.org/wiki/Hanami) ! Witch is japaneese for 'flower watching ' or 'enjoying flowers' Kohana means 'little flower'. Yes I know.. it's very clever :)

## License ##
  * Hanami will use the new  BSD license.

## Conventions ##
  * Hanami will be 'Convention over configuration'.
  * Hanami will use [Kohana svn trunk](http://trac.kohanaphp.com/browser/trunk) (soon to be Kohana 2.2)
  * Hanami uses:
```
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
```

#### Suggestions for conventions ####
  * validation should be done in the model.
  * I think it's also wise to enforce a views convention. Best would be the standard controller to view mapping. So 'localhost/blog/post' url will have the view 'views/blog/post.php', 'localhost/blog/' -> views/blog/index.php etc. This will make for a consistent organisation of the view files.
  * What should we use as preferred javascript lib?



## Developer Installation ##

  * Get the code from svn
  * make backend/logs and frontend/logs writeable
  * make backend/cache and frontend/cache writeable
  * create a virtual host:
```
<VirtualHost *:80>
    DocumentRoot "/opt/local/www/hanami"
    ServerName hanami.dev
    ServerAlias *.hanami.dev 
    <Directory "/opt/local/www/hanami">
    	Options Indexes FollowSymLinks Includes
    	Order allow,deny
	    AllowOverride All
	    Allow from All
    </Directory>		
</VirtualHost>
```
  * You need to add theese lines to your hosts file
```
127.0.0.1	www.hanami.dev
127.0.0.1	hanami.dev
127.0.0.1	admin.hanami.dev
```

Note :
It is no longer recommended that Hanami developers have different config.php , index.php and admin.php files. We need to have a common code.
/mkjems


## Project lead ##
This project is lead by mkjems,  mkjems@gmail.com
I write this wiki and try to extract the result of the discussions in the forum.


## Project members ##
The great pople from the Kohana community who allready have expressed interest in this project are: (kohana forum names)  and in no particular order.

Errant,
dlib,
Edy,
dyron,
bicho44,
utyf,
Lick,
xobb



## Can I contribute ? ##
Yes, indeed. This project aims to be a community effort that is open for everyone in the Kohana community who are willing to co-operate along the guidelines for cooperation (to be but into words, comming soon).
If you want to participate first, you need a google account . Second tell mkjems you google account address and you will be added to the project. Then you can start committing code through [svn](http://code.google.com/p/hanami/source/checkout).


## A little bit about the nature of this project ##
This is open source and no one is getting paid. This means that work on this project have to be done after regular work and other responsibilities in peoples spare time. We all understand this, so if you express a desire to participate we understand that you have a life and that things often take longer than you initially thought. Don't worry. Hanami is very patient and appreciates all contributions, be it loose ideas and suggestions or concrete code commits.

Hanami will of-course not materialise without  hard core code contributions and the people who do that will  receive the bragging rights and our admiration. :)

Another very important thing is that you must be sure that you have the rights to the code you commit to this project and that you do it in your own time or have an agreement with your workplace beforehand.

## Guidelines for cooperation ##
Before making making code changes please make post about in the Hanami category :
The post should contain two thing:

  * Describe the problem that you are trying to solve.
  * Describe how you are going to solve it.

This gives the rest of the team the chance to respond with questions and advise.
How do we resolve differences in opinion?
Leader has a 'veto' right ( the last word), other contributors can advise and argument their thoughts.

  * Running 'svn update' should not break your local version of Hanami.


## Hanami Upgrade policy ##
This should deal with how do we keep up with the konstant stream of new Kohana versions.


## Credits ##
Hanami is built using the excellent [Kohana ](http://kohanaphp.com/license.html)framework.
Copyright © 2007–2008 Kohana Team
All rights reserved.



---

## Quick SWOT for project Hanami ##

### Strengths ###
  * We have the Kohana framework as a familiar common toolbox.
  * many low hanging fruits and a fine team + Kohana mothership!
### Weaknesses ###
  * No funding, all work done in spare time
### Opportunities ###
  * To create a killer starting point for CMS with just enough features and the superb and familiar Koahana toolbox.
### Threats ###
  * All the usual open source issues.

---

