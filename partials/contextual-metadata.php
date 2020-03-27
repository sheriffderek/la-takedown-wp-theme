
<?php
  $name = 'L.A. Takedown';

  $url = 'https://latakedown.com';

  // tries to get page meta-data and if not / falls back to site data
  $title = get_field('meta_title') ? get_field('meta_title') : get_field('site_title', 'option');
  $description = get_field('meta_description') ? get_field('meta_description') : get_field('site_description', 'option');
  $image = get_field('meta_image') ? get_field('meta_image')["url"] : get_field('site_image', 'option')["url"];

  $handle = '@latakedownband';
?>

<?php // HTML ?>
<title><?=$title?></title>
<meta name='description' content="<?=$description?>">

<?php // Facebook + generally adopted by linkedIn etc. ?>
<meta property='og:site_name' content='<?=$name?>'>
<meta property='og:url' content='<?=$url?>'>
<meta property='og:type' content='website'>
<meta property='og:title' content='<?=$title?>'> <?php // not the site name... article name ?>
<meta property='og:description' content="<?=$description?>"> <?php // 2 - 4 sentences / 300 char ?>
<meta property='og:image' content='<?=$image?>'>

<?php // Twitter... ?>
<meta name='twitter:card' content='summary_large_image'>
<meta name='twitter:site' content='<?=$handle?>'>
<meta name='twitter:creator' content='<?=$handle?>'>
<meta name='twitter:title' content='<?=$title?>'>
<meta name='twitter:description' content="<?=$description?>">
<meta name='twitter:image' content='<?=$image?>'>
