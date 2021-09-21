<?php

require_once 'vendor/autoload.php';

use Spatie\CalendarLinks\Link;

$eventName = $_POST['eventName'];

$from = DateTime::createFromFormat('Y-m-d H:i', $_POST['when']);
$to = DateTime::createFromFormat('Y-m-d H:i', $_POST['untilWhen']);

$link = Link::create($_POST['eventName'], $from, $to);

if (isset($_POST['description']))
{
    $link->description($_POST['description']);
}

if (isset($_POST['address']))
{
    $link->address($_POST['address']);
}

$linkType = $_POST['linkType'];
$finalLink = $link->$linkType();
?>

<a href=<?php echo $finalLink ?> target="_blank"> <button>Take to the calendar</button></a>



