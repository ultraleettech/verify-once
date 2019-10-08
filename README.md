# VerifyOnce
VerifyOnce verification service integration library.

## Usage

Add the library to your project via Composer:

```
composer require ultraleet/verify-once
```

Initialize the library by instantiating the core class:

```php
$verifyOnce = new \Ultraleet\VerifyOnce\VerifyOnce([
    'username' => '', // Integrator username
    'password' => '', // Integrator password
]);
```

To initiate a verification transaction, do the following:

```php
$response = $verifyOnce->initiate();
```

Response will be an array containing 'transactionId' and 'url'. You should store the transaction ID along with user info and redirect the user to the given URL for the verification process.

Once the verification is completed, VerifyOnce posts an encrypted payload containing verification info to your callback URL. To verify the payload, you can use the `verify` method of the library:

```php
$body = file_get_contents('php://input');
$info = $verifyOnce->verify($body);
```

Make sure to catch any exceptions that indicate unsuccessful payload verification.

Callback payload:

```json
{
  
}
```
