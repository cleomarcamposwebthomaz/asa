<?php
function thumb($src, $params = [])
{
  $params = http_build_query($params);
  return asset('/timthumb.php?src=/storage/' . $src . '&' . $params);
}


function treeCategories($array, $root = true, $hasChildren = false)
{
  foreach ($array as $value) {
    if (isset($value['children']) && count($value['children']) <= 0) {
      echo '<li class="nav-item">' . "\n";
      echo '<a class="nav-link" href="' . route('property.category', [
        'id' => $value['id'],
        'slug' => $value['slug'],
      ]) . '">' . "\n";
      echo $value['name'];
      echo '</a>' . "\n";
      echo '</li>' . "\n";
    } else {
      echo '<li class="nav-item dropdown">' . "\n";

      echo '<a class="nav-link dropdown-toggle" href="' . route('property.category', [
        'id' => $value['id'],
        'slug' => $value['slug'],
      ]) . '" id="navbarDropdown" role="button" aria-haspopup="true">' . "\n";
      echo $value["name"] . "\n";
      echo '</a>' . "\n";

      echo '<div class="dropdown-menu" aria-labelledby="navbarDropdown">' . "\n";

      foreach ($value['children'] as $children) {
        echo '<a class="dropdown-item" href="' . route('property.category', [
          'id' => $children['id'],
          'slug' => $children['slug'],
        ]) . '">' . "\n";
        echo $children['name'];
        echo '</a>' . "\n";
      }

      echo '</div>' . "\n";

      echo '</li>' . "\n";
    }
  }
}

function getLink($name, $link, $root = true)
{
  $class = 'nav-link dropdown-toggle';

  if (!$root) {
    $class = 'dropdown-menu';
  }

  return "<a href='{$link}' class='nav-link'>{$name}</a>";
}