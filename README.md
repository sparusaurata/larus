# Larus, a template for academic websites

This template is designed for researchers who want to build a simple academic
website presenting their work.

Its **features** are adapted to an academic use, including:
* multilingual webpages,
* mathematical writing,
* automatic generation of publication lists.

It is **lightweight** and **portable** — it only consists in a few PHP scripts
(along with CSS styles, a bit of Javascript an a few optional external
components). The only dependency is PHP (the code is currently tested with PHP
7.4 and 8.1), which is usually available on any web server.

It is **customisable** — a set of basic options is predefined, and an
exhaustive documentation is provided. Further customisation can be performed
by adding PHP code to the template.

It is **free** and **open** — the code was initially just the author's
personal academic webpage, and this slightly improved and substantially
documented version is made available for anybody who wants to use it. For 
details, see the Licensing information below.

To see it working, you can visit
[this demo](https://www.i2m.univ-amu.fr/perso/remy.cerda/larus/).


## Get started

**1. Make sure you have access to your web server.** This is some online
directory where you will upload the content of your website. If you work
in an academic institution, it should probably grant you access to some web
server dedicated to personal webpages.

**2. Copy the latest release of this repository to the server.** You may have
to first download it to your own computer, and then send it to the server
(e.g. through FTP).

**3. Check the customisation options.** Read the `config.php` file and set the
options according to your needs. If you're afraid of source code, don't panic:
each option is documented, and examples are provided as a default 
configuration.

In particular, this is where you will have to configure 
**multi-language support**. By default, the template shows a bilingual
French-English website. You can disable multilingualism by setting
`$op_multilingual` to `false`, or change the supported languages. In the latter
case, you will have go through all the `config.php` file and update the
translations.

**4. Edit the content of the website.** The example provided in `index.php`
should be self-explanatory. If you aren't used to HTML code, you might want to 
have a look to the first steps of an
[HTML tutorial](https://www.w3schools.com/html/html_intro.asp).

The main feature of the template is the automatic generation of a publication
list. You will find detailed examples in `lists.php`, as well as an exhaustive
documentation for the corresponding PHP functions.

If you don't know PHP, HTML or CSS, you should not edit the content of the
`includes/` folder: it contains the technical code that makes the template
work.

**5. Check everything works fine!** Some small editions may result in huge
bugs, so make sure the website still works after each modification.
In particular, check that everything works in all different languages, since
bugs might affect one language only.


## Documentation

A first view of the documentation can be found in the default website (see
[the demo](https://www.i2m.univ-amu.fr/perso/remy.cerda/larus/)).

A more detailed user documentation can be found inside the template itself:
* the basic documentation for website building is in `index.php`,
* the documentation of the publications (and talks) lists functionalities
  are in `lists.php`,
* the documentation of the customisation options is in `config.php`.

If you want to do technical modifications, you may want to edit the code
in the `includes/` folder. All the files there are commented, which constitutes
the developper documentation.


## Troubleshooting and feature requests

If you spot a bug, please
[open an issue](https://github.com/sparusaurata/larus/issues)!
This includes bad English writing in the documentation, since the author still
lacks some fluency in this language...

Feature requests are also very welcome. In general, feel free to get in touch
with the author (by opening an issue, or per email) if you have any question
related to this template, or if you need some help to use it.


## Licensing

The code and the documentation of this template is distributed under the
[GNU GPL v3 or later](
https://github.com/sparusaurata/larus/blob/main/LICENSE.md).

> Larus, a template for academic websites
> Copyright (C) 2022 Rémy Cerda
> 
> This program is free software: you can redistribute it and/or modify
> it under the terms of the GNU General Public License as published by
> the Free Software Foundation, either version 3 of the License, or
> (at your option) any later version.
> 
> This program is distributed in the hope that it will be useful,
> but WITHOUT ANY WARRANTY; without even the implied warranty of
> MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
> GNU General Public License for more details.
> 
> You should have received a copy of the GNU General Public License
> along with this program.  If not, see <http://www.gnu.org/licenses/>.

The following components are distributed with this template, under a specific 
license:
* some of the [Twemoji icons](https://github.com/twitter/twemoji) by
  Twitter, Inc. and other contributors, distributed under the
  [Creative Commons BY 4.0](https://creativecommons.org/licenses/by/4.0/)
  license;
* a picture of [_Larus michahellis_ in the Farnese Gardens
  ](https://commons.wikimedia.org/wiki/File:Larus_michahellis_in_Farnese_Gardens_02.jpg)
  by [Krzysztof Golik](https://commons.wikimedia.org/wiki/User:Tournasol7),
  distributed under the [Creative Commons BY-SA 4.0
  ](https://creativecommons.org/licenses/by-sa/4.0/) license.

The following third-party components are loaded by this template (if the 
corresponding options are activated):
* the [Work Sans](https://fonts.google.com/specimen/Work+Sans) fonts
  by Wei Huang from the Google fonts project, distributed under the
  [Open Font License v1.1](https://scripts.sil.org/cms/scripts/page.php?item_id=OFL_web);
* the [MathJax](http://www.mathjax.org/) library, distributed under the
  [Apache License v2.0](https://www.apache.org/licenses/LICENSE-2.0).
