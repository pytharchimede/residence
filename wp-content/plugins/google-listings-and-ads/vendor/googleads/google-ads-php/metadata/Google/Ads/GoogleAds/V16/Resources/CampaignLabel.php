<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v16/resources/campaign_label.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V16\Resources;

class CampaignLabel
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
7google/ads/googleads/v16/resources/campaign_label.proto"google.ads.googleads.v16.resourcesgoogle/api/resource.proto"�
CampaignLabelE
resource_name (	B.�A�A(
&googleads.googleapis.com/CampaignLabel@
campaign (	B)�A�A#
!googleads.googleapis.com/CampaignH �:
label (	B&�A�A 
googleads.googleapis.com/LabelH�:l�Ai
&googleads.googleapis.com/CampaignLabel?customers/{customer_id}/campaignLabels/{campaign_id}~{label_id}B
	_campaignB
_labelB�
&com.google.ads.googleads.v16.resourcesBCampaignLabelProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v16/resources;resources�GAA�"Google.Ads.GoogleAds.V16.Resources�"Google\\Ads\\GoogleAds\\V16\\Resources�&Google::Ads::GoogleAds::V16::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

