<?php

require_once('MeetupSfMom.php');

$groupUrlName = 'http://www.meetup.com/San-Francisco-Mom-entrepreneur';

$meetup = new MeetupSfMom();
$meetup->getEvents();