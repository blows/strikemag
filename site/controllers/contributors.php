<?php

// This is a controller file that contains the logic for the blog template.
// It consists of a single function that returns an associative array with
// template variables.
//
// Learn more about controllers at:
// https://getkirby.com/docs/developer-guide/advanced/controllers

return function($site, $pages, $page) {

  $perpage  = $page->perpage()->int();

  // Merge all Online-Only articles with uploaded articles within Issues
  $webonly = $pages->find('online')->children()->visible();
  $magazine  = $pages->find('magazine')->grandChildren()->visible();
  $webPlusMag = new Pages(array($webonly, $magazine));
  $articles = $webPlusMag->flip();

  // Alphabetical Ordering and Searching
  $alphabetise = alphabetise($page->children()->sortby('title'), array('key' => 'title'));

  return [
    'articles' => $articles,
    'alphabetise' => $alphabetise
  ];

};
