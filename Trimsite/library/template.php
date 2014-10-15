<?php
/**
 * template.php is the template webpage for our website
 *
 * It instantiates our class, htmlPage, and calls the method that streams the initial 
 * html for the top of our page.  The main centre section of this file makes space to 
 * stream the page content.  Finally, it calls the method that streams the final html 
 * of our boilerplate code.
 * 
 * @author David Argles <d.argles@gmx.com>
 * @version 18-12-2013, 18:09h
 * @copyright 2013 Haven Consulting
 */

  /* The following line makes the server display error messages.
     You may uncomment it during development, but don't forget to comment it out again 
     when you're ready to deploy! */
  //ini_set("display_errors", 1);

  /* The next two lines bring in the htmlPage class and create a new instance.
     Don't change these lines! */
  require("library/htmlPage.php");
  $page = new htmlPage();
  /* The next line streams the initial page html.  Don't change this. */
  $page->HTMLstreamTop();
?>
      <!-- The main page content follows.  You can change this as you wish -->
      
      <h3>Template Page</h3>
      <p>Welcome to my Site!</p>

      <!-- End of main page content -->
<?php
  /* The final line streams the remaining html.  Don't change this. */
  $page->HTMLstreamBottom();
/**---------------------------------------------
 *             End of File
 *----------------------------------------------
 */
?>

