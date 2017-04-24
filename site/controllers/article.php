<?php

return function($site, $pages, $page) {

  $contributor = $pages->find('contributors/' . $page->contributor());
  $issue = $pages->find('magazine/' . $page->printed());

  return [
    'contributor' => $contributor,
    'issue' => $issue
  ];

};
