
<ul class='purchase-link-list'>
  <?php foreach($purchaseLinks as $link) { ?>
    <li class='purchase-link'>
      <a href='<?=$link["link"]?>' target='<?=$link["label"]?>'>
        <?=$link["label"]?>
      </a>
    </li>
  <?php } ?>
</ul>
