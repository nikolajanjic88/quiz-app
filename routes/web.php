<?php

use App\App;
use App\Http\Controllers\AdminController;
use App\Router;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

$app = new App();

Router::get('/', [new HomeController(), 'index']);
Router::get('/menu', [new HomeController(), 'menu']);

Router::get('/highscores', [new GameController(), 'highscores']);
Router::get('/game', [new GameController(), 'game']);
Router::post('/silmarilion-quiz-app-questions/get', [new GameController(), 'save']);
Router::get('/silmarilion-quiz-app-questions/get', [new GameController(), 'questions']);

Router::get('/login', [new UserController(), 'loginForm']);
Router::post('/login', [new UserController(), 'login']);
Router::get('/register', [new UserController(), 'registerForm']);
Router::post('/register', [new UserController(), 'register']);
Router::delete('/logout', [new UserController(), 'logout']);

Router::get('/dashboard', [new AdminController(), 'index']);
Router::get('/all-questions', [new AdminController(), 'allQuestions']);
Router::get('/question', [new AdminController(), 'edit']);
Router::put('/question', [new AdminController(), 'update']);
Router::delete('/all-questions', [new AdminController(), 'destroy']);
Router::get('/add-question', [new AdminController(), 'create']);
Router::post('/add-question', [new AdminController(), 'store']);