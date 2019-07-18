<?php
/**
 * Mailgun Events plugin for Craft CMS 3.x
 *
 * Track Mailgun events from the utilities section
 *
 * @link      https://github.com/lukeyouell
 * @copyright Copyright (c) 2018 Luke Youell
 */

namespace lukeyouell\mailgunevents\utilities;

use Craft;
use craft\base\Utility;
use craft\services\SystemSettings;
use craft\mailgun\MailgunAdapter;

use Mailgun\Mailgun;

use lukeyouell\mailgunevents\MailgunEvents;

/**
 * Mailgun Events Utility
 *
 * @author    Luke Youell
 * @package   MailgunEvents
 * @since     1.0.0
 */
class MailgunEventsUtility extends Utility
{
    // Static
    // =========================================================================

    /**
     * @inheritdoc
     */
    public static function displayName(): string
    {
        return Craft::t('mailgun-events', 'Mailgun Events');
    }

    /**
     * @inheritdoc
     */
    public static function id(): string
    {
        return 'mailgun-events-utility';
    }

    /**
     * @inheritdoc
     */
    public static function iconPath()
    {
        return Craft::getAlias("@lukeyouell/mailgunevents/icon-mask.svg");
    }

    /**
     * @inheritdoc
     */
    public static function contentHtml(): string
    {
        return Craft::$app->getView()->renderTemplate(
            'mailgun-events/utility',
            [
                'events' => self::getEvents()
            ]
        );
    }

    public static function getEvents()
    {
        $pluginSettings = MailgunEvents::$plugin->getSettings();
        $emailSettings = Craft::$app->systemSettings->getSettings('email');
        $key = Craft::parseEnv($emailSettings['transportSettings']['apiKey']);
        $domain = Craft::parseEnv($emailSettings['transportSettings']['domain']);

        $client = new Mailgun($key);
        $query = [
            'limit' => $pluginSettings->limit,
            'event' => implode(' OR ', $pluginSettings->eventTypes),
        ];

        return $client->get($domain.'/events', $query);
    }
}
