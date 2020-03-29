
<?php
  $date = get_field('event_date');
  $title = get_field('event_title');

  $venueName = get_field('venue_name');
  $venueUrl = get_field('venue_url');

  $venueAddress = get_field('venue_address');
  $cityState = get_field('city_state');
  $zipocde = get_field('event_zipcode');
  $country = get_field('event_country');

  $purchaseLink = get_field('purchase_link');

  $shortDescription = get_field('short_description');
  $fullDescription = get_field('full_description');

  $startTime = get_field('event_start-time');

  $poster = get_field('event_poster');

  $mc = get_field('event_dj');

  $lineUp = get_field('event_line-up');
      // sub fields?
  /*
      act_name
      set_time
      additional_notes
      link_to_act
  */
  $ageRestriction = get_field('age_restrictions');
  $cost = get_field('event_cost');

  
  $fbEventUrl = get_field('fb_event_url');

  $decorativeImage = get_field('record_cover_large', 20255)["url"];
?>
