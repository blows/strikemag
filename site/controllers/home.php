<?php

return function($site, $pages, $page) {

  $perpage  = $page->perpage()->int();

  // Merge all Online-Only articles with uploaded articles within Issues
  $webonly = $pages->find('online')->children()->visible();
  $magazine = $pages->find('magazine')->grandChildren()->visible();
  $webPlusMag = new Pages(array($webonly, $magazine));
  $online = $webPlusMag->sortBy('uploaded')->flip()->paginate(($perpage >= 1)? $perpage : 12);
  $archives = $webPlusMag->sortBy('uploaded')->flip()->paginate(($perpage >= 1)? $perpage : 12);

  // Featured articles
  $uid = $page->featuredarticle();
  $post = $pages->index()->findBy('uid', $uid);
  $featuredfile = $post->coverimage()->toFile();
  $featuredimage = $post->coverimage()->toFile()->url();
  $uid2 = $page->featuredarticle2();
  $post2 = $pages->index()->findBy('uid', $uid2);
  $featuredimage2 = $post2->coverimage()->toFile()->url();

  return [
    'articles'   => $online,
    'archives'   => $archives,
    'pagination' => $online->pagination(),
    'uid'        => $uid,
    'post'       => $post,
    'featuredfile' => $featuredfile,
    'featuredimage' => $featuredimage,
    'uid2'       => $uid2,
    'post2'      => $post2,
    'featuredimage2' => $featuredimage2
  ];

};
