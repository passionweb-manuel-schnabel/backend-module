# Creating a backend module in TYPO3

Shows the basic structure of a backend module (TYPO3 CMS)

## What does it do?

1.0.0: Register a simple backend module

1.1.0: Added a custom button bar to the backend module

1.2.0: Added simple javascript module to dashboard action

1.3.0: Added multistep wizard example

1.4.0: Added sample AJAX request

1.5.0: Added Notification API examples

1.6.0: Added inline language file

1.7.0: Added example for dynamic imports in javascript

1.8.0: Added custom template button example

1.9.0: Added custom toolbar item example

1.10.0: Added custom button to list module example

1.11.0: Added example for modifying the NewContentElementWizard

## Installation

* Add repository to your composer.json

```json
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/passionweb-manuel-schnabel/backend-module.git"
        }
    ]
}
```

* Add via composer:

```
    composer require "passionweb/backend-modle"
```

* Install the extension via composer
* Flush TYPO3 and PHP Cache

## Requirements

This example uses no 3rd party libraries.

## Extension settings

There are no extension settings available.

## Troubleshooting and logging

If something does not work as expected take a look at the log file.
Every problem is logged to the TYPO3 log (normally found in `var/log/typo3_*.log`)

## Achieving more together or Feedback, Feedback, Feedback

I'm grateful for any feedback! Be it suggestions for improvement, requests or just a (constructive) feedback on how good or crappy this snippet/repo is.

Feel free to send me your feedback to [service@passionweb.de](mailto:service@passionweb.de "Send Feedback") or [contact me on Slack](https://typo3.slack.com/team/U02FG49J4TG "Contact me on Slack")
