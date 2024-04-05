# Symfony Mailgun API Transport issue

A tiny test project for debugging the following issue:
https://github.com/symfony/symfony/issues/54491

## Installation

```bash
$ git clone https://github.com/michaelhue/mailer-mailgun-issue.git
$ cd mailer-mailgun-issue
$ composer install
```

Make sure the `.env` file has been created (or copy and rename `.env.example` yourself) and fill out all values.

## Usage

```bash
$ php test.php
```

Will output the debug information for the request when an error occurs, or nothing if all goes well.
