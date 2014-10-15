<?php
/**
 * index.php is the home page for our website
 *
 * It instantiates our class, htmlPage, and calls the method that streams the initial 
 * html for the top of our page.  The main centre section of this file makes space to 
 * stream the page content.  Finally, it calls the method that streams the final html 
 * of our boilerplate code.
 * 
 * @author David Argles <d.argles@gmx.com>
 * @version 08-09-2014, 23:40h
 * @copyright 2014 Haven Consulting
 */

  /* The following line makes the server display error messages.
     You may uncomment it during development, but don't forget to comment it out again 
     when you're ready to deploy! */
  //ini_set("display_errors", 1);

  /* The next two lines bring in the partials class and create a new instance.
     Don't change these lines! */
 include("library/partials.php");
 $template = new partials();
 
 /* Now we can stream our initial template code */
 echo $template->render("templateTop");
?>
      <!-- The main page content follows.  You can change this as you wish -->

      <h3>About TrimSite</h3>
      <img class="right" src="images/castle-sm.png" alt="[Castle SC screenshot]"/>
      <p>TrimSite is a website template that is designed to be quick and 
      	easy to install and set up.  It arose out of an observation that the 
      	80% rule applies to websites - that 80% of websites use 20% of 
      	available features 80% of the time.  That, and the fact that I needed 
      	to set up a couple of small websites in a hurry, and that I had 
      	something to hand that would do the job just fine.
      </p>
      	
      <img class="left" src="images/island-sm.png"  alt="[Island screenshot]"/>
      <p>You see, I'd been developing a website example for my students so 
      	they could see how easy it is to create good quality sites with 
      	standard HTML5 and CSS3.  Having developed the example over several 
      	sessions, it dawned on me that it could be used for real projects.  
      	TrimSite is the result.    	
      </p>
      
      <h3>Rationale</h3>
      <p>It's worth taking a moment to understand the rationale behind 
      	TrimSite.  I guess it could be summed up by noting that it's good 
      	to "Kiss your dry socks".  For any web project, it's a good idea to:
      </p>
      <ul>
      	<li><b>KISS</b>: Keep It Stupidly Simple.  Be ruthless about avoiding 
      		unnecessary complication.</li>
      	<li><b>DRY</b>: Don't Repeat Yourself.  If you need to make the same 
      		change in two different places, you've failed.</li>
      	<li><b>SOC</b>: Separation Of Concerns.  Think of content, and structure, 
      		and "Look and Feel" as three different things.  Don't mix them up.</li>
      </ul>
      <img class="right" src="images/sidebar-sm.png"  alt="[Sidebar screenshot]"/>
      <p>So in TrimSite, structure is handled by a couple of template files 
      	("partials") stored in the partials sub-directory.  
      	Look and Feel is handled by the CSS file(s).  There are actually several 
      	CSS files in operation on this site, one for each page, just to show what 
      	can be done.  Both the partials and the CSS files are stored in their own 
      	sub-directories in the "library" directory.  The content is contained in 
      	several "php" pages (one for each visible page) which consist nearly 
      	entirely of content marked up in simple HTML. 
      </p>
      
      <img class="left" src="images/spiffin-sm.png"  alt="[Spiffin screenshot]"/>
      <p>This website is itself built using TrimSite.  Well, you wouldn't 
      	expect otherwise, really, would you?  The only way I've cheated is that 
      	TrimSite provides four different CSS files to show what can be 
      	achieved.  In order to demonstrate this, I've made each page on this 
      	site pull in a different CSS file, so you can get some idea of what the 
      	four standard designs look like.  It makes it a bit of a pain 
      	switching from page to page, but it does give a few ideas of what's 
      	possible.  If you're willing to play with the CSS files yourself, 
      	I'd love to hear from you to see what you produce.
      </p>
      
      <img class="right" src="images/firefox-sm.png"  alt="[Fire Fox screenshot]"/>
      <p>Oh, by the way, it has been suggested I should charge for TrimSite.  
      	However, I'm an academic, so charging for things like this goes against 
      	the grain.  It does have a Creative Commons licence though, so if you 
      	want to use it to make serious money, talk to me.  But for the rest of 
      	you, I shall be thrilled if you find this useful.  Just 
      	<a href="mailto:d.argles@gmx.com">email me</a> and 
      	let me know how you get on with it.
      </p>

      <!-- End of main page content -->
<?php
 /* Now we stream our final boilerplate code */
 echo $template->render("templateBottom");
/**---------------------------------------------
 *             End of Code
 *----------------------------------------------
 */
?>
