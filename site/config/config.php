<?php

/*

---------------------------------------
License Setup
---------------------------------------

Please add your license key, which you've received
via email after purchasing Kirby on http://getkirby.com/buy

It is not permitted to run a public website without a
valid license key. Please read the End User License Agreement
for more information: http://getkirby.com/license

*/

c::set('license', 'K2-PRO-3aa8b7fe3520183f89b524fefbcc0776');

/*

---------------------------------------
Kirby Configuration
---------------------------------------

By default you don't have to configure anything to
make Kirby work. For more fine-grained configuration
of the system, please check out http://getkirby.com/docs/advanced/options

*/

// Redirect all http requests to https
c::set('ssl', true);

// Cache
// c::set('cache', true);
//
// c::set('cache.ignore', array(
//   'search'
// ));

c::set('cachebuster', true);

c::set('debug', true);

// Omit blog folder from url
c::set('routes', array(
  array(
    'pattern' => '(:any)',
    'action'  => function($uid) {

      $page = page($uid);

      if(!$page) $page = page('online/' . $uid);
      if(!$page) $page = page('magazine')->grandchildren()->findby('uid', $uid);
      if(!$page) $page = site()->errorPage();

      return site()->visit($page);

    }
  ),
  array(
    'pattern' => 'online/(:any)',
    'action'  => function($uid) {
      return go($uid);
    }
  ),
  array(
     'pattern' => 'magazine/(:any)/(:any)',
     'action'  => function($issue, $article) {
       return go($article);
     }
  )
));

// Shrink large images on upload
kirby()->hook('panel.file.upload', 'shrinkImage');
kirby()->hook('panel.file.replace', 'shrinkImage');
function shrinkImage($file, $maxDimension = 2000) {
  try {
    if ($file->type() == 'image' and ($file->width() > $maxDimension or $file->height() > $maxDimension)) {

      // Get original file path
      $originalPath = $file->dir().'/'.$file->filename();

      // Create a thumb and get its path
      $resized = $file->resize($maxDimension,$maxDimension);
      $resizedPath = $resized->dir().'/'.$resized->filename();

      // Replace the original file with the resized one
      copy($resizedPath, $originalPath);
      unlink($resizedPath);

    }
  } catch(Exception $e) {
    return response::error($e->getMessage());
  }
}
