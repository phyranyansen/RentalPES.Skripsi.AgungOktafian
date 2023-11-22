<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::index');
$routes->get('dashboard', 'Home::index');
//Dashboard
$routes->get('dashboard-monitoring', 'Home::get_monitoring');
$routes->get('dashboard-unit', 'Home::get_available_unit');
$routes->get('dashboard-refresh-monitor', 'Home::move_to_history');

//Transaksi--------------------
$routes->get('transaction', 'Transaction::index');
$routes->get('transaction-order', 'Transaction::order');
$routes->get('transaction-checkout', 'Transaction::checkout');
$routes->get('transaction-get', 'Transaction::pes_table');
$routes->post('transaction-save', 'Transaction::transaction_checkout_form');
$routes->post('transaction-form', 'Transaction::transaction_checkout_bank_form');

//Save params
$routes->post('transaction-params', 'Transaction::sess_form');
$routes->post('transaction-params-playstation', 'Transaction::get_playstation');
$routes->post('transaction-order-params', 'Transaction::sess_order_form');

//Playstation-----------------------------------
$routes->get('playstation', 'Playstation::index');
$routes->get('playstation-get', 'Playstation::playstation_get');



//Playstation-----------------------------------
$routes->get('games', 'Game::index');
$routes->get('games-get', 'Game::game_get');
$routes->post('games-post', 'Game::game_insert');