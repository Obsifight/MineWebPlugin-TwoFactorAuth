<?php
App::uses('CakeEventListener', 'Event');

class TwofactorauthUserEventListener implements CakeEventListener {

  private $controller;

  public function __construct($request, $response, $controller) {
    $this->controller = $controller;
  }

  public function implementedEvents() {
    return array(
      'requestPage' => 'handleProfile',
    );
  }

  public function handleProfile($event) {
    // check request
    if (!$this->controller->request['params']['controller'] != 'user' || !$this->controller->request['params']['action'] != 'profile')
      return;

    // Check if user has twofactorauth enabled
    $model = ClassRegistry::init('TwoFactorAuth.UsersSecret');
    $infos = $model->find('first', array('conditions' => array('user_id' => $this->controller->User->getKey('id'), 'enabled' => true)));
    if (empty($infos)) // no two factor auth
      $this->controller->set('twoFactorAuthStatus', false);
    else
      $this->controller->set('twoFactorAuthStatus', true);
  }
}
