# PageError
## PHP Error Pages

Custom error page class

## Usage

### Standard

Call `PageError::show($code, $uri)` to echo out an error message with the proper response code and message, as well as telling the user which `$uri` caused the error.

### JSON

Call `PageError::returnJSON($code, $uri, $details)` to get a JSON Object returned in the following format:

```javascript
{
    "code": $code
    "msg": "HTTP Error Message"
    "uri": $uri
    "details": $details
}
```

### PHP Array

Call `PageError:returnArray($code, $uir, $details)` to get a standard PHP Array returned in the following format:

```PHP
Array
(
    [code] => 400
    [msg] => Bad Request
    [uri] => /
    [details] => My Details
)
```
