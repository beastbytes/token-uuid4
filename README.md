# BeastBytes Token Factory UUID4
Factory for generating UUID4 tokens for use in the Token Manager of  
the [BeastBytes Token](https://github.com/beastbytes/token.git) package.

## Requirements
* PHP 8.1 or higher.

## Installation
Installed the package with Composer:
```php
composer require beastbytes/token-uuid4
```
or add the following to the 'require' section composer.json:
```json
"beastbytes/token-uuid4": "^1.0"
```

## Usage
If using directly:
```php
$tokenManager = new BeastBytes\Token\TokenManager(
    new BeastBytes\Token\Uuid4\TokenFactory(),
    new BeastBytes\Token\Php\TokenStorage() // or any other TokenStorageInterface implementation
);
```
or define in the "di" section of Yii3 configuration:

```php
return [
    TokenFactoryInterface::class => \BeastBytes\Token\Uuid4\TokenFactory::class,
    TokenStorageInterface::class => [
        'class' => TokenStorage::class,
        '__construct()' => [
            // constructor arguments for the TokenStorage class
        ],
    ],
    ManagerInterface::class => [
        'class' => Manager::class,
        '__construct()' => [
            'factory' => Reference::to(TokenFactoryInterface::class),
            'storage' => Reference::to(TokenStorageInterface::class),
        ],
    ],
];
```