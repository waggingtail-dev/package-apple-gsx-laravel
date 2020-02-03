Apple GSX PHP Library
=====================

<p align="left">
    <a href="https://github.com/waggingtail-dev/package-apple-gsx-laravel"><img alt="GitHub Actions status" src="https://github.com/waggingtail-dev/package-apple-gsx-laravel/workflows/ci-cd/badge.svg"></a>
</p>

```php
// .env file
APPLE_GSX_SOLD_TO=01234567
APPLE_GSX_SHIP_TO=01234567
// this will resolve to storage_path, e.g. certbundle.pem => storage_path('certbundle.pem')
APPLE_GSX_CA_BUNDLE_PATH=certbundle.pem
APPLE_GSX_CA_PASS_PHRASE=super-secret-pass-phrase
// setting this to true will use GSX UAT environment.
APPLE_GSX_USE_UAT=

// will return "OK" if your application sucessfully communicates with Apple GSX api.
AppleGsx::authenticate()->check();

// from https://gsx2[-uat].apple.com/gsx/api/login;
$activationToken = 'activation-token';

// Returns an authentication token, store it in case you need to refresh the token.
$token = AppleGsx::authenticate()->token($activationToken);

// store the token so you can refresh it later e.g. database

// Can be called with the current authentication token to refresh it.
AppleGsx::authenticate()->token($currentToken);

// when making requests, wrap it in a try/catch to catch UnauthorizedException
try {
    AppleGsx::repair()->details($repairId);
} catch (UnauthorizedException $e) {
    // Unauthorized exception, so we need to refresh the token
    $newToken = AppleGsx::authenticate()->token($currentToken);
 
    // store $newToken
}
```
