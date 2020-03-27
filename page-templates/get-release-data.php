
<?php

  $title = get_field('record_title');
  $date = get_field('release_date');

  $largeCover = get_field('record_cover_large')["url"];
  $smallCover = get_field('record_cover_small')["url"];

  $labelName = get_field('record_label');
  $labelUrl = get_field('record_label_url');

  $purchaseLinks = get_field('purchase_links');
    // label, link

  $description = get_field('record_description');
  $otherNotes = get_field('other_notes');
  $micrositeUrl = get_field('microsite_url');

  $releaseLink = get_the_permalink();

?>
