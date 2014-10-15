<?php
/**
 * contact.php gives contact details
 *
 * It calls our class, htmlPage, sets the title for our page, sets the page content,
 * & streams the completed boilerplate code.
 * 
 * @author David Argles <d.argles@gmx.com>
 * @version 08-09-2014, 22:47h
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
 echo $template->render("templateTop", ["cssfile" => "fixed-menu.css"]);
?>
      <div id="fb-root"></div>
      <script>
        (function(d, s, id) 
        {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=729079167158345&version=v2.0";
          fjs.parentNode.insertBefore(js, fjs);
        }
        (document, 'script', 'facebook-jssdk'));
      </script>

      <h3>Contact</h3>
      <p>TrimSite is freely downloadable, so you can just go ahead, 
      	download it, and play with it.  If you do have a look at it, I'd 
      	really like to hear from you, preferably by email, on:</p>
      <p class="centre"><a href="mailto:d.argles@gmx.com">
      	d.argles@gmx.com</a></p>
      	
      <h3 id="discussion">Discussion</h3>
      <p>There's the opportunity to discuss TrimSite by using the 
      	Facebook facility below:</p>
      <div class="centre">
      <div class="fb-comments" data-href="http://argles.org/" data-width="400" data-numposts="5" data-colorscheme="dark"></div>
      </div>
      
<?php
 /* Now we stream our final boilerplate code */
 echo $template->render("templateBottom");
/**---------------------------------------------
 *             End of Code
 *----------------------------------------------
 */
?>

