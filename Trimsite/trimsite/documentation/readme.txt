********************************************************************************
* Filename:     readme.txt                                                     *
* Version:      30.12.2016, 15:30h                                             *
* Author:       David Argles, daargles@gmail.com                               *
* Description:  Read Me file for this website. It explains how the site works  * 
*               and how to maintain it.                                        *
********************************************************************************

Philosophy
==========
The idea behind the way this website is set up is that there should be a clear 
division of content.  It's currently a bit of a work in progress (and might 
always be!) but the idea is that:

1) Page content should be contained in <pagename>.php files in the root 
   directory, one <pagename>.php file for each physical page displayed on the 
   website.  These should contain *only* sufficient text and html to display 
   the main content that varies from page to page, and there should be no style 
   definitions in these pages.  There has to be some "pro forma" code at the 
   beginning and end of each <pagename>.php to bring in the boilerplate code 
   that needs to surround it.

2) All the files required to display the page template appropriately are 
   contained in the <trimsite> subdirectory.  "webpage.class.php" defines the 
   webpage class that handles the accessing and streaming of the boilerplate 
   code.

3) The boilerplate code required for each page is provided by a template file 
   called "template.html".  This is held in <trimsite/templates>.  The 
   boilerplate code includes all the page header stuff and footer stuff.  The 
   menu boilerplate code is also contained in <trimsite/templates> in five PHP 
   "partials".

4) All the information that is repeated from page to page throughout the site 
   (such as site name, the tagline, the menu labels and links etc) is extracted 
   into an .ini file, also located in the <trimsite> directory.  So if you 
   want to change any key values relating to the boilerplate page, such as menu 
   entries or link locations, do this *once* in webpage.ini.

5) *All* style definitions are contained in the CSS file named in webpage.ini 
   and located in <trimsite/cssfiles>.  So if you want to change anything to do 
   with style, do this *once* in the relevant CSS file (getting the idea ;-) ?)

6) The basic approach used in programming is Object Orientated.  It's hardly 
   rocket science as far as the individual content pages are concerned and the 
   comments in examplePage.php (see <trimsite> ) should help.  It's a bit more 
   slick in webpage.class.php, but if you've got that far, you should be more 
   confident in OOphp.

7) Don't confuse semantic structure as defined by template.html with physical 
   layout as defined by the relevant CSS.  The HTML defines the -function- of 
   the relevant item; the CSS defines how it -displays-.

Layout Rationale
================
 8) Trimsite is designed for small sites, so the idea is that each display page 
    is defined by a corresponding <pagename.php> page in the site's root 
    directory.  However, from version 4 onwards, TrimSite will cope 
    automatically if you put some (or all) of the pages in subdirectories.

 9) All the graphics necessary to display the template page are held in the 
    <trimsite/graphics> directory.  The expectation is that you will create a 
    <media> directory in the website's root directory to hold any pictures, 
    videos, or whatever might be required for the main page content.  So the 
    <trimsite/graphics> directory is intended only for template graphics 
    such as site logo, banner pictures and the like.

10) All the files used by the <pagename.php>s to create a template page are 
    held in the <trimsite> directory.  These consist of:
    - "website.class.php" (the class definition for the template page); 
    - "website.ini" (the ini file containing definitions of the basic template 
      data such as site title, menu definitions, etc));
    - "template.html" contained in <trimsite/templates>, which defines the 
      template HTML code for our pages;
    - "cssfiles/xxx.css" (the CSS file for the template page); and
    - "examplePage.php" (the pro forma for a basic site web page).  This page 
      may be copied into the root directory and renamed as appropriate to 
      create a new page for the website.
     
11) There is also a <trimsite/documentation> directory which holds all the 
    necessary documentation for the website. 

Documentation
=============
12) The idea of the "readme.txt" file (this one!) is to explain the rationale 
    behind the site design and how the site works.
13) All the documentation can be found in the <trimsite/documentation> 
    directory.  At the moment (11sep2015), it consists of four files:
    - howto.txt: describing how to maintain the site;
    - quickstart.txt: describing the basics of how to get going quickly;
    - updates.txt: recording updates to the site.
    - readme.txt: this file.

Practicalities
==============
I -think- that's about it - everything else should be held in the documentation 
sub-directory.

Enjoy! 

--- End of file ---
