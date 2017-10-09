<?php

return function($site, $pages, $page) {

  // Merge all Online-Only articles with uploaded articles within Issues
  $webonly = $pages->find('online')->children()->visible();
  $magazine = $pages->find('magazine')->grandChildren()->visible();
  $webPlusMag = new Pages(array($webonly, $magazine));
  $online = $webPlusMag->sortBy('uploaded')->flip();

  // Related Pages
  $tags = $page->tags()->split(',');
  $relatedPages = $online->filter(function($child) use($tags) {
            if (array_intersect($child->tags()->split(','), $tags)) {
              return $child;
            }
         });

  // Contributor and Issue
  $contributor = $pages->find('contributors/' . $page->contributor());
  $issue = $pages->find('magazine/' . $page->printed());
  $cover = $issue->coverimage()->toFile();

  return [
    'online' => $online,
    'relatedPages' => $relatedPages,
    'contributor' => $contributor,
    'issue' => $issue,
    'cover' => $cover
  ];

};
