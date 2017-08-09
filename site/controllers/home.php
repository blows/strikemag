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
  $magazine = $pages->find('magazine')->grandChildren()->visible();
  $webPlusMag = new Pages(array($webonly, $magazine));
  $online = $webPlusMag->sortBy('uploaded')->flip()->paginate(($perpage >= 1)? $perpage : 6);
  $archives = $webPlusMag->sortBy('uploaded')->flip()->paginate(($perpage >= 1)? $perpage : 6);

  $uid = $page->featuredarticle();
  $post = $pages->index()->findBy('uid', $uid);
  $uid2 = $page->featuredarticle2();
  $post2 = $pages->index()->findBy('uid', $uid2);

  return [
    'articles'   => $online,
    'archives'   => $archives,
    'pagination' => $online->pagination(),
    'uid'        => $uid,
    'post'       => $post,
    'uid2'       => $uid2,
    'post2'      => $post2
  ];

};
