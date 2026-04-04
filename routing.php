<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('calcShow'); #default action
//App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

Utils::addRoute('calcShow', 'CalcCtrl');
Utils::addRoute('calcCompute', 'CalcCtrl');
//Utils::addRoute('action_name', 'controller_class_name');