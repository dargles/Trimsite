*********************************************************************************
* Filename:     readme.txt                                                      *
* Version:      14.12.2013, 23:36hr                                             *
* Author:       David Argles, daargles@gmail.com                                *
* Description:  Read Me file for the castlesailingclub.org.uk website. It       * 
*               explains how the site works and how to maintain it.             *
*********************************************************************************

Philosophy
==========
The idea behind the way this website is set up is that there should be a clear 
division of content.  It's currently a bit of a work in progress (and might 
always be!) but the idea is that:

1) Page content should be contained in <pagename>.php files in the root 
   directory, one <pagename>.php file for each physical page displayed on the 
   website.  These should contain *only* sufficient text and html to display the 
   main content that varies from page to page, and there should be no style 
   definitions in these pages.  There has to be some "pro forma" code at the 
   beginning and end of each <pagename>.php to bring in the boilerplate code that 
   needs to surround it.

2) Any common code required for each page is handled in a template file called 
   "htmlPage.php" and which is located in the <library> directory in this folder.  
   Typically, the boilerplate code includes all the page header stuff and footer 
   stuff.  It also defines the layout of the whole page, but this has to be 
   considered in conjunction with the .css file.  So if you want to change 
   anything to do with the page layout throughout the site, do this *once* in 
   htmlPage.php.

3) All the information that is repeated from page to page throughout the site 
   (such as club name, the tagline, the menu labels and links etc) is extracted 
   into an htmlPage.ini file, also located in the <library> directory.  So if you 
   want to change any key values relating to the boilerplate page, such as menu 
   entries or link locations, do this *once* in htmlPage.ini.

4) *All* style definitions -should- be contained in htmlPage.css located in 
   <library> (actually, this is hard to achieve in practice for various pragmatic 
   reasons).  So if you want to change anything to do with style, do this *once* 
   in htmlPage.css (getting the idea ;-) ?)

5) The basic approach used in programming is Object Orientated.  It's hardly 
   rocket science as far as the individual content pages are concerned and the 
   comments in template.php (see <library> ) should help.  It's a bit more slick in 
   htmlPage.php, but if you've got that far, you should be more confident in OOphp.

Layout Rationale
================
6) At the moment, the site is small, so the idea is that each display page is 
   defined by a corresponding <pagename.php> page in the site's root directory.

7) All the necessary graphics are held in the <graphics> directory, and... 

8) ...all the boilerplate files used by the <pagename.php>s are held in the 
  <library> directory.  These consist of:
   - "htmlPage.php" (the class definition for the template page), 
   - "htmlPage.ini" (the ini file containing definitions of the basic template 
     data such as site title, menu definitions, etc)),
   - "htmlPage.css" (the CSS file for the template page), and
   - "template.php" (the pro forma for a basic site web page).  This page may be 
     copied into the root directory and renamed as appropriate o create a new 
     page for the website.
     
9) There is also a <documentation> directory which holds all the necessary 
   documentation for the website. 

Documentation
=============
10) The idea of the "readme.txt" file (this one!) is to explain the rationale 
    behind the site design and how the site works.
11) The rest of the documentation is held in the <documentation> directory.  At 
    the moment (14dec2013), it consists of four files which all need updating:
    - howto.txt: describing how to maintain the site;
    - quickstart.txt: describing the basics of how to get going quickly;
    - todo.txt: recording what needs to be done (or thought about); and 
    - updates.txt: recording updates to the site.  At the moment, this file records 
    everything, but if I get comfortable with Aptana, I guess this file will record 
    updates to displayed site content rather than structural updates. 

Practicalities
==============
I -think- that's about it - everything else should be held in the documentation 
sub-directory.

Enjoy! 

--- End of file ---
