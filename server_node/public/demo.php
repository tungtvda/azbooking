<?php
/**
 * This file is part of the Elephant.io package
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 *
 * @copyright Wisembly
 * @license   http://www.opensource.org/licenses/MIT-License MIT License
 */
//include_once("elephant.io/src/Client.php");
//include_once("elephant.io/src/EngineInterface.php");
//include_once("elephant.io/src/AbstractPayload.php");
//include_once("elephant.io/src/Exception/SocketException.php");
//include_once("elephant.io/src/Exception/MalformedUrlException.php");
//include_once("elephant.io/src/Exception/ServerConnectionFailureException.php");
//include_once("elephant.io/src/Exception/UnsupportedActionException.php");
//include_once("elephant.io/src/Exception/UnsupportedTransportException.php");
//
//include_once("elephant.io/src/Engine/AbstractSocketIO.php");
//include_once("elephant.io/src/Engine/SocketIO/Session.php");
//include_once("elephant.io/src/Engine/SocketIO/Version0X.php");
//include_once("elephant.io/src/Engine/SocketIO/Version1X.php");
//include_once("elephant.io/src/Payload/Decoder.php");
//include_once("elephant.io/src/Payload/Encoder.php");

include '../../vendor/autoload.php';
use ElephantIO\Client, ElephantIO\Engine\SocketIO\Version1X;


$client = new Client(new Version1X('http://localhost:3000', array('version' =>1)));
$client->initialize();
$client->emit('demo', array('data'=>112123));
$client->close();


//use ElephantIO\Client as Elephant;
//
//$elephant = new Elephant('http://localhost:3000', 'socket.io', 1, false, true, true);
//
//$elephant->init();
//$client->emit('demo', array('data'=>112123));
//$elephant->close();
//
//echo 'tryin to send `bar` to the event `foo`';

//use ElephantIO\Client,
//    ElephantIO\Engine\SocketIO\Version1X,
//    ElephantIO\Exception\ServerConnectionFailureException;
//
//include 'vendor/autoload.php';
//
//$client = new Client(new Version1X('http://localhost:3000'));
//
//try
//{
//    $client->initialize();
//    $client->emit('broadcast', ['foo' => 'bar']);
//    $client->close();
//}
//catch (ServerConnectionFailureException $e)
//{
//    echo 'Server Connection Failure!!';
//}