<?php
// Inspired by https://www.keycdn.com/support/laravel-cdn-integration

function cdn($asset)
{
    $prefixer_enabled = Config::get('cdn-prefixer.enabled');
    $cdn_providers = Config::get('cdn-prefixer.cdn_providers');

    if (! $prefixer_enabled || ! count($cdn_providers)) {
        return asset($asset);
    }

    $asset_name = explode('?', basename($asset));

    foreach ($cdn_providers as $cdn => $types) {
        if (preg_match('/^.*\.('.$types.')$/i', $asset_name[0])) {
            return cdnPath($cdn, $asset);
        }
    }

    end($cdn_providers);

    return cdnPath(key($cdn_providers), $asset);
}

function cdnPath($cdn, $asset)
{
    return '//'.rtrim($cdn, '/').'/'.ltrim($asset, '/');
}
