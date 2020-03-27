<?php
/*
  Template name: natural template
*/
?>


<?php get_header('natural'); ?>
<!-- ====================================== -->


<?php
  $recordId = get_field('associated_record')[0]->ID;

  $largeCover = get_field('record_cover_large', $recordId)["url"];
  $smallCover = get_field('record_cover_small', $recordId)["url"];
?>

<?php
  /*

    https://codepen.io/sheriffderek/pen/poJWBde?editors=1001
    https://codepen.io/sheriffderek/pen/ebf5d629621fe78982295e62dc4800db?editors=1010

  */
?>

<video-background>
  <iframe id='video-outlet' src='https://player.vimeo.com/video/400744064?controls=false&loop=true' width='640' height='480' frameborder='0' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
</video-background>



<main class='stuff'>

  <section class='branding'>
    <div class='logo'>
      <img src='<?php echo get_template_directory_uri(); ?>/images/natural/title.jpg'>
      <div class='click-suggestion'>
        (click to enter)
      </div>
    </div>
  </section>


  <section class='record'>
    <div class='content'>
      <picture class='image-w record-cover'>
        <img src='<?=$smallCover?>'>
      </picture>

      <ul class='links-to-buy'>
        <li>
          <a href='http://smarturl.it/LATakedownIIDL'>
            <span>Digital</span>
          </a>
        </li>
        <li>
          <a href='http://smarturl.it/LATakedownIIRM'>
            <span>CD/LP</span>
          </a>
        </li>
      </ul>
    </div>

    <button class='content-toggle' data-view='record'>
      <span>The record</span>
    </button>
  </section>



  <section class='upcoming'>
    <div class='content'>
      <h2 class='section-heading'>Upcoming</h2>
      
      <?php $useMiniEventCard = true; ?>
      <?php $eventsToShow = 3; ?>
      <?php $onlyUpcoming = true; ?>
      <?php include('partials/loops/events-loop.php'); ?>
    </div>

    <button class='content-toggle' data-view='upcoming'>
      <span>Upcoming</span>
    </button>
  </section>



  <section class='promo'>
    <div class='content small-screen-only'>
      <!-- <h2 class='section-heading'>Promo video</h2> -->
      
      <div class='fit-vids' style='position: relative; width: 100%; height: 0; padding-bottom: 75%;'>
        <iframe style='position: absolute; display: block;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;'src="https://player.vimeo.com/video/401099104" width="640" height="480" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
      </div>
    </div>
  </section>



  <section class='contact'>
    <div class='content'>
      <h2 class='section-heading'>Contact</h2>
      
      <?php
        $emailAddress = get_field('primary_email_address', 'option');
      ?>

      <a href='mailto:<?=$emailAddress?>'>
        <?=$emailAddress?>
      </a>

      <?php include('components/social-links.php'); ?>
    </div>

    <button class='content-toggle' data-view='contact'>
      <span>Contact</span>
    </button>
  </section>



  <section class='about'>
    <div class='content'>
      <h2 class='section-heading'>About</h2>

      <?php the_field('general_about', 30); ?>
    </div>

    <button class='content-toggle' data-view='about'>
      <span>About</span>
    </button>
  </section>


  <?php /*
  <section class='other-records'>
    <div class='content'>
      <h2 class='section-heading'>Other records</h2>

      <?php include('partials/loops/upcoming-mobile.php'); ?>
    </div>

    <button class='content-toggle' data-view='other-records'>Other records</button>
  </section>
  */ ?>

</main>




<script>
  // var $contentToggles = document.querySelectorAll('.content-toggle');

  var fadeOutTime = false;

  
  (function() {


    // Video
    var $videoOutlet = document.querySelector('#video-outlet');
    var backgroundPlayer = new Vimeo.Player($videoOutlet);


    backgroundPlayer.on('loaded', function() {
      document.body.classList.add('video-loaded');
      console.log('backgroundPlayer is now loaded');
    });

    backgroundPlayer.on('play', function() {
      // document.querySelector('.branding').classList.add('fly-away');
      document.body.classList.add('playing');
    });

    backgroundPlayer.on('pause', function() {
      document.body.classList.remove('playing');
    });

    
    document.addEventListener('click', function(event) {

      // little content section toggles on large screens
      clearTimeout(fadeOutTime);

      if ( event.target.matches('.content-toggle') ) {
        var isActive = event.target.closest('section');
        console.log('active?:', isActive);
        document.querySelectorAll('.content').forEach( function(section) {
          section.classList.remove('active');
        });
        event.target.closest('section').querySelector('.content').classList.toggle('active');
      }
      fadeOutTime = setTimeout( function() {
        document.querySelectorAll('.content').forEach( function(section) {
          section.classList.remove('active');
        });
      }, 20000);

      // site enter button
      if ( event.target.matches('.click-suggestion') ) {
        document.querySelector('.branding').classList.add('fly-away');
        backgroundPlayer.play();
      }

      if ( event.target.matches('.stuff') ) {
        // don't trigger video player in this area
        event.stopPropagation();
      }
    });


  })();

</script>


<!-- ====================================== -->
<?php get_footer('natural'); ?>
