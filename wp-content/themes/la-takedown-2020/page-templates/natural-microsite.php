

<?php
  $recordId = 20255;

  $largeCover = get_field('record_cover_large', $recordId)["url"];
  // $smallCover = get_field('record_cover_small', $recordId)["url"];

  $aboutText = get_field('about') ? get_field('about') : get_field('general_about', 30);
?>

<?php
  /*

    https://codepen.io/sheriffderek/pen/poJWBde?editors=1001
    https://codepen.io/sheriffderek/pen/ebf5d629621fe78982295e62dc4800db?editors=1010

    // 401099104  --- with thumb
    // 400744064  --- with white

  */
?>

<!-- <video-background>
  <iframe id='video-outlet' allow='autoplay' src='https://player.vimeo.com/video/400744064?controls=false&loop=true' width='640' height='480' frameborder='0' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
</video-background>
 -->



<section class='page-section stuff'>
<inner-column>
  

  <section class='branding'>
    <div class='logo'>
      <?php include('components/logo.php'); ?>
    </div>
  </section>


  <section class='record'>
    <div class='content'>
      <h2 class='section-heading'>Our Feeling of Natural High: Out&nbsp;Now</h2>

      <a href='/releases' target='releases'>
        <picture class='image-w record-cover'>
          <img src='<?=$largeCover?>'>
        </picture>
      </a>

      <ul class='links-to-buy'>
        <li>
          <a href='https://www.castlefacerecords.com/products/l-a-takedown-our-feeling-of-natural-high' target='lp'>
            <span>LP/CD</span>
          </a>
        </li>
        <li>
          <a href='https://latakedown.bandcamp.com/album/our-feeling-of-natural-high' target='band-camp'>
            <span>Digital</span>
          </a>
        </li>
        <li>
          <a href='/releases' target='releases'>
            <span>All Albums</span>
          </a>
        </li>
      </ul>
    </div>

    <button class='content-toggle' data-view='record'>
      <span>Albums</span>
    </button>
  </section>



  <section class='upcoming'>
    <div class='content'>
      <h2 class='section-heading'>Upcoming</h2>
      
      <?php $useMiniEventCard = true; ?>
      <?php // $eventsToShow = 3; ?>
      <?php $onlyUpcoming = true; ?>
      <?php include('events-loop.php'); ?>
    </div>

    <button class='content-toggle' data-view='upcoming'>
      <span>Upcoming</span>
    </button>
  </section>



  <section class='promo'>
    <div class='content'>
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

      <p>
        <a href='mailto:<?=$emailAddress?>'>
          <?=$emailAddress?>
        </a>
      </p>

      <?php include('components/social-links.php'); ?>
    </div>

    <button class='content-toggle' data-view='contact'>
      <span>Contact</span>
    </button>
  </section>



  <section class='about'>
    <div class='content'>
      <h2 class='section-heading'>About</h2>

      <p><?=$aboutText?></p>
    </div>

    <button class='content-toggle' data-view='about'>
      <span>About</span>
    </button>
  </section>




  <section class='controls'>
    <button rel='toggle-video'>
      Play
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

</inner-column>
</section>





<script>
  // var $contentToggles = document.querySelectorAll('.content-toggle');

  var fadeOutTime = false;

  
  (function() {


    // Video
    // var $videoOutlet = document.querySelector('#video-outlet');
    // var backgroundPlayer = new Vimeo.Player($videoOutlet);
    var videoPlayed = false;



    //
    // function handleVideoPlayerToggle() {
    //   console.log( 'should toggle video' );
    //   backgroundPlayer.play();
    // }



    function handleContentToggle() {
      var isActive = event.target.closest('section').querySelector('.content').classList.contains('active');
      if (isActive) {
        event.target.closest('section').querySelector('.content').classList.remove('active');
        return;
      }
      document.querySelectorAll('.content').forEach( function(section) {
        section.classList.remove('active');
      });
      event.target.closest('section').querySelector('.content').classList.toggle('active');
    }


    // function handlePlayerError() {
    //   var reloadPage = confirm(`There has been an error with the video player. The browser doesn't believe that by clicking 'enter' that you really want to start the video. Would you like to try again?`);
    //   if (reloadPage) {
    //     location.reload();
    //   }
    // }

    // Video player is ready (1)
    // backgroundPlayer.ready().then(function() {
    //   console.log('player is ready');
    // });

    // // Video loaded (2)
    // backgroundPlayer.on('loaded', function() {
    //   document.body.classList.add('video-loaded');
    //   console.log('backgroundPlayer is now loaded');
    // });

    // backgroundPlayer.on('play', function() {
    //   console.log('on-play');
    //   document.body.classList.add('playing');
    // });

    // backgroundPlayer.on('pause', function() {
    //   console.log('on-pause');
    //   if (videoPlayed) {
    //     document.body.classList.remove('playing');
    //   }
    // });

    // backgroundPlayer.on('error', function(error) {
    //   console.log('error: ', error);
    //   handlePlayerError()
    // });




    var contentFadeOutDelay = 20 * 1000; // 20 seconds
    

    document.addEventListener('click', function(event) {
      console.log('document was clicked');
      // little content section toggles on large screens
      clearTimeout(fadeOutTime);

      if ( event.target.matches('.content-toggle') ) {
        handleContentToggle()
      }

      fadeOutTime = setTimeout( function() {
        document.querySelectorAll('.content').forEach( function(section) {
          section.classList.remove('active');

          

        });
      }, contentFadeOutDelay);

      // site enter button
      if ( event.target.matches('[rel="enter-site"]') ) {
        console.log('enter-site-clicked');
        document.querySelector('.overlay').classList.add('fly-away');
        document.body.classList.add('played');
        // backgroundPlayer.play();
      }

      if ( event.target.matches('[rel="toggle-video"]') ) {
        //
      }

      console.log(event.target, ' was clicked');

    });



    window.onblur = function() {
      document.querySelectorAll('.content').forEach( function(section) {
        section.classList.remove('active');
      });
    };



  })();

</script>
