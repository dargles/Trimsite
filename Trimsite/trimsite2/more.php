<?php
/**
 * membership.php deals with membership issues
 *
 * It calls our class, htmlPage, sets the title for our page, sets the page content,
 * & streams the completed boilerplate code.
 * 
 * @author David Argles <d.argles@gmx.com>
 * @version 08-09-2014, 22:48h
 * @copyright 2014 Haven Consulting
 */

  /* The following line makes the server display error messages.
     Uncomment it during development. */
  //ini_set("display_errors", 1);

  /* The next two lines bring in the partials class and create a new instance.
     Don't change these lines! */
 include("library/partials.php");
 $template = new partials();
 
 /* Now we can stream our initial template code */
 /* Note - we're changing the cssfile for this page */
 echo $template->render("templateTop", ["cssfile" => "left-menu.css"]);
?>

      <h3>More</h3>
      <p>
      	What I want to do on this page is to make some suggestions about how 
      	to make life as easy as possible (yes, I am basically lazy), but also 
      	to suggest some ways to do fun stuff with TrimSite.
      </p>
      <ul>
      	<li>
      		The first thing to focus on is to make sure you're using decent 
      		tools.  If you're stuck with Windows, <b>don't</b> use the built-in 
      		text editors, they'll mess you  up.  
      		<a href="http://notepad-plus-plus.org/download/">Notepad++</a> is 
      		as good as anything at the moment (2014).
      	</li>
      	<li>
      		But better than using Notepad++ is to get into using 
      		<a href="http://github.com">GitHub</a> linked with
      		<a href="http://www.aptana.com/">Aptana</a>.  Aptana really does 
      		make using GitHub pretty straight-forward.  If you take this 
      		approach, you'll find it will help you to do good stuff like 
      		making regular backups together with notes about what changes 
      		you implemented in any given session.  It also helps if you get 
      		into team development!
      	</li>
      	<li>
      	    Don't forget that good design doesn't start with pretty pictures!  
      	    Think about who you're communicating with and what you want to 
      	    communicate for starters.  Think about how you want your site to 
      	    appear in the search engine results.
      	</li>
      </ul>
      <p>
      	That's really stuff to sort out before you get serious on 
      	implementing a new project.  The next bit looks at how to actually 
      	use TrimSite.
      </p>
      <ul>
      	<li>
      		Remember the "Separation of Concerns" bit.  If you want to change 
      		page content, change it once in the main php pages in the main 
      		site directory.  If you want to change the look and feel of the site, 
      		that will be in whichever CSS file you named in the partials.ini file.
      		If you want to change the semantic structure of the page - don't!  It 
      		will be in the partials files in the library 
      		directory, but if you want to change that, you're <i>probably</i> 
      		thinking about things the wrong way.
      	</li>
      	<li>
      		Think carefully about webpage design.  You may have a great idea, and 
      		it might look cool - but is it really a good idea?  Although the 
      		supplied CSS files might not be wonderful, there is a really important 
      		set of design concepts behind them.  They all work reasonably well 
      		whatever the device, operating system or browser.  So you know that visitors will be 
      		able to access your site whatever their kit.  They also tend to load up 
      		fairly fast - and not everyone is on superfast broadband!  So try and 
      		keep these principles in mind when coming up with new designs.
      	</li>
      	<li>
      		Be careful about re-inventing the wheel.  The discussion facility on the 
      		"Contact" page of this site is simply using a Facebook gadget that they 
      		make freely available for use on your own website.  If you want ideas, 
      		there's loads of Google Gadgets, for example.  But remember, "Just 
      		because you can doesn't mean it's a good idea."  If you're old enough 
      		to remember, think of the disasters that were "Geocities".
      	</li>
      </ul>

<?php
 /* Now we stream our final boilerplate code */
 echo $template->render("templateBottom");
/**---------------------------------------------
 *             End of Code
 *----------------------------------------------
 */
?>

