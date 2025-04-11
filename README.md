# Fathom Stats Display
#### A Laravel Nova Card to show Fathom Analytics stats.

<div align="left">

![Status](https://img.shields.io/badge/status-active-success.svg)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](/LICENSE)
![PHP](https://img.shields.io/badge/PHP-8.0-blue.svg)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/charlielangridge/fathom-stats-display.svg)](https://packagist.org/packages/charlielangridge/fathom-stats-display)
[![Downloads](https://img.shields.io/packagist/dt/charlielangridge/fathom-stats-display.svg)](https://packagist.org/packages/charlielangridge/fathom-stats-display)
</div>

---

## Table of Contents

- [Getting Started](#getting_started)
    - [Prerequisites](#prerequisites)
    - [Installing](#installing)
- [Usage](#usage)
- [Authors](#authors)
- [Changelog](#changelog)
- [Security](#security)
- [Contributing](#contributing)
- [Credits](#credits)
- [License](#license)

## Getting Started <a name = "getting_started"></a>

*You'll need a Fathom account - if you don't have one, feel free to use our referal code: [https://usefathom.com/ref/BYODNP](https://usefathom.com/ref/BYODNP) - you'll get $10 off your first invoice and we get a little something too*

### Prerequisites

This package requires the following :

- PHP 8.0 or higher
- Laravel Nova 4.0 or higher
- Fathom account with API access

### Installing

To get started, you will need to install the following dependencies :

```
composer require charlielangridge/fathom-stats-display
```

Next add your Fathom API Token and Site ID to your .env file

```
FATHOM_SITE_ID=
FATHOM_TOKEN=
```

Publish the included config file:

```
php artisan vendor:publish --provider="CharlieLangridge\FathomStatsDisplay\CardServiceProvider"
```

That's it, you're ready to go!

## Usage <a name="usage"></a>

Add the card to any of your dashboards

```
<?php

namespace App\Nova\Dashboards;

use CharlieLangridge\FathomStatsDisplay\FathomStatsDisplay;
use Laravel\Nova\Dashboards\Main as Dashboard;

class Main extends Dashboard
{
    /**
     * Get the cards for the dashboard.
     *
     * @return array
     */
    public function cards()
    {
        return [
            (new FathomStatsDisplay)->entityId(),
        ];
    }
}
```

You can pass an optional Fathom Site ID to the card's `entityId()` method, but it must be one your API key has access to (e.g. you have multiple fathom sites and want to show multiple different analytics cards on your dashboard). If left empty, it will default to the Site ID you have defined in your .env file.

Stats are cached for an hour, but can be refreshed with the on-card link. The time period for the stats is selectable with the drop-down.

## Authors <a name = "authors"></a>

- [Charlie Langridge](https://github.com/charlielangridge)

## Contributors <a name = "contributors"></a>

- [Charlie Langridge](https://github.com/charlielangridge)
- [Michael Burton](https://github.com/MadMikeyB)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
