<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
define('SRC_PATH', APPPATH.'/third_party/Adwords/src/');
define('LIB_PATH', 'Google/Api/Ads/AdWords/Lib');
define('UTIL_PATH', 'Google/Api/Ads/Common/Util');
define('AW_UTIL_PATH', 'Google/Api/Ads/AdWords/Util');

define('ADWORDS_VERSION', 'v201605');

// Configure include path
ini_set('include_path', implode(array(
    ini_get('include_path'), PATH_SEPARATOR, SRC_PATH))
    );

// Include the AdWordsUser file
require_once SRC_PATH.LIB_PATH. '/AdWordsUser.php';


class My_adwords extends AdWordsUser { 
    public function __construct() { 
       parent::__construct();
    }     
    
 function GetCampaigns() {
 	
   // Get the service, which loads the required classes.
   $campaignService = $this->GetService('CampaignService', ADWORDS_VERSION);
 
   // Create selector.
   $selector = new Selector();
   $selector->fields = array('Id', 'Name');
   $selector->ordering[] = new OrderBy('Name', 'ASCENDING');
 
   // Create paging controls.
   $selector->paging = new Paging(0, AdWordsConstants::RECOMMENDED_PAGE_SIZE);
 
   do {
     // Make the get request.
     $page = $campaignService->get($selector);
 
     // Display results.
     var_dump($page);
     if (isset($page->entries)) {
       foreach ($page->entries as $campaign) {
         printf("Campaign with name '%s' and ID '%s' was found.\n",
             $campaign->name, $campaign->id);

       }
     } else {
       print "No campaigns were found.\n";
     }
 
     // Advance the paging index.
     $selector->paging->startIndex += AdWordsConstants::RECOMMENDED_PAGE_SIZE;
   } while ($page->totalNumEntries > $selector->paging->startIndex);
 }  
}