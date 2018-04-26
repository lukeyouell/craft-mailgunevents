<?php
/**
 * Mailgun Events plugin for Craft CMS 3.x
 *
 * Track Mailgun events from the utilities section
 *
 * @link      https://github.com/lukeyouell
 * @copyright Copyright (c) 2018 Luke Youell
 */

namespace lukeyouell\mailgunevents\assetbundles\mailguneventsutilityutility;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * @author    Luke Youell
 * @package   MailgunEvents
 * @since     1.0.0
 */
class MailgunEventsUtilityUtilityAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = "@lukeyouell/mailgunevents/assetbundles/mailguneventsutilityutility/dist";

        $this->depends = [
            CpAsset::class,
        ];

        $this->js = [
            'js/MailgunEventsUtility.js',
        ];

        $this->css = [
            'css/MailgunEventsUtility.css',
        ];

        parent::init();
    }
}
