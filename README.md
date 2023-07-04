# Weather Info Plugin

This Drupal module fetches weather details from an external API and displays them in a custom block.

## Features

- Fetches weather details using the Weatherstack API.
- Displays temperature, humidity, and wind speed in a customizable block.

## Requirements

- Drupal 9.x or later
- API key from Weatherstack (https://weatherstack.com)

## Installation

1. Download and install the module in the `modules/custom` directory of your Drupal installation.
2. Enable the module through the Drupal administration interface or using Drush.
3. Obtain an API key from Weatherstack (https://weatherstack.com).
4. Configure the API key in the module settings page (/admin/config/weather-info-plugin).

## Configuration

- Navigate to the module settings page (/admin/config/weather-info-plugin).
- Enter your Weatherstack API key in the provided field.
- Save the configuration.

## Usage

- After enabling the module and configuring the API key, a new "Weather Info" block will be available.
- Add the block to a region of your choice using the block layout configuration page (/admin/structure/block).
- Customize the block's appearance and visibility settings as desired.

## Troubleshooting

- If the weather details are not displaying correctly, ensure that the API key is valid and configured correctly in the module settings.

## Contributions

Contributions are welcome! If you find any issues or have suggestions for improvement, please submit them through the issue tracker or create a pull request.

