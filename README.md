# eCommerce

Clone the repository using `git clone --recurse-submodules`

## Docker

To create and start docker containers execute  
`docker-compose -f docker-compose.dev.yml up --build -d`

To start already existing containers execute  
`docker-compose -f docker-compose.dev.yml start`

To stop all containers execute  
`docker-compose -f docker-compose.dev.yml stop`

To stop and delete all containers execute  
`docker-compose -f docker-compose.dev.yml down`

Change `docker-compose.dev.yml` to `docker-compose.prod.yml` in order to use the production version. Not recommended for debugging.
