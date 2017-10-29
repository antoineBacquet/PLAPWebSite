<?php
/**
 * KillmailsApi
 * PHP version 5
 *
 * @category Class
 * @package  nullx27\ESI
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * EVE Swagger Interface
 *
 * An OpenAPI for EVE Online
 *
 * OpenAPI spec version: 0.4.9.dev1
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 *
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace nullx27\ESI\Api;

use \nullx27\ESI\ApiClient;
use \nullx27\ESI\ApiException;
use \nullx27\ESI\Configuration;
use \nullx27\ESI\ObjectSerializer;

/**
 * KillmailsApi Class Doc Comment
 *
 * @category Class
 * @package  nullx27\ESI
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class KillmailsApi
{
    /**
     * API Client
     *
     * @var \nullx27\ESI\ApiClient instance of the ApiClient
     */
    protected $apiClient;

    /**
     * Constructor
     *
     * @param \nullx27\ESI\ApiClient|null $apiClient The api client to use
     */
    public function __construct(\nullx27\ESI\ApiClient $apiClient = null)
    {
        if ($apiClient === null) {
            $apiClient = new ApiClient();
            $apiClient->getConfig()->setHost('https://esi.tech.ccp.is/latest');
        }

        $this->apiClient = $apiClient;
    }

    /**
     * Get API client
     *
     * @return \nullx27\ESI\ApiClient get the API client
     */
    public function getApiClient()
    {
        return $this->apiClient;
    }

    /**
     * Set the API client
     *
     * @param \nullx27\ESI\ApiClient $apiClient set the API client
     *
     * @return KillmailsApi
     */
    public function setApiClient(\nullx27\ESI\ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
        return $this;
    }

    /**
     * Operation getCharactersCharacterIdKillmailsRecent
     *
     * List kills and losses
     *
     * @param int $characterId An EVE character ID (required)
     * @param string $datasource The server name you would like data from (optional, default to tranquility)
     * @param int $maxCount How many killmails to return at maximum (optional, default to 50)
     * @param int $maxKillId Only return killmails with ID smaller than this. (optional)
     * @param string $token Access token to use, if preferred over a header (optional)
     * @param string $userAgent Client identifier, takes precedence over headers (optional)
     * @param string $xUserAgent Client identifier, takes precedence over User-Agent (optional)
     * @throws \nullx27\ESI\ApiException on non-2xx response
     * @return \nullx27\ESI\Models\GetCharactersCharacterIdKillmailsRecent200Ok[]
     */
    public function getCharactersCharacterIdKillmailsRecent($characterId, $datasource = null, $maxCount = null, $maxKillId = null, $token = null, $userAgent = null, $xUserAgent = null)
    {
        list($response) = $this->getCharactersCharacterIdKillmailsRecentWithHttpInfo($characterId, $datasource, $maxCount, $maxKillId, $token, $userAgent, $xUserAgent);
        return $response;
    }

    /**
     * Operation getCharactersCharacterIdKillmailsRecentWithHttpInfo
     *
     * List kills and losses
     *
     * @param int $characterId An EVE character ID (required)
     * @param string $datasource The server name you would like data from (optional, default to tranquility)
     * @param int $maxCount How many killmails to return at maximum (optional, default to 50)
     * @param int $maxKillId Only return killmails with ID smaller than this. (optional)
     * @param string $token Access token to use, if preferred over a header (optional)
     * @param string $userAgent Client identifier, takes precedence over headers (optional)
     * @param string $xUserAgent Client identifier, takes precedence over User-Agent (optional)
     * @throws \nullx27\ESI\ApiException on non-2xx response
     * @return array of \nullx27\ESI\Models\GetCharactersCharacterIdKillmailsRecent200Ok[], HTTP status code, HTTP response headers (array of strings)
     */
    public function getCharactersCharacterIdKillmailsRecentWithHttpInfo($characterId, $datasource = null, $maxCount = null, $maxKillId = null, $token = null, $userAgent = null, $xUserAgent = null)
    {
        // verify the required parameter 'characterId' is set
        if ($characterId === null) {
            throw new \InvalidArgumentException('Missing the required parameter $characterId when calling getCharactersCharacterIdKillmailsRecent');
        }
        if (!is_null($maxCount) && ($maxCount > 5000)) {
            throw new \InvalidArgumentException('invalid value for "$maxCount" when calling KillmailsApi.getCharactersCharacterIdKillmailsRecent, must be smaller than or equal to 5000.');
        }

        // parse inputs
        $resourcePath = "/characters/{character_id}/killmails/recent/";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType([]);

        // query params
        if ($datasource !== null) {
            $queryParams['datasource'] = $this->apiClient->getSerializer()->toQueryValue($datasource);
        }
        // query params
        if ($maxCount !== null) {
            $queryParams['max_count'] = $this->apiClient->getSerializer()->toQueryValue($maxCount);
        }
        // query params
        if ($maxKillId !== null) {
            $queryParams['max_kill_id'] = $this->apiClient->getSerializer()->toQueryValue($maxKillId);
        }
        // query params
        if ($token !== null) {
            $queryParams['token'] = $this->apiClient->getSerializer()->toQueryValue($token);
        }
        // query params
        if ($userAgent !== null) {
            $queryParams['user_agent'] = $this->apiClient->getSerializer()->toQueryValue($userAgent);
        }
        // header params
        if ($xUserAgent !== null) {
            $headerParams['X-User-Agent'] = $this->apiClient->getSerializer()->toHeaderValue($xUserAgent);
        }
        // path params
        if ($characterId !== null) {
            $resourcePath = str_replace(
                "{" . "character_id" . "}",
                $this->apiClient->getSerializer()->toPathValue($characterId),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // this endpoint requires OAuth (access token)
        if (strlen($this->apiClient->getConfig()->getAccessToken()) !== 0) {
            $headerParams['Authorization'] = 'Bearer ' . $this->apiClient->getConfig()->getAccessToken();
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'GET',
                $queryParams,
                $httpBody,
                $headerParams,
                '\nullx27\ESI\Models\GetCharactersCharacterIdKillmailsRecent200Ok[]',
                '/characters/{character_id}/killmails/recent/'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\nullx27\ESI\Models\GetCharactersCharacterIdKillmailsRecent200Ok[]', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\nullx27\ESI\Models\GetCharactersCharacterIdKillmailsRecent200Ok[]', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\nullx27\ESI\Models\GetCharactersCharacterIdKillmailsRecentForbidden', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\nullx27\ESI\Models\GetCharactersCharacterIdKillmailsRecentInternalServerError', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation getKillmailsKillmailIdKillmailHash
     *
     * Get a single killmail
     *
     * @param string $killmailHash The killmail hash for verification (required)
     * @param int $killmailId The killmail ID to be queried (required)
     * @param string $datasource The server name you would like data from (optional, default to tranquility)
     * @param string $userAgent Client identifier, takes precedence over headers (optional)
     * @param string $xUserAgent Client identifier, takes precedence over User-Agent (optional)
     * @throws \nullx27\ESI\ApiException on non-2xx response
     * @return \nullx27\ESI\Models\GetKillmailsKillmailIdKillmailHashOk
     */
    public function getKillmailsKillmailIdKillmailHash($killmailHash, $killmailId, $datasource = null, $userAgent = null, $xUserAgent = null)
    {
        list($response) = $this->getKillmailsKillmailIdKillmailHashWithHttpInfo($killmailHash, $killmailId, $datasource, $userAgent, $xUserAgent);
        return $response;
    }

    /**
     * Operation getKillmailsKillmailIdKillmailHashWithHttpInfo
     *
     * Get a single killmail
     *
     * @param string $killmailHash The killmail hash for verification (required)
     * @param int $killmailId The killmail ID to be queried (required)
     * @param string $datasource The server name you would like data from (optional, default to tranquility)
     * @param string $userAgent Client identifier, takes precedence over headers (optional)
     * @param string $xUserAgent Client identifier, takes precedence over User-Agent (optional)
     * @throws \nullx27\ESI\ApiException on non-2xx response
     * @return array of \nullx27\ESI\Models\GetKillmailsKillmailIdKillmailHashOk, HTTP status code, HTTP response headers (array of strings)
     */
    public function getKillmailsKillmailIdKillmailHashWithHttpInfo($killmailHash, $killmailId, $datasource = null, $userAgent = null, $xUserAgent = null)
    {
        // verify the required parameter 'killmailHash' is set
        if ($killmailHash === null) {
            throw new \InvalidArgumentException('Missing the required parameter $killmailHash when calling getKillmailsKillmailIdKillmailHash');
        }
        // verify the required parameter 'killmailId' is set
        if ($killmailId === null) {
            throw new \InvalidArgumentException('Missing the required parameter $killmailId when calling getKillmailsKillmailIdKillmailHash');
        }
        // parse inputs
        $resourcePath = "/killmails/{killmail_id}/{killmail_hash}/";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType([]);

        // query params
        if ($datasource !== null) {
            $queryParams['datasource'] = $this->apiClient->getSerializer()->toQueryValue($datasource);
        }
        // query params
        if ($userAgent !== null) {
            $queryParams['user_agent'] = $this->apiClient->getSerializer()->toQueryValue($userAgent);
        }
        // header params
        if ($xUserAgent !== null) {
            $headerParams['X-User-Agent'] = $this->apiClient->getSerializer()->toHeaderValue($xUserAgent);
        }
        // path params
        if ($killmailHash !== null) {
            $resourcePath = str_replace(
                "{" . "killmail_hash" . "}",
                $this->apiClient->getSerializer()->toPathValue($killmailHash),
                $resourcePath
            );
        }
        // path params
        if ($killmailId !== null) {
            $resourcePath = str_replace(
                "{" . "killmail_id" . "}",
                $this->apiClient->getSerializer()->toPathValue($killmailId),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'GET',
                $queryParams,
                $httpBody,
                $headerParams,
                '\nullx27\ESI\Models\GetKillmailsKillmailIdKillmailHashOk',
                '/killmails/{killmail_id}/{killmail_hash}/'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\nullx27\ESI\Models\GetKillmailsKillmailIdKillmailHashOk', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\nullx27\ESI\Models\GetKillmailsKillmailIdKillmailHashOk', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 422:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\nullx27\ESI\Models\GetKillmailsKillmailIdKillmailHashUnprocessableEntity', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\nullx27\ESI\Models\GetKillmailsKillmailIdKillmailHashInternalServerError', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }
}