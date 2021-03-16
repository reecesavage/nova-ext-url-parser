# nova-ext-url-parser
Allows Nova to Parse tags that are translated into web links on the front end.
## Created for you by [Sim Central](https://simcentral.org)

<p align="center">
  <a href="https://github.com/reecesavage/nova-ext-url-parser/releases/tag/v1.0.0"><img src="https://img.shields.io/badge/Version-v1.0.0-brightgreen.svg"></a>
  <a href="http://www.anodyne-productions.com/nova"><img src="https://img.shields.io/badge/Nova-v2.6.1-orange.svg"></a>
  <a href="https://www.php.net"><img src="https://img.shields.io/badge/PHP-v5.3.0-blue.svg"></a>
  <a href="https://opensource.org/licenses/MIT"><img src="https://img.shields.io/badge/license-MIT-red.svg"></a>
</p>

This extension allows the Game Manager to create tags that can be parsed into links in the views. 

This extension requires:

- Nova 2.6+

## Installation

- Copy the entire directory into `applications/extensions/nova_ext_url_parser`.
- Add the following to `application/config/extensions.php`: - Be sure the `jquery` line appears before `nova_ext_url_parser`
```
$config['extensions']['enabled'][] = 'nova_ext_url_parser';
```
Installation is now complete!

## Setup
- Navigate to your Admin Control Panel
- Choose URL Parser under Manage Extensions
- Add, Remove, or Edit Tags.
  - Tag = The shorthand tag to allow the extension to parse. ex: `wiki`
  - URL = The URL to replace the tag with. ex: `https://wiki.starship-ulysses.com/index.php?title=`
  - Post URL = Optional Field to add a URL string after the unique tag value. ex: `URL+TagValue+PostURL`
  - New Tab = This checkbox will make the links open in a new browser tab.

## Usage

- Simply add a tag and value to your Posts, News Items, Personal Logs, Site Messages, or Mission Descriptions.
- `[tag|value] or [tag|value|Title]
  - `[wiki|Ulysses]` = `<a href="https://wiki.starship-ulysses.com/index.php?title=Ulysses">Ulysses</a>`
  - `[wiki|United_Federation_of_Planets]` = `<a href="https://wiki.starship-ulysses.com/index.php?title=United_Federation_of_Planets">United_Federation_of_Planets</a>`
  - `[wiki|United_Federation_of_Planets|United Federation of Planets]` = `<a href="https://wiki.starship-ulysses.com/index.php?title=United_Federation_of_Planets">United Federation of Planets</a>`
- If your website moves, but the Unique Values stay the same all you need to do is update the URL in the tag to fix broken links.

## Issues

If you encounter a bug or have a feature request, please report it on GitHub in the issue tracker here: https://github.com/reecesavage/nova-ext-url-parser/issues

## License

Copyright (c) 2021 Reece Savage.

This module is open-source software licensed under the **MIT License**. The full text of the license may be found in the `LICENSE` file.
