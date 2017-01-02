<?php
Router::connect('/user/two-factor-auth/valid', array('plugin' => 'TwoFactorAuth', 'admin' => false, 'controller' => 'user', 'action' => 'validLogin'));
Router::connect('/user/two-factor-auth/generate', array('controller' => 'user', 'action' => 'generateSecret', 'plugin' => 'TwoFactorAuth'));
Router::connect('/user/two-factor-auth/valid-enable', array('controller' => 'user', 'action' => 'validEnable', 'plugin' => 'TwoFactorAuth'));
Router::connect('/user/two-factor-auth/disable', array('controller' => 'user', 'action' => 'disable', 'plugin' => 'TwoFactorAuth'));
