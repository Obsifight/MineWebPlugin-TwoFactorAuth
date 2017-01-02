<?php
class TwoFactorAuthAppSchema extends CakeSchema {

  public $file = 'schema.php';

  public function before($event = array()) {
      return true;
  }

  public function after($event = array()) {}

  public $twofactorauth__users_secrets = array(
    'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
    'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
    'secret' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
    'enabled' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
    'indexes' => array(
      'PRIMARY' => array('column' => 'id', 'unique' => 1)
    ),
    'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
  );
}
