# Widget API

The token for authentication has been submitted by email to keep it out of the
application and meet the guideline.

Given the criteria was a token stored in an env variable as a hash, I
wasn't sure how to share this with you.

If I were to develop this as an actual production-ready system I would
have the token generate dynamically and be stored in the DB as a hash,
but I wanted to stick to the guidelines.

## Running the code

1. Clone the repository
2. Run `composer install`
3. Copy .env.example to .env and adjust the parameters to match your
configuration
4. Run `php artisan serve` to initialize the local environment
5. The API should be reachable at `http://localhost:8000`

## Tests

To run the tests, please run `php artisan test`.

## Notes

The day sent in the X-Day header is in UTC, so depending on the time of day
it may not match the current day where you are.