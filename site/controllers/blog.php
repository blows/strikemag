<?php

return function($site, $pages, $page) {

  $perpage  = $page->perpage()->int();

  // Merge all Online-Only articles with uploaded articles within Issues
  $webonly = $pages->find('online')->children()->visible()->filter(function ($webs) {
    return $webs->vis()->bool();
  });
  $magazine = $pages->find('magazine')->grandChildren()->visible();
  $webPlusMag = new Pages(array($webonly, $magazine));
  $online = $webPlusMag->flip()->paginate(($perpage >= 1)? $perpage : 15);

  // Filtering
  $category = $webPlusMag->pluck('category', null, true);
  $keys = array('category');

  // return all children if nothing is selected
  $cards = $webPlusMag->flip();

  // if there is a post request, filter the projects collection
  if(r::is('POST') && $data = get()) {
    $cards = $webPlusMag->flip()->filter(function($cards) use($keys, $data) {

      // loop through the post request
      foreach($data as $key => $value) {

        // only act if the value is not empty and the key is valid
        if($value && in_array($key, $keys)) {

          // return false if the child page's category and value don't match
          if(!$match = $cards->$key() == $value) {
            return false;
          }
        }
      }

      // otherwise return the child page
      return $cards;

    });
  }

  return [
    'articles'   => $online,
    'pagination' => $online->pagination(),
    'category' => $category,
    'cards' => $cards
  ];

};
