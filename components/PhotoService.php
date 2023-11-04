<?php
namespace app\components;

use yii\base\Component;

final class PhotoService extends Component
{
    /**
     * @var \GuzzleHttp\Client
     */
    private $client;

    /**
     * @var string
     */
    private $url;

    /**
     * @var array
     */
    private $defaultSize;

    /**
     * @param \GuzzleHttp\Client $client
     */
    public function __construct(\GuzzleHttp\Client $client, array $config = [])
    {
        $this->client = $client;

        parent::__construct($config);
    }

    public function fetchPhoto()
    {

    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @param array $defaultSize
     */
    public function setDefaultSize($defaultSize)
    {
        $this->defaultSize = $defaultSize;
    }
}
