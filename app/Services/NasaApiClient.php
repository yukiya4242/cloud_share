namespace App\Services;

use GuzzleHttp\Client;

class NasaApiClient
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'https://api.nasa.gov/']);
        $this->apiKey = env('NASA_API_KEY');
    }

    public function getAstronomyPictureOfTheDay()
    {
        $response = $this->client->get('planetary/apod', [
            'query' => [
                'api_key' => $this->apiKey,
            ],
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
