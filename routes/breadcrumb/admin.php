<?php

Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Painel de Controle', route('admin.dashboard.index'));
});

// Users
Breadcrumbs::for('user', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Usuários', route('admin.user.index'));
});

Breadcrumbs::for('user:edit', function ($trail) {
    $trail->parent('user');
    $trail->push('Editar');
});

Breadcrumbs::for('user:create', function ($trail) {
    $trail->parent('user');
    $trail->push('Adicionar');
});


Breadcrumbs::for('page', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Páginas', route('admin.page.index'));
});

Breadcrumbs::for('page:edit', function ($trail) {
    $trail->parent('page');
    $trail->push('Editar');
});

Breadcrumbs::for('page:create', function ($trail) {
    $trail->parent('page');
    $trail->push('Adicionar');
});

// Category
Breadcrumbs::for('category', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Categorias', route('admin.category.index'));
});

Breadcrumbs::for('category:edit', function ($trail) {
    $trail->parent('category');
    $trail->push('Editar');
});

Breadcrumbs::for('category:create', function ($trail) {
    $trail->parent('category');
    $trail->push('Adicionar');
});

// banner
Breadcrumbs::for('banner', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Banners', route('admin.banner.index'));
});

Breadcrumbs::for('banner:edit', function ($trail) {
    $trail->parent('banner');
    $trail->push('Editar');
});

Breadcrumbs::for('banner:create', function ($trail) {
    $trail->parent('banner');
    $trail->push('Adicionar');
});

// banner type
Breadcrumbs::for('banner-type', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Tipo Banners', route('admin.banner-type.index'));
});

Breadcrumbs::for('banner-type:edit', function ($trail) {
    $trail->parent('banner-type');
    $trail->push('Editar');
});

Breadcrumbs::for('banner-type:create', function ($trail) {
    $trail->parent('banner-type');
    $trail->push('Adicionar');
});


// Propety
Breadcrumbs::for('property', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Imóveis', route('admin.property.index'));
});

Breadcrumbs::for('property:edit', function ($trail) {
    $trail->parent('property');
    $trail->push('Editar');
});

Breadcrumbs::for('property:create', function ($trail) {
    $trail->parent('property');
    $trail->push('Adicionar');
});

// Propety Types
Breadcrumbs::for('property-type', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Tipo de Imóveis', route('admin.property-type.index'));
});

Breadcrumbs::for('property-type:edit', function ($trail) {
    $trail->parent('property-type');
    $trail->push('Editar');
});

Breadcrumbs::for('property-type:create', function ($trail) {
    $trail->parent('property-type');
    $trail->push('Adicionar');
});

// Advertiser
Breadcrumbs::for('advertiser', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Anunciantes', route('admin.advertiser.index'));
});

Breadcrumbs::for('advertiser:edit', function ($trail) {
    $trail->parent('advertiser');
    $trail->push('Editar');
});

Breadcrumbs::for('advertiser:create', function ($trail) {
    $trail->parent('advertiser');
    $trail->push('Adicionar');
});

// Tags
Breadcrumbs::for('tag', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Tags', route('admin.tag.index'));
});

Breadcrumbs::for('tag:edit', function ($trail) {
    $trail->parent('tag');
    $trail->push('Editar');
});

Breadcrumbs::for('tag:create', function ($trail) {
    $trail->parent('tag');
    $trail->push('Adicionar');
});

// *************** Featutes **************** //
Breadcrumbs::for('feature', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Características', route('admin.feature.index'));
});

Breadcrumbs::for('feature:edit', function ($trail) {
    $trail->parent('feature');
    $trail->push('Editar');
});

Breadcrumbs::for('feature:create', function ($trail) {
    $trail->parent('feature');
    $trail->push('Adicionar');
});

// *************** broker **************** //
Breadcrumbs::for('broker', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Corretores', route('admin.broker.index'));
});

Breadcrumbs::for('broker:edit', function ($trail) {
    $trail->parent('broker');
    $trail->push('Editar');
});

Breadcrumbs::for('broker:create', function ($trail) {
    $trail->parent('broker');
    $trail->push('Adicionar');
});

// *************** offer-type **************** //
Breadcrumbs::for('offer-type', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Tipo de Ofertas', route('admin.offer-type.index'));
});

Breadcrumbs::for('offer-type:edit', function ($trail) {
    $trail->parent('offer-type');
    $trail->push('Editar');
});

Breadcrumbs::for('offer-type:create', function ($trail) {
    $trail->parent('offer-type');
    $trail->push('Adicionar');
});

// *************** settings **************** //
Breadcrumbs::for('setting', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Configurações', route('admin.setting.index'));
});

Breadcrumbs::for('setting:edit', function ($trail) {
    $trail->parent('setting');
    $trail->push('Editar');
});

Breadcrumbs::for('setting:create', function ($trail) {
    $trail->parent('setting');
    $trail->push('Adicionar');
});

// *************** posts **************** //
Breadcrumbs::for('post', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Posts', route('admin.post.index'));
});

Breadcrumbs::for('post:edit', function ($trail) {
    $trail->parent('post');
    $trail->push('Editar');
});

Breadcrumbs::for('post:create', function ($trail) {
    $trail->parent('post');
    $trail->push('Adicionar');
});

// *************** posts **************** //
Breadcrumbs::for('admin:contact', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Contatos', route('admin.contact.index'));
});


// *************** posts **************** //
Breadcrumbs::for('admin:property-contact', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Contatos', route('admin.property-contact.index'));
});

// *************** enterprise **************** //
Breadcrumbs::for('enterprise', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('enterprises', route('admin.enterprise.index'));
});

Breadcrumbs::for('enterprise:edit', function ($trail) {
    $trail->parent('enterprise');
    $trail->push('Editar');
});

Breadcrumbs::for('enterprise:create', function ($trail) {
    $trail->parent('enterprise');
    $trail->push('Adicionar');
});