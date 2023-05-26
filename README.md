# ICO Template

A template for creating Ethereum ICOs (Initial Coin Offerings).

## Installation

1. Set your environment variables in docker-compose.yml (e.g. database and ports).
2. Start the containers `docker compose up -d`.
3. Run `docker compose exec php composer install`.
4. Import the provided database at http://localhost:8081.
