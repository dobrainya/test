<?php
namespace app\components;

use app\models\Image;
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

    public function fetch(?int $width = null, ?int $height = null): array
    {
        return $this->fetchRandomSource($width, $height);
    }

    private function fetchRandomSource(?int $width = null, ?int $height = null): array
    {
        $response = $this->client->get(
            $this->composeImageUrl('/', $width, $height),
            [
                'query'=> [
                    'random' => 1,
                ],
            ]
        );

        if (!$response->hasHeader('Picsum-id')) {
            throw new \RuntimeException('Invalid response');
        }

        [$imageId] = $response->getHeader('Picsum-id');

        if (!is_numeric($imageId)) {
            throw new \Exception('Cannot fetch an image ID');
        }

        if (Image::find()->where(['id' => $imageId])->active()->exists()) {
            return $this->fetchRandomSource($width, $height);
        }

        return [
            'imgId' => $imageId,
            'imgSrc' => $this->composeImageUrl("/id/{$imageId}", $width, $height) . '.jpg',
        ];
    }

    public function composeImageUrl(string $path= '/', ?int $width = null, ?int $height = null): string
    {
        [$defWidth, $defHeight] = $this->defaultSize;

        return \sprintf('%s%s/%d/%d', rtrim($this->url, '/'), $path, $width ?: $defWidth, $height ?: $defHeight);
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
