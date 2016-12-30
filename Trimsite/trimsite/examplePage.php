<?php
/**
 * examplePage.php is the example page for our website
 *
 * It instantiates our class, webpage, and calls the method that returns the initial 
 * html for the top of our page.  The main centre section of this file makes space to 
 * stream the page content.  Finally, it calls the method that returns the final html 
 * of our boilerplate code.
 * 
 * @author David Argles <d.argles@gmx.com>
 * @version 11-12-2016, 23:32h
 * @copyright 2016 Haven Consulting
 */

  /* The next two lines bring in the webpage class and create a new instance.
     Don't change these lines! */
  include("trimsite/webpage.class.php");
  $template = new webpage("");
 
  /* Now we can stream our initial template code */
  echo $template->render("TOP");
?>
        <!-- The main page content follows.  You can change this as you wish -->
      
        <h3>Example Page</h3>

        <p>This is the example page for TrimSite.  Copy it into your website's root directory and rename it as appropriate for the page you want to create.</p>

        <p>When creating a standard page, try and stick to using &lt;h3&gt; for headings (&lt;h1&gt; is used for the page title and &lt;h2&gt; for the sub-title), and a simple &lt;p&gt; for paragraphs.  The CSS file will sort out the layout for various devices, and introducing unexpected styling may mess this up.</p>

        <p>As delivered, Trimsite should be HTML5 and CSS3 compliant.  You are encouraged to stick to those standards; it's not a bad idea to test your pages in the W3 <a href="http://validator.w3.org/">HTML5</a> and <a href="http://jigsaw.w3.org/css-validator/">CSS3</a> validators as you go.</p>

        <p>The W3 validators should do a basic check for accessibility, but it might not be a bad idea to also check your code in an <a href="http://achecker.ca/checker/">accessibility checker</a>.</p>

        <p>Trimsite should also be mobile-friendly, responsive, cross-browser compatible and legacy-browser compatible.  Whilst the display cannot be as good in older browsers, it should at least display cleanly and work properly.  It also seeks to be version-friendly as far as server installations are concerned, so it should work properly even if your web server isn't running the latest version of PHP.</p>	

        <!-- End of main page content -->
<?php
  /* Now we stream our final boilerplate code */
  echo $template->render("BOTTOM");
/**---------------------------------------------
 *             End of File
 *----------------------------------------------
 */
?>

