# Stats - CakePHP Plugin

**Work In Progress v0.0.1**

Aggregating basic statistical information is a common task.

This Plugin is an attempt to make this task easy for anyone who needs the
following features.

* values are numerical data
* values are gathered on periodic basis (monthly, weekly, daily)
* values are gathered from any Model's methods, or Shell call (easy to extend)
* metrics can be single result (site visitors) or multiple results key/values (pagviews/page)
* data can be output into any view as a HTML table
* data can be output as a CSV export
* data can be output as a PDF render of a view

This system by iteslf is ok, but in combination with a few other systems it
becomes quite powerful

* integrate with a queing/cron system, to make periodic reporting automatic
* integrate with Google Analytics to make local reporting simple
* integrate with any API to get data
* share a DB config to aggregate reports from several applications

## Install

Put in place: `app/Plugin/Stats`

    git submodule add https://github.com/zeroasterisk/CakePHP-Stats.git app/Plugin/Stats
    git submodule add https://github.com/CakeDC/search.git app/Plugin/Search

or

    cd app/Plugin
    git clone https://github.com/zeroasterisk/CakePHP-Stats.git Stats
    git clone https://github.com/CakeDC/search.git Search

then add in `app/Config/bootstrap.php`

    CakePlugin::load('Stats');

## Usage: Collact Data

...

## Usage: Report Data

...

## Usage: Automate

...

## Attribution

These are tools I'm currently using in this plugin:

* https://github.com/CakeDC/migrations
* https://github.com/CakeDC/search

These are tools I've used as reference, and taken parts of:

* https://github.com/cjsaylor/gchart

...

and of course, you... pull requests welcome!

## License

This code is licensed under the MIT License


Copyright (C) 2013--2014 Alan Blount <alan@zeroasterisk.com> https://github.com/zeroasterisk/

Permission is hereby granted, free of charge, to any person obtaining a copy of
this software and associated documentation files (the "Software"), to deal in
the Software without restriction, including without limitation the rights to
use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies
of the Software, and to permit persons to whom the Software is furnished to do
so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

