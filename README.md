
Install it via composer

`composer require sharik709/laravel-payout-adapter`

once installed copy/paste following key value in your `.env` file
```php
[TransferWise API Keys]
TRANSFERWISE_SANDBOX_KEY=""
TRANSFERWISE_SANDBOX_PROFILE=""
TRANSFERWISE_API_KEY=""
TRANSFERWISE_PROFILE=""

[TransPay API Keys]
TRANSPAY_API_KEY=""
TRANSPAY_SANDBOX_USER=""
TRANSPAY_SANDBOX_PASSWORD=""
TRANSPAY_SANDBOX_TOKEN=""
```

If you are using laravel 5.5 or above. Then, Service provider will be registered automatically but if you are using lower version then you can register service provider.
`\PayoutAdapter\PayoutAdapterServiceProvider::class`
