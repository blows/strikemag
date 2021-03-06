<?php

return function($site, $pages, $page) {

  $issues = $page->children()->visible()->sortBy('sort', 'desc');
  $latest = $issues->first();

  return [
    'issues'   => $issues,
    'latest' => $latest
  ];

};
