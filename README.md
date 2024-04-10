# Dockerised Wordpress
This project is for the purpose of spinning up a wordpress container so we can work with the API. 

## Setup 

Wordpress Installation:
- Run `docker-compose up -d`
- Go to `https://localhost:443/` and do the setup 
- Once setup you can go to `https://localhost:443/wp-admin` 

Permalink setup: 
- Navigate to `settings` -> `permalinks` 
- In `permalink structure`, select `post name` 
- Click `save changes`

Passwords: 
- Navigate to users 
- Select the user you are logged in as (the admin user)
- Scroll to `Application Passwords`
- Create a new password

API Access:
- Now you can access the API with username as the user's name
- For password, use the password you just generated 
- Run a test command to make sure it works, replace username and password to match yours: 
```
curl --location 'https://localhost:443/wp-json/wp/v2/posts' \
--header 'Content-Type: application/x-www-form-urlencoded' \
--header 'Authorization: Basic YWRtaW46T21qaCAwQUNxIDZvYUYgdDUzNiBsNXowIDFzeHE=' \
--data-urlencode 'title=Boobies' \
--data-urlencode 'content=Are sexy' \
--data-urlencode 'status=publish'
```