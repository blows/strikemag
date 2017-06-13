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

c::set('license', 'put your license key here');

/*

---------------------------------------
Kirby Configuration
---------------------------------------

By default you don't have to configure anything to
make Kirby work. For more fine-grained configuration
of the system, please check out http://getkirby.com/docs/advanced/options

*/

// c::set('home', 'online');

c::set('debug',true);

// Omit blog folder from url
c::set('routes', array(
  array(
    'pattern' => '(:any)',
    'action'  => function($uid) {

      $page = page($uid);

      if(!$page) $page = page('online/' . $uid);
      if(!$page) $page = site()->errorPage();

      return site()->visit($page);

    }
  ),
  array(
    'pattern' => 'online/(:any)',
    'action'  => function($uid) {
      go($uid);
    }
  )
));
