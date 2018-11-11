<?php

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', url('/'));
});

// Home > Responses
Breadcrumbs::register('responses', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Responses', url('responses'));
});

// Home > News
Breadcrumbs::register('news', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('News', url('news'));
});

// Home > Gallery
Breadcrumbs::register('gallery', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Gallery', url('gallery'));
});

// Home > Search
Breadcrumbs::register('search', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Search', url('search'));
});

// Home > Events
Breadcrumbs::register('events', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Events', url('events'));
});

// Home > Contact
Breadcrumbs::register('contact', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Contact', url('contact'));
});

// Home > Questionnaire
Breadcrumbs::register('questionnaire', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Questionnaire', url('kuisioner'));
});

// Home > About
Breadcrumbs::register('about', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('About', url('about'));
});

// Home > News > [Category]
Breadcrumbs::register('category', function($breadcrumbs, $news)
{
    $breadcrumbs->parent('news');
    $breadcrumbs->push($news->category->first()->nama_kategori, url('news/'. $news->category->first()->slug));
});

// Home > News > [Category] > [News]
Breadcrumbs::register('single-news', function($breadcrumbs, $news)
{
    $breadcrumbs->parent('category', $news);
    $breadcrumbs->push($news->title, url('news/'. $news->category->first()->slug . '/' . $news->slug));
});
