<?php

require_once ('config.php');

require_once ('MeetupLib/Meetup.php');
require_once ('MeetupLib/MeetupApiRequest.class.php');
require_once ('MeetupLib/MeetupApiResponse.class.php');
require_once ('MeetupLib/MeetupExceptions.class.php');
require_once ('MeetupLib/MeetupConnection.class.php');
require_once ('MeetupLib/MeetupEvents.class.php');

class MeetupSfMom
{
    protected $connection;

    protected $eventsApi;

    protected $config;

    public function __construct()
    {
        $configuration = new Config();
        $this->config = $configuration->getConfig();

        $meetup_api_key = $this->config['key'];
        $this->connection = new MeetupKeyAuthConnection($meetup_api_key);
        $this->eventsApi = new MeetupEvents($this->connection);
    }

    public function getOpenEvents($text)
    {
        $events = $this->eventsApi->getOpenEvents(array('text' => $text));

        foreach($events as $e) {
            echo $e['name'] . " at " . date(DATE_W3C, $e['time']/1000) . "<br>";
        }
    }

    public function getEvents()
    {
        $events = $this->eventsApi->getEvents($this->config['param']);

        foreach($events as $e) {
            echo $e['name'] . " at " . date(DATE_W3C, $e['time']/1000) . "<br>";
        }
    }

    public function getEventDetails($id)
    {
        $event = $this->eventsApi->getEvent($id, array('page' => 20));
        echo $event['name'] . " at " . $event['venue']['name'];
    }
}
