# Zipper

[![Maintainer](http://img.shields.io/badge/maintainer-@sergiodanilojr-blue.svg?style=flat-square)](https://twitter.com/sergiodanilojr)
[![Source Code](http://img.shields.io/badge/source-sergiodanilojr/zipper-blue.svg?style=flat-square)](https://github.com/sergiodanilojr/zipper)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/sergiodanilojr/zipper.svg?style=flat-square)](https://packagist.org/packages/sergiodanilojr/zipper)
[![Latest Version](https://img.shields.io/github/release/sergiodanilojr/zipper.svg?style=flat-square)](https://github.com/sergiodanilojr/zipper/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Build](https://img.shields.io/scrutinizer/build/g/sergiodanilojr/zipper.svg?style=flat-square)](https://scrutinizer-ci.com/g/sergiodanilojr/zipper)
[![Quality Score](https://img.shields.io/scrutinizer/g/sergiodanilojr/zipper.svg?style=flat-square)](https://scrutinizer-ci.com/g/sergiodanilojr/zipper)
[![Total Downloads](https://img.shields.io/packagist/dt/sergiodanilojr/zipper.svg?style=flat-square)](https://packagist.org/packages/csergiodanilojr/zipper)

###### Zipper is a facilitator for creating Zip Files in an uncomplicated way, with features of Download, insertion of License and Extraction Files and Creation of Zipping with multiples in one!

Zipper é um facilitador para criação de Arquivos Zip de maneira descomplicada, contando com recursos de Download, inserção de Arquivos, Extração e Criação de Zipagem com múltiplos em um só!

Você pode saber mais **[clicando aqui](https://www.sergiodanilojr.com.br/componentes/zipper)**.

### Highlights

- Simple installation (Instalação simples)
- You can Extract Zip Files (Você pode extrair arquivos zip)
- You can Create a Zip File with how many you want (É possível criar Arquivos Zip com quantos arquivos desejar)
- There is a layer to show error messages (Possui mensagens, caso um erro impeça a execução desejada)
- With Zipper is so easy force a download of any file with only one line of code (Com o Zipper é uito fácil forçar o download de qualquer arquivo com somente uma linha de código)
- Facilitates how to handle zip files by writing less code (Facilita a manipulação de Arquivos Zip escrevendo menos código)
- Composer ready and PSR-2 compliant (Pronto para o composer e compatível com PSR-2)

## Installation

Zipper is available via Composer:

```bash
"sergiodanilojr/zipper": "^1.0"
```

or run

```bash
composer require sergiodanilojr/zipper
```

## Documentation

###### For details on how to use, see a sample folder in the zipper directory. In it you will have an example of use for each class. It works like this:

Para mais detalhes sobre como usar, veja uma pasta de exemplo no diretório do zipper. Nela terá um exemplo de uso para cada classe. Ele funciona assim:

#### Zipper for a single File

```php
<?php
require __DIR__ . "/vendor/autoload.php";

use SergioDaniloJr\Zipper\Zipper;

$zipper = new Zipper();

$fileExample = __DIR__."/assets/files/example-file.txt";

$single = $zipper->zipFile($fileExample);

//It'll bring the way of the zip File
echo $single;
```

#### Zipper for Several Files

```php
<?php
require __DIR__ . "/vendor/autoload.php";

use SergioDaniloJr\Zipper\Zipper;

$zipper = new Zipper();

$fileOne = __DIR__."/assets/files/example-file.txt";
$fileTwo = __DIR__."/assets/files/example-file-two.txt";

$files = [
    $fileOne,
    $fileTwo
];

//Here I'll set a new folder that not exists yet.
$path = __DIR__."/assets/files/ZipperFiles";

$several = $zipper->zipFiles($files, "MadeWithZipper", $path);

echo $several;

```


#### Zipper for Extract File

```php
<?php
require __DIR__ . "/vendor/autoload.php";

use SergioDaniloJr\Zipper\Zipper;

$zipper = new Zipper();

$fileToExtract = __DIR__ . "/assets/files/MadeWithZipper.zip";

//Here I'll set a new folder that not exists yet. But You can set a existent folder.
$destiny = __DIR__ . "/assets/files/Storage";

$extracted = $zipper->extract($fileToExtract,$destiny);

echo $extracted;

```


#### Zipper for Download a File

```php
<?php
require __DIR__ . "/vendor/autoload.php";

use SergioDaniloJr\Zipper\Zipper;

$zipper = new Zipper();

$fileExample = __DIR__ . "/assets/files/example-file.txt";

//This method don't return, obvly, a way!
$zipper->download($fileExample);

```

### Zipper dialog about errors
```php
<?php
require __DIR__ . "/vendor/autoload.php";

use SergioDaniloJr\Zipper\Zipper;

$zipper = new Zipper();

//When there'is an error, you can calll the message method for show the error message, it comes like a 'string' type

$zipper->message();

```


### Others

###### Here is possible write about others explanations...

- When you set a folder that not exists, the Zipper Component create the folder for you easyly!


## Contributing

Please see [CONTRIBUTING](https://github.com/sergiodanilojr/zipper/blob/master/CONTRIBUTING.md) for details.

## Support

###### Security: If you discover any security related issues, please email sergiodanilojr@hotmail.com instead of using the issue tracker.

Se você descobrir algum problema relacionado à segurança, envie um e-mail para sergiodanilojr@hotmail.com em vez de usar o rastreador de problemas.

The Develoer pretends continue improving this component!

Thank you


## Credits

- [Sérgio Danilo Jr.](https://github.com/sergiodanilojr) (Developer)
- [All Contributors](https://github.com/sergiodanilojr/zipper/contributors)

## License

The MIT License (MIT). Please see [License File](https://github.com/sergiodanilojr/zipper/blob/master/LICENSE) for more information.
