FrostApi - Po.et' s Api PHP SDK
=======================

## Installing FrostApi PHP SDK

The recommended way to install FrostApi PHP SDK is through
[Composer](http://getcomposer.org).

```bash
# Install Composer
curl -sS https://getcomposer.org/installer | php
```

Next, run the Composer command to install the latest stable version of Frost Api PHP SDK:

```bash
php composer.phar require "ozdemirr/frost-poet-php-sdk:0.1.0"
```

After installing, you need to require Composer's autoloader:

```php
require 'vendor/autoload.php';
```

You can then later update Frost Api PHP SDK using composer:

 ```bash
composer.phar update
 ```

```php
//add requirements on the top of php file
use FrostApi\Model\CreateWork;
use FrostApi\Model\GetWork; 
//
    $token = "your-private-token-comes-here-get-it-from-https://frost.po.et/dashboard";
    
    // Publish Work
    
    $work = new CreateWork($token);
    $work->body->setName("ozdemirr");
    $work->body->setAuthor("Emre");
    $work->body->setContent("i am just testing frost sdk");
    $work->body->setTags("php");
    
        
// you should set datePublished and dateCreated but i setted them on CreateWork Class
// you can also change them by setDatePublished and setDateCreated methods.
    try {

        $response = $work->post();

        echo $response->workId;

    }catch (\FrostApi\Exception\UnprocessableEntity $e){
        echo $e->getMessage();
    }catch (\FrostApi\Exception\Forbidden $e){
        echo $e->getCode();
    }

//you can catch the errors easily by related exception classes
    
    
    //Get Work(s)
    
    $work = new GetWork($token);
    $work->setWorkId("67f1aaec1a1baff336f9a94b79387630153ef4931b3f184697a554ee5581dea9");
    $response = $work->get();
    
    echo $response->getContent();
    
    // if you don't set workId, all of your works will be returned by api
    // i handled them and convert to array of Work Objects that objects have getter methods.

    // example array of Work Objects
    foreach ($response as $work){
                echo $work->getContent();
    }

```




