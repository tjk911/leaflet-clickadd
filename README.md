Early demo
===========
* A working demo can be found [here](http://www.sctimesapps.com/kaitest/leafletclickadd)
* On mobile, tap-and-hold to add a marker


Leaflet click-to-add-marker "app"
===========

A simpler version, and arguably less secure and less verifiable, version of the "User submitted leaflet" app.

Goal is to provide a right-click-to-add-marker app and circumvent the need to type in address, this would allow users to pinpoint locations that may not be address-friendly (such as potholes on roads, they're not exactly easy to mark with an address).

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
* ~~Proper CloudMade tiles and API set-up~~
* ~~Format styling of markercluster layers~~
* ~~Record markers on either Google Docs spreadsheets or a proper database~~
* ~~Fire right-click events (currently left-click events)~~
* ~~Right-click form for details and/or photo upload~~
* Photo upload and hosting and presentation
* ~~Add admin tool to avoid trolls~~
* ~~Work on session authentication and updating db~~
* Style admin tool