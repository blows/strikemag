<?php

return function($site, $pages, $page) {

  $issues = $page->children()->visible()->sortBy('sort', 'desc');

  return [
    'issues'   => $issues
  ];

};
