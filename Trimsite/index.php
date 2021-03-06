<?php
/**
 * index.php is the home page for our website
 *
 * It instantiates our class, webpage, and calls the method that returns the initial 
 * html for the top of our page.  The main centre section of this file makes space to 
 * stream the page content.  Finally, it calls the method that returns the final html 
 * of our boilerplate code.
 * 
 * @author David Argles <d.argles@gmx.com>
 * @version 22-09-2016, 17:53h
 * @copyright 2016 Haven Consulting
 */

  /* The next two lines bring in the webpage class and create a new instance.
     Don't change these lines! */
  include("trimsite/webpage.class.php");
  $template = new webpage();

  /* Now we can stream our initial template code */
  echo ($template->render("TOP"));
?>
        <!-- The main page content follows.  You can change this as you wish -->
      
        <h3>TrimSite</h3>
        <p>This is the delivery version of TrimSite.  To set it up, see:</p>
        <ul>
          <li>
            the <a href="readme.php">readme file</a>,
          </li>
          <li>
            the <a href="http://argles.org/trimsite/">TrimSite website</a>,
          </li>
          <li>
            the <a href="library/documentation/">documentation folder</a>,
          </li>
          <li>
            and the internal code documentation in each file.
          </li>
        </ul>

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

