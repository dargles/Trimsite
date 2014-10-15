<?php
/**
 * sailing.php covers sailing and location
 *
 * It calls our class, htmlPage, sets the title for our page, sets the page content,
 * & streams the completed boilerplate code.
 * 
 * @author David Argles <d.argles@gmx.com>
 * @version 01-01-2014, 08:20h
 * @copyright 2014 Haven Consulting
 */

  /* The following line makes the server display error messages.
     Uncomment it during development. */
  //ini_set("display_errors", 1);

  /* The next two lines bring in the htmlPage class and create a new instance.
     Don't change these lines! */
  require("library/htmlPage.php");
  $page = new htmlPage();
  /* The next line streams the html.  Don't change this. */
  $page->HTMLstreamTop();
?>

      <h3>Installation</h3>
      <p>
      	I'd <i>like</i> to go through a little explanation of how TrimSite is 
      	set up and how it works <i>before</i> you get down to installing it 
      	and exploring what it can do.  But let's be honest, that's never 
      	going to happen - you are like me, and just want to get your hands 
      	on the code and to explore it.  There's quite a bit of internal 
      	documentation in the TrimSite package, so this page is going to be 
      	a basic "this is how you get started" offering.  When you get stuck, 
      	either read the documentation, or use the <a href="contact.php#discussion">
      	comments section</a> in the comments page.
      </p>
      
      <h3>Step by Step</h3>
      <p>
      	The following step-by-step guide is designed to indicate the bare 
      	minimum required to get a TrimSite up and running. If you don't 
      	understand any of these steps, then you need to switch to the 
      	<a href="documentation/quickstart.txt" target="_blank">quickstart guide</a> or the
      	<a href="documentation/howto.txt" target="_blank">howto guide</a> where there is more 
      	detail given.
      </p>
      <ol>
      	<li><a href="download/trimsite.zip">Download</a> the code (it's about 
      	    1Mb).  This is a zip file, so...
      	</li>
      	<li>...unzip the files.  There will be three directories (documentation, 
      		graphics, and library), two php pages (index.php and next.php) and 
      		a readme.txt file.
      	</li>
      	<li>Copy all of these into your web directory.  Which you have previously 
      		prepared and set up ready to go, haven't you... ;-)
      	</li>
      	<li>Go into the library directory and edit htmlPage.ini (in a text 
      		editor).  The main things to change in this file are "heading" and 
      		"tagline" - these determine what appears at the head of every page.
      	</li>
      	<li>You'll also need to change the section under [menu].  What 
      		follows determines the labels used on the menu bar, and the pages 
      		that they point to.  You could leave the first entry as "Home = 
      		index.php", but maybe change the second entry to whatever you fancy.  
      		But make sure that any page you specify in this section actually 
      		exists! 
      	</li>
      	<li>Finally, edit your php pages (again in a text editor) to say what 
      		you want them to.  Make sure that the file names of your pages 
      		match the filenames you put in htmlPage.ini.
      	</li>
      </ol>
      
      <p>
      	Save all your changes and then check the results in a web browser.  
      	So far, it should be nothing too exciting.  However, it should 
      	already be obvious that adding page content is pretty straightforward.  
      	Just keep it simple - try and stick with &lt;h3&gt; for headings and 
      	a simple &lt;p&gt; for paragraphs. 
      </p>
      <p>
      	Once you're happy with the basic content, You'll want to play with 
      	things like the logo and the banner graphic.  And maybe play with the 
      	different CSS files.  Just to get you started, the (limited) default 
      	options are: 
      </p>
      <table>
      	<tr><td>Logo:</td><td>logo-haven.png<br />logo-pennant.png</td></tr>
      	<tr><td>Banner:</td><td>banner.jpeg<br />seascapes.jpg</td></tr>
      	<tr><td>CSS files:</td><td>htmlPage.css<br />back-pic.css<br />
      		left-menu.css<br />fixed-menu.css</td></tr>
      	<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
      </table>

<?php
  /* The final line streams the html.  Don't change this. */
  $page->HTMLstreamBottom();
/**---------------------------------------------
 *             End of Code
 *----------------------------------------------
 */
?>

