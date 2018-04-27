<?php
/**
 * Mailgun Events plugin for Craft CMS 3.x
 *
 * Track Mailgun events from the utilities section
 *
 * @link      https://github.com/lukeyouell
 * @copyright Copyright (c) 2018 Luke Youell
 */

namespace lukeyouell\mailgunevents\models;

use lukeyouell\mailgunevents\MailgunEvents;

use Craft;
use craft\base\Model;

/**
 * @author    Luke Youell
 * @package   MailgunEvents
 * @since     1.0.0
 */
class Settings extends Model
{
    // Public Properties
    // =========================================================================

    public $eventTypes = ['delivered', 'failed', 'opened', 'rejected'];

    public $limit = 25;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['eventTypes', 'each', 'rule' => ['string']],
            [['limit'], 'string'],
            [['eventTypes', 'limit'], 'required']
        ];
    }
}
