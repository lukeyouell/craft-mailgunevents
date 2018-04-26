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

use lukeyouell\mailgunevents\MailgunEvents;

use Craft;
use craft\base\Utility;

/**
 * Mailgun Events
 *
 * @author    Luke Youell
 * @package   MailgunEvents
 * @since     1.0.0
 */
class MailgunEvents extends Utility
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
        return 'mailgun-events';
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
    public static function badgeCount(): int
    {
        return 0;
    }

    /**
     * @inheritdoc
     */
    public static function contentHtml(): string
    {
        Craft::$app->getView()->registerAssetBundle(MailgunEventsUtilityUtilityAsset::class);

        $someVar = 'Have a nice day!';
        return Craft::$app->getView()->renderTemplate(
            'mailgun-events/_components/utilities/MailgunEventsUtility_content',
            [
                'someVar' => $someVar
            ]
        );
    }
}
