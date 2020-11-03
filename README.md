# Pipeline

![license](https://img.shields.io/badge/license-MIT-brightGreen.svg)
[![build status](https://travis-ci.org/jamielsharief/pipeline.svg?branch=main)](https://travis-ci.org/jamielsharief/pipeline)
[![coverage status](https://coveralls.io/repos/github/jamielsharief/pipeline/badge.svg?branch=main)](https://coveralls.io/github/jamielsharief/pipeline?branch=main)

My implementation of the Pipeline pattern based upon this [article](https://java-design-patterns.com/patterns/pipeline/).

In my case, I needed to download data from an API, run it through a Service Object, then run through another Service Object. It is mainly used to execute code through a series of stages and then yeild a final value but it can also be used to make complex code more readable.

## Installation

```bash
$ composer require jamielsharief/pipeline
```

## Creating a Handler

Create a Handler for each stage in the pipeline

```php
class DownloadData implements HandlerInterface
{
    /**
     * Handler code
     */
    public function handle($payload = null)
    {
        
    }
}
```

## Creating the Pipeline

Create the pipeline

```php
$pipeline = (new Pipeline(new DownloadData()))
    ->add(new CleanUpData())
    ->add(new ConvertToJson())
    ->add(new AddToDatabase());
```

When you want to execute it call the `dispatch` method and pass any payload.

```php
$pipeline->dispatch('8a967e35-f818-43e9-931a-f7f5b6760793');
```