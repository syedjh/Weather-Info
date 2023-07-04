<?php

namespace Drupal\weather_info_plugin\Plugin\Block;


use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use GuzzleHttp\ClientInterface;

/**
 * Provides a 'Weather Info' block.
 *
 * @Block(
 *   id = "weather_info_block",
 *   admin_label = @Translation("Weather Info Block"),
 * )
 */
class WeatherInfoBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $weatherDetails = $this->fetchWeatherDetails();

    $output = [
      '#type' => 'markup',
      '#markup' => $this->renderWeatherDetails($weatherDetails),
    ];

    $output['#cache']['max-age'] = 0;
    $output['#cache']['contexts'] = [];
    $output['#cache']['tags'] = [];

    return $output;
  }

  private function fetchWeatherDetails() {
    $api_key = '375ef97a7f9e04ccaa840547af914941';
    $location = 'Chennai';
    $url = "http://api.weatherstack.com/current?access_key=$api_key&query=$location";

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);

    $data = json_decode($response, true);

    if (isset($data['current'])) {
      return [
        'temperature' => $data['current']['temperature'],
        'humidity' => $data['current']['humidity'],
        'wind_speed' => $data['current']['wind_speed'],
      ];
    }

    return [];
  }

  private function renderWeatherDetails(array $weatherDetails) {
    $output = 'Temperature: ' . $weatherDetails['temperature'] . '°C<br>';
    $output .= 'Humidity: ' . $weatherDetails['humidity'] . '%<br>';
    $output .= 'Wind Speed: ' . $weatherDetails['wind_speed'] . ' km/h';

    return $output;
  }
}
