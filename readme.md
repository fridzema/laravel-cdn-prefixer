```composer require fridzema/cdn-prefixer```

Add to providers array in `config/app.php`
```Fridzema\CdnPrefixer\CdnPrefixerServiceProvider::class```

Run in terminal
```php artisan vendor:publish --tag=config```


Use cdn() instead of asset() in your application now and it will be prefixed.
```cdn('js/app.js')```
