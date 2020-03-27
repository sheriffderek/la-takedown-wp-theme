
<?php
  $name = 'L.A. Takedown';
  $url = 'http://latakedown.com';
  $title = 'Example title here!';
  $content = 'The official music video for “Night Skiing”, taken from the new L.A. Takedown album, II, out May 12th on Ribbon.';
  $description = 'Tickets on sale now for the upcoming tour at latakedown.com';
  $image = get_template_directory_uri() . '/images/meta-data/ii.jpg';
  $handle = '@latakedownband';
?>

<?php // HTML ?>
<title><?=$title?></title>
<meta name='description' content='<?=$description?>'>

<?php // Facebook + generally adopted by linkedIn etc. ?>
<meta property='og:site_name' content='<?=$name?>'>
<meta property='og:url' content='<?=$url?>'>
<meta property='og:type' content='website'>
<meta property='og:title' content='<?=$content?>'> <?php // not the site name... article name ?>
<meta property='og:description' content='<?=$description?>'> <?php // 2 - 4 sentences / 300 char ?>
<meta property='og:image' content='<?=$image?>'>

<?php // Twitter... ?>
<meta name='twitter:card' content='summary_large_image'>
<meta name='twitter:site' content='<?=$handle?>'>
<meta name='twitter:creator' content='<?=$handle?>'>
<meta name='twitter:title' content='<?=$title?>'>
<meta name='twitter:description' content='<?php $description?>'>
<meta name='twitter:image' content='<?=$image?>'>
