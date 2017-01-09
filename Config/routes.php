<?php
Router::connect('/user/two-factor-auth/valid', array('plugin' => 'TwoFactorAuth', 'admin' => false, 'controller' => 'UserLogin', 'action' => 'validLogin'));
Router::connect('/user/two-factor-auth/generate', array('controller' => 'UserLogin', 'action' => 'generateSecret', 'plugin' => 'TwoFactorAuth'));
Router::connect('/user/two-factor-auth/valid-enable', array('controller' => 'UserLogin', 'action' => 'validEnable', 'plugin' => 'TwoFactorAuth'));
Router::connect('/user/two-factor-auth/disable', array('controller' => 'UserLogin', 'action' => 'disable', 'plugin' => 'TwoFactorAuth'));
