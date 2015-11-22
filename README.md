# MVC-Test
I will give an explanation how this simple MVC example works:
  0. First the `index.php` file is open and then proceeds to include the `connection.php`
  file to get a connection to the database trough a singleton class named `Db`.
  1. And we check if there is an action and controller set trough `$_GET['controller']` 
  and `$_GET['action']`, then if they re set we store then in `$controller` and `$action`.
  2. Then we load the `views/layout.php` file, wich basically puts a basic html body
  for us to fill using the desired route in `routes.php.`
  3. In `routes.php`, we create an associative array `$controllers`, which maps each
  controller to an array of actions ('controllerN' => ['action1', ..., 'actionN']),
  and after then we check if the controller and action that we got on index.php are valid 
  (basically just checking if the controller is a key on the associative array, and then
  checking if the action is a value of that key).
  4. If they are valid values, then we proceed to call the call function we defined on
  routes.php