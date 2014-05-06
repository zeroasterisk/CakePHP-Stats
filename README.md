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
