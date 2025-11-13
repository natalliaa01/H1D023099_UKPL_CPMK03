<?php

namespace Tests;

use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Illuminate\Support\Collection;
use Laravel\Dusk\TestCase as BaseTestCase;
use PHPUnit\Framework\Attributes\BeforeClass;

abstract class DuskTestCase extends BaseTestCase
{
    /**
     * Prepare for Dusk test execution.
     */
    #[BeforeClass]
    public static function prepare(): void
    {
        if (! static::runningInSail()) {
            static::startChromeDriver(['--port=9515']);
        }
    }

    /**
     * Create the RemoteWebDriver instance.
     */
    protected function driver()
    {
        $options = (new \Facebook\WebDriver\Chrome\ChromeOptions())->addArguments([
            '--disable-gpu',
            '--headless=new',
            '--no-sandbox',
            '--disable-dev-shm-usage',
            '--disable-web-security',
            '--window-size=1920,1080',
        ]);

        return \Facebook\WebDriver\Remote\RemoteWebDriver::create(
            'http://localhost:9515',
            $options->toCapabilities(),
            60000, // Connection timeout
            300000 // Request timeout
        );
    }

}
