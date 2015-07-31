Configure migrations
====================

File config with migrations: `console/config/params.php`

Information from [https://github.com/dmstr/yii2-migrate-command](https://github.com/dmstr/yii2-migrate-command/blob/master/README.md)

### Adding migrations via application configuration

Add additional migration paths via application `params`:

```
"yii.migrations"=> [
    "@dektrium/user/migrations",
],
```

### Adding migrations via extension `bootstrap()`

You can also add migrations in your module bootstrap process:

```
public function bootstrap($app)
{
    $app->params['yii.migrations'][] = '@vendorname/packagename/migrations';
}
```

### Adding migrations via command parameter

If you want to specify an additional path directly with the command, use

```
./yii migrate --migrationLookup=@somewhere/migrations/data1,@somewhere/migrations/data2
```

> Note! Please make sure to **not use spaces** in the comma separated list.