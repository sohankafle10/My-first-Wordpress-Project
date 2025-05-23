<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v18/resources/campaign.proto

namespace Google\Ads\GoogleAds\V18\Resources\Campaign;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The setting for controlling Dynamic Search Ads (DSA).
 *
 * Generated from protobuf message <code>google.ads.googleads.v18.resources.Campaign.DynamicSearchAdsSetting</code>
 */
class DynamicSearchAdsSetting extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The Internet domain name that this setting represents, for
     * example, "google.com" or "www.google.com".
     *
     * Generated from protobuf field <code>string domain_name = 6 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    protected $domain_name = '';
    /**
     * Required. The language code specifying the language of the domain, for
     * example, "en".
     *
     * Generated from protobuf field <code>string language_code = 7 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    protected $language_code = '';
    /**
     * Whether the campaign uses advertiser supplied URLs exclusively.
     *
     * Generated from protobuf field <code>optional bool use_supplied_urls_only = 8;</code>
     */
    protected $use_supplied_urls_only = null;
    /**
     * The list of resource names of page feed assets associated with the
     * campaign.
     *
     * Generated from protobuf field <code>repeated string feeds = 9 [(.google.api.resource_reference) = {</code>
     */
    private $feeds;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $domain_name
     *           Required. The Internet domain name that this setting represents, for
     *           example, "google.com" or "www.google.com".
     *     @type string $language_code
     *           Required. The language code specifying the language of the domain, for
     *           example, "en".
     *     @type bool $use_supplied_urls_only
     *           Whether the campaign uses advertiser supplied URLs exclusively.
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $feeds
     *           The list of resource names of page feed assets associated with the
     *           campaign.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V18\Resources\Campaign::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The Internet domain name that this setting represents, for
     * example, "google.com" or "www.google.com".
     *
     * Generated from protobuf field <code>string domain_name = 6 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getDomainName()
    {
        return $this->domain_name;
    }

    /**
     * Required. The Internet domain name that this setting represents, for
     * example, "google.com" or "www.google.com".
     *
     * Generated from protobuf field <code>string domain_name = 6 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setDomainName($var)
    {
        GPBUtil::checkString($var, True);
        $this->domain_name = $var;

        return $this;
    }

    /**
     * Required. The language code specifying the language of the domain, for
     * example, "en".
     *
     * Generated from protobuf field <code>string language_code = 7 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getLanguageCode()
    {
        return $this->language_code;
    }

    /**
     * Required. The language code specifying the language of the domain, for
     * example, "en".
     *
     * Generated from protobuf field <code>string language_code = 7 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setLanguageCode($var)
    {
        GPBUtil::checkString($var, True);
        $this->language_code = $var;

        return $this;
    }

    /**
     * Whether the campaign uses advertiser supplied URLs exclusively.
     *
     * Generated from protobuf field <code>optional bool use_supplied_urls_only = 8;</code>
     * @return bool
     */
    public function getUseSuppliedUrlsOnly()
    {
        return isset($this->use_supplied_urls_only) ? $this->use_supplied_urls_only : false;
    }

    public function hasUseSuppliedUrlsOnly()
    {
        return isset($this->use_supplied_urls_only);
    }

    public function clearUseSuppliedUrlsOnly()
    {
        unset($this->use_supplied_urls_only);
    }

    /**
     * Whether the campaign uses advertiser supplied URLs exclusively.
     *
     * Generated from protobuf field <code>optional bool use_supplied_urls_only = 8;</code>
     * @param bool $var
     * @return $this
     */
    public function setUseSuppliedUrlsOnly($var)
    {
        GPBUtil::checkBool($var);
        $this->use_supplied_urls_only = $var;

        return $this;
    }

    /**
     * The list of resource names of page feed assets associated with the
     * campaign.
     *
     * Generated from protobuf field <code>repeated string feeds = 9 [(.google.api.resource_reference) = {</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getFeeds()
    {
        return $this->feeds;
    }

    /**
     * The list of resource names of page feed assets associated with the
     * campaign.
     *
     * Generated from protobuf field <code>repeated string feeds = 9 [(.google.api.resource_reference) = {</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setFeeds($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->feeds = $arr;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DynamicSearchAdsSetting::class, \Google\Ads\GoogleAds\V18\Resources\Campaign_DynamicSearchAdsSetting::class);

