<?php
/**
 * contact.php gives the contact details for our project
 *
 * It instantiates our class, webpage, and calls the method that returns the initial 
 * html for the top of our page.  The main centre section of this file makes space to 
 * stream the page content.  Finally, it calls the method that returns the final html 
 * of our boilerplate code.
 * 
 * @author David Argles <d.argles@gmx.com>
 * @version 11-09-2015, 16:31h
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
      
      <h3>Contact</h3>
      <p>If you want to get on touch, you can:</p>
      <ul>
        <li>
          Use the <a href="http://argles.org/trimsite/contact.php#discussion">
          TrimSite</a> discussion area, or
        </li>
        <li>
          email me on <a href="mailto:d.argles@gmx.com">d.argles@gmx.com</a>.
        </li>
      </ul>

      <!-- End of main page content -->
<?php
  /* Now we stream our final boilerplate code */
  echo $template->render("BOTTOM");
/**---------------------------------------------
 *             End of File
 *----------------------------------------------
 */
?>

