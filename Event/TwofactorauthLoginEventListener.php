<?php
App::uses('CakeEventListener', 'Event');

class TwofactorauthLoginEventListener implements CakeEventListener {

  private $controller;

  public function __construct($request, $response, $controller) {
    $this->controller = $controller;
  }

  public function implementedEvents() {
    return array(
      'onLogin' => 'handleLogin',
    );
  }

  public function handleLogin($event) {
    $user = $event->data['user'];

    // Check if user has twofactorauth enabled
    $model = ClassRegistry::init('TwoFactorAuth.UsersSecret');
    $infos = $model->find('first', array('conditions' => array('user_id' => $user['id'], 'enabled' => true)));
    if (empty($infos)) { // no two factor auth
      $event = new CakeEvent('afterLogin', $this->controller, array('user' => $user));
      $this->controller->getEventManager()->dispatch($event);
      if($event->isStopped()) {
        return $event->result;
      }
    }

    // set session
    $this->controller->Session->write('user_id_two_factor_auth', $user['id']);

    // Stop propagation and add into json response two factor auth param
    $this->controller->response->body(json_encode(array('statut' => true, 'msg' => $this->controller->Lang->get('USER__REGISTER_LOGIN'), 'two-factor-auth' => true)));
    $event->stopPropagation();
    return false;
  }

}
