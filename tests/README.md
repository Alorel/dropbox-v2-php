Travis-CI will not use the app's token pull requests. In order to run tests yourself you must follow these steps:

- [Create a Dropbox app](https://www.dropbox.com/developers/apps/create) **with full Dropbox access**
- Generate an access token - at the time of writing these do not expire.
  - Authorize your app: open https://www.dropbox.com/1/oauth2/authorize?response_type=code&client_id=YOUR_CLIENT_ID
  - You will now receive a code on the screen
  - Retrieve a token as described [here](https://www.dropbox.com/developers-v1/core/docs#oa2-token)

```bash
    curl -X POST -H "Content-Type: application/x-www-form-urlencoded" -d 'code=BBBBB&grant_type=authorization_code&client_id=YOUR_CLIENT_ID&client_secret=YOUR_CLIENT_SECRET' "https://api.dropboxapi.com/1/oauth2/token"
```

- You should receive a response containing a token:

```json
    {
        "access_token": "THIS IS THE CODE YOU NEED",
        "token_type": "bearer",
        "uid": "1234567890",
        "account_id": "dbid:XXXXX"
    }
```

- Create a file called **API_KEY** in the project's root directory containing the token.
  - Alternatively, set the **APIKEY** environment variable instead