<?php

return function($site, $pages, $page) {

  $query   = get('q');
  $results = page('magazine', 'online')->search($query, 'title|text|contributor|artwork|summary')->visible();

  return array(
    'query'   => $query,
    'results' => $results,
    'pagination' => $results->pagination()
  );

};
