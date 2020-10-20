<?php
Breadcrumbs::for('home', function ($trail) {
  $trail->push('Home', route('home'));
});

Breadcrumbs::for('site:post', function ($trail, $post = null) {
  $trail->parent('home');
  $trail->push('Blog', route('post'));
  if ($post) {
    $trail->push('Detalhes');
  }
});

Breadcrumbs::for('site:property', function ($trail, $property = null) {
  $trail->parent('home');
  $trail->push('Imóveis', route('property'));
  if ($property) {
    $trail->push('Detalhes');
  }
});

Breadcrumbs::for('site:contact', function ($trail) {
  $trail->parent('home');
  $trail->push('Contato', route('contact'));
});
