# Frontend Framework Bundle

This bundle allows to select a frontend framework in your theme. This option can be used by bundle and templates to adjust for these specific frameworks.

## Installation

1. Install the bundle with composer or contao manager and update the database afterwards.

        composer require heimrichhannot/contao-frontend-framework-bundle

## Usage

Just select the frontend framework in your theme settings. Maybe other bundles will add additional settings for the selected framework.
Out of the box this extension has no build in functionality except the framework selection.

![screenshot.png](docs%2Fimg%2Fscreenshot.png)



## Use in your bundle

Use the `FrontendFrameworkHelper` to get the selected framework.

```php
use HeimrichHannot\FrontendFrameworkBundle\Helper\FrontendFrameworkHelper;

class CustomController {
    private FrontendFrameworkHelper $frontendFrameworkHelper;

    public function myCustomAction()
    {        
        if ('bootstrap4' === $this->frontendFrameworkHelper->currentFramework())
        {
            $theme = $this->frontendFrameworkHelper->currentTheme();
            if (true === $theme->custonControlsBs4) {
                // do something
            }
        }
    }
}
```