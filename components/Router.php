<?php

class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include($routesPath);   // тут буде масив з нашими роутами
    }

    public function run()
    {
        //echo "In method run() in Router";
        //print_r($this->routes);

        //отримати стрічку запиту
        $uri = trim($_SERVER["REQUEST_URI"], '/');   //trim - remove symbol you on

        // перевірити чи є зовнішній шлях в routes
        foreach ($this->routes as $uriPattern => $path) {
            //echo "<hr>$uriPattern -> $path";
            if (preg_match("~$uriPattern~", $uri)) {  //  ~  для слешів екранує
                //////////////////////////////////////

                //  echo '<br> де шукаємо(запить який набрав користувач)' . $uri;

                // echo '<br> Що ми шукаємо(співпадіння з правила)' . $uriPattern;
                // echo '<br> Хто обробляє(внутрішній шлях)' . $path;
                //отримуємо внутрішній шлях із зовнішнього згідно правил
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                //echo '<br/> потрібро сформувати: ' . $internalRoute;



                // якщо є співпадіння - визначити який контролер і екшин
                $segments   = explode('/', $internalRoute);
                //print_r($segments);
                $controllerName = ucfirst(array_shift($segments) . 'Controller');
                //ucfirst робить великою першу букву
                $actionName = 'action' . ucfirst(array_shift($segments));

               // print_r($segments);

                // підключити  файл контроллер
                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';
                include_once($controllerFile); // підключення

                //створити об'єкт і викликати його action
                $controllerObject = new $controllerName; //по назві класу ми створюемо змінну класу
                // $result = $conrollerObject->$actionName($segments);
                //розбиває на параметри для методу і викликає метод сама
                $result = call_user_func_array(array($controllerObject, $actionName), $segments);

                if ($result) break;
            }
        }
    }
}
