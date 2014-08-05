Early demo
===========
* A working demo can be found [here](http://www.sctimesapps.com/kaitest/leafletclickadd)
* On mobile, tap-and-hold to add a marker


Leaflet click-to-add-marker "app"
===========

A db-powered version of "User submitted leaflet" app, with an admin tool to monitor and manage the markers.

Benefits include ease-of-use for the user end and possibility for it to be automatically added to the map (this is turned off in the demo to avoid people adding inappropriate language).

However, requires a database set up. "User submitted leaflet" circumvents this by having the markers be pulled from a Google spreadsheet (useful for smaller news orgs with only a front end webdev).

Goal is to provide a right-click-to-add-marker app and circumvent the need to type in address, this would allow users to pinpoint locations that may not be address-friendly (such as potholes on roads, they're not exactly easy to mark with an address).

Setting up the DB
===========
* Set up your MySQL DB as usual
* Note however that the current code is a single-sign on hardcoded admin account. 
* There's no logout feature either. This might be changed at a later date, but isn't crucial to what my org requires at this point.
* Add the DB info into temp.php. This info will be the credentials needed to login to the admin page.
* Login is, by default, located in *appname*/login.php

Recent changes
===========

* Added markercluster plugin
* Prepared markercluster layer for bulk loading of markers
* Added form, switched to php and added relevant scripts for pushing/pulling from DBs
* Changed marker default status to "off"
* Added login page and relevant scripts to post to DB
* Completed admin tool to delete & edit markers

Current status
===========

Far from being complete. Below is the general to-do-list.

To Do
* Add auto refresh upon submission
* Check for submission before adding a marker
* Photo upload and hosting and presentation
* Style admin tool
* Add logout
* Add user registration

~~*Add admin tool to avoid trolls~~

~~*Work on session authentication and updating db~~

~~*Proper CloudMade tiles and API set-up~~

~~*Format styling of markercluster layers~~

~~*Record markers on either Google Docs spreadsheets or a proper database~~

~~*Fire right-click events (currently left-click events)~~

~~*Right-click form for details and/or photo upload~~
