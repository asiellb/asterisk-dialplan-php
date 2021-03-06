<?php
namespace Clearvox\Asterisk\Dialplan\Application;

class CELGenUserEvent implements ApplicationInterface
{
    use StandardApplicationTrait;

    /**
     * @var string
     */
    protected $eventName;

    /**
     * @var string|null
     */
    protected $extra;

    /**
     * Generates a CEL User Defined Event.
     *
     * A CEL event will be immediately generated by this channel, with the supplied
     * name for a type.
     *
     * @param string $eventName
     * @param string|null $extra
     */
    public function __construct($eventName, $extra = null)
    {
        $this->eventName = $eventName;
        $this->extra     = $extra;
    }

    /**
     * Get the name of the event give for this CELGenUserEvent
     *
     * @return string
     */
    public function getEventName()
    {
        return $this->eventName;
    }

    /**
     * Extra text to be included with the event.
     *
     * @param string $extra
     * @return $this
     */
    public function setExtra($extra)
    {
        $this->extra = $extra;
        return $this;
    }

    /**
     * Return the extra text set to be included with this event.
     *
     * @return null|string
     */
    public function getExtra()
    {
        return $this->extra;
    }

    /**
     * Should return the name of the application
     *
     * @return string
     */
    public function getName()
    {
        return 'CELGenUserEvent';
    }

    /**
     * Should return the AppData. AppData is the string contents
     * between the () of the App.
     *
     * @return string
     */
    public function getData()
    {
        $data = $this->eventName;

        if(isset($this->extra)) {
            $data .= ',' . $this->extra;
        }

        return $data;
    }

    /**
     * Turns this application into an Array
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'event_name' => $this->eventName,
            'extra' => $this->extra
        ];
    }

    /**
     * Turns this Application into a json representation
     *
     * @param int $options
     * @return string
     */
    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }
}