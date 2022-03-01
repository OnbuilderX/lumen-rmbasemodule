# lumen-rmbasemodule
Modular Mangement in Lumen 

### Features

lumen-rmbasemodule is a lumen package which created to manage your large atomic lumen app using modules.


# Install

To install through Composer, by run the following command:

`composer require onbuilderx/lumen-rmbasemodule`
 
 after install complete, load the config and the service provider in `bootstrap/app.php`
 
 	$app->register(RmBased\Modules\LumenModulesServiceProvider::class);

By default the module classes are not loaded automatically. You can autoload your modules using `psr-4`. so add bellow  code in your composer.json :

	{
  	"autoload": {
            "psr-4": {
                "App\\": "app/",
                "Modules\\": "modules/"
            }
 	    }
	}

### Tip: don't forget to run composer dump-autoload afterwards

for more info and full documentation visit https://nwidart.com/laravel-modules/

### Credits
[Nicolas Widart](https://github.com/nwidart "Nicolas Widart")


### License
The MIT License (MIT).
