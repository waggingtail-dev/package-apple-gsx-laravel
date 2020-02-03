Apple GSX PHP Library
=====================

<p align="left">
    <a href="https://github.com/waggingtail-dev/package-apple-gsx-laravel"><img alt="GitHub Actions status" src="https://github.com/waggingtail-dev/package-apple-gsx-laravel/workflows/ci-cd/badge.svg"></a>
</p>

```php
// app/providers/AppServiceProvider.php
public function boot()
{
    $this->app->applegsx
        ->getConfig()
        ->useUat(true);
}

// will return "OK" if your application sucessfully communicates with Apple GSX api.
AppleGsx::authenticate()->check();

// from https://gsx2[-uat].apple.com/gsx/api/login;
$activationToken = 'activation-token';

// Returns an authentication token, store it in case you need to refresh the token.
$token = AppleGsx::authenticate()->token($activationToken);

// this is just an example, how you implement `setAppleGsxToken()` is irrelevant.
$user->setAppleGsxToken($token);

// Can be called with the current authentication token to refresh it.
// again, `getAppleGsxToken()` implementation is up to you.
AppleGsx::authenticate()->token($user->getAppleGsxToken());

// when making requests, wrap it in a try/catch to catch UnauthorizedException
try {
    AppleGsx::repair()->details($repairId);
} catch (UnauthorizedException $e) {
    // We need to refresh the token
    $currentToken = Auth::user()->getAppleGsxToken();
    $newToken = AppleGsx::authenticate()->token($currentToken);
    
    Auth::user()->setAppleGsxToken($newToken);
}
```
