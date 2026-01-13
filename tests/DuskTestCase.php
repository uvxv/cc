<?php

namespace Tests;

use Laravel\Dusk\TestCase as BaseTestCase;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;

abstract class DuskTestCase extends BaseTestCase
{
    use CreatesApplication;

    public static function prepare(): void
    {
        // static::startChromeDriver();
    }

    /**
     * Create the RemoteWebDriver instance.
     */
    protected function driver()
    {
        $options = (new ChromeOptions())->addArguments([
            '--disable-gpu',
            '--headless=new',
            '--no-sandbox',
            '--window-size=1366,768',
        ]);

        return RemoteWebDriver::create(
            'http://127.0.0.1:8000',
            DesiredCapabilities::chrome()->setCapability(ChromeOptions::CAPABILITY, $options),
            5000
        );
    }
}
