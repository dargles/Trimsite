<?php
/**
 * readme.php displays the readme file for our website
 *
 * It instantiates our class, webpage, and calls the method that returns the initial 
 * html for the top of our page.  The main centre section of this file makes space to 
 * stream the page content.  Finally, it calls the method that returns the final html 
 * of our boilerplate code.
 * 
 * @author David Argles <d.argles@gmx.com>
 * @version 11-09-2015, 16:32h
 * @copyright 2015 Haven Consulting
 */

  /* The next two lines bring in the webpage class and create a new instance.
     Don't change these lines! */
  include("trimsite/webpage.class.php");
  $template = new webpage();
 
  /* Now we can stream our initial template code */
  echo $template->render("TOP");
?>
      <!-- The main page content follows.  You can change this as you wish -->
      
      <h3>The Readme File</h3>
      <p>
        There is a readme.txt file in the main directory.  This is displayed 
        below so you can have easy access to it, but please note that doing 
        so makes this page so it only displays properly at full screen width.
        If you've only got a narrow screen available, you could try printing 
        this page out, maybe?
      </p>
      
      <pre><?php include("trimsite/documentation/readme.txt"); ?></pre>

      <!-- End of main page content -->
<?php
  /* Now we stream our final boilerplate code */
  echo $template->render("BOTTOM");
/**---------------------------------------------
 *             End of File
 *----------------------------------------------
 */
?>

