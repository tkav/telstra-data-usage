# telstra-data-usage
Export Telstra Group Usage Data to CSV

## Usage

As per example.php:

<b>Include class file</b>
```php
include('telstra.php');
```

## Login

<b>Enter your Telstra Account credentials and Login to create a session</b>

```php
//Telstra Account
$Username = 'telstrausername';
$Password = 'telstrapassword';

//Login and create session
$login = Telstra::login($Username, $Password);
```

## Export Usage
<b>Get either a Summary or Detailed Usage Report</b>

```php
//Get Summary of Group Data
$csv = Telstra::getGroupUsage('group_summary.csv');

//Get Detailed Usage Summary
$csv = Telstra::getGroupUsage('detailed_summary.csv', 1);
```

<i>Ensure .csv files and session.txt is writable in the directory</i>
