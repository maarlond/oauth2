<?php
session_start();
use Monolog\Logger;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Handler\StreamHandler;
ini_set('display_errors', 1);
error_reporting(E_ALL);

require ("./vendor/autoload.php");

// monolog escrever no arquivo de log
$logger = new Logger('SOEAuth');
$browserHanlder = new \Monolog\Handler\BrowserConsoleHandler(\Monolog\Logger::INFO);
$handlerConsole = new StreamHandler('my-log-file.log', Logger::DEBUG);
$logger->pushHandler($browserHanlder);
$logger->pushHandler($handlerConsole);

$provider = new \League\OAuth2\Client\Provider\GenericProvider([
    'response_type'           => 'code',
    'scope'                   => 'openid',
    'clientId'                => 'spgg.e1.hml.uvwNlAXP52FI6fKtSe',    // The client ID assigned to you by the provider
    'clientSecret'            => 'cIUqrApiZ9OCV6uJNDOMW7lJn',    // The client password assigned to you by the provider
    'redirectUri'             => 'http://localhost:8080/oauth2/auth.php',
    'urlAuthorize'            => 'https://www.soe.rs.gov.br/soeauth-hml/connect/authorize',
    'urlAccessToken'          => 'https://www.soe.rs.gov.br/soeauth-hml/connect/token',
    'urlResourceOwnerDetails' => 'https://www.soe.rs.gov.br/soeauth-hml/connect/userinfo'
]);

if (isset($_GET['sistema'])) {
    $_SESSION['sistema'] = $_GET["sistema"];
}

// If we don't have an authorization code then get one
if (!isset($_GET['code'])) {

    // Fetch the authorization URL from the provider; this returns the
    // urlAuthorize option and generates and applies any necessary parameters
    // (e.g. state).
    $authorizationUrl = $provider->getAuthorizationUrl();

    // Redirect the user to the authorization URL.
    header('Location: ' . $authorizationUrl);

    $logger->debug('01 Entrou if !isset(code) com oauth2state '.$_SESSION['oauth2state']);
    exit;

// Check given state against previously stored one to mitigate CSRF attack
} elseif (empty($_GET['state']) || (isset($_SESSION['oauth2state']) && $_GET['state'] !== $_SESSION['oauth2state'])) {

    if (isset($_SESSION['oauth2state'])) {
        unset($_SESSION['oauth2state']);
        $logger->debug(' 02 Entrou if isset($_SESSION["oauth2state"]');
    }

    exit('Invalid state');

} else {

    try {

        // Try to get an access token using the authorization code grant.
        $accessToken = $provider->getAccessToken('authorization_code', [
            'code' => $_GET['code']
        ]);

        // We have an access token, which we may use in authenticated
        // requests against the service provider's API.
        $_SESSION['id_token'] = $accessToken->getToken();
        $_SESSION['refresh_token'] = $accessToken->getRefreshToken();

        $logger->debug('03 Entrou if isset($_SESSION["oauth2state"]'.$_SESSION['id_token']);

        // Using the access token, we may look up details about the
        // resource owner.
        $resourceOwner = $provider->getResourceOwner($accessToken);

        // The provider provides a way to get an authenticated API request for
        // the service, using the access token; it returns an object conforming
        // to Psr\Http\Message\RequestInterface.
        $request = $provider->getAuthenticatedRequest(
            'GET',
            'https://www.soe.rs.gov.br/soeauth-hml/connect/userinfo',
            $accessToken
        );

        $_SESSION['sessaoauth'] = $resourceOwner->toArray();

    } catch (\League\OAuth2\Client\Provider\Exception\IdentityProviderException $e) {

        // Failed to get the access token or user details.
        exit($e->getMessage());
    }
}
header("Location:./sistema.php");