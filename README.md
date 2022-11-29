# Fathom Stats Display

<div align="left">

![Status](https://img.shields.io/badge/status-active-success.svg)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](/LICENSE)
![PHP](https://img.shields.io/badge/PHP-8.0-blue.svg)

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

### Prerequisites

This package requires the following :

- PHP 8.0 or higher
- Laravel Nova 4.0 or higher

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

That's it, you're ready to go!

## Usage <a name="usage"></a>

Add the card to any of your dashboards

```
<?php

namespace App\Nova\Dashboards;

use Ganda\FathomStatsDisplay\FathomStatsDisplay;
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
            new FathomStatsDisplay,
        ];
    }
}
```

Stats are cached for an hour, but can be refreshed with the on-card link. The time period for the stats is selectable with the drop-down.

## Authors <a name = "authors"></a>

- [Charlie Langridge](https://github.com/charlielangridge)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
