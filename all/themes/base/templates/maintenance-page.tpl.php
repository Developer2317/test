<!DOCTYPE html>
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">
  <head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <?php print $head; ?>
    <title><?php print $head_title; ?></title>
    <?php print $styles; ?>
  </head>
  <body class="<?php print $classes; ?>"<?php print $attributes; ?>>
    <main>
      <?php if ($title): ?>
        <h1><?php print $title; ?></h1>
      <?php endif; ?>
      <?php if ($messages): ?>
        <?php print $messages; ?>
      <?php endif; ?>
      <?php print $content; ?>
    </main>
    <?php print $scripts; ?>
  </body>
</html>
